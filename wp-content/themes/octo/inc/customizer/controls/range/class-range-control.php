<?php
/**
 * Range_Control class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\controls\range;

use WP_Customize_Control;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class creates a jQuery range control.
 * It can be used for a single setting as well as for responsive settings.
 * You can assign a separate setting for each device and save the respective value.
 * If you want to use the control for a single value, just assign one setting.
 *
 * @since 1.0.0
 */
class Range_Control extends WP_Customize_Control {

	/**
	 * Type.
	 *
	 * @var string
	 */
	public $type = 'octo-range';

	/**
	 * Unit.
	 *
	 * @var string
	 */
	public $units = '';

	/**
	 * Responsive.
	 *
	 * @var string
	 */
	public $responsive = false;

	/**
	 * Enqueue scripts/styles for the range slider.
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {
		wp_enqueue_script( 'octo-range-control', get_template_directory_uri() . '/inc/customizer/controls/range/range-control.js', array( 'jquery', 'customize-base' ), THEME_VERSION, true );
		wp_enqueue_style( 'octo-range-control', get_template_directory_uri() . '/inc/customizer/controls/range/range-control.css', array(), THEME_VERSION, 'all' );

	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 1.0.0
	 * @uses  WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		if ( $this->responsive ) {

			foreach ( $this->settings as $key => $setting ) {
				$this->json[ $key ] = array(
					'default'    => $setting->default['value'],
					'value'      => $this->value( $key )['value'],
					'unit'       => $this->value( $key )['unit'],
					'inputAttrs' => $this->get_input_attrs( $this->input_attrs, $this->value( $key )['unit'] ),
				);
			}
		} else {

			if ( is_array( $this->value() ) ) {

				$this->json['value']      = $this->value()['value'];
				$this->json['unit']       = $this->value()['unit'];
				$this->json['inputAttrs'] = $this->get_input_attrs( $this->input_attrs, $this->value()['unit'] );

				if ( isset( $this->default ) ) {
					$this->json['default'] = $this->default['value'];
				} else {
					$this->json['default'] = $this->setting->default['value'];
				}
			} else {

				$this->json['value'] = $this->value();

				if ( isset( $this->default ) ) {
					$this->json['default'] = $this->default;
				} else {
					$this->json['default'] = $this->setting->default;
				}

				$this->json['inputAttrs'] = $this->get_input_attrs( $this->input_attrs );

			}
		}

		$this->json['units']              = $this->units;
		$this->json['responsive']         = $this->responsive;
		$this->json['inputAttrsDefaults'] = $this->input_attrs;

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
			<div class="octo-buttons-wrapper">
			<# if ( data.responsive ) { #>
				<div class="octo-responsive-buttons-wrapper">
					<ul class="octo-responsive-buttons">
						<# if ( data.desktop ) { #>
							<li class="desktop active">
								<button type="button" class="preview-desktop" data-device="desktop">
									<span class="dashicons dashicons-desktop"></span>
								</button>    
							</li>
						<# } #>
						<# if ( data.tablet ) { #>
							<li class="tablet">
								<button type="button" class="preview-tablet" data-device="tablet">
									<span class="dashicons dashicons-tablet"></span>
								</button>    
							</li>
						<# } #>
						<# if ( data.mobile ) { #>
							<li class="mobile">
								<button type="button" class="preview-mobile" data-device="mobile">
									<span class="dashicons dashicons-smartphone"></span>
								</button>    
							</li>
						<# } #>
					</ul>
				</div>
			<# } #>
				<div class="octo-reset-button-wrapper">
					<button type="button" class="octo-reset-button"><span class="dashicons dashicons-image-rotate"></span></button>
				</div>
			</div>
		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>
		<div class="customize-control-content octo-range-wrapper responsive">
			<# if ( data.responsive ) { #>
				<# if ( data.desktop ) { #>
					<div class="octo-controls-wrapper desktop responsive active">    
						<input {{{ data.desktop.inputAttrs }}} type="range" class="octo-range-slider" value="{{ data.desktop.value }}" data-default="{{ data.desktop.default }}">
						<input type="number" class="octo-range-number" value="{{ data.desktop.value }}" {{{ data.desktop.inputAttrs }}} data-device="desktop">                        
						<# if ( data.units && _.isArray( data.units ) ) { #>
							<select class="octo-range-unit" data-default="{{ data.desktop.unit }}">
								<# _.each( data.units, function( unit ) { #>
									<option class="{{{ unit }}}" value="{{{ unit }}}" <# if ( data.desktop.unit === unit ) { #> selected="selected" <# } #>>{{{ unit }}}</option>
								<# }); #>
							</select> 
						<# } else { #>
							<input disabled type="text" class="octo-range-unit" value="{{ data.desktop.unit }}">
						<# }#>
					</div>
				<# } #>
				<# if ( data.tablet ) { #>
					<div class="octo-controls-wrapper tablet responsive">                    
						<input {{{ data.tablet.inputAttrs }}} type="range" class="octo-range-slider" value="{{ data.tablet.value }}" data-default="{{ data.tablet.value }}">
						<input type="number" class="octo-range-number" value="{{ data.tablet.value }}" {{{ data.tablet.inputAttrs }}} data-device="tablet">
						<# if ( data.units && _.isArray( data.units ) ) { #>
							<select class="octo-range-unit" data-default="{{ data.tablet.unit }}">
								<# _.each( data.units, function( unit ) { #>
									<option class="{{{ unit }}}"  value="{{{ unit }}}" <# if ( data.tablet.unit === unit ) { #> selected="selected" <# } #>>{{{ unit }}}</option>
								<# }); #>
							</select> 
						<# } else { #>
							<input disabled type="text" class="octo-range-unit" value="{{ data.desktop.unit }}">
						<# }#>
					</div>
				<# } #>
				<# if ( data.mobile ) { #>
					<div class="octo-controls-wrapper mobile responsive">                    
						<input {{{ data.mobile.inputAttrs }}} type="range" class="octo-range-slider" value="{{ data.mobile.value }}" data-default="{{ data.mobile.value }}">
						<input type="number" class="octo-range-number" value="{{ data.mobile.value }}" {{{ data.mobile.inputAttrs }}} data-device="mobile">
						<# if ( data.units && _.isArray( data.units ) ) { #>
							<select class="octo-range-unit" data-default="{{ data.mobile.unit }}">
								<# _.each( data.units, function( unit ) { #>
									<option class="{{{ unit }}}" value="{{{ unit }}}" <# if ( data.mobile.unit === unit ) { #> selected="selected" <# } #>>{{{ unit }}}</option>
								<# }); #>
							</select> 
						<# } else { #>
							<input disabled type="text" class="octo-range-unit" value="{{ data.desktop.unit }}">
						<# }#>
					</div>
				<# } #> 
			<# } else { #>
				<div class="octo-controls-wrapper">            
					<input {{{ data.inputAttrs }}} type="range" class="octo-range-slider" value="{{ data.value }}" data-default="{{ data.value }}">
					<input type="number" class="octo-range-number" value="{{ data.value }}" {{{ data.inputAttrs }}}>
					<# if ( data.units && _.isArray( data.units ) ) { #>
						<select class="octo-range-unit" data-default="{{ data.unit }}">
							<# _.each( data.units, function( unit ) { #>
								<option value="{{{ unit }}}" <# if ( data.unit === unit ) { #> selected="selected" <# } #>>{{{ unit }}}</option>
							<# }); #>
						</select> 
					<# } else if ( data.unit ) { #>
						<input disabled type="text" class="octo-range-unit {{{ data.unit }}}" value="{{ data.unit }}">
					<# }#>
				</div>   
			<# } #> 
		</div>                 
		<?php
	}

	/**
	 * Returns the html code for the input attributes.
	 *
	 * @param Array  $input_attrs Attributes for Input field.
	 * @param String $unit        Unit.
	 * @since 1.0.0
	 */
	public function get_input_attrs( $input_attrs, $unit = '' ) {

		if ( $unit && array_key_exists( $unit, $input_attrs ) ) {
			$input_attrs = $input_attrs[ $unit ];
		}

		$attr = '';
		foreach ( $input_attrs as $key => $value ) {
			$attr .= $key . '="' . esc_attr( $value ) . '" ';
		}

		return $attr;

	}

}
