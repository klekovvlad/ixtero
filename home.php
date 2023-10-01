<?php
/*
    Template Name: Главная страница
    Template Post Type: page
*/
?>

<?php get_header(); ?>

<main class="homepage">
    <section class="hero">

        <div class="container">
            <div class="hero-slider swiper">
                <div class="swiper-wrapper">
                    <?php
                        if(have_rows('hero-slider')): while (have_rows('hero-slider')) : the_row(); ?>
                            <div class="hero-wrapper swiper-slide">
                                <div class="hero-text">
                                    <?php the_sub_field('title'); ?>
                                    <a class="more more-doublesquare" href="<?php the_sub_field('link');?>"><?php the_sub_field('text');?></a>
                                </div>
                                <img src="<?php the_sub_field('img'); ?>" alt="ixtero" class="hero-img">
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </section>

    <section class="section homepage-production">
        <div class="container">
            <div class="production-wrapper">
                <img src="<?php the_field('production-img')?>" alt="ixtero" class="production-img animation animation-shape">
                <div class="production-titles section-titles animation animation-top">
                    <?php the_field('production-title')?>
                    <div class="subtitle"><?php the_field('production-subtitle')?></div>
                </div>
                <div class="production-desc animation animation-right"><?php the_field('production-desc-1')?></div>
                <div class="production-desc animation animation-top"><?php the_field('production-desc-2')?></div>
            </div>
            <div class="production-mokup">
                <div class="mokup-picture">
                    <img src="<?php the_field('production-mokup')?>" alt="ixtero" class="mokup-img">
                    <a href="/shop" class="more more-doublesquare">Смотреть весь каталог</a>
                </div>
                <img src="<?php the_field('production-man')?>" alt="ixtero" class="mokup-man animation animation-shape">
            </div>
        </div>
        <div class="production-bgtext animation animation-left"><?php the_field('production-bgtext')?></div>
    </section>

    <section class="section homepage-about">
        <div class="container">
            <div class="about-box animation animation-left">
                <div class="section-titles">
                    <?php the_field('about-title')?>
                    <?php the_field('about-subtitle')?>
                </div>
                <img src="<?php the_field('about-img')?>" alt="ixtero" class="about-img">
            </div>

            <div class="about-wrapper">
                <?php if(have_rows('about-desc')): while (have_rows('about-desc')) : the_row(); ?>
                        <div class="about-item box box-plus animation animation-top">
                            <?php the_sub_field('text');?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="section homepage-advantage">
        <div class="container">
            <div class="section-titles">
                <?php the_field('advantage-title')?>
            </div>

            <div class="advantage-block swiper">
                <div class="advantage-wrapper swiper-wrapper">
                    <?php if(have_rows('advantage-block')): while (have_rows('advantage-block')) : the_row(); ?>

                            <div class="advantage-item box box-gray swiper-slide">
                                <div class="icon">
                                    <img src="<?php the_sub_field('icon');?>" alt="icon" class="icon-img">
                                </div>
                                <div class="title"><?php the_sub_field('title');?></div>
                                <div class="desc"><?php the_sub_field('desc');?></div>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="swiper-pagination"></div>
            </div>

            <div class="advantage-slider swiper">
                <div class="swiper-wrapper">

                    <?php if(have_rows('advantage-slider')): while (have_rows('advantage-slider')) : the_row(); ?>

                        <div class="advantage-slide box box-lefticon swiper-slide">
                            <div class="icon">
                                <img src="<?php the_sub_field('icon');?>" alt="ixtero" class="icon-img">
                            </div>
                            <div class="desc"><?php the_sub_field('desc');?></div>
                        </div>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>

                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </section>

    <section class="homepage-excursion">
        <div class="container">
            <div class="excursion-box box box-opacity animation animation-top">
                <div class="section-titles">
                    <?php the_field('excursion-title');?>
                    <div class="subtitle"><?php the_field('excursion-desc');?></div>
                    <a href="#excursion" class="more more-doublesquare popup-open popup-excursion">Записаться</a>
                </div>
                <img src="<?php the_field('excursion-img');?>" alt="ixtero" class="excursion-img">
            </div>
        </div>
    </section>

    <section class="section homepage-advproducts">
        <div class="container">
            <div class="section-titles">
                <?php the_field('advproducts-title');?>
            </div>

            <div class="advproducts-wrapper swiper">
                <div class="swiper-wrapper">
                    <?php if(have_rows('advproducts-items')): while (have_rows('advproducts-items')) : the_row(); ?>

                        <div class="advproducts-item swiper-slide box box-plus animation animation-top">
                            <div class="title"><?php the_sub_field('title');?></div>
                            <div class="desc"><?php the_sub_field('desc');?></div>
                        </div>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-scrollbar"></div>
                <div class="advproducts-shild shild"><?php the_field('advproducts-shild');?></div>
            </div>

            <div class="advproducts-slider swiper">
                <div class="swiper-wrapper">

                    <?php if(have_rows('advproducts-slider')): while (have_rows('advproducts-slider')) : the_row(); ?>

                        <div class="advproducts-slide swiper-slide">
                            <div class="icon">
                                <img src="<?php the_sub_field('icon');?>" alt="<?php the_sub_field('title');?>" class="icon-img">
                            </div>
                            <div class="info">
                                <div class="title"><?php the_sub_field('title');?></div>
                                <div class="desc"><?php the_sub_field('desc');?></div>
                            </div>
                        </div>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </section>

    <section class="section homepage-forpartners">
        <div class="container">
            <div class="forpartners-wrapper">

                <div class="forpartners-imgs animation animation-left">
                    <img src="<?php the_field('forparners-bg') ?>" alt="ixtero" class="forpartners-bg">
                    <img src="<?php the_field('forparners-img') ?>" alt="ixtero" class="forpartners-img">
                </div>

                <div class="section-titles animation animation-right">
                    <?php the_field('forparners-title');?>
                </div>

                <div class="forpartners-text animation animation-right">
                    <ul class="forpartners-list">
                        <?php if(have_rows('forparners-list')): while (have_rows('forparners-list')) : the_row(); ?>

                            <li class="forpartners-item"><?php the_sub_field('item');?></li> 

                        <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>

                    <a href="/cooperation" class="more more-doublesquare more-doublesquare__black">Узнать подробнее</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section homepage-gallery">
        <div class="container">
            <div class="section-titles">
                <?php the_field('gallery-title');?>
                <?php the_field('gallery-desc');?>
            </div>

            <div class="gallery-wrapper">
                <?php global $post;

                    $query = new WP_Query( [
                        'cat' => 29,
                        'posts_per_page' => 7,
                        'orderby'        => 'date',
                        'order' => 'ASC'
                    ] );

                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            $gallery = get_field('gallery')
                            ?>
                                <a href="<?php the_permalink(); ?>" class="gallery-item animation animation-top">
                                    <img class="gallery-img" src="<?php echo $gallery[0]['url'];?>" alt="<?php the_title();?>">
                                    <div class="gallery-content">
                                        <div class="gallery-title"><?php the_title();?></div>
                                        <div class="gallery-desc"><?php the_content();?></div>
                                    </div>
                                </a>
                            <?php 
                        }
                    }
                    wp_reset_postdata();
                ?>
            </div>
            <a href="<?php echo get_category_link(29);?>" class="more more-doublesquare more-doublesquare__brand">Перейти  в галерею</a>

        </div>
    </section>

    <section class="homepage-catalog">
        <div class="container">
            <div class="catalog-box animation animation-right">
                <div class="section-titles">
                    <?php the_field('catalog-title');?>
                    <?php the_field('catalog-desc');?>
                    <img src="<?php the_field('catalog-img');?>" alt="ixtero" class="catalog-img">
                    <a href="<?php the_field('catalog-file');?>" class="download-link">Скачайте последний катлог продукции</a>
                </div>
            </div>
        </div>
    </section>

    <section class="homepage-form">
        <div class="container">
            <div class="form-wrapper">
                <div class="section-titles">
                    <?php the_field('form-title');?>
                    <?php the_field('form-desc');?>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="218" title="Главная страница / Внизу"]'); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>