<?php

if ( in_category(50) ) {
    include( TEMPLATEPATH.'/single-articles.php' );
}else if( in_category(29) ) {
    include( TEMPLATEPATH.'/single-gallery.php' );
}

?>