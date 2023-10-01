<?php
/*
    Template Name: Где купить?
    Template Post Type: page
*/
?>

<?php get_header(); ?>
<script src="https://api-maps.yandex.ru/2.1/?apikey=503200f3-2559-4ceb-9d10-43db7a56e0a1&lang=ru_RU" type="text/javascript"></script>

    <main class="buypage">

        <section class="section buypage-map">
            <div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<div class="breadcrumbs">','</div>');
                }?>

                <div class="section-titles">
                    <?php the_field('title');?>
                    <div class="subtitle">
                        <?php the_field('desc');?>
                    </div>
                </div>

                <ul class="office-list">
                    <li class="office-item office-item__accent">
                        <div class="icon"></div>
                        Наши офисы
                    </li>
                    <li class="office-item office-item__brand">
                        <div class="icon"></div>
                        Представители
                    </li>
                    <li class="office-item">
                        <div class="icon"></div>
                        Магазины
                    </li>
                </ul>

                <div class="tooltip tooltip-city">
                    <div class="tooltip-value">Москва</div>
                    <div class="tooltip-list">
                        <div class="tooltip-items">
                            <?php
                                $cities = get_field('cities', 53);
                                foreach ($cities as $index => $city) { ?>
                                    <div data-id="<?php echo $index;?>" class="tooltip-item"><?php echo $city['city'];?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="map-wrapper">
                    <div class="map-items"></div>
                    <div id="map"></div>
                </div>

            </div>
        </section>
        
        <?php if(have_rows('partners')): while (have_rows('partners')) : the_row();
            $title = get_sub_field('title');
            $partners = get_sub_field('item');?>

                <section class="section buypage-partners">
                    <div class="container">
                        <div class="section-titles">
                            <h2><?php echo $title ?></h2>
                        </div>

                        <div class="partners swiper">
                            <div class="swiper-wrapper">
                                <?php foreach($partners as $partner){?>
                                    <div class="partner-item swiper-slide">
                                        <?php if($partner['logo']) {
                                            ?><img src="<?php echo $partner['logo']?>" alt="<?php echo $partner['name']?>"><?php
                                        } else { ?>
                                            <div class="partner-name"><?php echo $partner['name']?></div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
        
            <?php endwhile;
        endif;?>

        <?php if(have_rows('cooperation')): while (have_rows('cooperation')) : the_row();
            $title = get_sub_field('title');
            $bonusses = get_sub_field('cooperation-items')
        ?>

            
            
            <section class="section buypage-cooperation">
                <div class="container">
                    <div class="section-titles">
                       <?php echo $title?>
                    </div>

                    <div class="tab cooperation">
                        <div class="tab-nav cooperation-nav">
                            <?php foreach($bonusses as $bonus) {?>
                                <button class="tab-nav-item cooperation-nav-item">
                                    <div class="icon">
                                        <img src="<?php echo $bonus['icon'] ?>" alt="<?php echo $bonus['title'] ?>">
                                    </div>
                                    <?php echo $bonus['title'] ?>
                                </button>
                            <?php } ?>
                        </div>
                        <div class="tab-content cooperation-content">
                            <?php foreach($bonusses as $bonus) {?>
                                <div class="tab-content-item cooperation-content-item box-list">
                                    <div class="title"><?php echo $bonus['title'] ?></div>
                                    <div class="desc">
                                        <?php echo $bonus['opisanie'] ?>
                                    </div>
                                    <a href="#message" class="more more-doublesquare more-doublesquare__black popup-open popup-message">Оставить заявку</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>

            <?php endwhile;
        endif;?>
        
    </main>

<?php get_footer(); ?>