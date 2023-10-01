import Swiper, {Pagination, Autoplay, Grid, Scrollbar, Thumbs, FreeMode, Navigation, Mousewheel} from "swiper";
import { ShowCustomPrice } from "./productButtons.js";

export const HomePageSliders = () => {
    const homepage = document.querySelector('.homepage');
    if(homepage) {
        const HeroSlider = new Swiper('.hero-slider', {
            slidesPerView: 1,
            spaceBetween: 10,
            speed: 1200,
            modules: [Pagination, Autoplay],
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true,
            },
            autoplay: {
                delay: 5000,
            }
        })
        
        const AdvantageBlock = new Swiper('.advantage-block', {
            slidesPerView: 3,
            spaceBetween: 12,
            modules: [Grid, Pagination],
            speed: 1000,
            grid: {
                rows: 2,
                fill: 'row'
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                    grid: {
                        rows: 1,
                    },
                    centeredSlides: true,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                    grid: {
                        rows: 2,
                        fill: 'row'
                    },
                    centeredSlides: false,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 12,
                }
            }
        })
        
        const AdvantageSlider = new Swiper('.advantage-slider', {
            slidesPerView: 2.1,
            spaceBetween: 46,
            speed: 1200,
            grabCursor: true,
            modules: [Grid, Scrollbar, Mousewheel],
            mousewheel: {
                eventsTarget: 'container'
            },
            grid: {
                rows: 2,
                fill: 'row'
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1.1,
                    spaceBetween: 8,
                    grid: {
                        rows: 1,
                    }
                },
                768: {
                    slidesPerView: 1.8,
                    spaceBetween: 20,
                    grid: {
                        rows: 2,
                        fill: 'row'
                    },
                },
                1200: {
                    slidesPerView: 2.1,
                    spaceBetween: 46,
                }
            }
        })

        const AdvantageProductWrapper = new Swiper('.advproducts-wrapper', {
            slidesPerView: 1,
            spaceBetween: 28,
            speed: 1200,
            modules: [Grid, Scrollbar],

            grid: {
                rows: 10,
                fill: 'row'
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
            },
            breakpoints: {
                0: {
                    grid: {
                        rows: 1,
                    }
                },
                768: {
                    grid: {
                        rows: 10
                    }
                }
            }
        })

        const AdvantageProductSlider = new Swiper('.advproducts-slider', {
            slidesPerView: 2.1,
            spaceBetween: 60,
            speed: 1200,
            grabCursor: true,
            modules: [Grid, Scrollbar, Mousewheel],
            mousewheel: {
                eventsTarget: 'container',
            },
            grid: {
                rows: 2,
                fill: 'row'
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    speed: 1200,
                    centeredSlides: true,
                    loop: true,
                    grid: {
                        rows: 1,
                    }
                },
                768: {
                    slidesPerView: 2.1,
                    spaceBetween: 20,
                    centeredSlides: false,
                    loop: false,
                    grid: {
                        rows: 2,
                        fill: 'row'
                    },
                },
                1200: {
                    spaceBetween: 60,
                }
            }
        })
    }
}

export const AboutPageSwiper = () => {
    const aboutpage = document.querySelector('.aboutpage');

    if(aboutpage) {
        const Team = new Swiper('.team-items', {
            slidesPerView: 2,
            spaceBetween: 60,
            modules: [Grid],
            grid: {
                rows: 10,
                fill: 'row'
            },
            breakpoints: {
                0: {
                    slidesPerView: 'auto',
                    centeredSlides: true,
                    loop: true,
                    spaceBetween: 20,
                    grid: {
                        rows: 1,
                    }
                },
                768: {
                    slidesPerView: 1,
                    centeredSlides: false,
                    loop: false,
                    spaceBetween: 40,
                    grid: {
                        rows: 10
                    }
                },
                1024: {
                    slidesPerView: 2,
                }
            }
        })

        const Work = new Swiper('.work-slider', {
            slidesPerView: 1,
            spaceBetween: 30,
            modules: [Pagination],
            pagination: {
                el: '.pagingation-number',
                clickable: true,
            },
            breakpoints: {
                0: {
                    centeredSlides: true,
                    slidesPerView: 'auto',
                    spaceBetween: 20,
                },
                768: {
                    centeredSlides: false,
                    slidesPerView: 1,
                    spaceBetween: 30,
                }
            }
        })

        const workSlider = document.querySelector('.work-slider');
        const pagination = workSlider.querySelectorAll('.pagingation-number > span');
        pagination.forEach((el, index) => {
            el.innerHTML = index + 1;
        });

        const ChooseThumb = new Swiper('.choose-tabs', {
            slidesPerView: 2,
            spaceBetween: 30,
            modules: [Grid],
            grid: {
                rows: 5,
                fill: 'row'
            },
            breakpoints: {
                0: {
                    slidesPerView: 'auto',
                    spaceBetween: 16,
                    grid: {
                        rows: 1,
                    }
                },
                1025: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                    grid: {
                        rows: 5,
                        fill: 'row'
                    },
                }
            }
        })

        const Choose = new Swiper('.choose-content', {
            slidesPerView: 1,
            spaceBetween: 20,
            modules: [Thumbs],
            thumbs: {
                swiper: ChooseThumb,
            },
        }) 
    }

    const buyPage = document.querySelector('.buypage');
    if(buyPage) {
        const Parners = new Swiper('.partners', {
            slidesPerView: 5,
            spaceBetween: 25,
            modules: [Grid],
            grid: {
                rows: 10,
                fill: 'row'
            },
            breakpoints: {
                0: {
                    slidesPerView: 4,
                    spaceBetween: 8,
                    grid: {
                        rows: 1,
                    }
                },
                768: {
                    slidesPerView: 5,
                    spaceBetween: 25,
                    grid: {
                        rows: 10,
                        fill: 'row'
                    },
                }
            }
        })
    }

    const coopPage = document.querySelector('.cooperationpage');
    if(coopPage) {
        const ConditionsThumb = new Swiper('.conditions-titles', {
            slidesPerView: 'auto',
            spaceBetween: 3,
            speed: 1200,
        })

        const Conditions = new Swiper('.conditions-wrapper', {
            slidesPerView: 1,
            spaceBetween: 115,
            grabCursor: true,
            speed: 1200,
            modules: [Pagination, Thumbs, Mousewheel],
            mousewheel: {
                eventsTarget: 'container',
            },
            thumbs: {
                swiper: ConditionsThumb,
            },
            pagination: {
                el: '.pagination-circle',
                type: 'bullets',
                clickable: true,
            }
        })
    }

    const galleryPage = document.querySelector('.gallerypage');
    if(galleryPage) {
        const GalleryThumb = new Swiper('.gallerypage-thumbs', {
            slidesPerView: 4,
            spaceBetween: 10,
           
            modules: [Grid],
            grid: {
                rows: 3,
                fill: 'row'
            }
        })

        const Gallery = new Swiper('.gallerypage-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            modules: [Navigation, Thumbs],
            thumbs: {
                swiper: GalleryThumb,
            },
            navigation: {
                prevEl: '.swiper-prev',
                nextEl: '.swiper-next'
            }
        })
    }

    const categoryNav = document.querySelector('.categorypage-nav');
    if(categoryNav) {
        const CategoryNavigation = new Swiper('.categorypage-nav', {
            slidesPerView: 'auto',
            breakpoints: {
                0: {
                    spaceBetween: 4,
                },
                768: {
                    spaceBetween: 24,
                }
            }
        });
    }

    const product = document.querySelector('.productpage');
    if(product) {
        const productTabs = new Swiper('.productpage-nav', {
            slidesPerView: 'auto',
            breakpoints: {
                0: {
                    spaceBetween: 8,
                },
                768: {
                    spaceBetween: 0,
                }
            }
        });

        const GalleryThumb = new Swiper('.productpage-thumbs', {
            slidesPerView: 5,
            spaceBetween: 10,
        })

        const Gallery = new Swiper('.productpage-imgs', {
            slidesPerView: 1,
            spaceBetween: 20,
            speed: 1200,
            modules: [Thumbs],
            thumbs: {
                swiper: GalleryThumb,
            },
        })

        const Variations = () => {
            const VariationsButtons = product.querySelectorAll('input[name=pa_colors]');
            const VariationsImages = product.querySelectorAll('.productpage-img');
            const VariationQuantityPrice = product.querySelector('.quantity-price');
            const customStandartPrice = product.querySelector('.price-value-summ');
            const quantityInput = product.querySelector('.quantity-custom');
            
            
            VariationsButtons.forEach(variation => {
                variation.onclick = () => {
                    for(let i = 0; i < VariationsImages.length; i++) {
                        if(VariationsImages[i].dataset.variation === variation.value) {
                            Gallery.slideTo(i, 1200)
                        }
                    }
                    VariationQuantityPrice.dataset.price = variation.dataset.price;
                    ShowCustomPrice(VariationQuantityPrice, Number(quantityInput.value));
                    customStandartPrice.textContent = Number(variation.dataset.price).toLocaleString();
                }
            })
        }

        Variations();

        const RelatedProduct = new Swiper('.related', {
            slidesPerView: 4,
            spaceBetween: 16,
            speed: 1200,
            breakpoints: {
                0: {
                    slidesPerView: 2,
                    spaceBetween: 4,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 16,
                }

            }
        })
    }

    const Publications = document.querySelector('.publications');

    if(Publications) {
        const salesSlider = new Swiper('.publications-sale', {
            slidesPerView: 2,
            spaceBetween: 16,
            speed: 1000,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                }
            }
        })
    }
}