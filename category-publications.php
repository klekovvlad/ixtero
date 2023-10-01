<?php 

$id = get_cat_ID('publications')

?>
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
<?php get_header();?>

    <main class="publications categorypage">
        
        <section class="categorypage-titles">
            <div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<div class="breadcrumbs">','</div>');
                }?>

                <div class="section-titles">
                    <h1 class="title"><?php echo get_cat_name(41) ?></h1>
                </div>   
            </div>
        </section>


        <?php $news = new WP_Query ([
            'cat' => 51,
            'posts_per_page' => 4,
            'orderby' => 'date',
            'order' => 'DESC'
        ]);
        
        if( $news->have_posts()) { ?>
            <section class="publications-subcategory publications-news">
                <div class="container">

                    <a href="<?php echo get_category_link(51);?>" class="publications-title"><?php echo get_cat_name(51) ?></a>

                    <div class="news-wrapper">

                        <?php while( $news->have_posts() ) {
                            $news->the_post(); ?>
    
                            <a href="<?php the_permalink();?>" class="news-item">
                                <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title();?>" class="news-img">
                                <div class="news-info">
                                    <div class="news-date"><?php echo get_the_date('d.m.Y');?></div>
                                    <div class="news-title"><?php the_title();?></div>
                                </div>
                            </a>
    
                        <?php } ?>
                            
                    </div>
                </div>   
            </section>
        <?php } ?>  
        
        <?php 
        
            $sales = get_field('sales', 6);

            if($sales) { ?>
                <div class="publications-subcategory">
                    <div class="container">
                        <h2 class="publications-title">Акции</h2>

                        <div class="publications-sale swiper">
                            <div class="swiper-wrapper">

                            <?php foreach($sales as $sale) { ?>

                                <div class="shoppage-sales swiper-slide">
                                    <div class="title"><?php echo $sale['title'];?></div>
                                    <?php if($sale['desc']) { ?>
                                        <div class="subtitle"><?php echo $sale['desc']?></div>
                                    <?php } ?>
                                    <a href="<?php echo $sale['link']?>" class="more more-doublesquare more-doublesquare__black">Подробнее</a>

                                    <img src="<?php echo $sale['img']['url']?>" alt="<?php echo $sale['img']['alt']?>" class="sales-img">
                                </div>
                    
                            <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
                    
        <?php $articles = new WP_Query ([
            'cat' => 52,
            'post_per_page' => 6,
            'orderby' => 'date',
            'order' => 'DESC'
        ]);

        if( $articles->have_posts()) { ?>
            <div class="publications-subcategory publications-articles">
                <div class="container">
                    <a href="<?php echo get_category_link(52);?>" class="publications-title"><?php echo get_cat_name(52) ?></a>

                    <div class="articles-wrapper">
                        <?php while( $articles->have_posts() ) {
                            $articles->the_post(); ?>

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
        
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php $video = new WP_Query ([
            'cat' => 89,
            'post_per_page' => 4,
            'orderby' => 'date',
            'order' => 'DESC'
        ]);

        if( $video->have_posts()) { 
            $index = 0;
            ?>
            <div class="publications-subcategory publications-video">
                <div class="container">
                    <a href="<?php echo get_category_link(89);?>" class="publications-title"><?php echo get_cat_name(89) ?></a>

                    <div class="video-wrapper">

                        <?php while($video->have_posts()) {
                            $video->the_post(); 

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
            </div>
        <?php } ?>
                     


    </main>

<?php get_footer();?>