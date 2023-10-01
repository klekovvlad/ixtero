<?php get_header();?>

    <main class="article">

        <div class="container">

            <?php if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<div class="breadcrumbs">','</div>');
            }?>

            <div class="article-top">
                <img class="article-img" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title();?>">

                <div class="article-titles">
                    <div class="article-date"><?php echo get_the_date('d.m.Y');?></div>
                    <h1 class="article-title"><?php the_title();?></h1>
                    <div class="article-desc"><?php the_excerpt();?></div>
                </div>
            </div>

            <div class="article-content">
                <?php the_content();?>
            </div>

        </div>

    </main>

<?php get_footer();?>