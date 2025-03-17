<?php 
/**
 * All Nexa Blocks 
 * 
 * @since 1.0.0
 */

if( ! defined( 'ABSPATH' ) ) {
    exit;
}

return apply_filters( 'nexa_blocks', [
    [
        'name'   => 'container',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/container'
    ],
    [
        'name'   => 'advanced-heading',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/advanced-heading/'
    ],
    [
        'name'   => 'button',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/button/'
    ],
    [
        'name'   => 'icon-box',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/icon-box/'
    ],
    [
        'name'   => 'social-icons',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/social-icons/'
    ],
    [
        'name'   => 'social-share',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/social-share/'
    ],
    [
        'name'   => 'google-map',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/google-map/'
    ],
    [
        'name'     => 'accordion-item',
        'is_pro'   => false,
        'active'   => true,
        'is_child' => true,
    ],
    [
        'name'   => 'accordion',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/accordion/'
    ],
    [
        'name'     => 'image-accordion-item',
        'is_pro'   => false,
        'active'   => true,
        'is_child' => true,
    ],
    [
        'name'   => 'image-accordion',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/image-accordion/'
    ],
    [
        'name'     => 'slide-item',
        'is_pro'   => false,
        'active'   => true,
        'is_child' => true,
    ],
    [
        'name'   => 'slider',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/slider/'
    ],
    [
        'name'   => 'flip-box',
        'is_pro' => true,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/flip-box/',
    ],
    [
        'name'   => 'dynamic-slider',
        'is_pro' => true,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/dynamic-slider/',
    ],
    [
        'name'     => 'tab',
        'is_pro'   => false,
        'active'   => true,
        'is_child' => true,
    ],
    [
        'name'        => 'tabs',
        'is_pro'      => false,
        'is_freemium' => true,
        'active'      => true,
        'demo'        => 'https://nexa.wpdive.com/tabs/',
    ],
    [
        'name'   => 'form',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/form/',
    ],
    [
        'name'     => 'text',
        'is_pro'   => false,
        'is_child' => true,
        'active'   => true,
    ],
    [
        'name'     => 'email',
        'is_pro'   => false,
        'is_child' => true,
        'active'   => true,
    ],
    [
        'name'     => 'message',
        'is_pro'   => false,
        'is_child' => true,
        'active'   => true,
    ],
    [
        'name'     => 'select',
        'is_pro'   => false,
        'is_child' => true,
        'active'   => true,
    ],
    [
        'name'     => 'advanced-slide-item',
        'is_pro'   => true,
        'is_child' => true,
        'active'   => true,
    ],
    [
        'name'   => 'advanced-slider',
        'is_pro' => true,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/tabs/',
    ],
    [
        'name'   => 'navigation',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://nexa.wpdive.com/navigation/',
    ],
    [
        'name'     => 'navigation-item',
        'is_pro'   => false,
        'is_child' => true,
        'active'   => true,
    ],
    [
        'name'     => 'navigation-submenu',
        'is_pro'   => false,
        'is_child' => true,
        'active'   => true,
    ],
    [
        'name'     => 'megamenu',
        'is_pro'   => true,
        'is_child' => true,
        'active'   => true,
    ],
    [
        'name'   => 'stylish-list',
        'is_pro' => false,
        'active' => true,
    ],
    [
        'name'   => 'list',
        'is_pro' => false,
        'is_child' => true,
        'active' => true,
    ],
    [
        'name'   => 'progress-bar',
        'is_pro' => false,
        'active' => true,
    ]
]); 