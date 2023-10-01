export const aboutpageHero = () => {
    const aboutpage = document.querySelector('.aboutpage');
    if(aboutpage && window.innerWidth < 767) {
        const hero = aboutpage.querySelector('.hero');
        const hidden = hero.querySelector('.hidden-el');
        const hiddenShow = hero.querySelector('.hidden-btn__show');
        const textEl = hero.querySelectorAll('.hero-text');

        textEl[0].append(hiddenShow);
        textEl[1].parentNode.removeChild(textEl[1])
        hidden.prepend(textEl[1]);

        treasureSection(aboutpage)
    }
}

const treasureSection = (page) => {
    const trasure = page.querySelector('.aboutpage-treasure');
    const box = trasure.querySelector('.treasure-box');

    trasure.style.marginBottom = `${box.offsetHeight}px`
}