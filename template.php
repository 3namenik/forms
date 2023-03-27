<!-- форма с модалкой -->
<div class="modal fade" id="modal-write-me" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content_callback">
            <button class="modal-content__close" data-bs-dismiss="modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M14 2L2 14" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2 2L14 14" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <div class="modal-content__title">Напишите нам</div>
            <div class="modal-content__desc">Мы свяжемся с вами в самые короткие сроки! Вы также можете связаться с нами по телефону
                <a href="tel:<?= str_replace(' ', '', file_get_contents($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/text/phone.php')) ?>">
                    <?= file_get_contents($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/text/phone.php') ?></a>
            </div>
            <form class="modal-content__form" id="modal-write-me-form" action="/local/ajax/calback.php">
                <? $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
                <input type="hidden" name="url" value="<?= $url ?>">
                <input type="text" name="user-name" required placeholder="Имя">
                <input type="text" name="email" required placeholder="Электронная почта">
                <input type="text" name="phone" placeholder="Телефон">
                <button title="Оставить заявку" type="submit" class="btn">
                    Оставить заявку
                </button>
            </form>
            <div class="modal-content__privacy">
                Оставляя заявку, вы соглашаетесь с <a href="/politika-konfidentsialnosti/" target="_blank">политикой обработки данных</a>.
            </div>
            <div class="modal-content__img">
                <img src="/local/img/form-callback-bg.png" alt="" width="418" height="177" loading="lazy">
            </div>
        </div>
    </div>
</div>

<!-- форма без модалки -->
<div class="form-email">
    <div class="body-main form-email__cont">
        <div class="form-email__title">
            <div class="form-email__img">
                <svg xmlns="http://www.w3.org/2000/svg" width="66" height="52" viewBox="0 0 66 52" fill="none">
                    <path d="M33.2596 33.5944L52.1578 50.7977C51.2235 51.2536 50.1987 51.4936 49.1591 51.5H7.02273C5.98388 51.4939 4.95975 51.2538 4.02636 50.7977L22.9222 33.5897L23.367 33.9947C24.6666 35.1617 26.3523 35.8063 28.099 35.8041C29.8457 35.8019 31.5298 35.1532 32.8266 33.983L33.2596 33.5944ZM36.7382 30.4318L55.4655 47.4947C55.9288 46.5558 56.1737 45.5242 56.1818 44.4773V16.3864C56.178 15.342 55.9379 14.312 55.4795 13.3736L36.7382 30.4318ZM29.6898 30.5161L52.1625 10.0636C51.2266 9.60784 50.2001 9.36862 49.1591 9.36364H7.02273C5.98316 9.37005 4.95833 9.61005 4.02402 10.0659L26.4968 30.5301C26.9371 30.922 27.5069 31.1372 28.0964 31.1342C28.6859 31.1311 29.2534 30.9125 29.6898 30.5161ZM0.702273 13.3736C0.243903 14.312 0.00381717 15.342 0 16.3864V44.4773C0.00411071 45.5224 0.244172 46.553 0.702273 47.4924L19.4295 30.4295L0.702273 13.3736ZM58.5227 0H16.3864C14.9391 0.00599967 13.529 0.459015 12.349 1.29707C11.169 2.13512 10.2768 3.31728 9.79436 4.68182H49.1591C52.2622 4.68553 55.2371 5.91988 57.4314 8.11411C59.6256 10.3083 60.8599 13.2833 60.8636 16.3864V41.7056C62.2282 41.2232 63.4103 40.331 64.2484 39.151C65.0864 37.971 65.5395 36.5609 65.5455 35.1136V7.02273C65.5455 5.16018 64.8056 3.37393 63.4886 2.05691C62.1715 0.739893 60.3853 0 58.5227 0Z" fill="#b2d7ff" />
                </svg>
            </div>
            <div class="form-email__text">
                <div class="form-email__text-title">
                    Подписывайтесь на нашу рассылку
                </div>
                <div class="form-email__text-desc">
                    Будем изредка присылать вам полезную информацию и анонсировать скидки
                </div>
            </div>
        </div>
        <form class="form-email__form" data-form-email action="https://cp.unisender.com/ru/subscribe?hash=64s55fhq18wo651jmwqpyu434hsc3h73mah6fwrir3sa5t67sy9ro" method="POST" target="_blank" name="subscribtion_form">
            <? $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
            <input type="hidden" name="url" value="<?= $url ?>">
            <input class="form-email__input" placeholder="E-mail" type="text" name="email" autocomplete="email" required value="">
            <input class="form-email__submit" type="submit" value="Подписаться">
        </form>
    </div>
</div>

<div class="modal fade" id="modal-succes" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content modal-content_success">
			<button class="modal-content__close" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
					<path d="M1 1L11 11M1.00002 11L6.00002 6L11 1" stroke="#76757A" stroke-linecap="round" />
				</svg>
			</button>

			<div class="modal-content__title-2">Заявка отправлена</div>
			<div class="modal-content__desc-2">В близжайшее время наш менеджер свяжется с вами!</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-error" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content modal-content_error">
			<button class="modal-content__close" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
					<path d="M1 1L11 11M1.00002 11L6.00002 6L11 1" stroke="#76757A" stroke-linecap="round" />
				</svg>
			</button>
			<div class="modal-content__title-2">Ошибка отправки</div>
			<div class="modal-content__desc-2">Попробуйте обновить страницу или связаться с нами по номеру телефона
				<a href="tel:<?= str_replace(' ', '', file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/local/templates/' . SITE_TEMPLATE_ID . '/text/phone.php')) ?>">
					<?= file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/local/templates/' . SITE_TEMPLATE_ID . '/text/phone.php') ?></a>
			</div>
		</div>
	</div>
</div>
