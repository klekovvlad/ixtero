<?php

$cat_id = get_query_var('cat');
$categories = get_categories();
$parent = 29;

$array = array();
$key = 0;

foreach ($categories as $category) {
    if($category->term_id == $parent) {
        $array[$key] = $category;
        $key++;
    }
    if($category->parent == $parent) {
        $array[$key] = $category;
        $key++;
    };
};
sort($array);

?>

<?php get_header();?>

    <main class="gallerycategory categorypage">

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

        <section class="gallerycategory-content">
            <div class="container">

                <nav class="gallerycategory-nav categorypage-nav swiper">
                    <div class="categorypage-nav-wrapper swiper-wrapper">
                        <?php foreach ($array as $item) { 
                            $icon = get_field('icon', $item);
                            $class = 'categorypage-nav-item';
                            $name = $item->name;
                            if($item->term_id == $cat_id) {
                                $class = 'categorypage-nav-item-active';
                            };
                            if($item->term_id == $parent) {
                                $name = 'Все';
                            }; ?>

                            <a class="<?php echo $class;?> swiper-slide" href="<?php echo get_category_link($item->term_id) ?>">
                                <?php if($icon) { ?>
                                    <img src="<?php echo $icon;?>" alt="<?php echo $name;?>">    
                                <?php } ?>
                                <?php echo $name;?>
                            </a>

                        <?php } ?>
                    </div>
                </nav>

                <div class="gallerycategory-wrapper">
                    <?php if(have_posts()) { 
                        while(have_posts()) { 
                            the_post();
                            $gallery = get_field('gallery');
                            $city = get_field('city');
                        ?>
                        
                        <a href="<?php the_permalink(); ?>" class="gallerycategory-item">
                            <img src="<?php echo $gallery[0]['url'];?>" alt="<?php the_title();?>">
                            <div class="gallerycategory-title"><?php the_title();?></div>
                            <?php if($city) { ?>
                                <div class="gallerycategory-city"><?php echo $city;?></div>
                            <?php } ?>
                        </a>
                        

                        <?php } 
                            the_posts_pagination([
                                'show_all'     => true,
                                'prev_next'    => false,
                                'add_args'     => false,
                                'add_fragment' => '',
                                'class'        => 'pagination-category',
                            ]);
                        ?>
                    <?php } ?>              
                </div>         
            </div>
        </section>

    </main>

<?php get_footer();?>