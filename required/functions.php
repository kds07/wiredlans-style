<?php 

if( function_exists('acf_add_options_page') ) {
$arg=array(
		'page_title' 	=> 'Style Guide',
		'menu_title' 	=> 'Style Guide',
		'menu_slug' 	=> 'wiredlans',
		'capability' 	=> 'edit_posts',
		'icon_url' 		=> 'dashicons-admin-appearance',
		'position' => '87',
		'redirect' 	=> false
	);
	acf_add_options_page($arg);
// acf_add_options_page('Theme Settings');

}
function wired_exist_group_pro(){

global $wpdb;
$page_found=$wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts where post_name='group_596d9b19d75f8'" );
if($page_found>0){
	return true;
}
else{
	// return false;
	install_customfield();
}

}
wired_exist_group_pro();

function install_customfield(){
				require_once( trailingslashit( plugin_dir_path( __FILE__ ) ). 'i_wired_install_pro.php' ); 

}

