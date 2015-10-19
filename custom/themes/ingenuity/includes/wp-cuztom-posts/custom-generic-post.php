<?php //Generic Modular Content Template for Posts
$posts = new Cuztom_Post_Type('post');
$posts->add_meta_box(
    'blogadd',
    'Blog Extras', 
    array(
        array(
            'name'          => 'banner',
            'label'         => 'Banner Image',
            'description'   => 'Upload image here.',
            'type'          => 'image',
        ),
        array(
            'name'          => 'heroheading',
            'label'         => 'Alternate Page Title',
            'description'   => 'Smaller type that appears above the large subheading.',
            'type'          => 'text',
        ),
        array(
            'name'          => 'subheading',
            'label'         => 'Subheading',
            'description'   => 'Insert subheading here',
            'type'          => 'text',
        ),
        array(
            'name'          => 'pullquote',
            'label'         => 'Intro/Top Pullquote',
            'description'   => 'Appears at the top of the blog post.',
            'type'          => 'wysiwyg',
        )
    )
);
?>