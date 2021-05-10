<?php
/**
 * Typography_Control class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\controls\typography;

use WP_Customize_Control;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class creates a jQuery typography control.
 * The control provides a list of custom, system and google fonts.
 * Depending in the choosen font, the respective variants will be shown.
 * It uses selectWoo for a better user experience.
 *
 * @since 1.0.0
 */
class Typography_Control extends WP_Customize_Control {

	/**
	 * Type.
	 *
	 * @var string
	 */
	public $type = 'octo-typography';

	/**
	 * Font-Family subtitle.
	 *
	 * @var string
	 */
	public $family_subtitle = '';

	/**
	 * Variants subtitle.
	 *
	 * @var string
	 */
	public $variants_subtitle = '';

	/**
	 * Enqueue scripts/styles for the range slider.
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {

		wp_enqueue_script( 'octo-typography-selectWoo', get_template_directory_uri() . '/inc/customizer/controls/typography/selectWoo.min.js', array( 'jquery', 'customize-controls' ), THEME_VERSION, true );
		wp_enqueue_style( 'octo-typography-selectWoo', get_template_directory_uri() . '/inc/customizer/controls/typography/selectWoo.min.css', array(), THEME_VERSION, 'all' );
		wp_enqueue_script( 'octo-typography-control', get_template_directory_uri() . '/inc/customizer/controls/typography/typography-control.js', array( 'jquery', 'customize-controls' ), THEME_VERSION, true );
		wp_enqueue_style( 'octo-typography-control', get_template_directory_uri() . '/inc/customizer/controls/typography/typography-control.css', array(), THEME_VERSION, 'all' );

	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 1.0.0
	 * @uses WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		foreach ( $this->settings as $key => $setting ) {
			$this->json[ $key ] = array(
				'default' => $setting->default,
				'value'   => $this->value( $key ),
				'type'    => $key,
			);
		}

		$this->json['familySubtitle']   = $this->family_subtitle;
		$this->json['variantsSubtitle'] = $this->variants_subtitle;

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
			<div class="octo-controls-wrapper ">
				<div class="font-family">
					<# if ( data.familySubtitle ) { #>
						<span class="customize-control-subtitle">{{{ data.familySubtitle }}}</span>
					<# } #>
					<select class="octo-typography-font-family" tabindex="-1" aria-hidden="true">
						<option value="inherit">inherit</option>
						<# if ( ! _.isEmpty( octoTypography.customFonts ) ) { #>
						<optgroup label="Custom Fonts">
						<# for ( var key in octoTypography.customFonts ) { #>
							<option value="{{ key }}" <# if ( data.family.value === key ) { #> selected="selected" <# } #>>{{ key }}</option>
						<# } #>
						</optgroup>
						<# } #>
						<optgroup label="System Fonts">
						<# for ( var key in octoTypography.systemFonts ) { #>
							<option value="{{ key }}" <# if ( data.family.value === key ) { #> selected="selected" <# } #>>{{ key }}</option>
						<# } #>
						</optgroup>
						<# if ( ! _.isEmpty( octoTypography.googleFonts ) ) { #>
						<optgroup label="Google Fonts">
						<# for ( var key in octoTypography.googleFonts ) { #>
							<option value="{{ key }}" <# if ( data.family.value === key ) { #> selected="selected" <# } #>>{{ key }}</option>
						<# } #>
						</optgroup>
						<# } #>
					</select>
				</div>            
				<div class="variants">
					<# if ( data.variantsSubtitle ) { #>
						<span class="customize-control-subtitle">{{{ data.variantsSubtitle }}}</span>
					<# } #>
					<select class="octo-typography-font-variant">
					</select>
				</div>
			</div>
		<?php

	}
}
