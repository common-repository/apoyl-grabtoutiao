<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    APOYL_GRABTOUTIAO
 * @subpackage APOYL_GRABTOUTIAO/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class APOYL_GRABTOUTIAO {
	
	protected $loader;
	
	protected $plugin_name;
	
	protected $version;
	
	public function __construct() {
	    
		if ( defined( 'APOYL_GRABTOUTIAO_VERSION' ) ) {
			$this->version = APOYL_GRABTOUTIAO_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'apoyl-grabtoutiao';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
	}
	
	private function load_dependencies() {
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/loader.php';
	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/i18n.php';
	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin.php';
	
		$this->loader = new Apoyl_Grabtoutiao_Loader();
	}
	
	private function set_locale() {
		$plugin_i18n = new Apoyl_Grabtoutiao_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}
	
	private function define_admin_hooks() {
		$plugin_admin = new Apoyl_Grabtoutiao_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action('admin_menu', $plugin_admin, 'menu');
		$this->loader->add_filter('plugin_action_links_'.APOYL_GRABTOUTIAO_PLUGIN_FILE, $plugin_admin, 'links',10, 2);
		$this->loader->add_action('admin_init', $plugin_admin, 'post_editor_meta_box');
		$this->loader->add_action('wp_ajax_apoyl_grabtoutiao_ajax', $plugin_admin,'apoyl_grabtoutiao_ajax');
	}



	public function run() {
		$this->loader->run();
	}
	
	public function get_plugin_name() {
		return $this->plugin_name;
	}
	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}
}
?>