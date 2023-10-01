<?php
/*
    Template Name: Сотрудничество
    Template Post Type: page
*/
?>

<?php get_header(); ?>

    <main class="cooperationpage">

        <section class="heropage">
            <div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<div class="breadcrumbs">','</div>');
                }?>

                <?php if(have_rows('hero')) : while(have_rows('hero')) : the_row();

                    $img = get_sub_field('img');?>

                    <div class="heropage-wrapper">
                        <div class="heropage-title"><?php the_sub_field('title');?></div>
                        <div class="heropage-subtitle"><?php the_sub_field('desc');?></div>
                        <div class="heropage-imgs">
                            <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>">
                        </div>
                    </div>


                <?php endwhile;
                endif;?>

            </div>
            
        </section>

        <?php if(have_rows('conditions')) : while(have_rows('conditions')) : the_row();
            $conditions = get_sub_field('item');
        ?>

            <section class="section cooperationpage-conditions">
                <div class="container">
                    <div class="section-titles">
                        <?php the_sub_field('title');?>
                    </div>

                    <div class="conditions-titles swiper">
                        <div class="swiper-wrapper">
                            <?php foreach($conditions as $item) { ?>  
                                <div class="conditions-titles-item swiper-slide"><?php echo $item['title'];?></div>    
                            <?php } ?>
                        </div>
                    </div>

                    <div class="conditions-wrapper swiper">
                        <div class="swiper-wrapper">
                            <?php foreach($conditions as $item) { ?>

                                <div class="conditions-item box-list swiper-slide">
                                    <img src="<?php echo $item['img'];?>" alt="<?php echo $item['title']?>" class="conditions-item-img">
                                    <div class="title"><?php echo $item['title']?></div>
                                    <div class="desc">
                                        <?php echo $item['desc'];?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="pagination-circle"></div>
                    </div>
                </div>
            </section>

        <?php endwhile;
        endif;?>

        <?php if(have_rows('bottom')) : while(have_rows('bottom')) : the_row(); 
            $logo = get_sub_field('logo');
            $img = get_sub_field('img');
        ?>

            <section class="cooperationpage-bottom">
                <div class="container">
                    <div class="title"><?php the_sub_field('title');?></div>

                    <?php if ($logo) { ?>
                        <img class="logo-img" src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
                    <?php } ?>

                    <?php if ($img) { ?>
                        <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>">
                    <?php } ?>
                </div>
            </section>

           <?php endwhile;
        endif; ?>
    </main>

<?php get_footer(); ?>