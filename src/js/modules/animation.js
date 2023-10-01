const animationItems = document.querySelectorAll('.animation');


export const animation = (scroll) => {
    animationItems.forEach(item => {
        if(scroll >= item.getBoundingClientRect().top + document.documentElement.scrollTop) {
            item.style.transform = 'translate(0, 0)';
            item.style.opacity = '1';
        }
    })
}