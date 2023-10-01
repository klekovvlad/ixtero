export const productAddCartAction = () => {
    const page = document.querySelector('.productpage');
    const message = document.createElement('div');
    const title = document.querySelector('.product_title');
    message.classList.add('noties-success');
    message.textContent = `${title.textContent} в корзине`

    setTimeout(() => {
        page.append(message)
    }, 3000)
}