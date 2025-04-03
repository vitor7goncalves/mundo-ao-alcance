document.addEventListener('DOMContentLoaded', function () {
    const errorAlert = document.getElementById('error-alert');
    if (errorAlert) {
        setTimeout(() => {
            errorAlert.style.transition = 'opacity 0.5s ease-in-out';
            errorAlert.style.opacity = '0';
            setTimeout(() => errorAlert.remove(), 500); // Remove o elemento após a transição
        }, 5000); // 5 segundos antes de começar a desaparecer
    }
});