<?php
/**
 * Create Table on plugin activation
 * 
 * @package Nexa
 * @since 1.0.0
 */

// Prevent direct access
defined( 'ABSPATH' ) || exit;

/**
 * Table Creation Class
 */
class Nexa_Table_Manager {
    /**
     * Table name
     * 
     * @var string
     */
    private $table_name;

    /**
     * Constructor
     * 
     * @since 1.0.0
     */
    public function __construct() {
        // Use a static method to register activation hook
        register_activation_hook( NEXA__FILE__, [ $this, 'maybe_create_table' ] );
        
        // Store the full table name
        $this->table_name = $this->get_table_name();
    }

    /**
     * Get the full table name with WordPress prefix
     * 
     * @return string
     */
    public function get_table_name(): string {
        global $wpdb;
        return $wpdb->prefix . 'nexa_form';
    }

    /**
     * Check and create table if not exists
     * 
     * @since 1.0.0
     * @return void
     */
    public function maybe_create_table() {
        global $wpdb;

        // Check if table already exists
        if ( $this->table_exists() ) {
            return;
        }

        // Create table
        $this->create_table();
    }

    /**
     * Check if table exists
     * 
     * @return bool
     */
    private function table_exists(): bool {
        global $wpdb;
        
        $table_name = $this->table_name;
        return $wpdb->get_var( $wpdb->prepare( 
            'SHOW TABLES LIKE %s', 
            $table_name 
        ) ) === $table_name;
    }

    /**
     * Create table with optimized schema
     * 
     * @return void
     */
    private function create_table() {
        global $wpdb;
    
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $this->table_name;  // Retrieve the table name to use directly in the SQL query
    
        $sql = "
            CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                form_id varchar(100) NOT NULL,
                form_settings longtext NOT NULL,
                form_data longtext NOT NULL,
                created_at datetime DEFAULT '" . current_time('mysql') . "' NOT NULL,
                PRIMARY KEY  (id)
            ) $charset_collate;
        ";
    
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        
        // Attempt to create or update the table
        dbDelta( $sql );
    }
}

// Initialize the table manager
new Nexa_Table_Manager();