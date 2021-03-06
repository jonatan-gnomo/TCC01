<?php
/**
Plugin Name: Admin Theme - Apply
Plugin URI: http://codecanyon.net/user/Flatfull/portfolio
Description: Change Wordpress admin bar, menu, login, footer, icon and colors
Version: 1.0.0
Author: Flatfull.com
Author URI: www.flatfull.com
Text Domain: admin_apply
Domain Path: /languages
*/

class Admin_Theme_Apply {

	function __construct() {
		$this->init();
	}

	function init(){
		
		$dir = dirname(__FILE__);
		require $dir . '/modules/setting/setting.php';
		require $dir . '/modules/nav/nav.php';
		require $dir . '/modules/color/color.php';
		require $dir . '/modules/login/login.php';
		require $dir . '/modules/footer/footer.php';

		$arg = array(
		     'page_title'   => 'Apply Admin Theme'
		    ,'menu_title'	=> 'Apply admin'
		    ,'menu_slug'	=> 'admin-apply'
		    ,'setting_name' => 'wp_admin_theme_apply_option'
			,'plugin_file'  => __FILE__
		);

		$setting = 
		new Admin_Theme_Setting($arg);
		new Admin_Theme_Nav($setting);
		new Admin_Theme_Color($setting);
		new Admin_Theme_Footer($setting);
		new Admin_Theme_Login($setting);

		require $dir . '/modules/demo/demo.php';
		new Admin_Theme_Demo($setting);

	}

}

new Admin_Theme_Apply;
