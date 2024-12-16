<?php 
/**
 * All Nexa Modules 
 * 
 * @since 1.0.0
 */

if( ! defined( 'ABSPATH' ) ) {
    exit;
}

return apply_filters( 'nexa_modules', [
    [
        'name'   => 'custom-css',
        'title'  => __('Custom CSS', 'nexa-blocks'),
        'is_pro' => true,
        'active' => true,
    ],
    [
        'name'   => 'copy-paste',
        'title'  => __('Copy Paste', 'nexa-blocks'),
        'is_pro' => false,
        'active' => true,
    ],
    [
        'name'   => 'responsive-visibility',
        'title'  => __('Responsive Visibility', 'nexa-blocks'),
        'is_pro' => false,
        'active' => true,
    ],
    [
        'name'   => 'template-library',
        'title'  => __('Template Library', 'nexa-blocks'),
        'is_pro' => false,
        'active' => true,
    ],
    [
        'name'   => 'entrance-animation',
        'title'  => __('Entrance Animation', 'nexa-blocks'),
        'is_pro' => false,
        'active' => true,
    ]
]); 

