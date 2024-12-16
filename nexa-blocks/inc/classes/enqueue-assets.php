<?php 
/**
 * Nexa Blocks Enqueue Assets
 * 
 * @since 1.0.0
 * @package NexaBlocks
 */

 if( ! defined( 'ABSPATH' ) ) {
 	exit;
 }

 if( ! class_exists( 'NexaBlocks_Assets' ) ) {

    /**
     * Nexa Blocks Enqueue Assets Class
     * 
     * @since 1.0.0
     * @package NexaBlocks
     */
    class NexaBlocks_Assets {

        /**
         * Constructor
         * 
         * @since 1.0.0
         * @return void
         */
        public function __construct() {
            $this->init();
        }

        /**
         * Initialize the Class
         * 
         * @since 1.0.0
         * @return void
         */
        private function init() {
            add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ), 2 ); // Editor Assets.
            add_action( 'enqueue_block_assets', array( $this, 'enqueue_assets' ) ); // Frontend Assets + Editor Assets.
            add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_assets' ) ); // Admin Assets.
        }

        /**
         * Enqueue Assets
         * 
         * @since 1.0.0
         * @return void
         */
        public function enqueue_assets() {

            // swiper style + scripts
            wp_register_style( 'nx-swiper-style', trailingslashit( NEXA_URL_FILE ) . 'assets/css/swiper-bundle.min.css', [], NEXA_VERSION, 'all' );
            wp_register_style( 'nx-swiper-gl', trailingslashit( NEXA_URL_FILE ) . 'assets/css/swiper-gl.min.css', ['nx-swiper-style'], NEXA_VERSION, 'all' );

            // scripts
            wp_register_script( 'nx-swiper-script', trailingslashit( NEXA_URL_FILE ) . 'assets/js/swiper-bundle.min.js', [], NEXA_VERSION, true );
            wp_register_script( 'nx-swiper-gl', trailingslashit( NEXA_URL_FILE ) . 'assets/js/swiper-gl.min.js', ['nx-swiper-script'], NEXA_VERSION, true );
            
            $nx_extensions = Nexa_Blocks_Helpers::nx_modules();
            
            // global locasize script
            wp_enqueue_script( 'nexa-blocks-global-localize', trailingslashit( NEXA_URL_FILE ) . 'assets/js/localize.js', [], NEXA_VERSION, true );

            // Enqueue wp-i18n for translation handling
            wp_enqueue_script( 'wp-i18n' );

            // Set script translations
            $locale = determine_locale();
            $locale_path = NEXA_PLUGIN_DIR . 'languages/' . substr($locale, 0, 2);
            wp_set_script_translations( 'nexa-blocks-global-localize', 'nexa-blocks', $locale_path );

            wp_localize_script(
                'nexa-blocks-global-localize',
                'nexaGLocalize',
                apply_filters( 'nexaGLOptions', [
                    'ajax_url'   => admin_url( 'admin-ajax.php' ),
                    'nonce'      => wp_create_nonce( 'nexa_blocks_nonce' ),
                    'gmap_api'   => get_option( 'nexa_apis' )[ 'gmap_api_key' ] ?? '',
                    'site_url'   => site_url(),
                    'maskShapes' => [
                        'blob'     => trailingslashit( NEXA_URL_FILE ) . 'assets/mask-shapes/blob.svg',
                        'circle'   => trailingslashit( NEXA_URL_FILE ) . 'assets/mask-shapes/circle.svg',
                        'flower'   => trailingslashit( NEXA_URL_FILE ) . 'assets/mask-shapes/flower.svg',
                        'hexagon'  => trailingslashit( NEXA_URL_FILE ) . 'assets/mask-shapes/hexagon.svg',
                        'sketch'   => trailingslashit( NEXA_URL_FILE ) . 'assets/mask-shapes/sketch.svg',
                        'triangle' => trailingslashit( NEXA_URL_FILE ) . 'assets/mask-shapes/triangle.svg',
                    ],
                    'placeholderImage' => trailingslashit( NEXA_URL_FILE ) . 'assets/placeholders/placeholder.svg',
                ] )
            ); 

            // font awesome icons
            wp_enqueue_style( 'nexa-fontawesome-style', trailingslashit( NEXA_URL_FILE ) . 'assets/css/all.min.css', [], NEXA_VERSION, 'all' );

            // entrance animation
            if( isset( $nx_extensions['entrance-animation'] ) && $nx_extensions['entrance-animation']['active'] ) {
                wp_enqueue_style( 'nexa-animate-style', trailingslashit( NEXA_URL_FILE ) . 'assets/css/animate.min.css', [], NEXA_VERSION, 'all' );
                wp_enqueue_script( 'nexa-blocks-entrance-animation', trailingslashit( NEXA_URL_FILE ) . 'assets/js/entrance-animation.js', [], NEXA_VERSION, true );
            }           

            // Enqueue Nexa Blocks Frontend Styles.
            if( is_admin() ) {
                return;
            }

            // global frontend styles
            wp_enqueue_style( 'nexa-blocks-global-frontend-style', trailingslashit( NEXA_URL_FILE ) . 'assets/css/global-frontend.css', [], NEXA_VERSION, 'all' );

            // sharer script 
            wp_register_script( 'nexa-blocks-sharer-script', trailingslashit( NEXA_URL_FILE ) . 'assets/js/sharer.min.js', [], NEXA_VERSION, true );

            // slider style + script 
            wp_register_style( 'nx-swiper-style', trailingslashit( NEXA_URL_FILE ) . 'assets/css/swiper-bundle.min.css', [], NEXA_VERSION, 'all' );
            wp_register_style( 'nx-swiper-gl-style', trailingslashit( NEXA_URL_FILE ) . 'assets/css/swiper-gl.min.css', ['nx-swiper-style'], NEXA_VERSION, 'all' );

            wp_register_script( 'nx-swiper-script', trailingslashit( NEXA_URL_FILE ) . 'assets/js/swiper-bundle.min.js', [], NEXA_VERSION, true );
            wp_register_script( 'nx-swiper-gl-script', trailingslashit( NEXA_URL_FILE ) . 'assets/js/swiper-gl.min.js', ['nx-swiper-script'], NEXA_VERSION, true );

            // form validation script (pristine js)
            wp_register_script( 'nexa-blocks-form-validation', trailingslashit( NEXA_URL_FILE ) . 'assets/js/pristine.min.js', [], NEXA_VERSION, true );

        }

        /**
         * Enqueue Editor Assets
         * 
         * @since 1.0.0
         * @return void
         */
        public function enqueue_editor_assets() {

            // editor localize script
            wp_enqueue_script( 'nexa-blocks-editor-localize', trailingslashit( NEXA_URL_FILE ) . 'assets/js/editor-localize.js', [], NEXA_VERSION, true );

            // Enqueue wp-i18n for translation handling
            wp_enqueue_script( 'wp-i18n' );

            // Set script translations
            $locale = determine_locale();
            $locale_path = NEXA_PLUGIN_DIR . 'languages/' . substr($locale, 0, 2);
            wp_set_script_translations( 'nexa-blocks-editor-localize', 'nexa-blocks', $locale_path );
                
            wp_localize_script(
                'nexa-blocks-editor-localize',
                'nexaParams',
                apply_filters( 'nexaParams', [
                    'ajax_url'           => admin_url( 'admin-ajax.php' ),
                    'nonce'              => wp_create_nonce( 'nexa_blocks_nonce' ),
                    'admin_email'        => get_option( 'admin_email' ),
                    'admin_setting_page' => admin_url( 'admin.php?page=nexa-blocks' ),
                    'has_pro'            => defined( 'NEXA_BLOCKS_PRO_VERSION' ),
                    'version'            => get_bloginfo( 'version' ),
                    'postTypes'          => Nexa_Blocks_Helpers::nexa_post_types(),
                    'taxonomies'         => Nexa_Blocks_Helpers::nexa_taxonomies(),
                    'categories'         => Nexa_Blocks_Helpers::nexa_terms_by_taxonomy( 'category' ),
                    'authors'            => Nexa_Blocks_Helpers::nexa_authors(),
                ] )
            ); 

            // global editor styles
            wp_enqueue_style( 'nexa-blocks-global-editor-style', trailingslashit( NEXA_URL_FILE ) . 'assets/css/global-editor.css', [], NEXA_VERSION, 'all' );

            // modules 
            if (file_exists(trailingslashit(NEXA_PLUGIN_DIR) . '/build/modules/index.asset.php')) {
                $modulesDependencies = require_once trailingslashit(NEXA_PLUGIN_DIR) . '/build/modules/index.asset.php';
                wp_enqueue_script(
                    'nexa-blocks-modules-script',
                    trailingslashit(NEXA_URL_FILE) . 'build/modules/index.js',
                    $modulesDependencies['dependencies'],
                    $modulesDependencies['version'],
                    false
                );
            }

            // global 
            if( file_exists( trailingslashit( NEXA_PLUGIN_DIR ) . '/build/global/index.asset.php' ) ) {
                $globalDependencies = require_once trailingslashit( NEXA_PLUGIN_DIR ) . '/build/global/index.asset.php';
                wp_enqueue_script(
                    'nexa-blocks-global-script',
                    trailingslashit( NEXA_URL_FILE ) . 'build/global/index.js',
                    $globalDependencies['dependencies'],
                    $globalDependencies['version'],
                    false
                );

                wp_enqueue_style(
                    'nexa-blocks-global-style',
                    trailingslashit( NEXA_URL_FILE ) . 'build/global/index.css',
                    [],
                    NEXA_VERSION,
                    false
                );
            }

            // google map autocomplete 
            $gmap_api_key = get_option( 'nexa_blocks_settings' )[ 'gmap_api_key' ] ?? '';
            
            // enqueue google map script
            if( ! empty( $gmap_api_key ) ) {
                wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=' . $gmap_api_key . '&libraries=places', [], NEXA_VERSION, true );
            }

            // Extensions 
            $nx_extensions = Nexa_Blocks_Helpers::nx_modules();

            if( isset( $nx_extensions['copy-paste'] ) && $nx_extensions['copy-paste']['active'] ) {
                if( file_exists( trailingslashit( NEXA_PLUGIN_DIR ) . '/build/extensions/copy-paste/index.asset.php' ) ) {
                    $cpDependencies = require_once trailingslashit( NEXA_PLUGIN_DIR ) . '/build/extensions/copy-paste/index.asset.php';
                    wp_enqueue_script(
                        'nexa-blocks-copy-paste-script',
                        trailingslashit( NEXA_URL_FILE ) . 'build/extensions/copy-paste/index.js',
                        $cpDependencies['dependencies'],
                        $cpDependencies['version'],
                        false
                    );
                }
            }

            if( isset( $nx_extensions['responsive-visibility'] ) && $nx_extensions['responsive-visibility']['active'] ) {
                if( file_exists( trailingslashit( NEXA_PLUGIN_DIR ) . '/build/extensions/responsive-visibility/index.asset.php' ) ) {
                    $rvDependencies = require_once trailingslashit( NEXA_PLUGIN_DIR ) . '/build/extensions/responsive-visibility/index.asset.php';
                    wp_enqueue_script(
                        'nexa-blocks-responsive-visibility-script',
                        trailingslashit( NEXA_URL_FILE ) . 'build/extensions/responsive-visibility/index.js',
                        $rvDependencies['dependencies'],
                        $rvDependencies['version'],
                        false
                    );
                }
            }

            if( isset( $nx_extensions['entrance-animation'] ) && $nx_extensions['entrance-animation']['active'] ) {
                if( file_exists( trailingslashit( NEXA_PLUGIN_DIR ) . '/build/extensions/entrance-animation/index.asset.php' ) ) {
                    $eaDependencies = require_once trailingslashit( NEXA_PLUGIN_DIR ) . '/build/extensions/entrance-animation/index.asset.php';
                    wp_enqueue_script(
                        'nexa-blocks-entrance-animation-script',
                        trailingslashit( NEXA_URL_FILE ) . 'build/extensions/entrance-animation/index.js',
                        $eaDependencies['dependencies'],
                        $eaDependencies['version'],
                        false
                    );
                }
            }
        
        }

        /**
         * Enqueue Admin Assets
         * 
         * @since 1.0.0
         * @return void
         */
        public function admin_enqueue_assets( $screen) {

            if( $screen !== 'toplevel_page_nexa-blocks' ) {
                return;
            }

            if (file_exists(trailingslashit(NEXA_PLUGIN_DIR) . '/build/modules/index.asset.php')) {
                $modulesDependencies = require_once trailingslashit(NEXA_PLUGIN_DIR) . '/build/modules/index.asset.php';

                wp_enqueue_script(
                    'nexa-blocks-modules-script',
                    trailingslashit(NEXA_URL_FILE) . 'build/modules/index.js',
                    $modulesDependencies['dependencies'],
                    $modulesDependencies['version'],
                    false
                );
            }
        }
    }

 }

    new NexaBlocks_Assets(); // Initialize the class.