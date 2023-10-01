export const MenuHasChild = () => {
    const menu = document.querySelectorAll('.menu-item-has-children > a');

    if(menu.length > 0) {
        menu.forEach(item => {
            item.onclick = (e) => {
                e.preventDefault();

                if(window.innerWidth < 768) {
                    const subMenu = item.parentElement.querySelector('.sub-menu');
                    if(item.parentElement.classList.contains('open')) {
                        item.parentElement.classList.remove('open');
                        item.parentElement.style.paddingBottom = `11px`
                    }else{
                        item.parentElement.classList.add('open');
                        item.parentElement.style.paddingBottom = `${subMenu.offsetHeight}px`
                    }
                }
            }
        })
    }
}