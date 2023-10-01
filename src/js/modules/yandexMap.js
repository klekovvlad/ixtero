import { ResizeMap } from "./resizeMap.js";

async function getMapItems() {
    let url = '/wp-json/wp/v2/pages/53'
    const response = await fetch(url);
    let data = await response.json();
    let items = [];
    let id = localStorage.getItem('cityId')

    data.acf.cities[id].obj.forEach(item => {
        let obj = {};
        obj.name = item.name;
        obj.class = item.type;
        if(item.type === 'shop') {
            obj.icon = '/wp-content/themes/ixtero/assets/img/icons/map-3.svg'
        }else if(item.type === 'partners') {
            obj.icon = '/wp-content/themes/ixtero/assets/img/icons/map-2.svg'
        }else if(item.type === 'office') {
            obj.icon = '/wp-content/themes/ixtero/assets/img/icons/map-1.svg'
        }
        obj.coord = item.coord.split(',');
        obj.iconSize = [24, 34];
        items.push(obj)
    })

    return items;
}

const createItem = (item, map, wrapper) => {
    const el = document.createElement('button');
    el.classList.add('map-item')
    el.innerHTML = `<div class="icon icon__${item.class}"></div>${item.name}`;
    let placemark = new ymaps.Placemark(item.coord, { balloonContent: item.name }, {iconLayout: 'default#image', iconImageHref: item.icon, iconImageSize: item.iconSize});
    map.geoObjects.add(placemark);
    wrapper.append(el)
    
    

    el.onclick = (e) => {
        openBalloon(placemark, map, item);
        const buttons = document.querySelectorAll('.map-item');
        buttons.forEach(button => {
            button.classList.remove('active');
            button.querySelector('.icon').classList.remove('active')
        })
        e.target.classList.add('active')
        e.target.querySelector('.icon').classList.add('active')
    }
}

const openBalloon = (placemark, map, item) => {
    map.setCenter(item.coord);
    placemark.options.set('iconImageSize', [48, 69])
    setTimeout(() => {
        placemark.options.set('iconImageSize', item.iconSize)
    }, 3000)
}

export const init = () => {

    const items = getMapItems();
    items.then(item => {
        const myMap = new ymaps.Map('map', {
            center: item[0].coord,
            zoom: 14
        }) 

        const productpage = document.querySelector('.productpage') 
        if(productpage) {
            for(let i = 0; i < item.length; i++) {
                let placemark = new ymaps.Placemark(item[i].coord, { balloonContent: item[i].name }, {iconLayout: 'default#image', iconImageHref: item[i].icon, iconImageSize: item[i].iconSize});
                myMap.geoObjects.add(placemark);
            }
        }
        
        const buypage = document.querySelector('.buypage');
        if(buypage) {
            const mapItems = buypage.querySelector('.map-items')
            for(let i = 0; i < item.length; i++) {
                createItem(item[i], myMap, mapItems)
            }
            ResizeMap();
        }
    })


}