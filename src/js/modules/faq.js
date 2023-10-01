export const Faq = () => {
    const faqItems = document.querySelectorAll('.faq-item');
    if(faqItems.length > 0) {
        faqItems.forEach(item => {
            const question = item.querySelector('.question');
            
            question.onclick = (e) => {
                FaqActions(e.target, item)
            }
        })
    }
}

const FaqActions = (target, parent) => {
    const answer = parent.querySelector('.answer');
    
    if(parent.classList.contains('open')) {
        parent.classList.remove('open');
        target.style.paddingBottom = '0px'
    }else {
        parent.classList.add('open');
        target.style.paddingBottom = `${answer.offsetHeight}px`
    }
}