export const Cookie = () => {
    if(!localStorage.getItem('cookie')) {
        
        const cookie = document.querySelector('.cookie');
        const cookieAccept = cookie.querySelector('.cookie-accept');
        
        setTimeout(() => {
            cookie.classList.add('open');
        }, 3000)

        cookieAccept.onclick = () => {
            localStorage.setItem('cookie', 'accept');
            cookie.classList.remove('open');
        }
    }
}