export const CartPageQuantity = () => {
    const cartpage = document.querySelector('.cartpage');
    
    if(cartpage) {
        const update = cartpage.querySelector('[name="update_cart"]');
        if(update) {
            setTimeout(() => {update.disabled = false}, 2000)
        }
        const quantitys = cartpage.querySelectorAll('.quantity');
        if(quantitys.length > 0) {
            quantitys.forEach(quantity => {
                const input = quantity.querySelector('input');
                quantity.parentElement.before(Texts(input.getAttribute('step')))
                for(let i = 0; i < 2; i++) {
                    if(i === 0) {
                        CreateButtons('-', 'minus', quantity, input, update)
                    }else{
                        CreateButtons('+', 'plus', quantity, input, update)
                    }
                }
                Summary(input, quantity)
            })
        }
        NormalizeText();
        AddDeliveryText(cartpage)
    }
}


const CreateButtons = (text, action, wrapper, input, update) => {
    const button = document.createElement('div');
    button.classList.add('quantity-btn');
    button.textContent = text;
    button.dataset.action = action;
    wrapper.append(button)
    button.onclick = (e) => {
        ButtonAction(e.target, input, update, wrapper);
        
    }
}

let timeout = null;

const ButtonAction = (target, input, update, wrapper) => {
    
    let step = input.getAttribute('step');
    
    if(target.dataset.action === 'plus') {
        input.value = (Number(input.value) + Number(step)).toFixed(2);
    }else if(Number(input.value) > step){
        input.value = (Number(input.value) - Number(step)).toFixed(2);
    }

    if(timeout !== null) {
        clearTimeout(timeout)
    }
    timeout = setTimeout(() => {update.click()}, 2000)
}

const Texts = (step) => {
    const text = document.createElement('div');
    text.classList.add('cartpage-item-multiple');
    text.textContent = `Товар продается кратно поддону по ${step} кв.м.`
    return text;
}

const Summary = (input, wrapper) => {
    const palletValue = wrapper.parentElement.parentElement.querySelector('.pallet-value');
    let summ = Number(input.value) / Number(input.getAttribute('step'));
    palletValue.textContent = Math.ceil(summ)
}

const NormalizeText = () => {
    const rublesValues = document.querySelectorAll('.rubles-value');
    if(rublesValues.length > 0) {
        rublesValues.forEach(value => {
            const symb = value.querySelector('.woocommerce-Price-currencySymbol');
            symb.textContent = 'руб.'
        })
    }
}

const AddDeliveryText = (page) => {
    const deliveryInput = page.querySelector('#billing_address_1_field');
    if(deliveryInput) {
        const text = document.createElement('div');
        text.classList.add('address-message');
        text.textContent = 'Если вам нужна доставка, введите название населенного пункта и области';
        deliveryInput.append(text)
    }
}