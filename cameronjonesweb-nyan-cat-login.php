<?php
/**
 * Plugin Name: Nyan Cat Login
 * Author: Cameron Jones
 * Author URI: https://cameronjonesweb.com.au
 * Description: Customizes the login page with Nyan Cat
 * Plugin URI: https://cameronjonesweb.com.au
 * Version: 1.0.0
 * Text Domain: cameronjonesweb-nyan-cat-login
 *
 * @package cameronjonesweb-nyan-cat-login
 */

add_action( 'init', 'cameronjonesweb_nyan_cat_login_register_scripts' );
add_action( 'login_enqueue_scripts', 'cameronjonesweb_nyan_cat_login_enqueue_scripts' );
add_action( 'plugins_loaded', 'cameronjonesweb_nyan_cat_login_load_text_domain' );
add_action( 'login_footer', 'cameronjonesweb_nyan_cat_login_music' );

add_filter( 'login_headerurl', 'cameronjonesweb_nyan_cat_login_login_headerurl' );
add_filter( 'login_headertitle', 'cameronjonesweb_nyan_cat_login_login_headertitle' );
add_filter( 'login_errors', 'cameronjonesweb_nyan_cat_login_login_errors' );

/**
 * Registers the scripts and styles our plugin will use
 */
function cameronjonesweb_nyan_cat_login_register_scripts() {
	$relative_path = 'css/cameronjonesweb-nyan-cat-login.css';
	wp_register_style( 'cameronjonesweb-nyan-cat-login-css', trailingslashit( plugin_dir_url( __FILE__ ) ) . $relative_path, [], trailingslashit( plugin_dir_path( __FILE__ ) ) . $relative_path );
}

/**
 * Enqueues the scripts and styles for our plugin
 */
function cameronjonesweb_nyan_cat_login_enqueue_scripts() {
	wp_enqueue_style( 'cameronjonesweb-nyan-cat-login-css' );
}

/**
 * Updates the link URL on the login page logo
 *
 * @param string $login_header_url The URL the link goes to.
 * @return string
 */
function cameronjonesweb_nyan_cat_login_login_headerurl( $login_header_url ) {
	$login_header_url = 'https://www.youtube.com/watch?v=QH2-TGUlwu4';
	return $login_header_url;
}

/**
 * Updates the link title on the login page logo
 *
 * @param string $login_header_title The link title.
 * @return string
 */
function cameronjonesweb_nyan_cat_login_login_headertitle( $login_header_title ) {
	$login_header_title = __( 'Nyan Cat!', 'cameronjonesweb-nyan-cat-login' );
	return $login_header_title;
}

/**
 * Updates the login error messages
 *
 * @param string $errors The login error message.
 * @return string
 */
function cameronjonesweb_nyan_cat_login_login_errors( $errors ) {
	$errors = __( 'Nyan!', 'cameronjonesweb-nyan-cat-login' );
	return $errors;
}

/**
 * Loads the plugin translations
 */
function cameronjonesweb_nyan_cat_login_load_text_domain() {
	load_plugin_textdomain( 'cameronjonesweb-nyan-cat-login', false, basename( plugin_dir_path( __FILE__ ) ) . '/languages/' );
}

/**
 * Adds the music to the login page
 */
function cameronjonesweb_nyan_cat_login_music() {
	?>
	<iframe src="<?php echo esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) . 'mp3/nyancatoriginal.mp3' ); ?>" allow="autoplay" id="nyan-player"></iframe> 
	<?php
}
