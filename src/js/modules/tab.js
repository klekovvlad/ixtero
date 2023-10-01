export const Tabs = () => {
    const tabItems = document.querySelectorAll('.tab');

    if(tabItems.length > 0) {
        tabItems.forEach(tabItem => {
            const tabNav = tabItem.querySelector('.tab-nav');
            const tabContent = tabItem.querySelector('.tab-content');

            const tabNavItems = tabNav.querySelectorAll('.tab-nav-item');
            const tabContentItems = tabContent.querySelectorAll('.tab-content-item');

            tabContentItems[0].classList.add('open');
            tabNavItems[0].classList.add('active')

            tabNavItems.forEach((nav, index) => {
                nav.onclick = () => {
                    RemoveClasses(tabContentItems, tabNavItems, index)
                }
            })
        })
    }
}

const RemoveClasses = (contents, navs, index) => {
    contents.forEach(el => {
        el.classList.remove('open')
    })
    navs.forEach(el => {
        el.classList.remove('active')
    })
    contents[index].classList.add('open');
    navs[index].classList.add('active');
}