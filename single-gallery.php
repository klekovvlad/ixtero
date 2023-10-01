<?php get_header();

$gallery = get_field('gallery');

?>

    <main class="gallerypage categorypage">

        <section class="categorypage-titles">
            <div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<div class="breadcrumbs">','</div>');
                }?>
            </div> 
        </section>

        <section class="gallerypage-content">
            <div class="container">

                <div class="gallerypage-wrapper">

                    <div class="gallerypage-imgs">
                        <div class="gallerypage-slider swiper">

                            <div class="swiper-wrapper">

                                <?php 
                                    foreach($gallery as $img) { ?>
                                        <img class="gallerypage-img swiper-slide" src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>">

                                <?php }?>
                                
                            </div>

                            <button class="swiper-prev"></button>
                            <button class="swiper-next"></button>

                        </div>



                        <div class="gallerypage-thumbs swiper">

                            <div class="swiper-wrapper">

                                <?php 
                                    foreach($gallery as $img) { ?>
                                        <img class="gallerypage-thumb swiper-slide" src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>">

                                <?php }?>
                                
                            </div>

                        </div>
                    </div>

                    <div class="gallerypage-info">
                        <div class="title"><?php the_title();?></div>
                        <div class="city"><?php the_field('city');?></div>
                        <div class="desc"><?php the_content();?></div>
                    </div>
                </div>

            </div>
        </section>

    </main>

<?php get_footer();?>