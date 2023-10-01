export const CommentShow = (page) => {
    const button = page.querySelector('.comments-open');
    button.onclick = () => button.parentElement.classList.contains('open') ? button.parentElement.classList.remove('open') : button.parentElement.classList.add('open')
}