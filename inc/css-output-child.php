<?php
if ( ! function_exists( 'generate_base_css' ) ) {
	/**
	 * Generate the CSS in the <head> section using the Theme Customizer.
	 *
	 * @since 0.1
	 */
	function generate_base_css() {
		$settings = wp_parse_args(
			get_option( 'generate_settings', array() ),
			generate_get_defaults()
		);

		$css = new GeneratePress_CSS();

		$imp_common_text_color       = $settings['common_text_color'];
		$imp_common_primary_color    = $settings['common_primary_color'];
		$imp_common_secondary_color  = $settings['common_secondary_color'];
		$imp_common_button_color     = $settings['common_button_color'];

		$common_text_color       = $settings['common_text_color'];
		$common_primary_color    = $settings['common_primary_color'];
		$common_secondary_color  = $settings['common_secondary_color'];
		$common_button_color     = $settings['common_button_color'];
		
		
		$common_text_color       = $common_text_color." !important";
		$common_primary_color    = $common_primary_color." !important";
		$common_secondary_color  = $common_secondary_color." !important";
		$common_button_color     = $common_button_color." !important";

		
		$css->set_selector( 'body' );
		$css->add_property( 'background-color', $settings['background_color'] );
		$css->add_property( 'color', $common_text_color );	

		/*Common Text Color*/
		//$css->set_selector( '.main-navigation.slideout-navigation ul li a,.top-bar .top-bar-title,.top-bar-btn a' );
		//$css->set_selector( '.top-bar .top-bar-title,.top-bar-btn a' );
		//$css->add_property( 'color', $common_text_color );

		//$css->set_selector( '.top-bar-btn a:hover' );
		//$css->add_property( 'background-color', $common_text_color );


		/*Common Primary Color*/
		$css->set_selector( 'h1,.main-navigation .main-nav ul li a,.main-navigation .slideout-toggle a' );
		$css->add_property( 'color', $common_primary_color );

		$css->set_selector( '.main-navigation .main-nav ul li.nav-button::before' );
		$css->add_property( 'background-color', $common_primary_color );

		$css->set_selector( '.copy-right-widget,footer.site-info .footer-bar ul li a');
		$css->add_property( 'color', $common_primary_color );


		
		
		

		/*Common Secondary Color*/
		$css->set_selector( '.site-header .main-navigation,.site-header .main-navigation::after,#generate-slideout-menu' );
		$css->add_property( 'background-color', $common_secondary_color );
		

		$css->set_selector( '.top-bar-btn a:hover, h2, h3' );		
		$css->add_property( 'color', $common_secondary_color );

		$css->set_selector( '.drop_us_line_h2');
		$css->add_property( 'color', $common_primary_color );

		$css->set_selector( '.overlay-address ul li a');
		$css->add_property( 'color', $imp_common_secondary_color );

		$css->set_selector( '.overlay-address ul li a:hover');
		$css->add_property( 'color', $imp_common_button_color );


		/*Common Button Color*/		

		$css->set_selector( '.main-navigation .main-nav ul li.current_page_item > a,.main-navigation .main-nav ul li a:hover, .main-navigation .main-nav ul li[class*="current-menu-"] > a,.main-navigation .menu-bar-item:hover > a' );
		$css->add_property( 'color', $common_button_color );

		$css->set_selector( '.main-navigation .main-nav ul li.nav-button' );
		$css->add_property( 'background-color', $common_button_color );
		$css->add_property( 'color', '#FFFFFF !important' );

		$css->set_selector( '.main-navigation .main-nav ul li.nav-button a' );
		$css->add_property( 'color', '#FFFFFF !important' );
	
		$css->set_selector( '.main-navigation .main-nav ul li.nav-button a:hover,footer.site-info .footer-bar ul li a:hover' );
		$css->add_property( 'color', $common_button_color );
		

		/*Common Button Hover Color*/
		$css->set_selector( '.main-navigation .main-nav ul li.nav-button a:hover' );
		$css->add_property( 'background-color', $common_primary_color );
		$css->add_property( 'color', '#FFFFFF' );


		

		/*Content Button*/
		$css->set_selector( '.gb-button-wrapper .gb-button-banner-btn, .gb-button-wrapper .gb-button-banner-btn:visited' );
		$css->add_property( 'background-color', $common_button_color );
		$css->add_property( 'color', '#FFFFFF !important' );

		/*Content Button Hover*/
		$css->set_selector( '.gb-button-wrapper .gb-button-banner-btn:hover, .gb-button-wrapper .gb-button-banner-btn:active, .gb-button-wrapper .gb-button-banner-btn:focus ' );
		$css->add_property( 'background-color', $common_secondary_color );
		$css->add_property( 'color', '#FFFFFF !important' );


		/**Grafity Form Button And Tab Active Color*/
		$css->set_selector( '.contact-form input[type="submit"],.gform_footer input[type=submit],.resp-tab-active' );
		$css->add_property( 'background-color', $common_button_color );
		$css->add_property( 'color', '#FFFFFF !important' );

		/**Grafity Form Button And Tab Active Hover*/
		$css->set_selector( '.contact-form input[type="submit"]:hover,.gform_footer input[type=submit]:hover,.resp-tab-item:hover' );
		$css->add_property( 'background-color', $common_secondary_color );
		$css->add_property( 'color', '#FFFFFF !important' );
		

		
		/* Off canvas menu*/
		
		
		$css->set_selector( '.overlay-address ul li,.overlay-address ul li a' );
		$css->add_property( 'font-size', absint( $settings['slideout_font_size'] ), absint( $defaults['slideout_font_size'] ), 'px' );
		
		
		

		$css->set_selector( '.slideout-navigation.main-navigation .main-nav ul li a' );
		$css->add_property( 'color', $common_secondary_color );

		$css->set_selector( '.slideout-navigation .main-nav ul li.current_page_item > a,.slideout-navigation .main-nav ul li a:hover,.slideout-navigation.main-navigation .main-nav ul li a:hover' );
		$css->add_property( 'color', $common_button_color );

		

		
		$css->set_selector( 'body .resp-tabs-list li,body ul.social-media-links-grp.wp-block-social-links .wp-social-link a' );
		$css->add_property( 'color', $common_secondary_color );

		$css->set_selector( 'ul.resp-tabs-list .resp-tab-active,ul.resp-tabs-list .resp-tab-item:hover,body ul.social-media-links-grp.wp-block-social-links .wp-social-link a:hover' );
		$css->add_property( 'color', $common_button_color );
		

		

		//Footer
		$css->set_selector( '.site-footer' );
		$css->add_property( 'background-color', $settings['footer_widget_background_color'] );
		//Menu
		
		$css->set_selector( '#menu-footer-menu li a' );
		$css->add_property( 'color', $common_primary_color );

		$css->set_selector( '#menu-footer-menu li a:hover,#menu-footer-menu li.current_page_item a' );
		$css->add_property( 'color', $common_button_color );
	
		
		

		

		do_action( 'generate_base_css', $css );

		return apply_filters( 'generate_base_css_output', $css->css_output() );
	}
}