export const HideElements = () => {
    const elements = document.querySelectorAll('.hidden-el');

    if(elements.length > 0) {
        const show = document.querySelectorAll('.hidden-btn');
        show.forEach((btn, index) => {
            let i = index;
            if(btn.classList.contains('hidden-btn__close')) {
                i = index - 1
            }
            btn.onclick = (e) => {
                ClassesForElement(e.target, elements[i], show[i])
            }
        })
    }
}

const ClassesForElement = (target, element, show) => {
    if(element.parentElement.classList.contains('open')) {
        element.parentElement.classList.remove('open')
        show.style.opacity = '1'
        element.parentElement.style.marginBottom = `0px`;
    }else {
        element.parentElement.classList.add('open');
        element.parentElement.style.marginBottom = `${element.offsetHeight}px`;
        if(target.classList.contains('hidden-btn__show')) {
            target.style.opacity = '0'
        }
    }   
}