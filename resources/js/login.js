document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');

    if (!loginForm) {
        console.error('Login form is missing');
        return;
    }

    console.info('Login form here!');

    loginForm.addEventListener('submit', (event) => {
        if (!loginForm.checkValidity()) {
            event.preventDefault();
            loginForm.classList.add('shake');
            setTimeout(() => loginForm.classList.remove('shake'), 500);

            loginForm.querySelectorAll('input').forEach((element) => {
                if (!element.checkValidity()) {
                    element.classList.add('bg-red-100', 'text-red-800');
                } else {
                    element.classList.remove('bg-red-100', 'text-red-800');
                }
            });
        }
    });
});
