<?php get_header(); 
$cat_id = get_query_var('cat');   
?>

<main class="publications newspage categorypage">
        
        <section class="categorypage-titles">
            <div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<div class="breadcrumbs">','</div>');
                }?>

                <div class="section-titles">
                    <h1 class="title"><?php echo get_cat_name($cat_id) ?></h1>
                </div>   
            </div>
        </section>


                
            <?php if(have_posts()) { ?>
                <div class="publications-subcategory publications-articles">
                    <div class="container">
                        <div class="articles-wrapper">
                            <?php while(have_posts()) { 
                                the_post(); ?>

                                <a href="<?php the_permalink();?>" class="articles-item">
                                    <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title();?>" class="articles-img">
                                    <div class="articles-info">
                                        <div class="articles-title">
                                            <div class="articles-date"><?php echo get_the_date('d.m.Y');?></div>
                                            <div class="articles-title"><?php the_title();?></div>
                                        </div>
                                        <button class="more more-romb">Читать статью</button>
                                    </div>
                                </a>
        
                            <?php }  ?>
                        </div>
                    </div>
                </div>
                <?php 
                    the_posts_pagination([
                        'show_all'     => true,
                        'prev_next'    => false,
                        'add_args'     => false,
                        'add_fragment' => '',
                        'class'        => 'pagination-category',
                    ]);
                ?>
            <?php } ?>                   

    </main>

<?php get_footer(); ?>