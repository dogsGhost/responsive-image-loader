<?php

// use a post-content hook to get access to the content before its served to the browser.
register_hook( 'post_get_content', 'replace_images' );


function replace_images() {
    global $content;

    /*
    * TODO:
    * go through and find
    * <img src="img/image01.jpg" title="responsive image 1" class="img img--first" alt="boat shoes">
    * becomes
    * <a href="img/image01.jpg" data-was-image="true" title="responsive image 1" data-class="img img--first">[image of boat shoes]</a>
    * data attr added so we can find it on the client side.
    *
    * go through and put all the img tags in an array, loop through array and create second array of anchor tags
    * build from the img tags.
    * find/replace in content img1:anchor1
    */
}

// test hook
register_hook( 'post_get_content', 'extra_content' );

function extra_content() {
    global $content;

    $content .= '<p>extra content via post-hook</p>';
}