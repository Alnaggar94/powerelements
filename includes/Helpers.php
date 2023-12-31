<?php
namespace PowerElements;

if ( ! defined( 'ABSPATH' ) ) exit;

class Helpers {

	private $url;
	private $path;

	function __construct( $path = null, $url = null ) {
		$this->path = $path;
		$this->url = $url;

		add_action('breakdance_loaded', function () {
			\Breakdance\ElementStudio\registerSaveLocation(
				\Breakdance\Util\getDirectoryPathRelativeToPluginFolder( $this->path ) . '/elements',
				'PowerElements',
				'element',
				'Power Elements',
				false
			);
			add_filter('breakdance_element_dependencies', [ $this, 'addDependencies' ], 100);
		}, 9 );

		add_action('breakdance_loaded', function () {
			if( function_exists( 'wpFluentForm' ) ) {
				\Breakdance\AJAX\register_handler(
					'pe_get_fluentforms',
					[ $this, 'getFluentForms' ],
					'edit',
					true
				);
			}

			add_filter( 'display_post_states', [ $this, 'pe_style_post_state' ], 15, 2 );
		});
	}

	/**
	 * Loading element specific dependencies
	 * 
	 * @return array $deps
	 */
	public function addDependencies( $deps ) {
		$offCanvas = 'elements/Off_Canvas/assets/offcanvas.min.js';
		$acrdMenu = 'elements/Accordion_Menu/assets/accordion-menu.min.js';
		$burger = 'elements/AnimatedBurger/assets/animated-burger.min.js';
		$globalJS = 'assets/js/upadans.global.min.js';
		$cfJS = 'elements/Coupon_Form/assets/ue.couponform.min.js';

		$deps[] = [
			"frontendCondition" => "return !!'{{content.panel.position}}';",
			"builderCondition" => "return false;",
			"scripts" => [
				$this->url . $offCanvas . '?ver=' . filemtime($this->path . $offCanvas)
			]
		];

		$deps[] = [
			"frontendCondition" => "return !!'{{content.burger_options.effect}}';",
			"builderCondition" => "return false;",
			"scripts" => [
				$this->url . $burger . '?ver=' . filemtime($this->path . $burger)
			]
		];

		$deps[] = [
			"frontendCondition" => "return !!'{{content.layout.hascouponform}}';",
			"builderCondition" => "return false;",
			"scripts" => [
				$this->url . $cfJS . '?ver=' . filemtime($this->path . $cfJS)
			]
		];

		$deps[] = [
			"frontendCondition" => "return !!'{{content.general.source}}';",
			"builderCondition" => "return !!'{{content.general.source}}';",
			"scripts" => [
				$this->url . $acrdMenu . '?ver=' . filemtime($this->path . $acrdMenu),
				$this->url . $globalJS . '?ver=' . filemtime($this->path . $globalJS)
			]
		];

		return $deps;
	}

	/**
	 * Will check the pages which built with Breakdance
	 *
	 * @return array
	 */
	public function pe_style_post_state ($post_states, $post) {
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
	 * Get all fluent forms
	 * 
	 * @return array $fforms
	 */
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

	public static function pe_rank_math_crumbs_html( $html, $crumbs, $object ) {
		return str_replace( 'class="last"', 'class="last breadcrumb_last"', $html );
	}
}