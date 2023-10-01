<?php
/*
    Template Name: Дизайн проект мощения
    Template Post Type: page
*/

$hero = get_field('hero');
$steps = get_field('steps');
$bonus = get_field('bonus');
?>

<?php get_header(); ?>

    <main class="designpage">
        
        <?php if($hero) { ?>

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

        if($steps) { ?>

            <section class="section designpage-steps">
                <div class="container">

                    <div class="section-titles">
                        <?php echo $steps['title'];?>
                    </div>

                    <div class="steps-wrapper">
                        <div class="steps-items">
                            <?php foreach($steps['item'] as $index => $step) { ?>

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

                            <?php } ?>
                        </div>

                    </div>

                    <?php if($steps['attention']) { ?>

                        <div class="box box-attention box-attention__left animation animation-top">
                            <?php echo $steps['attention'];?>
                        </div>

                    <?php } ?>

                </div>
            </section>

        <?php } 

            if($bonus) { ?>

                <section class="designpage-bonus">

                    <div class="container">

                        <?php if($bonus['list']) {?>

                            <div class="bonus-items box box-list animation animation-top">
                                <div class="title"><?php echo $bonus['title'];?></div>
                                <div class="desc"><?php echo $bonus['list'];?></div>
                            </div>

                        <?php } 
                        
                            if($bonus['attention']) { ?>

                                <div class="bonus-attention box box-attention box-attention__left  animation animation-top">
                                    <?php echo $bonus['attention'];?>
                                </div>

                            <?php } ?>


                    
                    </div>

                </section>

            <?php }
            
        ?>
        

    </main>

<?php get_footer(); ?>
