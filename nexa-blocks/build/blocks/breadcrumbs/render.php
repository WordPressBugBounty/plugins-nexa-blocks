<?php
/**
 * Render callback for the breadcrumb block
 * 
 * @param array $attributes Block attributes
 * @param string $content Block content
 * @param WP_Block $block Block instance
 * @return string Rendered block HTML
 */

// Extract attributes with defaults
$home_text = isset($attributes['homeText']) ? esc_html($attributes['homeText']) : 'Home';
$home_icon = isset($attributes['homeIcon']) ? esc_attr($attributes['homeIcon']) : '';
$show_separator = isset($attributes['showSeparator']) ? $attributes['showSeparator'] : true;
$separator_icon = isset($attributes['separatorIcon']) ? esc_attr($attributes['separatorIcon']) : '';
$icon_source = isset($attributes['iconSource']) ? $attributes['iconSource'] : 'icons_library';
$show_current = isset($attributes['showCurrent']) ? $attributes['showCurrent'] : true;
$hide_home = isset($attributes['hideHome']) ? $attributes['hideHome'] : false;
$hide_current = isset($attributes['hideCurrent']) ? $attributes['hideCurrent'] : false;

// Build wrapper classes
$wrapper_classes = ['wp-block-nexa-breadcrumbs'];
if ($hide_home) {
    $wrapper_classes[] = 'hide-home';
}
if ($hide_current) {
    $wrapper_classes[] = 'hide-current';
}

// Get wrapper attributes for block supports
$wrapper_attributes = get_block_wrapper_attributes([
    'class' => implode(' ', $wrapper_classes)
]);
?>

<div <?php echo wp_kses_post($wrapper_attributes); ?>>
    <ul class="breadcrumb-items">
        <li class="breadcrumb-item home">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb-link">
                <?php if ($icon_source === 'icons_library' && !empty($home_icon)) : ?>
                    <i class="<?php echo esc_attr($home_icon); ?>"></i>
                <?php endif; ?>
                <span class="name"><?php echo esc_html($home_text); ?></span>
            </a>
            
            <?php if ($show_separator && !empty($separator_icon)) : ?>
                <span class="separator">
                    <?php if ($icon_source === 'icons_library') : ?>
                        <i class="<?php echo esc_attr($separator_icon); ?>"></i>
                    <?php endif; ?>
                </span>
            <?php endif; ?>
        </li>
        
        <?php
        // Get breadcrumb trail dynamically
        $breadcrumbs = [];
        
        // Check if we're on a single post/page
        if (is_singular()) {
            global $post;
            
            // For posts, get categories
            if (is_single()) {
                $categories = get_the_category($post->ID);
                if (!empty($categories)) {
                    $category = $categories[0];
                    $breadcrumbs[] = [
                        'title' => $category->name,
                        'url' => get_category_link($category->term_id)
                    ];
                }
            }
            
            // For pages, get parent pages
            if (is_page() && $post->post_parent) {
                $parent_id = $post->post_parent;
                $parents = [];
                
                while ($parent_id) {
                    $page = get_post($parent_id);
                    $parents[] = [
                        'title' => get_the_title($page->ID),
                        'url' => get_permalink($page->ID)
                    ];
                    $parent_id = $page->post_parent;
                }
                
                $breadcrumbs = array_reverse($parents);
            }
            
            // Add current page/post
            if ($show_current) {
                $breadcrumbs[] = [
                    'title' => get_the_title(),
                    'url' => '',
                    'current' => true
                ];
            }
        }
        // Archive pages
        elseif (is_category() || is_tag() || is_tax()) {
            $term = get_queried_object();
            if ($show_current) {
                $breadcrumbs[] = [
                    'title' => $term->name,
                    'url' => '',
                    'current' => true
                ];
            }
        }
        // Search results
        elseif (is_search()) {
            if ($show_current) {
                $breadcrumbs[] = [
                    'title' => 'Search Results',
                    'url' => '',
                    'current' => true
                ];
            }
        }
        // 404 page
        elseif (is_404()) {
            if ($show_current) {
                $breadcrumbs[] = [
                    'title' => '404 - Page Not Found',
                    'url' => '',
                    'current' => true
                ];
            }
        }
        
        // Render breadcrumb items
        if (!empty($breadcrumbs)) :
            $total_items = count($breadcrumbs);
            foreach ($breadcrumbs as $index => $crumb) :
                $is_last = ($index === $total_items - 1);
                $is_current = isset($crumb['current']) && $crumb['current'];
        ?>
                <li class="breadcrumb-item <?php echo esc_attr($is_current ? 'current' : 'parent'); ?>">
                    <?php if (!empty($crumb['url'])) : ?>
                        <a href="<?php echo esc_url($crumb['url']); ?>" class="breadcrumb-link">
                            <span class="name"><?php echo esc_html($crumb['title']); ?></span>
                        </a>
                    <?php else : ?>
                        <span class="breadcrumb-link current-page">
                            <span class="name"><?php echo esc_html($crumb['title']); ?></span>
                        </span>
                    <?php endif; ?>
                    
                    <?php if ($show_separator && !$is_last && !empty($separator_icon)) : ?>
                        <span class="separator">
                            <?php if ($icon_source === 'icons_library') : ?>
                                <i class="<?php echo esc_attr($separator_icon); ?>"></i>
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>
                </li>
        <?php
            endforeach;
        endif;
        ?>
    </ul>
</div>