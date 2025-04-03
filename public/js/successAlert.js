document.addEventListener('DOMContentLoaded', function () {
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.transition = 'opacity 0.5s ease-in-out';
            successAlert.style.opacity = '0';
            setTimeout(() => successAlert.remove(), 500); // Remove o elemento após a transição
        }, 5000); // 5 segundos antes de começar a desaparecer
    }
});