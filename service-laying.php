<?php
/*
    Template Name: Укладка
    Template Post Type: page
*/

$hero = get_field('hero');
$afterwork = get_field('afterwork');
$steps = get_field('steps');
$adv = get_field('advantage');
$black = get_field('black-box');

?>

<?php get_header(); ?>

    <main class="layingpage">

        <?php 
            if($hero) { ?>
                <section class="heropage">
                    <div class="container">
                        <?php if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb('<div class="breadcrumbs">','</div>');
                        }?>

                        <div class="heropage-wrapper">
                            <div class="heropage-title"><?php echo $hero['title']?></div>
                            <div class="heropage-subtitle"><?php echo $hero['subtitle']?></div>
                            <div class="heropage-imgs">
                                <img src="<?php echo $hero['img']['url']?>" alt="<?php echo $hero['img']['alt']?>">
                            </div>  
                        </div>

                    </div>
                </section>
           <?php } 
           
            if($afterwork) { 
                
                $beforeitems = $afterwork['items'];

                ?>

                <section class="layingpage-beforework section">
                    <div class="container">
                        <div class="section-titles">
                            <?php echo $afterwork['title'];?>
                        </div>
                        <div class="beforework-wrapper">
                            <?php foreach($beforeitems as $item) { ?>

                                <div class="beforework-item box box-plus animation animation-top">
                                    <?php echo $item['text'];?>
                                </div>

                            <?php } ?>
                        </div>

                        <div class="beforework-desc animation animation-top">
                            <?php echo $afterwork['desc'] ?>
                        </div>
                    </div>
                </section>

            <?php }

            if($steps) { ?>

                <section class="section layingpage-steps">
                    <div class="container">

                        <div class="section-titles">
                            <?php echo $steps['title'];?>
                        </div>

                        <div class="steps-wrapper">
                            <div class="steps-items">
                            <?php foreach($steps['item'] as $index => $step) { 
                                if($index < 4) { ?>

                                    
                                    <div class="steps-item animation animation-top">
                                        <div class="icon">
                                            <img src="<? echo $step['icon']['url'] ?>" alt="<? echo $step['icon']['alt'] ?>">

                                            <div class="icon-num">
                                                <?php echo ($index + 1)?>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <?php echo $step['desc'] ?>
                                        </div>
                                    </div>
                                    

                                <?php }} ?>
                            </div>

                            <div class="steps-items">
                            <?php foreach($steps['item'] as $index => $step) { 
                                if($index >= 4) { ?>

                                    
                                    <div class="steps-item animation animation-top">
                                        <div class="icon">
                                            <img src="<? echo $step['icon']['url'] ?>" alt="<? echo $step['icon']['alt'] ?>">

                                            <div class="icon-num">
                                                <?php echo ($index + 1)?>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <?php echo $step['desc'] ?>
                                        </div>
                                    </div>
                                    

                                <?php }} ?>
                            </div>

                        </div>

                    </div>
                </section>

            <?php } ?>

            <section class="section layingpage-brigade">

                <div class="container">
                    <?php if($adv) { ?>

                        <div class="brigade-advantage box-list animation animation-left">
                            <div class="title"><?php echo $adv['title'];?></div>
                            <div class="desc"><?php echo $adv['list'];?></div>
                        </div>

                    <?php } ?>

                    <?php if($black) { ?>

                        <div class="brigade-dark box-dark animation animation-right">
                            <div class="title"><?php echo $black['title'];?></div>
                            <div class="desc"><?php echo $black['text'];?></div>
                        </div>

                    <?php } ?>

                    <div class="section-titles">
                        <?php the_field('team-title');?>
                    </div>

                    <div class="brigade-items">

                    <?php global $post;

                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $query = new WP_Query( [
                            'cat' => 34,
                            'paged' => $paged,
                            'posts_per_page' => 2,
                            'orderby'        => 'menu_order',
                            'order' => 'DESC'
                        ] );

                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();

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

                                <?php 
                            }
                            } ?>

                       <?php wp_reset_postdata();?>

                    </div>
                            
                    <a href="<?php echo get_category_link(34);?>" class="more more-doublesquare more-doublesquare__black">Посмотреть всех исполнителей</a>
                </div>

            </section>
    </main>

<?php get_footer(); ?>