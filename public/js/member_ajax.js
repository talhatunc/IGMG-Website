document.addEventListener('DOMContentLoaded', function () {
    console.log('Member Ajax Script Loaded');

    // Initialize PNotify
    if (typeof PNotify !== 'undefined') {
        console.log('PNotify Defined');
        PNotify.defaultStack = new PNotify.Stack({
            dir1: 'down',
            dir2: 'left',
            firstpos1: 25,
            firstpos2: 25,
            spacing1: 36,
            spacing2: 36,
            push: 'bottom',
            context: document.body
        });
    } else {
        console.warn('PNotify NOT Defined');
    }

    const memberForm = document.getElementById('memberForm');
    if (memberForm) {
        console.log('Member Form Found');
        memberForm.addEventListener('submit', function (e) {
            console.log('Form Submitted');
            e.preventDefault();
            const submitBtn = this.querySelector('input[type="submit"]');
            const originalVal = submitBtn.value;
            submitBtn.disabled = true;
            submitBtn.value = 'Gönderiliyor...';

            const formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    submitBtn.disabled = false;
                    submitBtn.value = originalVal;

                    if (data.success) {
                        memberForm.reset();
                        if (typeof PNotify !== 'undefined') {
                            PNotify.success({
                                text: data.message,
                                delay: 3000
                            });
                        } else {
                            alert(data.message);
                        }
                    } else {
                        let errorMessage = data.message || 'Bir hata oluştu.';
                        if (data.errors) {
                            errorMessage = Object.values(data.errors).flat().join('\n');
                        }
                        if (typeof PNotify !== 'undefined') {
                            PNotify.error({
                                text: errorMessage,
                                delay: 5000
                            });
                        } else {
                            alert(errorMessage);
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    submitBtn.disabled = false;
                    submitBtn.value = originalVal;
                    if (typeof PNotify !== 'undefined') {
                        PNotify.error({
                            text: 'Sistem hatası oluştu. Lütfen tekrar deneyin.',
                            delay: 3000
                        });
                    } else {
                        alert('Sistem hatası oluştu.');
                    }
                });
        });
    }
});
