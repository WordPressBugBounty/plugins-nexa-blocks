
<?php
/**
 * Ajax handler for loading more posts
 */
function nexa_load_more_posts() {
    
    if( !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'nexa_blocks_nonce') ) {
        wp_send_json_error( array( 'message' => 'Nonce verification failed' ) );
        return;
    }
    
    // Get the request parameters
    $page = isset($_POST['page']) ? intval($_POST['page']) : 2;
    $args_encoded = isset($_POST['args']) ? sanitize_text_field($_POST['args']) : '';
    $block_id = isset($_POST['block_id']) ? sanitize_text_field($_POST['block_id']) : '';
    
    // Decode the query args
    $args = unserialize(base64_decode($args_encoded));
    
    // Validate args
    if (!is_array($args)) {
        wp_send_json_error(array('message' => 'Invalid arguments.'));
    }
    
    // Set the page number
    $args['paged'] = $page;
    
    // Run the query
    $posts = new WP_Query($args);
    
    if (!$posts->have_posts()) {
        wp_send_json_error(array('message' => 'No more posts.'));
    }
    
    $html = '';
    ob_start();
    
    while ($posts->have_posts()): 
        $posts->the_post();
        
        $post_id        = get_the_ID();
        $title          = get_the_title();
        $permalink      = get_permalink();
        $thumbnail      = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');
        $excerpt        = get_the_excerpt();
        $date           = get_the_date();
        $author         = get_the_author();
        $author_id      = get_the_author_meta('ID');
        $author_link    = get_author_posts_url($author_id);
        $categories     = get_the_category();
        $category_links = [];
        
        foreach ($categories as $category) {
            $category_links[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
        }
        $category_links = implode(', ', $category_links);
        
        // Get block attributes from post meta or use defaults
        $block_attrs = get_option('nexa_block_' . $block_id, array());
        
        $defaults = array(
            'showTitle'         => true,
            'showExcerpt'       => true,
            'showDate'          => true,
            'showAuthor'        => true,
            'showCategory'      => true,
            'showBtn'           => true,
            'btnLabel'          => 'Read More',
            'showFeaturedImage' => true,
            'linkedImage'       => true,
            'linkedTitle'       => true,
            'excerptLength'     => 15,
            'showIcon'          => false,
            'iconSource'        => 'icons_library',
            'icon'              => 'fa-solid fa-arrow-right',
        );
        
        $atts = wp_parse_args($block_attrs, $defaults);
        
        ?>
        <div class="nexa-post-item">
            <?php 
                if (!empty($thumbnail) && $atts['showFeaturedImage']) {
                    $thumbnail_url = $thumbnail[0];
                    $thumbnail_alt = get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true);
                    if ($atts['linkedImage']) {
                        ?>
                        <a href="<?php echo esc_url($permalink); ?>">
                            <div class="nexa-post-item__image">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($thumbnail_alt); ?>" />
                            </div>
                        </a>
                        <?php
                    } else {
                        ?>
                        <div class="nexa-post-item__image">
                            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($thumbnail_alt); ?>" />
                        </div>
                        <?php
                    }
                }
            ?>
            
            <div class="nexa-post-item__content">
            <?php 
                if(!empty($title) && $atts['showTitle']){
                    if($atts['linkedTitle']) {
                        ?>
                        
                            <a href="<?php echo esc_url($permalink); ?>">
                                <h2 class="nexa-post-item__title">
                                    <?php echo esc_html($title); ?>
                                </h2>
                            </a>
                        <?php
                    } else {
                        ?>
                        <h2 class="nexa-post-item__title">
                            <?php echo esc_html($title); ?>
                        </h2>
                        <?php
                    }
                }
            ?>
                <?php 
                    if (!empty($excerpt) && $atts['showExcerpt']) {
                        $excerpt_words = explode(' ', $excerpt); // Split the excerpt into words
                        if ($atts['excerptLength'] > 0) {
                            $excerpt_trimmed = implode(' ', array_slice($excerpt_words, 0, $atts['excerptLength'])); // Trim to the desired length
                        } else {
                            $excerpt_trimmed = $excerpt; // Use the full excerpt if length is 0 or less
                        }
                        ?>
                        <p class="swiper-slide-excerpt">
                            <?php echo esc_html($excerpt_trimmed); ?>
                        </p>
                        <?php
                    }
                ?>
             <?php 
                    if (!empty($permalink) && (!isset($atts['showBtn']) || $atts['showBtn'])): ?>
                        <a href="<?php echo esc_url($permalink); ?>" class="nexa-post-item__link">
                            <?php echo esc_html($atts['btnLabel'] ?? 'Read More'); ?>
                        </a>
                    <?php endif; ?>
                    <?php
                ?>   
                    
                    <?php if (!empty($atts['showIcon']) && $atts['iconSource'] === 'icons_library' && !empty($atts['icon'])) : ?>         
                        <span class="btn-icon">
                            <i class="<?php echo esc_attr($atts['icon']); ?>"></i>
                        </span>
                    <?php endif; ?>
              
            </div>
            <div class="nexa-post-item__meta">
              <?php 
              if (!empty($author) && $atts['showAuthor']) {
                    ?>
                    <span class="nexa-post-item__author">
                        <a href="<?php echo esc_url($author_link); ?>">
                            <?php echo esc_html($author); ?>
                        </a>
                    </span>
                    <?php
                }
                ?>
               
               <?php if (!empty($date) && $atts['showDate']) : ?>
                    <span class="nexa-post-item__date">
                        <?php echo esc_html($date); ?>
                    </span>
                <?php endif; ?>
                
                <?php if (!empty($categories) && $atts['showCategory']) : ?>
                    <span class="nexa-post-item__category">
                        <?php echo wp_kses_post($category_links); ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    <?php
    endwhile;
    wp_reset_postdata();
    
    $html = ob_get_clean();
    
    wp_send_json_success(array(
        'html' => $html,
        'page' => $page
    ));
}
add_action('wp_ajax_nexa_load_more_posts', 'nexa_load_more_posts');
add_action('wp_ajax_nopriv_nexa_load_more_posts', 'nexa_load_more_posts');

/**
 * Store block attributes for later use with AJAX
 */
function nexa_store_block_attributes($attributes) {
    if (isset($attributes['uniqueId'])) {
        update_option('nexa_block_' . $attributes['uniqueId'], $attributes);
    }
}

/**
 * Add this function to your block initialization or rendering logic
 */
function nexa_init_post_list_block($attributes) {
    nexa_store_block_attributes($attributes);
    // Rest of your block rendering logic
}