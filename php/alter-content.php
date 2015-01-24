<?php
// Use a hook to get access to the content before its served to the browser.
register_hook( 'post_get_content', 'replace_images' );

function replace_images() {
    global $content;
    $images = [];
    $anchors = [];

    // Match all the image tags.
    preg_match_all('(<img .*?>)', $content, $matches, PREG_SET_ORDER);

    // Convert to shallow array.
    foreach ( $matches as $value ) {
        $images[] = $value[0];
    }

    // Create anchor from each image.
    foreach ( $images as $value ) {
        $string = $value;

        // Get alt text to use as anchor text.
        $alt_text = explode('"', explode(' alt="', $string)[1])[0];
        $text = '>[image of ' . $alt_text . ']</a>';

        // TODO: Add check for self closing '/>' so that can be replaced instead of '>' if needed.
        // Change image to anchor tag using arrays of strings for find/replace within the image tag string.
        $search = ['<img', '>', 'src', 'class', 'alt'];
        $replace = ['<a data-was-image="true"', $text, 'href', 'data-class', 'data-alt'];
        $string = str_replace($search, $replace, $string);

        // Add new anchor string to array.
        $anchors[] = $string;
    }

    // Replace the images in the content with the links.
    $content = str_replace($images, $anchors, $content);
}