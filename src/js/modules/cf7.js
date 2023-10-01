let interval = null;

export const cf7 = () => {
    const forms = document.querySelectorAll('.wpcf7-form');

    if(forms.length > 0) {
        forms.forEach(form => {
            const message = form.querySelector('.wpcf7-response-output');
            const button = form.querySelector('button[type=submit]');

            button.onclick = () => {
                setTimeout(() => {
                    message.classList.add('open');
                }, 1000)
                interval = setInterval(() => {
                    CheckDisplay(message, form)
                }, 1000);
            }
        })
    }
}

const CheckDisplay = (message, form) => {
    if(message.textContent !== '') {
        
        clearInterval(interval);
        setTimeout(() => {
            message.classList.remove('open');
        }, 3000)

        form.onclick = (e) => {
            if(e.target !== message) {
                message.classList.remove('open');
            }
        }
    }
}