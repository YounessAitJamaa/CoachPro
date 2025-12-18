function showErrors(errors) {
    
    if(!errors || errors.length === 0) return;

    const errorContainer = document.getElementById('error-container');
    const errorList = document.getElementById('error-list');

    errorList.innerHTML = '';

    errors.forEach(error => {
        const li = document.createElement('li');
        li.textContent = error;
        errorList.appendChild(li);
    });

    errorContainer.classList.remove('hidden');
    
}


function showSuccess(message) {

    if(!message) return;
    const successContainer = document.getElementById('success-container');
    const successMessage = document.getElementById('success-message');

    successMessage.textContent = message;

    successContainer.classList.remove('hidden');
}




// Mobile menu toggle
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});
