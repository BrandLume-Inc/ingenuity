<?php

$meta_boxes[] = array(
    'title'      => 'Culture - Overview/Approach',
    'post_types' => array( 'page'),
    'context'    => 'normal',
    'priority'   => '',
    'visible' => array( 'parent_id', '!=', '' ),
    'fields' => array(
        array(
            'name'  => 'Heading',
            'id'    => 'overview_heading',
            'type'  => 'text',
        ),
        array(
            'name'  => 'Image',
            'id'    => 'overview_image',
            'type'  => 'image',
        ),
        array(
            'name'  => 'Sub Heading',
            'id'    => 'overview_blurb',
            'type'  => 'text',
        ),
    )
);

$meta_boxes[] = array(
    'title'      => __( 'Culture - Day to Day', 'textdomain' ),
    'post_types' => array( 'page'),
    'context'    => 'normal',
    'priority'   => '',
    'visible' => array( 'parent_id', '!=', '' ),
    'fields' => array(
        array(
            'id'     => 'daytoday',
            'type'   => 'group',
            'clone'  => true,
            'sort_clone' => true,
            'fields' => array(
                array(
                    'name' => 'Quote',
                    'id'   => 'snap_quote',
                    'type' => 'textarea',
                ),
                array(
                    'name'  => 'Image',
                    'id'    => 'snap_image',
                    'type'  => 'image',
                ),
                array(
                    'name' => 'Name',
                    'id'   => 'snap_name',
                    'type' => 'text',
                ),
                array(
                    'name'  => 'Image',
                    'id'    => 'snap_portrait',
                    'type'  => 'image',
                ),
            ),
        ),
    )
);

$meta_boxes[] = array(
    'title'      => 'Culture - Team Ad',
    'post_types' => array( 'page'),
    'context'    => 'normal',
    'priority'   => '',
    'visible' => array( 'parent_id', '!=', '' ),
    'fields' => array(
        array(
            'name'  => 'Heading',
            'id'    => 'ad_heading',
            'type'  => 'text',
        ),
        array(
            'name'  => 'Image',
            'id'    => 'ad_image',
            'type'  => 'image',
        ),
        array(
            'name'  => 'CTA Link',
            'id'    => 'ad_link',
            'type'  => 'text',
        ),
    )
);

$meta_boxes[] = array(
    'title'      => 'Culture - Careers',
    'post_types' => array( 'page'),
    'context'    => 'normal',
    'priority'   => '',
    'visible' => array( 'parent_id', '!=', '' ),
    'fields' => array(
        array(
            'name'  => 'Heading',
            'id'    => 'careers_heading',
            'type'  => 'text',
        ),
        array(
            'name'  => 'Sub Heading',
            'id'    => 'careers_blurb',
            'type'  => 'text',
        ),
        array(
            'name'  => 'CTA Link',
            'id'    => 'careers_link',
            'type'  => 'text',
        ),
    )
);
?>