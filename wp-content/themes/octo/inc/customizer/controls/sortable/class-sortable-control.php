<?php
/**
 * Sortable_Control class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\controls\sortable;

use WP_Customize_Control;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class creates a jQuery sortable control.
 * With this control, you can change the order of a specific item set and also the visibilty of every single item.
 *
 * @since 1.0.0
 */
class Sortable_Control extends WP_Customize_Control {

	/**
	 * Type.
	 *
	 * @var string
	 */
	public $type = 'octo-sortable';

	/**
	 * Enqueue scripts/styles for the range slider.
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {
		wp_enqueue_script( 'octo-sortable-control', get_template_directory_uri() . '/inc/customizer/controls/sortable/sortable-control.js', array( 'jquery', 'customize-base', 'jquery-ui-core', 'jquery-ui-sortable' ), THEME_VERSION, true );
		wp_enqueue_style( 'octo-sortable-control', get_template_directory_uri() . '/inc/customizer/controls/sortable/sortable-control.css', array(), THEME_VERSION, 'all' );

	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 1.0.0
	 * @uses WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}
		$this->json['value']   = maybe_unserialize( $this->value() );
		$this->json['choices'] = $this->choices;

	}

	/**
	 * Don't render the control content from PHP, as it's rendered via JS on load.
	 *
	 * @since 1.0.0
	 */
	public function render_content() {}

	/**
	 * Render a JS template for the content of the color picker control.
	 *
	 * @since 1.0.0
	 */
	public function content_template() {

		?>
		<# if ( data.label ) { #>
			<span class="customize-control-title">{{{ data.label }}}</span>
		<# } #>
		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul class="sortable">
			<# _.each( data.value, function( choiceID ) { #>
				<li {{{ data.inputAttrs }}} class='sortable-item' data-value='{{ choiceID }}'>                    
					<i class="dashicons dashicons-visibility visibility"></i>
					{{{ data.choices[ choiceID ] }}}
					<i class='dashicons dashicons-menu'></i>
				</li>
			<# }); #>
			<# _.each( data.choices, function( choiceLabel, choiceID ) { #>
				<# if ( -1 === data.value.indexOf( choiceID ) ) { #>
					<li {{{ data.inputAttrs }}} class='sortable-item invisible' data-value='{{ choiceID }}'>                        
						<i class="dashicons dashicons-visibility visibility"></i>
						{{{ data.choices[ choiceID ] }}}
						<i class='dashicons dashicons-menu'></i>
					</li>
				<# } #>
			<# }); #>
		</ul>               
		<?php
	}
}
