export const productVariations = () => {
    const variation = document.querySelector('.input-variations');

    if(variation) {
        const inputs = variation.querySelectorAll('input[type="radio"]');
        const formIdValue = document.querySelector('input[name="variation_id"]');
        const button = document.querySelector('.single_add_to_cart_button');
        const wrap = document.querySelector('.woocommerce-variation-add-to-cart');

        inputs.forEach(input => {
            if(input.checked) {
                formIdValue.value = input.value;
                setTimeout(() => {
                    button.classList.remove('wc-variation-selection-needed');
                    button.classList.remove('disabled');
                    wrap.classList.remove('woocommerce-variation-add-to-cart-disabled')
                }, 1500)
            }
            input.onchange = () => {
                formIdValue.value = input.value;
                button.classList.remove('wc-variation-selection-needed');
                button.classList.remove('disabled');
                wrap.classList.remove('woocommerce-variation-add-to-cart-disabled')
            }
        })
    }
}