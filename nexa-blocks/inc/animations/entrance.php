<?php
/**
 * Entrance animation
 */

 // Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Nexa_Entrance_Animation' ) ) {

    class Nexa_Entrance_Animation {

        /**
         * Constructor
         * 
         * @return void
         */
        public function __construct() {
            add_filter( 'render_block', array( $this, 'add_entrance_animation' ), 10, 2 );
        }

        /**
         * Add entrance animation
         * 
         * @param string $content
         * @param array $block
         * @return string
         */
        public function add_entrance_animation( $content, $block ) {
            
            if( isset( $block['blockName'] ) && str_contains( $block['blockName'], 'nexa/' ) ) {

                $attrs = isset( $block['attrs'] ) ? $block['attrs'] : [];

                // entranceAnimation
                if( empty( $attrs['entranceAnimation'] ) ) {
                    return $content;
                }

                $animation = $attrs['entranceAnimation'] ?? '';
                $duration  = $attrs['entranceAnimationDuration'] ?? 1;
                $delay     = $attrs['entranceAnimationDelay'] ?? 0;
                $repeat    = $attrs['entranceAnimationRepeat'] ?? false;
                $loop      = $attrs['loopEntranceAnimation'] ?? false;

                $options = [
                    'animation' => $animation,
                    'duration'  => $duration,
                    'delay'     => round( $delay, 1 ),
                    'repeat'    => $repeat,
                    'loop'      => $loop
                ];

                $content = new WP_HTML_Tag_Processor( $content ); 
                $content->next_tag(); 
                $content->add_class( 'nxe-animation' );
                $content->set_attribute( 'data-nxe-animation', wp_json_encode( $options ) );
                $content = $content->get_updated_html();

            }

            return $content;

        }

    }

    new Nexa_Entrance_Animation();
}