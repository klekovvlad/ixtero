<?php
/*
    Template Name: Заказ
    Template Post Type: page
*/
?>

<?php get_header(); ?>

    <main class="cartpage">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<div class="breadcrumbs">','</div>');
            }?>
            <div class="section-titles">
                <h1><?php the_title();?></h1>
            </div>
            <div class="cartpage-wrapper">
                <?php the_content();?>
            </div>
        </div>
    </main>

<?php get_footer();?>