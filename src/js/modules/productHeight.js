export const productHeight = () => {
    const product = document.querySelector('.productpage');

    if(product) {
        const heightValue = product.querySelector('.height-value');
        if(heightValue) {
            const heightIcons = product.querySelector('.height-icons')
            let i = 0;
            let value = Number(heightValue.textContent);

            if(value >= 10 && value < 30) {
                i = 1;
            }else if(value > 30) {
                i = 2;
            }

            for(let x = 0; x < i; x++) {
                const icon = document.createElement('icon');
                icon.classList.add('height-icon');
                if(x === 0) {
                    icon.classList.add('height-icon__person');
                    icon.title = 'Пешеходная зона'
                }
                if(x === 1) {
                    icon.classList.add('height-icon__car')
                    icon.title = 'Легковые авто'
                }
                heightIcons.append(icon);
            }
        }
    }
}