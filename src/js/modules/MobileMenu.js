let listen = false;

export const MobileMenu = () => {
    const header = document.querySelector('.header');
    const mainSection = document.querySelector('main');
    let menu = document.querySelector('.mobile-menu');

    const array = [
        header.querySelector('.menu-nav-top-container'), 
        header.querySelector('.phone'),
        header.querySelector('.button'),
    ]
    const headerNav = header.querySelector('.header-nav')

    if(window.innerWidth < 767) {
        if(menu === null) {
            const menuBtn = header.querySelector('.mobile-menu__button');
            headerNav.classList.add('mobile-menu');
            RemoveItems(array, headerNav)
            listen = true;
            mainSection.style.marginTop = `75px`

            menuBtn.onclick = () => {
                ShowMenu(header)
            }
        }
    }else if(listen === true) {
        if(menu) {
            menu.parentNode.removeChild(menu);
        }
        const headerTop = header.querySelector('.header-top');
        headerTop.after(headerNav)
        RemoveItems(array, headerTop)
        listen = false
        mainSection.style.marginTop = `0px`
    }
}

const RemoveItems = (array, wrapper) => {
    array.forEach(element => {
        element.parentNode.removeChild(element)
        wrapper.append(element);
    });
}

const ShowMenu = (header) => {
    header.classList.contains('open') ? header.classList.remove('open') : header.classList.add('open')
}