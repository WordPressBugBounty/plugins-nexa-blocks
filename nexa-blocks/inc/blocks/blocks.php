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
        'demo'   => 'https://lib.nexablocks.com/stylish-list/',
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
        'demo'   => 'https://lib.nexablocks.com/progress-bar/',
    ],
    [
        'name'   => 'post-list',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/post-list/',
    ],
    [
        'name' => 'advanced-image',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/advanced-image/',
    ],
    [
        'name' => 'image-box',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/image-box/',
    ],
    [
        'name' => 'counter',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/counter/',
    ],
    [
        'name' => 'count-down',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/count-down/',
    ],
    [
        'name' => 'faqs',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/faqs/',
    ],
    [
        'name' => 'image-compare',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/image-compare/',
    ],
    [
        'name' => 'pie-chart',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/pie-chart/',
    ],
    [
        'name' => 'image-gallery',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/image-gallery/',
    ],
    [
        'name' => 'video-gallery',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/video-gallery/',
    ],
    [
        'name'     => 'testimonial-item',
        'is_pro'   => false,
        'active'   => true,
        'is_child' => true,
    ],
    [
        'name'   => 'testimonial',
        'is_pro' => false,
        'active' => true,
         'demo'   => 'https://lib.nexablocks.com/testimonial/',
    ],
    [
        'name'   => 'timeline',
        'is_pro' => false,
        'active' => true,
         'demo'   => 'https://lib.nexablocks.com/timeline/'
    ],
    [
        'name' => 'timeline-item',
        'is_pro' => false,
        'active' => true,
       'is_child' => true
    ],
     [
        'name'   => 'post-title',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/post-title/'
    ],
     [
        'name'   => 'post-featured-image',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/post-title/'
    ],
     [
        'name'   => 'post-meta',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/post-meta/'
    ],
     [
        'name'   => 'post-content',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/post-content/'
    ],
     [
        'name'   => 'post-comments',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/post-comments-form/'
    ],
     [
        'name'   => 'breadcrumbs',
        'is_pro' => false,
        'active' => true,
        'demo'   => 'https://lib.nexablocks.com/breadcrumbs/'
    ],
    [
        'name'   => 'fancy-list',
        'is_pro' => false,
        'active' => true,
         'demo'   => 'https://lib.nexablocks.com/fancy-list/'
    ],
    [
        'name' => 'fancy-list-item',
        'is_pro' => false,
        'active' => true,
       'is_child' => true
    ],
]); 