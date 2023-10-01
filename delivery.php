<?php
/*
    Template Name: Доставка
    Template Post Type: page
*/

$hero = get_field('hero');
$conditions = get_field('conditions');

?>

<?php get_header(); ?>

    <main class="deliverypage">

        <?php if($hero) { ?>

            <section class="heropage deliverypage-hero">
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
        
        if($conditions) { ?>

            <section class="deliverypage-conditions section">
                <div class="container">

                    <?php if($conditions['items']) { ?>

                        <div class="conditions-items">

                            <?php foreach($conditions['items'] as $item) { ?>

                                <div class="conditions-item box box-plus"><?php echo $item['item'];?></div>

                            <?php } ?>

                        </div>

                    <?php }
                    
                        if($conditions['attention']) { ?>

                            <div class="conditions-attention box box-list box-attention box-attention__right">
                                <div class="title"><?php echo $conditions['attention']['title'];?></div>
                                <div class="desc"><?php echo $conditions['attention']['list'];?></div>
                            </div>

                        <?php } ?>
 
                </div>
            </section>

        <?php } ?>

    </main>

<?php get_footer(); ?>