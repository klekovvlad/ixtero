export const LightMarkers = () => {
    const ShopPage = document.querySelector('.shoppage');
    if(ShopPage) {
        const markers = ShopPage.querySelectorAll('.light-marker');
        markers.forEach(maker => {
            maker.textContent = maker.title
        })
    }
}