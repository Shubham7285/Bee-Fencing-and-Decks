<?php

add_action('elementor/element/rds-template-gallery-widget/rds_gallery_widget/after_section_end', function($element, $args) {
 
    $element->start_controls_section(
        'custom_gallery_section',
        [
            'label' => __('Child Gallery Controls', 'your-text-domain'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );
 
    $element->add_control(
        'custom_gallery',
        [
            'label' => __('Gallery Images', 'your-text-domain'),
            'type' => \Elementor\Controls_Manager::GALLERY,
            'default' => [],
            'description' => __('Select images for gallery', 'your-text-domain'),
        ]
    );
 
    $element->end_controls_section();
 
}, 10, 2);