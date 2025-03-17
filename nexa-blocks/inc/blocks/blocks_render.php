<?php
/**
 * Filter blocks on render
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Nexa_Blocks_Render' )) {

    /**
     * Nexa Blocks Render Class
     * 
     * @since 1.0.0
     * @package NexaBlocks
     */
    class Nexa_Blocks_Render {

        /**
         * Constructor
         * 
         * @since 1.0.0
         * @return void
         */
        public function __construct() {
            add_filter( 'render_block', array( $this, 'modify_navigation_link' ), 10, 2 );
        }

        public function modify_navigation_link($block_content, $block) {

            if ($block['blockName'] == 'nexa/navigation') {
                $tags = new \WP_HTML_Tag_Processor($block_content);
                $tags->next_tag(array('tag_name' => 'a', 'class_name' => 'nexa-navigation-sidebar-logo'));
                $tags->set_attribute('href', home_url());
                $tags->get_updated_html();

                return $tags;
            }

            if ($block['blockName'] == 'nexa/navigation-item') {

                $tags = new \WP_HTML_Tag_Processor($block_content);
                $tags->next_tag(array('tag_name' => 'li'));


                if ($tags->get_attribute('data-id') == get_the_ID() && $tags->get_attribute('data-type') == get_post_type()) {
                    $tags->add_class('current-item');
                }
                $tags->get_updated_html();

                return $tags;
            }

            return $block_content;
        }
    }

    new Nexa_Blocks_Render();

}