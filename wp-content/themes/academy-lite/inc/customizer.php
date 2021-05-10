<?php
/**
 * Academy Lite Theme Customizer
 *
 * @package Academy Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function academy_lite_customize_register( $wp_customize ) {
	
function academy_lite_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
	
	$wp_customize->get_setting( 'blogname' )->photobook_lite         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->photobook_lite  = 'postMessage';
		
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#ff1949',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','academy-lite'),
			'description'	=> __('Select color from here.','academy-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);

	$wp_customize->add_setting('topheaderbg-color', array(
		'default' => '#454080',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'topheaderbg-color',array(
			'description'	=> __('Select background color for Top header.','academy-lite'),
			'section' => 'colors',
			'settings' => 'topheaderbg-color'
		))
	);
	
	$wp_customize->add_setting('headerbg-color', array(
		'default' => '#000000',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'headerbg-color',array(
			'description'	=> __('Select background color for header.','academy-lite'),
			'section' => 'colors',
			'settings' => 'headerbg-color'
		))
	);
	
	$wp_customize->add_setting('footer-color', array(
		'default' => '#000000',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer-color',array(
			'description'	=> __('Select background color for footer.','academy-lite'),
			'section' => 'colors',
			'settings' => 'footer-color'
		))
	);

	// Top Header Start
	$wp_customize->add_section(
        'tophead_section',
        array(
            'title' => __('Top Header', 'academy-lite'),
            'priority' => null,
			'description'	=> __('Add top header info here.','academy-lite'),	
        )
    );

	$wp_customize->add_setting('call-txt',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('call-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add phone number here.','academy-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('email-txt',array(
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('email-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add email here.','academy-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('facebook',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('facebook',array(
			'type'	=> 'url',
			'label'	=> __('Add facebook link here.','academy-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('twitter',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitter',array(
			'type'	=> 'url',
			'label'	=> __('Add twitter link here.','academy-lite'),
			'section'	=> 'tophead_section'
	));

	$wp_customize->add_setting('youtube',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('youtube',array(
			'type'	=> 'url',
			'label'	=> __('Add youtube channel link here.','academy-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('linkedin',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('linkedin',array(
			'type'	=> 'url',
			'label'	=> __('Add linkedin link here.','academy-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('pinterest',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pinterest',array(
			'type'	=> 'url',
			'label'	=> __('Add pinterest link here.','academy-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('hide_tophead',array(
			'default' => false,
			'sanitize_callback' => 'academy_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_tophead', array(
		   'settings' => 'hide_tophead',
    	   'section'   => 'tophead_section',
    	   'label'     => __('Check this to hide Top Header.','academy-lite'),
    	   'type'      => 'checkbox'
     ));
	// Top Header End
	
	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'academy-lite'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567). Slider will work only when you select the static front page.','academy-lite'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','academy-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','academy-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','academy-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('slide_text',array(
		'default'	=> __('Read More','academy-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slide_text',array(
		'label'	=> __('Add slider link button text.','academy-lite'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_text',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('hide_slider',array(
		'default' => true,
		'sanitize_callback' => 'academy_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'hide_slider', array(
	   'settings' => 'hide_slider',
	   'section'   => 'slider_section',
	   'label'     => __('Check this to hide slider.','academy-lite'),
	   'type'      => 'checkbox'
    ));
	// Slider Section End

	// First Section Start
	$wp_customize->add_section(
        'first_section',
        array(
            'title' => __('First Section', 'academy-lite'),
            'priority' => null,
			'description'	=> __('Select pages for First Section. This section will be displayed only when you select the static front page.','academy-lite'),	
        )
    );	
	
	$wp_customize->add_setting('page-setting1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 1st column','academy-lite'),
			'section'	=> 'first_section'
	));

	$wp_customize->add_setting('page-setting2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 2nd column','academy-lite'),
			'section'	=> 'first_section'
	));

	$wp_customize->add_setting('page-setting3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 3rd column','academy-lite'),
			'section'	=> 'first_section'
	));
	
	$wp_customize->add_setting('hide_first_section',array(
			'default' => true,
			'sanitize_callback' => 'academy_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'hide_first_section', array(
		   'settings' => 'hide_first_section',
    	   'section'   => 'first_section',
    	   'label'     => __('Check this to hide section.','academy-lite'),
    	   'type'      => 'checkbox'
     ));
	// First Section End

	// Second Section Start		
	$wp_customize->add_section(
        'homepage_second_section',
        array(
            'title' => __('Second Section', 'academy-lite'),
            'priority' => null,
			'description'	=> __('Select page for homepage second section. This section will be displayed only when you select the static front page.','academy-lite'),	
        )
    );

    $wp_customize->add_setting('ser-second-sec-ttl',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ser-second-sec-ttl',array(
		'type'	=> 'text',
		'label'	=> __('Add Section Sub Title Here','academy-lite'),
		'section'	=> 'homepage_second_section'
	));	
	
	$wp_customize->add_setting('ser-setting1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('ser-setting1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for second section','academy-lite'),
		'section'	=> 'homepage_second_section'
	));
	
	$wp_customize->add_setting('hide_second_section',array(
		'default' => true,
		'sanitize_callback' => 'academy_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_second_section', array(
	   'settings' => 'hide_second_section',
	   'section'   => 'homepage_second_section',
	   'label'     => __('Check this to hide section.','academy-lite'),
	   'type'      => 'checkbox'
     ));
	// Second Section End
	
}
add_action( 'customize_register', 'academy_lite_customize_register' );	

function academy_lite_css(){
		?>
        <style>
        		.top-header,.pagearea-content h6.sub_ttl{
        			background-color:<?php echo esc_attr(get_theme_mod('topheaderbg-color','#454080')); ?>;
        		}
				a, 
				.tm_client strong,
				.postmeta a:hover,
				#sid
				ebar ul li a:hover,
				.blog-post h3.entry-title,
				a.blog-more:hover,
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.blog-date .date,
				a.read-more,
				.section-box .sec-left a,
				.sitenav ul li a:hover,
				.section_head:before, #header .header-inner .logo p{
					color:<?php echo esc_attr(get_theme_mod('color_scheme','#ff1949')); ?>;
				}
				.icon-box-icon:after{
					box-shadow: 0 0 0 2px <?php echo esc_attr(get_theme_mod('color_scheme','#ff1949')); ?>;
				}
				h3.widget-title,
				.nav-links .current,
				.nav-links a:hover,
				p.form-submit input[type="submit"],
				.home-content a,
				.social a:hover, .top-header-menu ul li a{
					background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#ff1949')); ?>;
				}
				#header,
				.sitenav ul li.menu-item-has-children:hover > ul,
				.sitenav ul li.menu-item-has-children:focus > ul,
				.sitenav ul li.menu-item-has-children.focus > ul{
					background-color:<?php echo esc_attr(get_theme_mod('headerbg-color','#000000')); ?>;
				}
				.copyright-wrapper{
					background-color:<?php echo esc_attr(get_theme_mod('footer-color','#000000')); ?>;
				}
				#slider .top-bar a.slide-button, .pagearea-content .wel-read{
					background-color: <?php echo esc_attr(get_theme_mod('color_scheme','#ff1949')); ?>;
				}
				#slider .top-bar a.slide-button:hover, .pagearea-content .wel-read:hover{
					background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#ff1949')); ?>;
					color: #ffffff;
				}
				
		</style>
	<?php }
add_action('wp_head','academy_lite_css');

function academy_lite_customize_preview_js() {
	wp_enqueue_script( 'academy-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'academy_lite_customize_preview_js' );