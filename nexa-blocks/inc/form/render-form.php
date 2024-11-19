<?php

// stop direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Form block

if( ! class_exists( 'Nexa_Form_Block' ) ) {

    /**
     * Nexa Form Block
     * 
     * @since 1.0.0
     */
    class Nexa_Form_Block {

        /**
         * Constructor
         * 
         * @since 1.0.0
         */
        public function __construct() {
            add_filter( 'render_block_nexa/form', [ $this, 'nexa_form_block' ], 10, 2 );
        }

        /**
         * Nexa Form Block
         * 
         * @since 1.0.0
         * @param array $attributes Block attributes.
         * @param string $content Block content.
         * @return string
         */
        public function nexa_form_block( $block_content, $block ) {

            // check if it is nexa/form block 
            if( $block['blockName'] !== 'nexa/form' ) {
                return $block_content;
            }

            // get attributes
            $attributes = $block['attrs'];
            $id         = isset( $attributes['formId'] ) ? $attributes['formId'] : '';
            $form_title = isset( $attributes['formTitle'] ) ? $attributes['formTitle'] : 'Contact Form';
            $mail_to    = isset( $attributes['emailTo'] ) ? $attributes['emailTo'] : get_option( 'admin_email' );
            $subject    = isset( $attributes['emailSubject'] ) ? $attributes['emailSubject'] : 'New Form Submission';
            $emailCC    = isset( $attributes['emailCC'] ) ? $attributes['emailCC'] : '';
            $emailBCC   = isset( $attributes['emailBCC'] ) ? $attributes['emailBCC'] : '';

            // form settings array
            $form_settings = [
                'form_title'      => $form_title,
                'mail_to'         => $mail_to,
                'subject'         => $subject,
                'email_cc'        => $emailCC,
                'email_bcc'       => $emailBCC,
            ];

            // get form
            global $wpdb;
            $table_name = $wpdb->prefix . 'nexa_form';
            $form_id    = $wpdb->get_var( $wpdb->prepare( "SELECT form_id FROM $table_name WHERE form_id = %s", $id ) );

            if( $form_id === NULL ) {
                // insert form in database
                $wpdb->insert( 
                    $table_name,
                    [
                        'form_id'      => $id,
                        'form_settings' => wp_json_encode( $form_settings ),
                        'created_at'   => current_time( 'mysql' ),
                        'form_data'    => '',
                    ]
                ); 

            } else {

                // check if form settings is updated or not
                $form_settings_db = $wpdb->get_var( $wpdb->prepare( "SELECT form_settings FROM $table_name WHERE form_id = %s", $id ) );

                if( $form_settings_db !== wp_json_encode( $form_settings ) ) {
                    $wpdb->update( 
                        $table_name,
                        [
                            'form_settings' => wp_json_encode( $form_settings ),
                        ],
                        [
                            'form_id' => $id,
                        ]
                    );                     
                }
            }

            return $block_content;
            
        }

    }

    new Nexa_Form_Block();

}