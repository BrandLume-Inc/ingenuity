<?php //Generic Modular Content Template for Posts and Pages
function remove_meta_boxes() {
    remove_meta_box('postcustom', 'page', 'normal'); //Custom fields metabox
    remove_meta_box('commentstatusdiv', 'page', 'normal'); //Comments status metabox (discussion)
    remove_meta_box('commentsdiv', 'page', 'normal'); //Comments metabox
    remove_meta_box('trackbacksdiv', 'page', 'normal'); //Trackbacks metabox
    remove_meta_box('authordiv', 'page', 'normal'); //Author metabox
    remove_meta_box('slugdiv', 'page', 'normal'); //Slug metabox
    remove_meta_box('postexcerpt', 'page', 'normal'); //Excerpt metabox
    remove_meta_box('postimagediv', 'page', 'side'); //Featured image metabox
}
add_action( 'admin_menu' , 'remove_meta_boxes' );
$pages = new Cuztom_Post_Type('page');
$pages->add_meta_box(
    'banner',
    'Featured banner', 
    array(
        array(
            'name'          => 'image',
            'label'         => 'Banner Image',
            'description'   => 'Dimensions 1200px x 800px',
            'type'          => 'image',
        ),
        array(
            'name'          => 'logo',
            'label'         => 'Logo/Icon',
            'description'   => '',
            'type'          => 'image',
        ),
        array(
            'name'          => 'heading',
            'label'         => 'Banner Text',
            'description'   => 'Enter text',
            'type'          => 'text',
            
        ),
        array(
            'name'          => 'subheading',
            'label'         => 'Banner Subheading',
            'description'   => 'Enter text',
            'type'          => 'text'
            
        )
    )
);
$pages->add_meta_box(
    'blurb',
    'Hero Blurb', 
    array(
        array(
            'name'          => 'heroblurb',
            'label'         => 'Banner Text',
            'description'   => 'Enter text',
            'type'          => 'text',
            
        )
    )
);
$pages->add_meta_box(
    'cta',
    'Bottom Call to Action Panel', 
    array(
        array(
            'name'          => 'heading',
            'label'         => 'Heading',
            'description'   => '',
            'type'          => 'text',
        ),
        array(
            'name'          => 'blink',
            'label'         => 'Button Link',
            'description'   => '',
            'type'          => 'text',
        ),
        array(
            'name'          => 'btext',
            'label'         => 'Button Text',
            'description'   => '',
            'type'          => 'text',
        )
    )
);
?>