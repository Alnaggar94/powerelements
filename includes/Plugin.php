<?php
namespace PowerElements;

if ( ! defined( 'ABSPATH' ) ) exit;

class Plugin {
	/**
	 * BricksUltimate instance.
	 *
	 * Holds the plugin instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @static
	 *
	 * @var Plugin
	 */
	public static $instance = null;

    /**
	 * Plugin data from header comments
	 *
	 * @var string
	 */
	private $version = null;

	/**
	 * Project root path
	 *
	 * @var string
	 */
	private $project_root_path = null;

	/**
	 * Project root url
	 *
	 * @var string
	 */
	private $project_root_url = null;

    /**
     * Holds a refference to the plugin data
     *
     * @var array
     */
	public $plugin_data = [];


    /**
     * Holds a refference to the plugin path
     *
     * @var string
     */
	public $plugin_file = null;


    /**
     * Main class constructor
     *
     * @param string $path The plugin path.
     */
    public function __construct( $path, $dir ) {
    	if ( ! defined( '__BREAKDANCE_PLUGIN_FILE__' ) ) return;

        $this->plugin_file       = $path;
        $this->project_root_path = trailingslashit( dirname( $path ) );
        $this->project_root_url  = plugin_dir_url( $path );
        $this->plugin_data       = $this->set_plugin_data( $path );
        $this->version           = $this->plugin_data['Version'];

        self::$instance = $this;

        add_action( 'plugins_loaded', 	[ $this, 'on_plugins_loaded' ] );

        require_once __DIR__ . '/Helpers.php';
        new \PowerElements\Helpers( $this->project_root_path, $this->project_root_url);
    }

    /**
     * Will fire after the plugins are loaded and will initialize this plugin
     *
     * @return void
     */
    public function on_plugins_loaded() {
    	load_plugin_textdomain( 'upadans', false, $this->project_root_path . '/languages' );

    	\Breakdance\Elements\registerCategory('interactive', 'Interactive');
    	if( class_exists('WooCommerce') ) {
    		\Breakdance\Elements\registerCategory('uwoo', 'Interactive Woo');
    	}
    }

    /**
	 * Instance.
	 *
	 * Always load a single instance of the Plugin class
	 *
	 * @access public
	 * @static
	 *
	 * @return Plugin an instance of the class
	 */
	public static function instance() {
		return self::$instance;
	}

	/**
	 * Retrieve the project root path
	 *
	 * @return string
	 */
	public function get_root_path() {
		return $this->project_root_path;
	}

	/**
	 * Retrieve the project root path
	 *
	 * @return string
	 */
	public function get_plugin_file() {
		return $this->plugin_file;
	}


	/**
	 * Retrieve the project root url
	 *
	 * @return string
	 */
	public function get_root_url() {
		return $this->project_root_url;
	}

	/**
	 * Retrieve the project version
	 *
	 * @return string
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Retrieve the project data
	 *
	 * @param mixed $type
	 *
	 * @return string
	 */
	public function get_plugin_data( $type ) {
		if ( isset( $this->plugin_data[$type] ) ) {
			return $this->plugin_data[$type];
		}

		return null;
	}

    /**
	 * Will set the plugin data
	 *
	 * @param string $path
	 *
	 * @return array
	 */
	public function set_plugin_data( $path ) {
		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		return get_plugin_data( $path );
	}

	/**
	 * Is on builder editor
	 * @return true|false
	 */
	public static function isBuilderEditor() {
		return ( isset( $_SERVER['HTTP_REFERER'] ) && strstr( $_SERVER['HTTP_REFERER'], 'breakdance' ) );
	}
}