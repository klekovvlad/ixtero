import { productAddCartAction } from "./productAddCartAction.js";

export const productButtons = () => {
    const product = document.querySelector('.productpage');

    if(product) {
        const customInput = product.querySelector('.quantity-custom');
        const customBtn = product.querySelector('.add-cart-custom');
        const customChanges = product.querySelectorAll('.quantity-change');
        const customPrice = product.querySelector('.quantity-price');
        const customStandartPrice = product.querySelector('.price-value-summ');
        const variation = product.querySelectorAll('input[name=pa_colors]')[0]

        if(variation) {
            customPrice.dataset.price = variation.dataset.price;
        }
        customStandartPrice.textContent = Number(customPrice.dataset.price).toLocaleString();

        const input = product.querySelector('input[name="quantity"]');
        const button = product.querySelector('.single_add_to_cart_button');

        customInput.step = input.step;
        customInput.value = input.value;
        
        ShowCustomPrice(customPrice, customInput.value);

        customChanges.forEach(change => {
            change.onclick = (e) => {
                ChangeInput(e.target, customInput.step, input, customInput);
                ShowCustomPrice(customPrice, customInput.value);
            }
        })

        customBtn.onclick = () => {
            button.click();
            // productAddCartAction();
        }
    }
}

export const ShowCustomPrice = (item, step) => {
    let result = Number(item.dataset.price) * Number(step)
    item.textContent = `${result.toLocaleString()} руб.`
}

const ChangeInput = (target, step, input, customInput) => {
    let result = Number(input.value);
    if(target.dataset.action === 'plus') {
        result = Number(input.value) + Number(step);
    }else if(result > Number(step)){
        result = Number(input.value) - Number(step);
    }

    input.value = result.toFixed(2);
    customInput.value = result.toFixed(2);
}