<?php
$attrs = isset( $attributes ) ? $attributes : [];
$id = isset( $attrs['uniqueId']) ? $attrs['uniqueId'] : '';
$parent_classes = isset( $attrs['parentClassess'] ) ? $attrs['parentClassess'] : [];

$block_classes = [
    'wp-block-nexa-post-list',
    esc_attr( $id ),
    implode( ' ', array_filter( $parent_classes ) ),
];

$block_wrapper_class = get_block_wrapper_attributes([
    'class' => implode( ' ', array_filter( $block_classes ) )
]);

// var_dump( esc_attr($block_wrapper_class) );

$defaults = [
    'postQuery'           => [
        'posts_per_page' => 5,
        'order'          => 'DESC',
        'orderby'        => 'date',
    ],
    'categories'    => [],
    'authors'       => [],
    'showFeaturedImage'  => true,
    'linkedImage'   => true,
    'showPagination' => false,

    'showTitle'     => true,
    'showExcerpt'   => true,
    'showDate'      => true,
    'showAuthor'    => true,
    'showCategory'  => true,
    'showBtn'       => true,
    'iconSource'    => 'icons_library',
    'icon'          => 'fa-solid fa-arrow-right',
    'showIcon'     => false,
    'excerptLength' => 15,
    'linkedTitle'   => true,
    'paginationType' => 'numeric'
];

$atts = wp_parse_args( $attributes, $defaults );


?>
<div <?php echo wp_kses_post($block_wrapper_class);?> data-posts-per-page="<?php echo esc_attr($atts['postQuery']['posts_per_page']); ?>" data-block-id="<?php echo esc_attr($id); ?>">
    <div class="nexa-posts-container">
    <?php 
        $args = [
            'post_type'           => 'post',
            'posts_per_page'      => $atts['postQuery']['posts_per_page'],
            'order'               => $atts['postQuery']['order'],
            'orderby'             => $atts['postQuery']['orderby'],
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        ]; 
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args['paged'] = $paged;

        // check categories 
        if( !empty( $atts['categories'] ) ) {
            $cat_ids = [];
            foreach( $atts['categories'] as $cat ) {
                $cat_ids[] = $cat['value'];
            }

            $args['category__in'] = $cat_ids;
        }

        // check authors
        if( !empty( $atts['authors'] ) ) {
            $author_ids = [];
            foreach( $atts['authors'] as $author ) {
                $author_ids[] = $author['value'];
            }

            $args['author__in'] = $author_ids;
        }

        // Store args as data attribute for load more functionality
        $serialized_args = base64_encode(serialize($args));

        $posts = new WP_Query( $args );

        if( $posts->have_posts()): 
            while( $posts->have_posts()): 
                $posts->the_post();

                $post_id        = get_the_ID();
                $title          = get_the_title();
                $permalink      = get_permalink();
                $thumbnail      = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
                $excerpt        = get_the_excerpt();
                $date           = get_the_date();
                $author         = get_the_author();
                $author_id      = get_the_author_meta('ID');
                $author_link    = get_author_posts_url( $author_id );
                $categories     = get_the_category();
                $category_links = [];
                foreach( $categories as $category ) {
                    $category_links[] = '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
                }
                $category_links = implode( ', ', $category_links );
                $tags           = get_the_tags();
                $tag_links      = [];
                if( $tags ) {
                    foreach( $tags as $tag ) {
                        $tag_links[] = '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a>';
                    }
                    $tag_links = implode( ', ', $tag_links );
                } else {
                    $tag_links = '';
                }

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
    ?>
    </div><!-- .nexa-posts-container -->
    
    <?php
            $total_pages = $posts->max_num_pages;
            
            if ($atts['paginationType'] === 'numeric' && !empty($atts['showPagination']) && $total_pages > 1) {
                echo '<div class="nexa-post-pagination">';
                $pagination = paginate_links([
                    'total'     => $total_pages,
                    'current'   => $paged,
                    'type'      => 'list',
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;',
                ]);
                if ( $pagination ) {
                    echo wp_kses_post( $pagination );
                }
                echo '</div>';
            } elseif ($atts['paginationType'] === 'loadmore' && $total_pages > 1) {
                echo '<div class="nexa-loadmore-wrapper">';
                echo '<button id="nexa-loadmore" class="nexa-loadmore-btn" data-page="1" data-max-pages="' . esc_attr($total_pages) . '" data-args="' . esc_attr($serialized_args) . '">' . esc_html($atts['pagiBtn'] ?? __('Load More', 'nexa-blocks')) . '</button>';
                echo '</div>';
            }
        endif;
    ?>
    
</div>