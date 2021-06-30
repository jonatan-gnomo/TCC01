<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class Edumax_Theme_License{

	private $api_end_point;
	private $theme_name;
	private $theme_version;

	public static function init() {
		return new self();
	}

	public function __construct() {
		$theme = wp_get_theme();
		$this->theme_name = strtolower($theme->get('Name'));
		$this->theme_version = $theme->get("Version");

	    $this->api_end_point = 'https://www.themeum.com/wp-json/themeum-license/v1/';

		add_action( 'admin_enqueue_scripts', array($this, 'license_page_asset_enquee') );
		add_action('admin_menu', array($this, 'add_license_page'), 20);
		add_action('admin_init', array($this, 'check_license_key'));

		add_filter( 'pre_set_site_transient_update_themes', array( $this, 'check_for_update' ) );
	}

	public function license_page_asset_enquee(){
		wp_enqueue_style('edumax-license-handler', EDUMAX_URI.'lib/license/license.css');
	}

	public function add_license_page(){
		global $submenu;
		add_submenu_page('edumax-options','License', 'License', 'manage_options', 'edumax-theme-license', array($this, 'license_form'));
		$submenu['edumax-options'][] = array( 'Edumax Docs', 'manage_options' , 'https://docs.themeum.com/themes/edumax/');
		// $submenu['edumax-options'][] = array( 'Edumax Support Forum', 'manage_options' , 'https://www.themeum.com/forums/forum/edumax/');
	}

	public function check_license_key(){
		if ( ! empty($_POST['thm_check_license_code'])){
			if ( ! check_admin_referer('thm_license_nonce')){
				return;
			}

			$blog = esc_url( home_url() );
			$key  = sanitize_text_field($_POST['edumax_blog_license_key']);
			$unique_id = $_SERVER['REMOTE_ADDR'];

			$api_call = wp_remote_post( $this->api_end_point.'validator',
				array(
					'body'          => array(
						'blog_url'      => $blog,
						'license_key'   => $key,
						'action'        => 'check_license_key_api',
						'blog_ip'       => $unique_id,
						'request_from'  => 'plugin_license_page',
					),
				)
			);

			if ( is_wp_error( $api_call ) ) {
				//$error_message = $api_call->get_error_message();
				//echo "Something went wrong: $error_message";
			} else {
				$response_body = $api_call['body'];
				$response = json_decode($response_body);


				$response_msg = '';
				if ( ! empty($response->data->msg)){
					$response_msg = $response->data->msg;
				}
				if ($response->success){
					//Verified License
					$license_info = array(
						'activated'     => true,
						'license_key'   => $key,
						'license_to'    => $response->data->license_info->customer_name,
						'expires_at'    => $response->data->license_info->expires_at,
						'activated_at'  => $response->data->license_info->activated_at,
						'msg'  => $response_msg,
					);

					$license_info_serialize = serialize($license_info);
					update_option($this->theme_name.'_license_info', $license_info);
				}else{
					//License is invalid
					$license_info = array(
						'activated'     => false,
						'license_key'   => $key,
						'license_to'    => '',
						'expires_at'    => '',
						'msg'  => $response_msg,
					);

					$license_info_serialize = serialize($license_info);
					update_option($this->theme_name.'_license_info', $license_info);
				}

			}

		}
	}

	public function license_form(){
		?>

		<?php
		$license_key = '';
		$license_to = '';
		$license_activated = false;
		$license_info = (object) get_option($this->theme_name.'_license_info');
		if(! empty($license_info->license_key)){
			$license_key = $license_info->license_key;
		}
		if ( ! empty($license_info->license_to)){
			$license_to = $license_info->license_to;
		}
		if ( ! empty($license_info->activated)){
			$license_activated = $license_info->activated;
		}
		?>

		<div class="thm-license-head">
			<div class="thm-license-head__inside-container">
				<div class="thm-license-head__logo-container">
					<a href="https://themeum.com/?utm_source=plugin_license&utm_medium=top_menu_link&utm_campaign=activation_license" target="_blank">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							viewBox="0 0 313.2 58.5" style="enable-background:new 0 0 313.2 58.5;" xml:space="preserve">
						<style type="text/css">
							.st0{fill:#212127;}
						</style>
						<g>
							<path class="st0" d="M58.5,34.6L58.5,34.6h-5.8h-2.4H45h-0.1l0,7.7l0,3.1v1.1c0,2.8,2.3,5.1,5.1,5.1h1.7v0l6.8,0"/>
							<path class="st0" d="M0,0v58.5h46.8c-4.9,0-9-4-9-9l0-1.8V28.4h0V13.7l7.1,7.9v6.9H45h7.7h0.2h0.1l5.6,6.2V0H0z M32.2,36.3
								L32.2,36.3L32.2,36.3L32.2,36.3z M25.7,34.6l-5.6-6.2h8.7l0,0l5.6,6.2H25.7z"/>
						</g>
						<g>
							<path class="st0" d="M85,28.9v-5.7h5.3v-9.7l6.5,4.2v5.5h7.1v5.7h-7.1v11.9c-0.1,1.1,0.2,2.1,0.7,3.1c0.7,0.9,1.8,1.3,2.9,1.2
								c0.6,0,1.3-0.1,1.9-0.2c0.6-0.1,1.1-0.3,1.6-0.6v5.5c-0.8,0.4-1.6,0.6-2.5,0.7c-0.9,0.1-1.7,0.2-2.6,0.2c-1.4,0-2.9-0.1-4.2-0.5
								c-1-0.3-1.9-0.9-2.6-1.7c-0.7-0.9-1.1-1.9-1.3-2.9c-0.3-1.3-0.4-2.6-0.4-4V28.9H85z"/>
							<path class="st0" d="M114.8,27.7L114.8,27.7c0.6-1.2,1.5-2.2,2.7-2.9c1.5-1,3.2-1.6,5-1.5c1.5,0,3,0.3,4.4,0.9
								c1.1,0.5,2.1,1.3,3,2.3c0.7,1,1.3,2.1,1.6,3.2c0.3,1.2,0.5,2.4,0.5,3.6v16.9h-6.5V36.8c0-0.7,0-1.5,0-2.4c-0.1-0.9-0.3-1.7-0.6-2.5
								c-0.3-0.8-0.8-1.4-1.4-1.9c-0.8-0.6-1.7-0.9-2.6-0.8c-0.9,0-1.9,0.2-2.7,0.5c-0.7,0.3-1.3,0.8-1.8,1.5c-0.5,0.6-0.9,1.3-1.1,2.1
								c-0.2,0.8-0.3,1.6-0.3,2.5v14.6h-6.6V8l6.5,4.1V27.7z"/>
							<path class="st0" d="M142.9,39.2c0.1,1.8,1,3.4,2.3,4.5c1.3,1.1,2.9,1.6,4.6,1.6c1.4,0.1,2.8-0.3,4.1-1c1.1-0.7,2.1-1.5,2.9-2.5
								l4.6,3.6c-1.3,1.7-3,3-5,3.9c-1.9,0.8-3.9,1.2-5.9,1.2c-1.9,0-3.7-0.3-5.5-0.9c-1.7-0.6-3.2-1.6-4.5-2.8c-1.3-1.2-2.3-2.7-3-4.3
								c-0.7-1.8-1.1-3.7-1.1-5.6c0-1.9,0.3-3.8,1.1-5.6c0.7-1.6,1.7-3.1,3-4.3c1.3-1.2,2.8-2.2,4.5-2.8c1.8-0.6,3.6-1,5.5-0.9
								c1.7,0,3.4,0.3,4.9,0.9c1.5,0.6,2.8,1.6,3.9,2.7c1.1,1.3,1.9,2.8,2.5,4.4c0.6,1.9,0.9,4,0.9,6v1.8L142.9,39.2z M156.2,34.3
								c0.1-1.7-0.6-3.3-1.7-4.5c-1.3-1.1-2.9-1.7-4.6-1.6c-1.7-0.1-3.4,0.5-4.6,1.7c-1.2,1.2-1.9,2.8-2.1,4.4H156.2z"/>
							<path class="st0" d="M219.4,39.2c0.1,1.7,0.9,3.4,2.3,4.5c1.3,1.1,3,1.7,4.7,1.6c1.4,0.1,2.8-0.3,4.1-1c1.1-0.7,2.1-1.5,2.9-2.5
								l4.7,3.6c-1.4,1.7-3.1,3-5.1,3.9c-1.9,0.8-3.9,1.2-5.9,1.2c-1.9,0-3.7-0.3-5.5-0.9c-3.4-1.2-6.1-3.8-7.5-7
								c-0.7-1.8-1.1-3.7-1.1-5.6c0-1.9,0.3-3.8,1.1-5.6c1.4-3.3,4.1-5.8,7.5-7c1.8-0.6,3.6-1,5.5-0.9c1.7,0,3.4,0.3,5,0.9
								c1.5,0.6,2.8,1.6,3.8,2.7c1.1,1.3,2,2.8,2.5,4.4c0.6,1.9,0.9,4,0.9,6v1.8H219.4z M232.7,34.3c0-1.7-0.6-3.3-1.8-4.5
								c-1.3-1.2-3.1-1.7-4.8-1.6c-1.7-0.1-3.4,0.5-4.6,1.7c-1.2,1.2-1.9,2.8-2.1,4.4H232.7z"/>
							<path class="st0" d="M267.4,49.8h-6.1v-4.2l0,0c-0.7,1.3-1.6,2.5-2.8,3.4c-1.5,1-3.3,1.5-5.1,1.4c-1.5,0-3-0.2-4.4-0.8
								c-1.2-0.5-2.2-1.3-3-2.3c-0.8-0.9-1.3-2.1-1.6-3.2c-0.3-1.2-0.5-2.4-0.5-3.6V23.2l6.5,4.2v9.5c0,0.7,0,1.5,0,2.4
								c0.1,0.8,0.2,1.7,0.5,2.5c0.3,0.7,0.8,1.4,1.4,1.9c0.8,0.6,1.7,0.9,2.7,0.8c0.9,0,1.9-0.2,2.7-0.5c0.7-0.3,1.3-0.8,1.8-1.5
								c0.5-0.6,0.8-1.3,1.1-2.1c0.2-0.8,0.3-1.6,0.3-2.5V23.2l6.5,4.1L267.4,49.8z"/>
							<path class="st0" d="M207.4,30.7c-0.1-0.4-0.2-0.9-0.4-1.3l0,0c-1.2-3.5-4.4-6-8.6-5.9c-3.6,0-6.8,2.1-8.4,5.1c-1.5-3-4.6-5-8.1-5
								c-3.4,0-6.4,1.9-8,4.7V24l-6.2-3.8v30.1h6.5V36.2c0-0.2,0-0.5,0-0.7l0,0.1c0-0.2,0-0.3,0-0.5c0-0.4,0.1-0.7,0.2-1.1
								c0.6-2.4,2.6-4.1,5-4.1c2.8,0,5.1,2.4,5.1,5.5v15.1h6.6v-14c0-0.8,0.1-1.7,0.3-2.5c0.2-0.8,0.5-1.5,1-2.2c0.4-0.5,0.8-1,1.4-1.3
								c0.7-0.4,1.5-0.6,2.4-0.6c2.8,0,5.1,2.5,5.2,5.6c0,0.1,0,0.2,0,0.3v14.6h6.5V35C207.9,33.5,207.7,32.1,207.4,30.7z"/>
							<path class="st0" d="M312.7,30.7c-0.1-0.4-0.2-0.9-0.4-1.3l0,0c-1.2-3.5-4.4-6-8.6-5.9c-3.6,0-6.8,2.1-8.4,5.1c-1.5-3-4.6-5-8.1-5
								c-3.4,0-6.4,1.9-8,4.7V24l-6.2-3.8v30.1h6.5V36.2c0-0.2,0-0.5,0-0.7l0,0.1c0-0.2,0-0.3,0-0.5c0-0.4,0.1-0.7,0.2-1.1
								c0.6-2.4,2.6-4.1,5-4.1c2.8,0,5.1,2.4,5.1,5.5v15.1h6.6v-14c0-0.8,0.1-1.7,0.3-2.5c0.2-0.8,0.5-1.5,1-2.2c0.4-0.5,0.8-1,1.4-1.3
								c0.7-0.4,1.5-0.6,2.4-0.6c2.8,0,5.1,2.5,5.2,5.6c0,0.1,0,0.2,0,0.3v14.6h6.5V35C313.2,33.5,313.1,32.1,312.7,30.7z"/>
						</g>
						</svg>
					</a>
				</div>

				<div class="thm-license-head__menu-container">
					<ul>
						<li><a href="https://www.themeum.com/?utm_source=plugin_license&utm_medium=top_menu_link&utm_campaign=activation_license" target="_blank">Home</a></li>
						<li> <a href="https://www.themeum.com/wordpress-themes/?utm_source=plugin_license&utm_medium=top_menu_link&utm_campaign=activation_license" target="_blank"> Themes</a></li>
						<li> <a href="https://www.themeum.com/wordpress-plugins/?utm_source=plugin_license&utm_medium=top_menu_link&utm_campaign=activation_license" target="_blank"> Plugins</a></li>
						<li>
							<a href="#">Support</a>
							<ul class="sub-menu">
								<li><a href="https://www.themeum.com/support/?utm_source=plugin_license&utm_medium=top_menu_link&utm_campaign=activation_license" target="_blank">Support Forum</a></li>
								<li><a href="https://www.themeum.com/about-us/?utm_source=plugin_license&utm_medium=top_menu_link&utm_campaign=activation_license" target="_blank">About us</a></li>
								<li><a href="https://www.themeum.com/docs/?utm_source=plugin_license&utm_medium=top_menu_link&utm_campaign=activation_license" target="_blank">Documentation</a></li>
								<li><a href="https://www.themeum.com/contact-us/?utm_source=plugin_license&utm_medium=top_menu_link&utm_campaign=activation_license" target="_blank">Contact Us</a></li>
								<li><a href="https://www.themeum.com/faq/?utm_source=plugin_license&utm_medium=top_menu_link&utm_campaign=activation_license" target="_blank">FAQ</a></li>
							</ul>
						</li>
						<li><a href="https://www.themeum.com/blog/?utm_source=plugin_license&utm_medium=top_menu_link&utm_campaign=activation_license" target="_blank">Blog</a></li>
					</ul>
				</div>

			</div>
		</div>

		<div class="themeum-lower">
			<div class="themeum-box themeum-box-<?php echo esc_html($license_activated) ? 'success':'error'; ?>">
				<?php if ($license_activated){
					?>
					<h3> <i class="dashicons-before dashicons-thumbs-up"></i> Your license is connected with Themeum.com</h3>
					<p><i class="dashicons-before dashicons-tickets-alt"></i> Licensed To : <?php echo esc_html($license_to); ?> </p>
					<?php
				}else{
					?>
					<h3> <i class="dashicons-before dashicons-warning"></i> Valid license required</h3>
					<p><i class="dashicons-before dashicons-tickets-alt"></i> A valid license is required to unlock available features </p>
					<?php
				}

				if ( ! empty($license_info->msg)){
					echo "<p> <i class='dashicons-before dashicons-admin-comments'></i> {$license_info->msg}</p>";
				}
				?>
			</div>


			<div class="themeum-boxes">
				<div class="themeum-box">
					<h3>Power Up your Theme and Get automatic Update</h3>
					<div class="themeum-right">
						<a href="https://themeum.com" class="themeum-button themeum-is-primary" target="_blank"> Get License Key</a>
					</div>
					<p> Please enter your license key. An active license key is needed for automatic theme updates and <a href="https://www.themeum.com/support/" target="_blank">support</a>.</p>
				</div>
				<div class="themeum-box">
					<h3>Enter License Key</h3>
					<p>Already have your key? Enter it here. </p>
					<form action="" method="post">
						<?php wp_nonce_field('thm_license_nonce'); ?>
						<input type="hidden" name="thm_check_license_code" value="checking" />
						<p style="width: 100%; display: flex; flex-wrap: nowrap; box-sizing: border-box;">
							<input id="edumax_blog_license_key" name="edumax_blog_license_key" size="15" value="" class="regular-text code" style="flex-grow: 1; margin-right: 1rem;" type="text" placeholder="Enter your license key here" />

							<input name="submit" id="submit" class="themeum-button" value="Connect with License key" type="submit">
						</p>
					</form>
				</div>
			</div>
		</div>

		<?php
	}

	/**
	 * @return array|bool|mixed|object
     *
     * Get update information
	 */
	public function check_for_update_api($request_from = ''){
		// Plugin update
		$license_info = (object) get_option($this->theme_name.'_license_info');
		if (empty($license_info->activated) || ! $license_info->activated || empty($license_info->license_key) ){
			return false;
		}

		$params = array(
			'body' => array(
				'action'       => 'check_update_by_license',
				'license_key'  => $license_info->license_key,
				'product_slug'  => $this->theme_name,
				'request_from'  => $request_from,
			),
		);

		// Make the POST request
		$request = wp_remote_post($this->api_end_point.'check-update', $params );

		$request_body = false;
		// Check if response is valid
		if ( !is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) === 200 ) {
			$request_body = json_decode($request['body']);

			if ( !$request_body->success){
				$license_info = (array) $license_info;
				$license_info['activated'] = 0;
				update_option($this->theme_name.'_license_info', $license_info);
			}
		}

		return $request_body;
    }

	/**
	 * @param $transient
	 *
	 * @return mixed
	 */
	public function check_for_update($transient){
		if( empty( $transient->checked[$this->theme_name] ) ){
			return $transient;
		}

		$request_body = $this->check_for_update_api('update_check');

		if ($request_body && $request_body->success){
			if ( version_compare( $this->theme_version, $request_body->data->version, '<' ) ) {
				$transient->response[$this->theme_name] = array(
					'new_version'   => $request_body->data->version,
					'package'       => $request_body->data->download_url,
					'url'       => $request_body->data->url,
				);

			}
        }
		return $transient;
	}

}


Edumax_Theme_License::init();
