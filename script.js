/**
 * 
 * Класс, управляющий формами
 * 
 *  */
class Forms {
    /**
     * @param form форма, на которую вешаем событие submit
     * @param modal Передать id модального окна, если форма находится в модальном окне bootstrap
     * 
     *  */
    constructor(form, modal = false) {
        this.modalSuccess = new bootstrap.Modal(document.getElementById('modal-succes'));
        this.modalError = new bootstrap.Modal(document.getElementById('modal-error'));
        this.form = form;
        if (modal) {
            this.modal = new bootstrap.Modal(modal);
        }

        this.form.addEventListener('submit', evt => {
            this.send(evt, this);
        });
    }

    send(evt, that) {
        evt.preventDefault();
        let formData = new FormData(evt.target);
        grecaptcha.ready(function() {
            grecaptcha.execute(window.recaptcha_public, {
                action: 'submit'
            }).then(function(token) {
                formData.append('recaptcha_token', token);
                fetch(evt.target.action, {
                        method: 'POST',
                        body: formData
                    })
                    .then(result => result.json())
                    .then(data => {
                        console.log(data);
                        if (that.modal) {
                            that.modal.hide();
                        }

                        if (data.success) {
                            /* let modal = new bootstrap.Modal(document.getElementById('modal-succes')); */
                            that.modalSuccess.show();
                        } else {
                            /* let modal = new bootstrap.Modal(document.getElementById('modal-error')); */
                            that.modalError.show();
                        }
                    });
            })
        });
    }
}

/* Пример инициализации формы с модалкой */
document.addEventListener('DOMContentLoaded', () => {
    new Forms(document.getElementById('form-callback'), document.getElementById('modal-callback'));
})

/* Пример инициализации формы без модалки */
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-form-email]').forEach(form => { 
        new Forms(form, false);
    })
});
