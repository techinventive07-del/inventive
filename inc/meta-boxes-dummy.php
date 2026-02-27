<?php
// Register Meta Boxes
add_filter( 'rwmb_meta_boxes', 'my_custom_meta_boxes' );

function my_custom_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = array(
        'title'      => 'About Page Fields',
        'id'         => 'about_page_fields',
        'post_types' => 'page',

        // Show ONLY on About page
        'include' => array(
            'template' => array( 'page-about.php' ),
        ),

        'fields' => array(

            array(
                'name' => 'Heading',
                'id'   => 'about_heading',
                'type' => 'text',
            ),

            array(
                'name' => 'Description',
                'id'   => 'about_description',
                'type' => 'textarea',
            ),

            array(
                'name' => 'Image',
                'id'   => 'about_image',
                'type' => 'single_image',
            ),

            array(
                'name' => 'Button Text',
                'id'   => 'about_button_text',
                'type' => 'text',
            ),

            array(
                'name' => 'Button Link',
                'id'   => 'about_button_link',
                'type' => 'url',
            ),

        ),
    );

    return $meta_boxes;
}