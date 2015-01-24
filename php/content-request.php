<?php

// jank simulation of loading content from a database.
// for demo purposes only.

$content = '';
$relations = [];

function register_hook( $hook, $func ) {
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

    if ( isset($relations[ $action ]) ) {
        foreach ($relations[ $action ] as $value) {
            $value();
        }
    }

}