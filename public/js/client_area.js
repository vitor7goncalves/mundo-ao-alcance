
// Função para alternar exibição do formulário
function toggleForm(buttonId, formId) {
    const toggleButton = document.getElementById(buttonId);
    const formSection = document.getElementById(formId);

    toggleButton.addEventListener('click', () => {
        if (formSection.style.display === 'none' || formSection.style.display === '') {
            formSection.style.display = 'block'; // Mostrar formulário
        } else {
            formSection.style.display = 'none'; // Esconder formulário
        }
    });
}

// Configuração dos botões e formulários
toggleForm('toggle-name-btn', 'form-name');
toggleForm('toggle-phone-btn', 'form-phone');
toggleForm('toggle-email-btn', 'form-email');
toggleForm('toggle-password-btn', 'form-password');