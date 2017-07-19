<?php 
/*
	Plugin Name: WiredLANs Style
	Description: WiredLANs Custom style guide using ACF Pro options.
	Version: 1.0
	Author: Wiredlans
	Text Domain: wiredlans-style
	License URI: http://www.gnu.org/licenses/gpl-2.0.txt
	License: GPL2
*/

if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'Wiredlan_style' ) ) :
	class Wiredlan_style {
		function __construct(){
			// include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			// if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
  //plugin is activated
// }
			if(class_exists('acf')){
				add_action( 'plugins_loaded', array( &$this, 'constants'), 	1);
				add_action( 'plugins_loaded', array( &$this, 'required'), 	2);

			}
			else{
				add_action( 'admin_notices', array( &$this, 'acfpro_missing_notice' ) );
			}
			

		}
		function constants() {
			
				define( 'WIREDLAN_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
				define( 'WIREDLAN_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
				define( 'WIREDLAN_REQUIRED', WIREDLAN_DIR . trailingslashit( 'required' ) );
				
			}
		function required(){
			if ( is_admin() ) {
				 require_once( WIREDLAN_REQUIRED.'functions.php' ); 
			}
			}
		
	
		function acfpro_missing_notice() {
			echo '<div class="error notice is-dismissible"><p>' . sprintf( __( 'Wiredlan Style depends on the Pro version of %s to work!', 'wiredlan-style' ), '<a href="https://www.advancedcustomfields.com/pro/" target="_blank">' . __( 'ACF ', 'wiredlan-style' ) . '</a>' ) . '</p></div>';
			}
		function activation(){
				$style_db_exist = $this->wired_exist_group_pro();
				
				if(!$kul_option){
					
				$this->install_customfield();
				}
				

			}
			
	}
	$kul_maintenance = new Wiredlan_style();
endif;

?>