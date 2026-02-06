<?php
/**
 * Server-side rendering for Post Content Block
 *
 * @package Nexa Blocks
 */

// Block attributes
$unique_id = isset($attributes['uniqueId']) ? esc_attr($attributes['uniqueId']) : '';
$nexa_id = isset($attributes['nexaId']) ? esc_attr($attributes['nexaId']) : '';
$parent_classes = isset($attributes['parentClassess']) ? $attributes['parentClassess'] : array();

// Sanitize parent classes
$sanitized_parent_classes = array();
if (is_array($parent_classes)) {
    foreach ($parent_classes as $class) {
        $sanitized_parent_classes[] = esc_attr($class);
    }
}

// Build classes
$classes = array_merge(
    array('wp-block-nexa-blocks-post-content'),
    array($unique_id),
    $sanitized_parent_classes
);
$class_string = implode(' ', array_filter($classes));

// Get wrapper attributes
$wrapper_attributes = get_block_wrapper_attributes(
    array(
        'class' => esc_attr($class_string),
    )
);

// Get post content
$post_content = '';
if (is_singular() && in_the_loop()) {
    $post_content = apply_filters('the_content', get_the_content());
} elseif (isset($block->context['postId'])) {
    $post_id = absint($block->context['postId']);
    $post = get_post($post_id);
    if ($post) {
        $post_content = apply_filters('the_content', $post->post_content);
    }
}

// Output with proper escaping
?>
<div <?php echo wp_kses_post($wrapper_attributes); ?><?php if (!empty($nexa_id)) : ?> id="<?php echo esc_attr($nexa_id); ?>"<?php endif; ?>>
    <?php 
    if (!empty($post_content)) {
        // Post content is already processed through 'the_content' filter which handles escaping
        echo wp_kses_post($post_content);
    } else {
        // Fallback for editor preview
        ?>
        <p><?php echo esc_html__('No content available. Please view this on a post page.', 'nexa-blocks'); ?></p>
        <?php
    }
    ?>
</div>