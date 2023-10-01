<?php get_header();

$cat_id = get_query_var('cat');   
$categories = get_categories();
$id = 34;
$array = array();
$key = 0;

foreach ($categories as $category) {
    if($category->term_id == $id) {
        $array[$key] = $category;
        $key++;
    }
    if($category->parent == $id) {
        $array[$key] = $category;
        $key++;
    };
};
sort($array);
?>

<main class="brigadespage">
    <section class="brigadespage-titles section">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<div class="breadcrumbs">','</div>');
            }?>

            <div class="section-titles">
                <h1 class="title"><?php echo get_cat_name($id) ?></h1>
                <div class="subtitle"><?php echo category_description($id) ?></div>
            </div>
        </div>
    </section>

    <section class="brigadespage-content">
        <div class="container">
            <nav class="categorypage-nav swiper">
                
                <div class="categorypage-nav-wrapper swiper-wrapper">

                    <?php foreach ($array as $item) { 
                        $class = 'categorypage-nav-item';
                        $name = $item->name;
                        if($item->term_id == $cat_id) {
                            $class = 'categorypage-nav-item-active';
                        };
                        if($item->term_id == $id) {
                            $name = 'Все';
                        }; ?>

                        <a class="<?php echo $class;?> swiper-slide" href="<?php echo get_category_link($item->term_id) ?>">
                            <?php echo $name;?>
                        </a>

                    <?php } ?>
                </div>
                
            </nav>

            <div class="brigade-items">
               
                    <?php 
                    if( have_posts() ) : while ( have_posts() ) : the_post(); 
                        $servise = get_field('services');
                        $tags = get_the_tags();
                        $phone = get_field('phone');
                        $content = get_the_content();
                    ?>

                        <div class="brigade-item animation animation-top" data-phone="<?php echo $phone;?>">
                            <div class="brigade-item-top">
                                <?php if( has_post_thumbnail() ) { ?>
                                    <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title();?>" class="brigade-item-img">
                                <?php } else { ?>

                                <?php } ?>
                                
                                <div class="brigade-item-name">
                                    <div class="title"><?php the_title();?></div>
                                    <div class="city"><?php the_field('city');?></div>
                                </div>
                            </div>
                            <?php if($content) { ?>
                                <div class="brigade-item-desc">
                                    <button class="desc-open">Читать описание</button>
                                    <div class="desc"><?php echo $content; ?></div>
                                </div>
                            <?php } ?>
                            <div class="brigade-item-services">
                            <?php if($servise) { ?>
                            
                                <div class="title">Услуги:</div>
                                <div class="services">
                                    <?php foreach ($servise as $item) { ?>
                                        <div class="servise-item"><?php echo $item['item'];?></div>
                                    <?php } ?>
                                </div>
                                
                            <?php } ?>
                            </div>
                            <div class="brigade-item-bottom">
                                <div class="tags">
                                    <?php if($tags) { 
                                        foreach ($tags as $tag) { ?> 
                                            <div class="tag"><?php echo $tag->name?></div>
                                        <?php } } ?>
                                </div>
                                <button class="more more-doublesquare brigade-call">Связаться</button>
                            </div>

                        </div>

                    <?php endwhile;
                        the_posts_pagination([
                            'show_all'     => true,
                            'prev_next'    => false,
                            'add_args'     => false,
                            'add_fragment' => '',
                            'class'        => 'pagination-category',
                        ]);
                        
                    endif; 
                    wp_reset_query();
                    ?>

            </div>
        </div>
    </section>
</main>
    

<?php get_footer();?>