export const ResizeMap = () => {
    const mapWrapper = document.querySelector('.buypage .map-wrapper');

    if(mapWrapper && window.innerWidth < 768) {
        const items = mapWrapper.querySelector('.map-items');
        if(items.scrollHeight  >= 320) {
            mapWrapper.style.height = `${390 + 320 + 25}px`;
        }else{
            mapWrapper.style.height = `${390 + items.scrollHeight  + 50}px`;
        }

    }
}