import { CartPageQuantity } from "./modules/CartPageQuantity.js";
import { AddFilterButton } from "./modules/FitersMob.js";
import { PhoneMask } from "./modules/IMask.js";
import { MobileMenu } from "./modules/MobileMenu.js";
import { PublicationsVideo } from "./modules/PublicationsVideo.js";
import { Tooltip } from "./modules/Tooltip.js";
import { aboutpageHero } from "./modules/aboutpageHero.js";
import { AboutpageStory } from "./modules/aboutpageStory.js";
import { animation } from "./modules/animation.js";
import { brigade } from "./modules/brigade.js";
import { BrigadeCall } from "./modules/brigadeCall.js";
import { cf7 } from "./modules/cf7.js";
import { CommentShow } from "./modules/commentShow.js";
import { commentRating } from "./modules/commentsRating.js";
import { Cookie } from "./modules/cookie.js";
import { Faq } from "./modules/faq.js";
import { SetCities } from "./modules/getCities.js";
import { HideElements } from "./modules/hideElemetns.js";
import { AboutPageSwiper, HomePageSliders } from "./modules/initSwiper.js";
import { MenuHasChild } from "./modules/menuHasChild.js";
import { Popups } from "./modules/popup.js";
import { productButtons } from "./modules/productButtons.js";
import { productHeight } from "./modules/productHeight.js";
import { productVariations } from "./modules/productVariation.js";
import { ResizeMap } from "./modules/resizeMap.js";
import { Tabs } from "./modules/tab.js";
import { init } from "./modules/yandexMap.js";

SetCities();
MenuHasChild();
MobileMenu();
HomePageSliders();
AboutPageSwiper();
Tooltip();
HideElements();
aboutpageHero();
AboutpageStory();
Tabs();
brigade();
Faq();
AddFilterButton();
CartPageQuantity();
PhoneMask();
cf7();
Popups();
Cookie();
BrigadeCall();
PublicationsVideo();

const productpage = document.querySelector('.productpage');

if(productpage) {
    productVariations();
    productHeight();
    productButtons();
    commentRating(productpage);
    CommentShow(productpage);
}

const map = document.querySelector('#map'); {
    if(map) {
        ymaps.ready(init);
    }
}

window.onresize = () => {
    MobileMenu();
}

animation(window.scrollY + (window.innerHeight * 0.9));

window.onscroll = () => {
    animation(window.scrollY + (window.innerHeight * 0.7));
}