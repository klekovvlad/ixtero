<footer class="footer">
    <div class="container">
        <div class="footer-wrapper">

            <div class="footer-col">
                <div class="footer-title">Телефон</div>
                <a href="tel:<?php the_field('phone', 16);?>" class="phone"><?php the_field('phone', 16);?></a>
            </div>

            <div class="footer-col">
                <div class="footer-title">Службы заботы о клиентах:</div>
                <a href="tel:<?php the_field('phone-care', 16);?>" class="phone phone__care"><?php the_field('phone-care', 16);?></a>
            </div>

            <div class="footer-col">
                <div class="footer-title">E-mail:</div>
                <a href="mailto:<?php the_field('email', 16);?>" class="phone phone__email"><?php the_field('email', 16);?></a>
            </div>

            <div class="footer-social">
                <?php if(have_rows('social', 16)): while (have_rows('social', 16)) : the_row(); ?>

                    <a rel="nofollow" href="<?php the_sub_field('link');?>">
                        <img src="<?php the_sub_field('icon');?>" alt="Соц. сети">
                    </a>

                <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <button class="button button-brand popup-open popup-message">Перезвоните мне</button>
        </div>
    </div>
</footer>

<?php 
    $popup_warranty = get_field('warranty', 16);
    $popup_claim = get_field('claim', 16);
    $popup_message = get_field('message', 16);
    $popup_excursion = get_field('excursion', 16);
?>

<div class="popup popup-warranty">
    <div class="popup-body">
        <div class="close">
            <span></span><span></span>
        </div>
        <img src="<?php echo $popup_warranty['img']['url'];?>" alt="<?php echo $popup_warranty['img']['alt'];?>" class="popup-img">
        <h2 class="popup-title"><?php echo $popup_warranty['title'];?></h2>
        <div class="popup-desc"><?php echo $popup_warranty['desc'];?></div>
        <?php echo do_shortcode('[contact-form-7 id="739" title="Гарантия"]');?>
    </div>
</div>

<div class="popup popup-claim">
    <div class="popup-body">
        <div class="close">
            <span></span><span></span>
        </div>
        <img src="<?php echo $popup_claim['img']['url'];?>" alt="<?php echo $popup_claim['img']['alt'];?>" class="popup-img">
        <h2 class="popup-title"><?php echo $popup_claim['title'];?></h2>
        <div class="popup-desc"><?php echo $popup_claim['desc'];?></div>
        <?php echo do_shortcode('[contact-form-7 id="740" title="Претензия"]');?>
    </div>
</div>

<div class="popup popup-message">
    <div class="popup-body">
        <div class="close">
            <span></span><span></span>
        </div>
        <img src="<?php echo $popup_message['img']['url'];?>" alt="<?php echo $popup_message['img']['alt'];?>" class="popup-bg">
        <div class="popup-content">
            <?php echo $popup_message['title'];?>
            <div class="popup-desc"><?php echo $popup_message['desc'];?></div>
            <?php echo do_shortcode('[contact-form-7 id="751" title="Сообщение"]');?>
        </div>
    </div>
</div>

<div class="popup popup-excursion">
    <div class="popup-body">
        <div class="close">
            <span></span><span></span>
        </div>
        <h2 class="popup-title"><?php echo $popup_excursion['title'];?></h2>
        <div class="popup-desc"><?php echo $popup_excursion['desc'];?></div>
        <?php echo do_shortcode('[contact-form-7 id="771" title="Экскурсия"]');?>
    </div>
</div>

<div class="cookie">
    <?php the_field('cookie', 16);?>
    <button class="cookie-accept">Принять</button>
</div>

<?php wp_footer(); ?>

</body>
</html>