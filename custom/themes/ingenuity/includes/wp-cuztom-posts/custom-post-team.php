<?php //Connect CPT
$args = array(
    'has_archive' => true,
    'menu_icon' => 'dashicons-groups', //http://melchoyce.github.io/dashicons/
    'supports'  => array( 'title', 'editor', 'page-attributes' ),
    'taxonomies' => array('category')  
    );
$teampage = register_cuztom_post_type('team', $args);

$teampage->add_meta_box(
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
            'name'          => 'heading',
            'label'         => 'Banner Text',
            'description'   => 'Enter text',
            'type'          => 'wysiwyg',
            
        )
    )
);

$teampage->add_meta_box(
    'teammember',
    'Team Members', 
    array(
        'bundle',    
            array( 
                array(
                    'name'          => 'photo',
                    'label'         => 'Picture',
                    'description'   => 'Upload team member picture here.',
                    'type'          => 'image',          
                ),
                array(
                    'name'          => 'name',
                    'label'         => 'Full Name',
                    'description'   => '',
                    'type'          => 'text',          
                ),
                array(
                    'name'          => 'jobtitle',
                    'label'         => 'Job Title',
                    'description'   => '',
                    'type'          => 'text',          
                ),
                array(
                    'name'          => 'phone',
                    'label'         => 'Phone Number & Extension',
                    'description'   => 'Format: (xxx) xxx-xxxx ext.xxx',
                    'type'          => 'text'
                ),
                array(
                    'name'          => 'email',
                    'label'         => 'Email',
                    'description'   => '',
                    'type'          => 'text'
                ),
                array(
                    'name'          => 'twitter',
                    'label'         => 'Twitter Profile URL',
                    'description'   => '',
                    'type'          => 'text'
                ),
                array(
                    'name'          => 'linkedin',
                    'label'         => 'LinkedIn Profile URL',
                    'description'   => '',
                    'type'          => 'text'
                ),
                array(
                    'name'          => 'profile',
                    'label'         => 'Profile',
                    'description'   => 'Enter short profile.',
                    'type'          => 'textarea',
                ),
                array(
                    'name'          => 'flag',
                    'label'         => 'Department',
                    'description'   => '',
                    'type'          => 'select',
                    'options'       => array(
                                'value1'    => 'Sales',
                                'value2'    => 'Consulting',
                                'value3'    => 'Corporate'
                            ),
                    'default_value' => 'value1'
                )
            )
    )
);

?>