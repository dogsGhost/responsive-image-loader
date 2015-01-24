<?php

// jank simulation of loading content from a database.

$content = '';
$relations = [];

function register_hook($hook, $func) {
    global $relations;

    if ( !isset($relations[ $hook ]) ) {
        // create property with $func as first array value.
        $relations[ $hook ] = [ $func ];
    } else {
        // push to array.
        $relations[ $hook ][] = $func;
    }
}

function get_content() {
    global $content;

    trigger( 'pre_get_content' );

    $content = file_get_contents( 'content.html' );

    trigger( 'post_get_content' );

    return $content;
}

function trigger( $action ) {
    global $relations;

    // $arr = $relations[ $action ];

    if ( isset($relations[ $action ]) ) {
        foreach ($relations[ $action ] as $value) {
            $value();
        }
    }

}

register_hook( 'post_get_content', 'extra_content' );

function extra_content() {
    global $content;

    $content .= '<p>extra content via post-hook</p>';
}