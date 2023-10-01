<?php
/*
    Template Name: О нас
    Template Post Type: page
*/
?>

<?php get_header(); ?>

<main class="aboutpage">
    
    <section class="hero">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<div class="breadcrumbs">','</div>');
            }?>

            <div class="hero-wrapper">
                <div class="hero-text">
                    <?php the_field('hero-title');?>
                    <?php the_field('hero-desc-1');?>
                </div>
                <div class="hero-text">
                    <?php the_field('hero-desc-2');?>
                    <button class="hidden-btn hidden-btn__show">Читать полностью</button>
                </div>

                <div class="hidden-el">
                    <?php the_field('hero-hidden');?>
                    <button class="hidden-btn hidden-btn__close">Скрыть</button>
                </div>
            </div>
        </div>
    </section>

    <section class="section aboutpage-mission">
        <div class="container">
            <div class="section-titles">
                <?php the_field('mission-title');?>
                <?php the_field('mission-subtitle');?>
            </div>

            <div class="mission-wrapper">

            <?php if(have_rows('mission-items')): while (have_rows('mission-items')) : the_row(); ?>

                <div class="mission-item box box-plus animation animation-top">
                    <?php the_sub_field('item') ?>
                </div>

            <?php endwhile; ?>
            <?php endif; ?>

            <img src="<?php the_field('mission-img')?>" alt="Миссия" class="mission-img">
            </div>
        </div>
    </section>

    <section class="section aboutpage-treasure">
        <div class="container">
            <div class="treasure-box animation animation-left">
                <div class="section-titles">
                    <?php the_field('treasure-title');?>
                </div>

                <?php if(have_rows('treasure-items')): while (have_rows('treasure-items')) : the_row(); ?>

                    <div class="treasure-item">
                        <div class="treasure-icon">
                            <img src="<?php the_sub_field('icon') ?>" alt="<?php the_sub_field('title');?>">
                        </div>
                        <div class="treasure-content">
                            <div class="treasure-title"><?php the_sub_field('title');?></div>
                            <div class="treasure-desc"><?php the_sub_field('desc');?></div>
                        </div>
                    </div>                    

                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="section aboutpage-team">
        <div class="container">
            <div class="section-titles">
                <?php the_field('team-title');?>
                <div class="subtitle"><?php the_field('team-subtitle');?></div>
            </div>

            <div class="team-items swiper">
                <div class="swiper-wrapper">

                    
                    <?php if(have_rows('team-items')): while (have_rows('team-items')) : the_row(); ?>

                        <div class="team-item swiper-slide animation animation-top">
                            <div class="team-icon">
                                <img src="<?php the_sub_field('icon');?>" alt="<?php the_sub_field('title');?>">
                            </div>
                            <div class="team-text">
                                <div class="team-title"><?php the_sub_field('title');?></div>
                                <div class="team-desc"><?php the_sub_field('desc');?></div>
                            </div>
                        </div>                

                    <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

    <section class="section aboutpage-story">
        <div class="container">
            <div class="section-titles">
                <?php the_field('story-title');?>
                <div class="subtitle"><?php the_field('story-subtitle');?></div>
            </div>

            <div class="story-items">

            <?php if(have_rows('story-items')): while (have_rows('story-items')) : the_row(); 
               $year = get_sub_field('year');

               if($year){ ?>
                    <div class="story-item">
                        <div class="story-year">
                            <?php echo $year;?>
                        </div>
                        <div class="story-text">
                            <?php the_sub_field('text');?>
                        </div>
                    </div>
               <?}else { ?>
                    <div class="story-item story-item__noyear">
                        <div class="story-text">
                            <?php the_sub_field('text');?>
                        </div>
                    </div>
                <?php } endwhile; ?>
            <?php endif; ?>

            </div>

            <button class="story-button"></button>

        </div>
    </section>

    <section class="section aboutpage-work">
        <div class="container">
            <div class="section-titles">
                <?php the_field('work-title');?>
            </div>

            <div class="work-slider swiper">
                <div class="swiper-wrapper">
                    <?php if(have_rows('work-items')): while (have_rows('work-items')) : the_row(); ?>

                        <div class="work-slide swiper-slide">
                            <div class="work-img">
                                <img src="<?php the_sub_field('img');?>" alt="Направление работы">
                                <div class="work-num"><?php echo get_row_index(); ?></div>
                            </div>
                            <div class="work-desc">
                                <?php the_sub_field('desc');?>
                            </div>
                        </div>              

                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="pagingation-number"></div>
            </div>

            <div class="work-worlds">
                <?php if(have_rows('work-worlds')): while (have_rows('work-worlds')) : the_row(); ?>

                    <div class="shild"><?php the_sub_field('shild');?></div>
                    
                    <div class="worker-box animation animation-top">
                        <img src="<?php the_sub_field('photo')?>" alt="<?php the_sub_field('name')?>" class="worker-img">

                        <div class="worker-content">
                            <div class="worker-name"><?php the_sub_field('name')?></div>
                            <div class="worker-post"><?php the_sub_field('post')?></div>
                            <div class="worker-text"><?php the_sub_field('text')?></div>
                        </div>
                    </div>

                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="aboutpage-choose section">
        <div class="container">
            <div class="section-titles">
                <?php the_field('choose-title');?>
            </div>

            <div class="choose-wrapper">
                <div class="choose-inner">
                    <div class="choose-tabs swiper">
                        <div class="choose-nav swiper-wrapper">
                            <?php if(have_rows('choose-items')): while (have_rows('choose-items')) : the_row(); ?>

                                <button class="choose-nav-item swiper-slide"><?php the_sub_field('title');?></button>

                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="choose-inner">
                    <div class="choose-content swiper">
                        <div class="swiper-wrapper">
                            <?php if(have_rows('choose-items')): while (have_rows('choose-items')) : the_row(); ?>

                                <div class="choose-content-item swiper-slide">
                                    <div class="choose-content-title"><?php the_sub_field('title');?></div>
                                    <div class="choose-content-desc"><?php the_sub_field('desc');?></div>
                                </div>

                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php 
                    $choose_img = get_field('choose-img');
                ?>
                <img src="<?php echo $choose_img['url'];?>" alt="<?php echo $choose_img['alt'];?>" class="choose-img">
            </div>

        </div>
    </section>
</main>


<?php get_footer(); ?>