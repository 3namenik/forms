<?

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require $_SERVER['DOCUMENT_ROOT'] . '/local/php_libs/phpmailer/loader.php';

$return = [];

if ($_POST['phone']) {
    if (recaptcha::valid($_POST['recaptcha_token'])) {
        try {
            $msg = '
                Новая сообщение на сайте<br><br>
    
                Имя: ' . $_POST['user-name'] . '<br>
                Телефон: ' . $_POST['phone'] . '<br>';
            if ($_POST['email']) {
                $msg .= 'email: ' . $_POST['email'] . '<br>';
            }
            $msg .= 'Источник: ' . $_POST['url'] . '<br>';

            $mail = new PHPMailer;
            $mail->SMTPDebug  = 2;
            $mail->CharSet = "utf-8";
            $mail->setFrom('system@' . $_SERVER['HTTP_HOST']);
            $mail->addAddress(htmlspecialchars(COption::GetOptionString("main", "email_from")));
            /* $mail->addAddress('3namenik@mail.ru'); */

            $mail->Subject = 'заявка на сайте';
            $mail->isHTML(true);
            $mail->msgHTML($msg);

            if ($mail->send()) {
                $return['success'] = true;
                $return['text'] = 'Ваша заявка успешно отправлена';
            } else {
                $return['success'] = false;
                $return['text'] = 'Ошибка отправки сообщения';
            }
        } catch (Exception $e) {
            $return['success'] = false;
            $return['text'] = $e;
        }
    } else {
        $return['success'] = false;
        $return['text'] = 'Вы не прошли спам проверку';
    }
} else {
    $return['success'] = false;
    $return['text'] = 'Не указан обязательный параметр';
}

echo json_encode($return);
