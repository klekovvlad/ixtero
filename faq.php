<?php
/*
    Template Name: База знаний
    Template Post Type: page
*/

$faq = get_field('faq');
$form = get_field('form');

?>

<?php get_header(); ?>

    <main class="faqpage">
        <section class="faqpage-titles section">

            <div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<div class="breadcrumbs">','</div>');
                }?>

                <div class="section-titles">
                    <h1><?php the_title();?></h1>
                    <div class="subtitle"><?php the_content();?></div>
                </div>
            </div>

        </section>

        <?php if($faq) { ?>

            <section class="faqpage-content">
                <div class="container">
                    <div class="faqpage-items">

                        <?php foreach ($faq as $item) { 
                            if($item['question'] && $item['answer']) {?>

                                <div class="faq-item">
                                    <div class="question"><?php echo $item['question'];?></div>
                                    <div class="answer"><?php echo $item['answer'];?></div>
                                </div>

                            <?php } ?>
                        <?php } ?>

                    </div>
                </div>
            </section>

        <?php } ?>

        <section class="faqpage-form">
            <div class="container">
                <div class="form-wrapper">
                    <?php if($form) { ?>
                        
                        <div class="form-content" style="background-image: url('<?php echo $form['img']['url']?>')">
                            <div class="title"><?php echo $form['title'];?></div>
                            <div class="desc"><?php echo $form['text'];?></div>
                        </div>

                    <?php } ?>

                    <div class="form-items">
                        <?php echo do_shortcode('[contact-form-7 id="534" title="FAQ"]') ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>