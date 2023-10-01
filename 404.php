<?php get_header();?>

    <main class="errorpage">
        <div class="container">
            <div class="wrapper wrapper-col-2">
                <div class="errorpage-text">
                    <div class="section-title">
                        <h1><span class="accent">Ой,</span> что-то пошло не так,</h1>
                        <div class="subtitle">тротуарная плитка уехала к другому заказчику, <span class="accent">ищите в другом разделе</span></div>
                    </div>
                    <a href="/" class="more more-doublesquare">Вернуться на главную</a>
                </div>
                <img src="<?php bloginfo('template_directory'); ?>/assets/img/error404.png" alt="404" class="errorpage-img">
            </div>
        </div>
    </main>

<?php get_footer();?>