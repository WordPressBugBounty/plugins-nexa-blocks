<?php
/**
 * Nexa Templates 
 * 
 * @since 1.0.4
 */

 if ( ! defined( 'ABSPATH' ) ) {
 	exit; // Exit if accessed directly.
 }

 if( ! class_exists( 'Nexa_Templates_Library' ) ) {

    class Nexa_Templates_Library {
        
        /**
         * Constructor
         */
        public function __construct() {
            $this->init_hooks();
        }

        /**
         * Initialize Hooks
         */
        public function init_hooks() {
            add_action( 'rest_api_init', array( $this, 'register_template_route' ) );
            add_action( 'init', array( $this, 'nexa_templates' ) );

            // assets 
            add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_assets' ), 2 );

            // import demo 
            add_action( 'wp_ajax_import_nexa_demo', array( $this, 'import_demo' ) ); //nexa_import_demo
            add_action( 'wp_ajax_nopriv_import_nexa_demo', array( $this, 'import_demo' ) ); //nexa_import_demo 

            // sync templates
            add_action( 'wp_ajax_sync_nexa_data', array( $this, 'sync_data' ) ); //nexa_import_demo
            add_action( 'wp_ajax_nopriv_sync_nexa_data', array( $this, 'sync_data' ) ); //nexa_import_demo 

        }

        /**
         * Register Template Route
         * 
         * @return void
         * 
         * @since 1.0.4
         */
        public function register_template_route() {
            register_rest_route( 'nexa/v1', '/templates', array(
                'methods' => 'GET',
                'callback' => array( $this, 'get_templates' ),
                'permission_callback' => '__return_true'
            ) );

            // favorites 
            register_rest_route( 'nexa/v1', '/favorites', 
                [
                    'methods'  => ['GET', 'POST'],
                    'callback' => [$this, 'handle_favorites_settings'],
                    'permission_callback' => function () {
                        return current_user_can('manage_options');
                    },
                ]
            );

            add_filter('rest_pre_serve_request', function ($value) {
                header("Access-Control-Allow-Origin: *");
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
                header("Access-Control-Allow-Headers: Content-Type, Authorization");
                return $value;
            });
        }

        /**
         * Get Templates
         * 
         * @return WP_REST_Response
         * 
         * @since 1.0.4
         */
        public function get_templates() {

            $templates = get_transient( 'nexa_templates' ); // Get templates from transient

            if( false === $templates ) {
                $templates = $this->nexa_templates(); // Get templates from API
            }

            return rest_ensure_response( $templates );

        }

        // handle favorites
        public function handle_favorites_settings($request) {
            if ($request->get_method() === 'GET') {
                return $this->get_favorites();
            } else {
                return $this->update_favorites($request);
            }
        }

        /**
         * Get Favorites
         * 
         * @return WP_REST_Response
         */
        public function get_favorites() {
            return get_option('nexa_favorites', []);
        }

        /**
         * Updates the favorites list.
         *
         * This method is responsible for updating the favorites list.
         * It is a static method that can be called without instantiating the class.
         *
         * @param WP_REST_Request $request The request object.
         * @return array The updated favorites list.
         */
        public function update_favorites($request) {
            $nonce = $request->get_param('nexa_nonce');

            if (! wp_verify_nonce($nonce, 'nexa_blocks_nonce')) {
                return new WP_Error('invalid_request', __('Invalid request.', 'nexa-blocks'), array('status' => 400));
            }

            $fav_id = $request->get_param('fav_id') ? intval($request->get_param('fav_id')) : '';

            // Fetch existing blocks
            $fav_items = get_option('nexa_favorites', []);

            // if fav_id is not empty then add to favorite list else remove from favorite list
            if (!empty($fav_id)) {

                // check if it is already in favorite list or not
                $fav_exists = false;
                foreach ($fav_items as $fav_item) {
                    if ($fav_item === $fav_id) {
                        $fav_exists = true;
                        break;
                    }
                }

                // if not exists then add to favorite list else remove from favorite list
                if (!$fav_exists) {
                    $fav_items[] = $fav_id;
                } else {
                    $key = array_search($fav_id, $fav_items);
                    if ($key !== false) {
                        unset($fav_items[$key]);
                    }
                }
            } else {
                return new WP_Error('invalid_request', __('Invalid favorite id provided.', 'nexa-blocks'), array('status' => 400));
            }

            // Update the option
            update_option('nexa_favorites', $fav_items);

            return rest_ensure_response($fav_items);
        }

        /**
         * Templates Transient 
         */
        public function nexa_templates() {
            $templates = get_transient( 'nexa_templates' );

            if( false === $templates ) {

                $templates = wp_remote_get( 'https://lib.nexablocks.com/templates/wp-json/nexa/v1/demos' );

                if( is_wp_error( $templates ) ) {
                    return;
                }

                $templates = wp_remote_retrieve_body( $templates );

                $templates = json_decode( $templates );


                // set transient for 24 hours
                set_transient( 'nexa_templates', $templates, 24 * HOUR_IN_SECONDS ); 
            }

            return $templates;

        }

        /**
         * Enqueue Assets
         */
        public function enqueue_assets() {
            $d_file = trailingslashit( NEXA_PLUGIN_DIR ) . 'build/templates/index.asset.php';

            if( file_exists( $d_file ) ) {
                $d_asset = require_once $d_file;

                wp_enqueue_script(
                    'nexa-templates-script',
                    trailingslashit( NEXA_URL_FILE ) . 'build/templates/index.js',
                    $d_asset['dependencies'],
                    $d_asset['version'],
                    false
                );

                wp_enqueue_style(
                    'nexa-templates-style',
                    trailingslashit( NEXA_URL_FILE ) . 'build/templates/index.css',
                    [],
                    $d_asset['version'],
                    'all'
                ); 
            } 
        }


        /**
         * Import Demo
         */
        public function import_demo() {
            // check nonce 
            if( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'nexa_blocks_nonce' ) ) {
                wp_send_json_error( 'Invalid Nonce' );
            }
        
            $file_path = isset( $_POST['demo_json_file'] ) ? sanitize_text_field( $_POST['demo_json_file'] ) : '';

            if( empty( $file_path ) ) {
                wp_send_json_error( 'Invalid Data' );
            }

            $response = wp_remote_get( $file_path );

            if( is_wp_error( $response ) ) {
                wp_send_json_error( 'Invalid Data' );
            } 

            $body = wp_remote_retrieve_body( $response );
            $data = json_decode( $body, true );

            $content = $data['content'] ?? '';


            if( empty( $content ) ) {
                wp_send_json_error( 'Invalid Data' );
            } 

            // Define separate patterns
            $img_pattern = '/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i';
            $bg_pattern = '/background-image\s*:\s*url\((["\']?)([^"\')]+)\1\)/i';

            // Find matches for img src
            preg_match_all($img_pattern, $content, $img_matches);
            $img_srcs = $img_matches[1];

            // Find matches for background-image
            preg_match_all($bg_pattern, $content, $bg_matches);
            $bg_srcs = $bg_matches[2];

            // remove \\u0022 from all $bg_srcs
            if (!empty($bg_srcs)) {
                $bg_srcs = array_map(function ($src) {
                    return str_replace('\\u0022', '', $src);
                }, $bg_srcs);
            }

            // Combine all matches, filter out empty ones
            $all_img_srcs = array_filter(array_merge($img_srcs, $bg_srcs));

            if (!empty($all_img_srcs)) {
                foreach ($all_img_srcs as $img_src) {
                    $response = wp_remote_get($img_src);
                    if (!is_wp_error($response)) {
                        $body = wp_remote_retrieve_body($response);
                        $filename = basename($img_src);

                        // Use WordPress functions to handle file uploads
                        $upload = wp_upload_bits($filename, null, $body);

                        // add image to media library
                        if (!$upload['error'] && file_exists($upload['file'])) {
                            $wp_filetype = wp_check_filetype($filename, null);
                            $attachment = array(
                                'post_mime_type' => $wp_filetype['type'],
                                'post_title'     => sanitize_file_name($filename),
                                'post_content'   => '',
                                'post_status'    => 'inherit'
                            );
                            $attach_id = wp_insert_attachment($attachment, $upload['file']);
                            require_once(ABSPATH . 'wp-admin/includes/image.php');
                            $attach_data = wp_generate_attachment_metadata($attach_id, $upload['file']);
                            wp_update_attachment_metadata($attach_id, $attach_data);
                        } 

                        if (!$upload['error'] && file_exists($upload['file'])) {
                            // Replace the image URL in the content
                            $content = str_replace($img_src, $upload['url'], $content);
                        }
                    }
                }
            }

            // Process your JSON data here
            wp_send_json_success([
                'status'   => 'success',
                'message'  => __('Pattern imported successfully!', 'zoloblocks'),
                'content'  => $content,
                'img_srcs' => $img_srcs,
                'bg_srcs'  => $bg_srcs,
            ]);
        }

        /**
         * Sync Data
         */
        public function sync_data() {
            // check nonce 
            if( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'nexa_blocks_nonce' ) ) {
                wp_send_json_error( 'Invalid Nonce' );
            }

            // clear transient
            delete_transient( 'nexa_templates' ); 

            // get templates
            $templates = $this->nexa_templates();

            wp_send_json_success( $templates );

        }

    }

    new Nexa_Templates_Library(); // Initialize the loader class.
 }