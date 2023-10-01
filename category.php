<?php
$cat_id = get_query_var('cat');
$cat = get_category($cat_id);

if ( $cat->parent == 34 ) {
    include( TEMPLATEPATH.'/category-brigady.php' );
} else if ($cat->parent == 50) {
    include( TEMPLATEPATH.'/category-news.php' );
} else if ($cat->parent == 29) {
    include( TEMPLATEPATH.'/category-gallery.php' );
}

?>