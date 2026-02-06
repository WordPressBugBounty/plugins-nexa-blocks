<?php
/**
 * Render.php for Post Meta Block with Dynamic Styles
 * @var array $attributes Block attributes
 * @var string $content Block content
 * @var WP_Block $block Block instance
 */

// Meta icons
$meta_icons = [
    'author' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>',
    'date' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/></svg>',
    'time' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>',
    'terms' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 21-5-4-5 4V3.889a.92.92 0 0 1 .244-.629.808.808 0 0 1 .59-.26h8.333a.81.81 0 0 1 .589.26.92.92 0 0 1 .244.63V21Z"/></svg>',
    'comments' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/></svg>',
    'readingTime' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>'
];

// Helper functions for generating styles
if (!function_exists('nexa_generate_typography_styles')) {
    function nexa_generate_typography_styles($typo_attrs, $prefix = '') {
        if (empty($typo_attrs)) return '';
        
        $styles = [];
        
        // Font family
        if (!empty($typo_attrs['fontFamily'])) {
            $styles[] = 'font-family: ' . esc_attr($typo_attrs['fontFamily']);
        }
        
        // Font size
        if (!empty($typo_attrs['fontSize'])) {
            $unit = !empty($typo_attrs['fontSizeUnit']) ? $typo_attrs['fontSizeUnit'] : 'px';
            $styles[] = 'font-size: ' . esc_attr($typo_attrs['fontSize']) . $unit;
        }
        
        // Font weight
        if (!empty($typo_attrs['fontWeight'])) {
            $styles[] = 'font-weight: ' . esc_attr($typo_attrs['fontWeight']);
        }
        
        // Line height
        if (!empty($typo_attrs['lineHeight'])) {
            $unit = !empty($typo_attrs['lineHeightUnit']) ? $typo_attrs['lineHeightUnit'] : '';
            $styles[] = 'line-height: ' . esc_attr($typo_attrs['lineHeight']) . $unit;
        }
        
        // Letter spacing
        if (!empty($typo_attrs['letterSpacing'])) {
            $unit = !empty($typo_attrs['letterSpacingUnit']) ? $typo_attrs['letterSpacingUnit'] : 'px';
            $styles[] = 'letter-spacing: ' . esc_attr($typo_attrs['letterSpacing']) . $unit;
        }
        
        // Text transform
        if (!empty($typo_attrs['textTransform'])) {
            $styles[] = 'text-transform: ' . esc_attr($typo_attrs['textTransform']);
        }
        
        // Text decoration
        if (!empty($typo_attrs['textDecoration'])) {
            $styles[] = 'text-decoration: ' . esc_attr($typo_attrs['textDecoration']);
        }
        
        return implode('; ', $styles);
    }
}

if (!function_exists('nexa_generate_alignment_styles')) {
    function nexa_generate_alignment_styles($align_value) {
        $alignment_map = [
            'left' => 'flex-start',
            'center' => 'center', 
            'right' => 'flex-end'
        ];
        
        return isset($alignment_map[$align_value]) ? 'justify-content: ' . $alignment_map[$align_value] : '';
    }
}

if (!function_exists('nexa_generate_range_styles')) {
    function nexa_generate_range_styles($value, $unit = 'px') {
        return !empty($value) ? 'gap: ' . esc_attr($value) . $unit : '';
    }
}

if (!function_exists('nexa_calculate_reading_time')) {
    /**
     * Calculate reading time for a post
     * 
     * @param string $content Post content
     * @param int $words_per_minute Average reading speed (default: 200)
     * @return int Reading time in minutes
     */
    function nexa_calculate_reading_time($content, $words_per_minute = 200) {
        // Use WordPress function to strip all tags and shortcodes
        $clean_content = wp_strip_all_tags($content);
        
        // Remove extra whitespace
        $clean_content = preg_replace('/\s+/', ' ', trim($clean_content));
        
        // Count words more accurately
        $word_count = str_word_count($clean_content);
        
        // Calculate reading time (minimum 1 minute)
        $reading_time = max(1, ceil($word_count / $words_per_minute));
        
        return $reading_time;
    }
}

// Get attributes
$meta_items = isset($attributes['metaData']) ? $attributes['metaData'] : []; // Changed from metaItems to metaData
$separator_type = isset($attributes['separatorType']) ? $attributes['separatorType'] : 'default';
$unique_id = isset($attributes['uniqueId']) ? $attributes['uniqueId'] : 'nexa-meta-' . wp_generate_uuid4();
$meta_color = isset($attributes['metaColor']) ? $attributes['metaColor'] : '';

// Get dynamic style attributes
$item_align = isset($attributes['itemAlign']) ? $attributes['itemAlign'] : [];
$meta_typo = isset($attributes['metaTypo']) ? $attributes['metaTypo'] : [];
$meta_gap = isset($attributes['metaGap']) ? $attributes['metaGap'] : [];

// Generate dynamic styles
$desktop_styles = '';
$tablet_styles = '';
$mobile_styles = '';

// Desktop styles
if (!empty($item_align['desktop']) || !empty($meta_gap['desktop'])) {
    $desk_align = !empty($item_align['desktop']) ? nexa_generate_alignment_styles($item_align['desktop']) : '';
    $desk_gap = !empty($meta_gap['desktop']) ? nexa_generate_range_styles($meta_gap['desktop'], 'px') : '';
    
    $block_styles = array_filter([$desk_align, $desk_gap]);
    if (!empty($block_styles)) {
        $desktop_styles .= '.' . $unique_id . '.wp-block-nexa-post-meta { ' . implode('; ', $block_styles) . '; }';
    }
}

if (!empty($meta_typo['desktop']) || !empty($meta_color)) {
    $desk_typo = nexa_generate_typography_styles($meta_typo['desktop']);
    $color_style = !empty($meta_color) ? 'color: ' . esc_attr($meta_color) : '';
    
    $meta_styles = array_filter([$desk_typo, $color_style]);
    if (!empty($meta_styles)) {
        $desktop_styles .= '.' . $unique_id . '.wp-block-nexa-post-meta .nexa-meta-info a { ' . implode('; ', $meta_styles) . '; }';
    }
}

// Tablet styles
if (!empty($item_align['tablet']) || !empty($meta_gap['tablet']) || !empty($meta_typo['tablet'])) {
    $tablet_styles .= '@media (max-width: 1024px) {';
    
    if (!empty($item_align['tablet']) || !empty($meta_gap['tablet'])) {
        $tab_align = !empty($item_align['tablet']) ? nexa_generate_alignment_styles($item_align['tablet']) : '';
        $tab_gap = !empty($meta_gap['tablet']) ? nexa_generate_range_styles($meta_gap['tablet'], 'px') : '';
        
        $block_styles = array_filter([$tab_align, $tab_gap]);
        if (!empty($block_styles)) {
            $tablet_styles .= '.' . $unique_id . '.wp-block-nexa-post-meta { ' . implode('; ', $block_styles) . '; }';
        }
    }
    
    if (!empty($meta_typo['tablet'])) {
        $tab_typo = nexa_generate_typography_styles($meta_typo['tablet']);
        if (!empty($tab_typo)) {
            $tablet_styles .= '.' . $unique_id . '.wp-block-nexa-post-meta .nexa-meta-info a { ' . $tab_typo . '; }';
        }
    }
    
    $tablet_styles .= '}';
}

// Mobile styles
if (!empty($item_align['mobile']) || !empty($meta_gap['mobile']) || !empty($meta_typo['mobile'])) {
    $mobile_styles .= '@media (max-width: 767px) {';
    
    if (!empty($item_align['mobile']) || !empty($meta_gap['mobile'])) {
        $mob_align = !empty($item_align['mobile']) ? nexa_generate_alignment_styles($item_align['mobile']) : '';
        $mob_gap = !empty($meta_gap['mobile']) ? nexa_generate_range_styles($meta_gap['mobile'], 'px') : '';
        
        $block_styles = array_filter([$mob_align, $mob_gap]);
        if (!empty($block_styles)) {
            $mobile_styles .= '.' . $unique_id . '.wp-block-nexa-post-meta { ' . implode('; ', $block_styles) . '; }';
        }
    }
    
    if (!empty($meta_typo['mobile'])) {
        $mob_typo = nexa_generate_typography_styles($meta_typo['mobile']);
        if (!empty($mob_typo)) {
            $mobile_styles .= '.' . $unique_id . '.wp-block-nexa-post-meta .nexa-meta-info a { ' . $mob_typo . '; }';
        }
    }
    
    $mobile_styles .= '}';
}

// Output dynamic styles
$dynamic_styles = $desktop_styles . $tablet_styles . $mobile_styles;
if (!empty($dynamic_styles)) {
    echo '<style>' . esc_html($dynamic_styles) . '</style>';
}

// If no meta items, show default ones
if (empty($meta_items)) {
    $meta_items = [
        [
            'id' => 1,
            'type' => 'author', 
            'showIcon' => 'icon',
            'link' => true,
            'icon' => $meta_icons['author']
        ],
        [
            'id' => 2,
            'type' => 'date',
            'showIcon' => 'icon', 
            'link' => true,
            'dateType' => 'post_published',
            'icon' => $meta_icons['date']
        ],
        [
            'id' => 3,
            'type' => 'terms',
            'showIcon' => 'icon',
            'link' => true, 
            'taxonomy' => 'category',
            'icon' => $meta_icons['terms']
        ]
    ];
}

// Build separator class
$separator_class = $separator_type !== 'default' ? ' separator-' . esc_attr($separator_type) : '';

$output = '<div class="' . esc_attr($unique_id) . ' wp-block-nexa-post-meta' . $separator_class . '">';

foreach ($meta_items as $index => $meta) {
    $type = $meta['type'] ?? '';
    $show_icon = $meta['showIcon'] ?? true;
    $enable_link = $meta['link'] ?? true;
    
    $meta_html = '';
    
    switch ($type) {
        case 'author':
            $author_id = get_the_author_meta('ID');
            $author_name = get_the_author();
            $author_link = get_author_posts_url($author_id);
            
            $icon = $show_icon ? '<span class="nexa-icon">' . $meta_icons['author'] . '</span>' : '';
            $text = '<span class="nexa-text">' . esc_html($author_name) . '</span>';
            
            if ($enable_link) {
                $meta_html = '<a href="' . esc_url($author_link) . '">' . $icon . $text . '</a>';
            } else {
                $meta_html = $icon . $text;
            }
            break;
            
        case 'date':
            $date_type = $meta['dateType'] ?? 'post_date';
            if ($date_type === 'post_modified') {
                $post_date = get_the_modified_date();
            } else {
                $post_date = get_the_date();
            }
            $post_link = get_permalink();
            
            $icon = $show_icon ? '<span class="nexa-icon">' . $meta_icons['date'] . '</span>' : '';
            $text = '<span class="nexa-text">' . esc_html($post_date) . '</span>';
            
            if ($enable_link) {
                $meta_html = '<a href="' . esc_url($post_link) . '">' . $icon . $text . '</a>';
            } else {
                $meta_html = $icon . $text;
            }
            break;
            
        case 'time':
            $post_time = get_the_time('g:i A');
            
            $icon = $show_icon ? '<span class="nexa-icon">' . $meta_icons['time'] . '</span>' : '';
            $text = '<span class="nexa-text">' . esc_html($post_time) . '</span>';
            
            $meta_html = $icon . $text;
            break;
            
        case 'terms':
            $taxonomy = $meta['taxonomy'] ?? 'category';
            $terms = get_the_terms(get_the_ID(), $taxonomy);
            
            $icon = $show_icon ? '<span class="nexa-icon">' . $meta_icons['terms'] . '</span>' : '';
            
            if (!empty($terms) && !is_wp_error($terms)) {
                $term_links = array();
                foreach ($terms as $term) {
                    if ($enable_link) {
                        $term_links[] = '<a class="term-name" href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
                    } else {
                        $term_links[] = '<span class="term-name">' . esc_html($term->name) . '</span>';
                    }
                }
                $terms_text = '<span class="nexa-text">' . implode('<span class="separator">, </span>', $term_links) . '</span>';
            } else {
                $terms_text = '<span class="nexa-text">' . __('Uncategorized', 'nexa-blocks') . '</span>';
            }
            
            $meta_html = $icon . $terms_text;
            break;
            
        case 'comments':
            $comment_count = get_comments_number();
            // Translators: %d: Number of comments.
            $comment_text = sprintf(_n('%d Comment', '%d Comments', $comment_count, 'nexa-blocks'), $comment_count);
            $comment_link = get_permalink() . '#comments';
            
            $icon = $show_icon ? '<span class="nexa-icon">' . $meta_icons['comments'] . '</span>' : '';
            $text = '<span class="nexa-text">' . esc_html($comment_text) . '</span>';
            
            if ($enable_link && $comment_count > 0) {
                $meta_html = '<a href="' . esc_url($comment_link) . '">' . $icon . $text . '</a>';
            } else {
                $meta_html = $icon . $text;
            }
            break;
            
        case 'readingTime':
            $content = get_post_field('post_content', get_the_ID());
            $reading_time = nexa_calculate_reading_time($content); // Use new function
            // Translators: %d: Reading time in minutes.
            $reading_text = sprintf(__('%d Min Read', 'nexa-blocks'), $reading_time);
            
            $icon = $show_icon ? '<span class="nexa-icon">' . $meta_icons['readingTime'] . '</span>' : '';
            $meta_html = $icon . '<span class="nexa-text">' . esc_html($reading_text) . '</span>';
            break;
    }
    
    if (!empty($meta_html)) {
        $output .= '<div class="nexa-meta-info ' . esc_attr($type) . '">' . $meta_html . '</div>';
        
        // Add separator between items (not after last item)
        if ($index < count($meta_items) - 1) {
            if ($separator_type === 'dot') {
                $output .= '<span class="nexa-separator"></span>';
            } elseif ($separator_type === 'line') {
                $output .= '<span class="nexa-separator"></span>';
            } else {
                // Default separator (comma or custom)
                $output .= '<span class="nexa-separator">,</span>';
            }
        }
    }
}

$output .= '</div>';

echo wp_kses_post($output);

?>