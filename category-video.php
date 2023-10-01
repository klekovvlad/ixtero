<?php get_header();
$cat_id = get_query_var('cat');   
?>
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

    <main class="publications categorypage">
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
            <div class="publications-subcategory publications-video">
                <div class="container">
                <div class="video-wrapper">

                    <?php while(have_posts()) {
                        the_post(); 

                            $title = get_the_title();
                            $img = get_the_post_thumbnail_url();
                            $youtube = get_field('youtube');
                            $media = get_field('video'); 
                            $data = '';
                            if($youtube) {
                                $data = 'data-youtube="' . $youtube . '"';
                            }else if($media) {
                                $data = 'data-video="' . $media['url'] . '"';
                            }

                            if($index > 0) {
                                if(mb_strlen($title) > 80) {
                                    $title = mb_substr($title, 0, 80) . '...';
                                }
                            }

                            if($title && $img) { ?>
                                
                                <div class="video-item" <?php echo $data;?>>
                                    <div class="video-item-img">
                                        <img src="<?php echo $img; ?>" alt="<?php echo $title;?>">
                                    </div>
                                    <div class="video-item-title"><?php echo $title;?></div>
                                </div>

                    <?php } 

                    $index++;

                    } ?>
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

<?php get_footer();?>