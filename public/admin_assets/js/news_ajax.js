document.addEventListener('DOMContentLoaded', function () {

    // Create News Form
    const createForm = document.getElementById('createNewsForm');
    if (createForm) {
        createForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Kaydediliyor... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json' // Explicitly ask for JSON
                }
            })
                .then(response => response.json().then(data => ({ status: response.status, body: data })))
                .then(({ status, body }) => {
                    if (status === 200 || status === 201) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı!',
                            text: body.message,
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = '/admin/news';
                        });
                    } else {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;

                        if (status === 422) { // Validation Error
                            let errorMessages = '';
                            // Clear existing errors
                            document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                            document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());

                            for (const [key, messages] of Object.entries(body.errors)) {
                                const input = document.getElementById(key);
                                if (input) {
                                    input.classList.add('is-invalid');
                                    const errorDiv = document.createElement('div');
                                    errorDiv.className = 'invalid-feedback';
                                    errorDiv.textContent = messages[0];
                                    input.parentNode.appendChild(errorDiv);
                                } else {
                                    errorMessages += messages[0] + '<br>';
                                }
                            }
                            if (errorMessages) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Doğrulama Hatası',
                                    html: errorMessages
                                });
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata!',
                                text: body.message || 'Bir sorun oluştu.'
                            });
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                    Swal.fire({
                        icon: 'error',
                        title: 'Sistem Hatası',
                        text: 'İşlem sırasında bir hata oluştu.'
                    });
                });
        });
    }

    // Delete News
    document.querySelectorAll('.delete-news-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const formElement = this;

            Swal.fire({
                title: 'Emin misiniz?',
                text: "Bu haberi silmek istediğinize emin misiniz? Bu işlem geri alınamaz!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Evet, Sil!',
                cancelButtonText: 'İptal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const formData = new FormData(formElement);
                    fetch(formElement.action, {
                        method: 'POST', // Form handles method logic but fetch handles sending
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire(
                                    'Silindi!',
                                    data.message,
                                    'success'
                                ).then(() => {
                                    // Remove the row
                                    formElement.closest('tr').remove();
                                });
                            } else {
                                Swal.fire(
                                    'Hata!',
                                    data.message || 'Silme işlemi başarısız oldu.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            Swal.fire(
                                'Hata!',
                                'Sistem hatası oluştu.',
                                'error'
                            );
                        });
                }
            });
        });
    });

    // Update News Form - Similar to Create
    const editForm = document.getElementById('editNewsForm');
    if (editForm) {
        editForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            // PUT method handling if needed, usually Laravel form includes _method input
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Güncelleniyor... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
                .then(response => response.json().then(data => ({ status: response.status, body: data })))
                .then(({ status, body }) => {
                    if (status === 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Güncellendi!',
                            text: body.message,
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = '/admin/news';
                        });
                    } else {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;

                        if (status === 422) { // Validation Error
                            document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                            document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());

                            for (const [key, messages] of Object.entries(body.errors)) {
                                const input = document.getElementById(key);
                                if (input) {
                                    input.classList.add('is-invalid');
                                    const errorDiv = document.createElement('div');
                                    errorDiv.className = 'invalid-feedback';
                                    errorDiv.textContent = messages[0];
                                    input.parentNode.appendChild(errorDiv);
                                }
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata',
                                text: 'Lütfen hatalı alanları kontrol ediniz.'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata!',
                                text: body.message || 'Bir sorun oluştu.'
                            });
                        }
                    }
                })
                .catch(error => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata',
                        text: 'Sistem hatası.'
                    });
                });
        });
    }
});
