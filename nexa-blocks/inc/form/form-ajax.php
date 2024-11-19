<?php
/**
 * Form AJAX
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

if( ! class_exists( 'Nexa_Form_Ajax' ) ) {

    class Nexa_Form_Ajax {

        public function __construct() {
            add_action( 'wp_ajax_nexa_form_submit', array( $this, 'nexa_form_submit' ) );
            add_action( 'wp_ajax_nopriv_nexa_form_submit', array( $this, 'nexa_form_submit' ) );
        }

        public function nexa_form_submit() {

            try {

                // Verify nonce for security
                if( !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'nexa_blocks_nonce') ) {
                    wp_send_json_error( array( 'message' => 'Nonce verification failed' ) );
                    return;
                }

                // Get the form data
                $data = isset($_POST['data']) ? $_POST['data'] : array();

                if( empty($data) ) {
                    wp_send_json_error( array( 
                        'message' => 'Form data is empty',
                        'received_data' => $_POST 
                    ));
                    return;
                }

                $form_id = isset($_POST['formId']) ? sanitize_text_field($_POST['formId']) : '';

                if( empty($form_id) ) {
                    wp_send_json_error( array( 
                        'message' => 'Invalid Form Submission - No Form ID',
                        'received_form_id' => $_POST['formId'] ?? null
                    ));
                    return;
                }

                // Sanitize the data
                $sanitized_data = array();
                if (is_array($data)) {
                    foreach ($data as $field_name => $field_data) {
                        if (!isset($field_data['label']) || !isset($field_data['value'])) {
                            wp_send_json_error(array(
                                'message' => 'Invalid field data structure',
                                'field_name' => $field_name,
                                'field_data' => $field_data
                            ));
                            return;
                        }

                        // Sanitize based on field name
                        switch ($field_name) {
                            case 'email':
                                $sanitized_data[$field_name] = array(
                                    'label' => sanitize_text_field($field_data['label']),
                                    'value' => sanitize_email($field_data['value'])
                                );
                                break;
                            case 'message':
                                $sanitized_data[$field_name] = array(
                                    'label' => sanitize_text_field($field_data['label']),
                                    'value' => sanitize_textarea_field($field_data['value'])
                                );
                                break;
                            default:
                                $sanitized_data[$field_name] = array(
                                    'label' => sanitize_text_field($field_data['label']),
                                    'value' => sanitize_text_field($field_data['value'])
                                );
                                break;
                        }
                    }
                }

                // Prepare DB data
                $db_data = array();
                foreach ($sanitized_data as $field) {
                    $db_data[$field['label']] = $field['value'];
                }

                // Database insertion
                global $wpdb;
                $table_name = $wpdb->prefix . 'nexa_form';
                
                // Check if table exists
                $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");

                if (!$table_exists) {
                    wp_send_json_error(array(
                        'message' => 'Database table does not exist',
                        'table_name' => $table_name
                    ));
                    return;
                }

                // get form settings form database 
                $form_settings = $wpdb->get_var( $wpdb->prepare( "SELECT form_settings FROM $table_name WHERE form_id = %s", $form_id ) );

                if( $form_settings === NULL ) {
                    wp_send_json_error( array( 
                        'message' => 'Invalid Form Submission',
                        'received_form_id' => $form_id
                    ));
                    return;
                }

                $form_settings = json_decode( $form_settings, true );
                $form_title = isset( $form_settings['form_title'] ) ? sanitize_text_field($form_settings['form_title']) : 'Contact Form';
                $mail_to    = isset( $form_settings['mail_to'] ) ? sanitize_email($form_settings['mail_to']) : get_option( 'admin_email' );
                $subject    = isset( $form_settings['subject'] ) ? sanitize_text_field($form_settings['subject']) : 'New Form Submission';
                $emailCC    = isset( $form_settings['email_cc'] ) ? sanitize_email($form_settings['email_cc']) : '';
                $emailBCC   = isset( $form_settings['email_bcc'] ) ? sanitize_email($form_settings['email_bcc']) : ''; 

                $form_data = wp_json_encode($db_data);
                
                // Insert data
                $insert_result = $wpdb->insert(
                    $table_name,
                    array(
                        'form_id' => $form_id,
                        'form_data' => $form_data,
                        'form_settings' => wp_json_encode($form_settings),
                        'created_at' => current_time('mysql')
                    ),
                    array(
                        '%s',
                        '%s',
                        '%s',
                        '%s'
                    )
                );

                if ($insert_result === false) {
                    wp_send_json_error(array(
                        'message' => 'Database insertion failed',
                        'db_error' => $wpdb->last_error,
                        'data_attempted' => array(
                            'form_id' => $form_id,
                            'form_data' => $form_data
                        )
                    ));
                    return;
                }


                // Build email message
                $message = '';
                foreach ($sanitized_data as $field) {
                    $message .= '<strong>' . $field['label'] . ':</strong> ' . $field['value'] . '<br>';
                }

                // build email structure with headers ( subject, from, cc, bcc) 
                $headers = [];
                $headers[] = 'Content-Type: text/html; charset=UTF-8';
            
                if( !empty($emailCC) ) {
                    $headers[] = 'Cc: ' . $emailCC;
                }
                if( !empty($emailBCC) ) {
                    $headers[] = 'Bcc: ' . $emailBCC;
                }

                // Send email
                $email_sent = wp_mail($mail_to, $subject, $message, $headers);

                if (!$email_sent) {
                    wp_send_json_error(array(
                        'message'       => 'Email sending failed',
                        'email_error'   => error_get_last(),
                        'email_headers' => $headers,
                        'email_to'      => $mail_to,
                        'email_subject' => $subject,
                        'email_message' => $message
                    ));
                    return;
                } 

                wp_send_json_success(array(
                    'status' => 'success',
                    'data'   => $message,
                    'mail_status' => $email_sent
                ));

            } catch (Exception $e) {
                wp_send_json_error(array(
                    'message' => 'Server error occurred',
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ));
            }
        }
    }

    new Nexa_Form_Ajax();
}