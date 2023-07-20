<?php
namespace Upadans;

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
        add_action('breakdance_loaded', function () {
		\Breakdance\ElementStudio\registerSaveLocation(
			\Breakdance\Util\getDirectoryPathRelativeToPluginFolder( dirname( $this->plugin_file ) ) . '/elements',
			'Upadans',
			'element',
			'Upadans',
			true
		);

		add_filter('breakdance_element_dependencies', [ $this, 'addDependencies' ], 100, 1);
	}, 9 );

        if( function_exists( 'wpFluentForm' ) ) {
		add_action('breakdance_loaded', function () {
			\Breakdance\AJAX\register_handler(
				'ue_get_fluentforms',
				[ $this, 'getFluentForms' ],
				'edit',
				true
			);
		});
	}
    }

	public function ue_style_post_state ($post_states, $post) {
		if( isset( $post_states['breakdance'] ) ) {
			if( current_user_can( 'edit_posts', $post->ID ) ) {
				$edit_link = get_permalink($post->ID) . '?breakdance=builder&id=' . $post->ID;
				$post_states['breakdance'] = '<a href="' . $edit_link . '" rel="nofollow ugc" style="background-color:#fcd568; padding: 2px 6px 4px;color:#444">' . $post_states['breakdance'] . '</a>';
			} else {
				$post_states['breakdance'] = '<span style="background-color:#fcd568; padding: 4px 6px">' . $post_states['breakdance'] . '</span>';
			}
		}

		return $post_states;
	}

    /**
     * Will fire after the plugins are loaded and will initialize this plugin
     *
     * @return void
     */
    public function on_plugins_loaded() {
    	load_plugin_textdomain( 'upadans', false, $this->project_root_path . '/languages' );

    	\Breakdance\Elements\registerCategory('interactive', 'Interactive');

    	add_filter( 'display_post_states', [ $this, 'ue_style_post_state' ], 15, 2 );
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

	public function addDependencies( $deps ) {

    	$condition = "return !!'{{content.panel.position}}';";

		$deps[] = [
			"frontendCondition" => $condition,
			"builderCondition" => "return false;",
			"scripts" => [
				$this->project_root_url . 'elements/Off_Canvas/assets/offcanvas.min.js?ver=' . time()
			]
		];

		$condition = "return !!'{{content.burger_options.effect}}';";

		$deps[] = [
			"frontendCondition" => $condition,
			"builderCondition" => "return false;",
			"scripts" => [
				$this->project_root_url . 'elements/AnimatedBurger/assets/animated-burger.min.js?ver=' . time()
			]
		];

    	return $deps;

    }

    public function getFluentForms() {
    	if( ! function_exists( 'wpFluentForm' ) )
    		return [];
    	
		$ff_list = \FluentForm\App\Models\Form::select(['id', 'title'])->orderBy('id', 'DESC')->get();
		if( $ff_list ) {
			$fforms[]= [ 'value' => 'none', 'text' => esc_html__('Select a Fluent Forms', 'fluentform')];
			foreach ($ff_list as $form) {
				$fforms[] = [ 'value' => "{$form->id}", 'text' => esc_html($form->title) . ' (' . $form->id . ')' ];
			}
		}  else {
			$fforms[]= [ 'value' => 'none', 'text' => esc_html__('Create a Form First', 'fluentform')];
		}

		return $fforms;
    }

	public static function ue_rank_math_crumbs_html( $html, $crumbs, $object ) {
		return str_replace( 'class="last"', 'class="last breadcrumb_last"', $html );
	}
}
