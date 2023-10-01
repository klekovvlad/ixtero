export const brigade = () => {
    if(window.innerWidth < 768) {
        const descWrapper = document.querySelectorAll('.brigade-item-desc');
        if(descWrapper.length > 0) {
            descWrapper.forEach(wrap => {
                const button = wrap.querySelector('.desc-open');
                if(button) {
                    button.onclick = () => {
                        if(wrap.classList.contains('open')) {
                            wrap.classList.remove('open')
                            button.textContent = 'Читать описание'
                        }else {
                            wrap.classList.add('open')
                            button.textContent = 'Скрыть описание'
                        }
                    }
                }
            })
        }
    }
}