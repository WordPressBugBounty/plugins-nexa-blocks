<?php
/**
 * Dynamic Post Title Block - Frontend Render
 *
 * @var array $attributes Block attributes
 * @var string $content Block content
 * @var WP_Block $block Block instance
 */

// Extract attributes
$unique_id = $attributes['uniqueId'] ?? '';
$parent_classes = $attributes['parentClassess'] ?? [];
$nexa_id = $attributes['nexaId'] ?? '';
$title_tag = $attributes['titleTag'] ?? 'h2';
$title_words = $attributes['titleWords'] ?? 0;
$is_link = $attributes['isLink'] ?? false;
$link_target = $attributes['linkTarget'] ?? '';
$link_rel = $attributes['linkRel'] ?? '';

// Get current post data
global $post;
$post_title = get_the_title();
$post_link = get_permalink();

// Apply title word limit
if ($title_words > 0 && !empty($post_title)) {
    $words = explode(' ', trim($post_title));
    if (count($words) > $title_words) {
        $post_title = implode(' ', array_slice($words, 0, $title_words));
    }
}

// Prepare classes
$classes = [esc_attr($unique_id)];
if (!empty($parent_classes) && is_array($parent_classes)) {
    foreach ($parent_classes as $class) {
        $classes[] = esc_attr($class);
    }
}
$class_string = implode(' ', array_filter($classes));

// Sanitize title tag
$allowed_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'div', 'span'];
$title_tag = in_array($title_tag, $allowed_tags) ? $title_tag : 'h2';

?>

<div class="<?php echo esc_attr($class_string); ?>"<?php if (!empty($nexa_id)) : ?> id="<?php echo esc_attr($nexa_id); ?>"<?php endif; ?>>
    <<?php echo esc_attr($title_tag); ?> class="nexa-post-title">
        <?php if ($is_link && !empty($post_link)) : ?>
            <a href="<?php echo esc_url($post_link); ?>" class="nexa-post-title-link"<?php if (!empty($link_target)) : ?> target="<?php echo esc_attr($link_target); ?>"<?php endif; ?><?php if (!empty($link_rel)) : ?> rel="<?php echo esc_attr($link_rel); ?>"<?php endif; ?>>
                <?php echo esc_html($post_title); ?>
            </a>
        <?php else : ?>
            <?php echo esc_html($post_title); ?>
        <?php endif; ?>
    </<?php echo esc_attr($title_tag); ?>>
</div>