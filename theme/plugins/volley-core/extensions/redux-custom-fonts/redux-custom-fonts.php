<?php

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if( class_exists( 'ReduxFramework' ) ) {
	
	class ThemeThreads_Custom_Fonts {
		
		/**
		 * [$params description]
		 * @var array
		 */
		private $themethreads_custom_fonts = null;
		
		
		/**
		 * [$params description]
		 * @var array
		 */
		private $themethreads_custom_fonts_woff2 = null;
		
		/**
		 * [$params description]
		 * @var array
		 */
		private $themethreads_custom_fonts_woff = null;
		
		/**
		 * [$params description]
		 * @var array
		 */
		private $themethreads_custom_fonts_ttf = null;
		
		/**
		 * [$params description]
		 * @var array
		 */
		private $themethreads_custom_fonts_svg = null;
		

		/**
		 * [__construct description]
		 * @method __construct
		 */
		function __construct() {
			
			add_action( 'redux/loaded', array( $this, 'get_custom_fonts' ) );
			//add_action( 'init', array( $this, 'add_font_face_css' ) );
			add_filter( 'redux/themethreads_one_opt/field/typography/custom_fonts', array( $this, 'add_custom_fonts_to_redux'), 30 );
			add_filter( 'themethreads_dynamic_css', array( $this, 'add_font_face_css') );

		}		
		
		/**
		 * add_typekit_fonts_to_redux
		 * @return  [arr] fonts array
		 */
		function add_custom_fonts_to_redux( $fonts = array() ) {
			
			$get_fonts = $this->get_custom_fonts_array();
			
			if( empty( $get_fonts ) ) {
				return $fonts;
			}
			
			if( isset( $fonts['Typekit Fonts'] ) ) {
				$all_fonts = array_merge( $fonts['Typekit Fonts'], $get_fonts );
			} 
			elseif( isset( $fonts['Custom Fonts'] ) ) {
				$all_fonts = array_merge( $fonts['Custom Fonts'], $get_fonts );				
			}
			else {
				$all_fonts = $get_fonts;	
			}
			
			$fonts_label = esc_html__( 'Custom Fonts', 'one' );
			$fonts       = array( $fonts_label => $all_fonts );
			
			return $fonts;

		}

		function get_custom_fonts_array() {
			
			if ( empty( $this->themethreads_custom_fonts ) ) {
				return;
			}
			
			$ret = array();
			$fontsData = $this->themethreads_custom_fonts;
			
			foreach($fontsData as $cfont ) {
				if( isset( $cfont ) && ! empty( $cfont ) ) {
					$slug = $cfont;
					$name = $cfont;
					$ret[$slug] = $name;
				}
			}

			return $ret;
			
		}
		
		function add_font_face_css( $css ) {
			
			$font_face = '';
			
			$get_fonts = array();
			
			$get_fonts = $this->themethreads_custom_fonts;
			$woff2_arr = $this->themethreads_custom_fonts_woff2;
			$woff_arr  = $this->themethreads_custom_fonts_woff;
			$ttf_arr   = $this->themethreads_custom_fonts_ttf;
			$svg_arr   = $this->themethreads_custom_fonts_svg;
			
			if( is_array( $get_fonts ) ) {
				$get_fonts = array_filter( $get_fonts );	
			}

			if( empty( $get_fonts ) ) {
				return $css;
			}
				
			foreach( $get_fonts as $key => $font_name ) {
				
				$urls = array();
				if( isset( $woff2_arr[ $key ] ) && ! empty( $woff2_arr[ $key ] ) ) {
					$urls[] = 'url(' . esc_url( $woff2_arr[ $key ] ) . ')';
				}
				if( isset( $woff_arr[ $key ] ) &&  ! empty( $woff_arr[ $key ] ) ) {
					$urls[] = 'url(' . esc_url( $woff_arr[ $key ] ) . ')';	
				}
				if( isset( $ttf_arr[ $key ] ) && ! empty( $ttf_arr[ $key ] ) ) {
					$urls[] = 'url(' . esc_url( $ttf_arr[ $key ] ) . ')';
				}
				if( isset( $svg_arr[ $key ] ) && ! empty( $svg_arr[ $key ] ) ) {
					$urls[] = 'url(' . esc_url( $svg_arr[ $key ] ) . ')';
				}
				
				$font_face .= '@font-face {' . "\n";
				$font_face .= 'font-family:"' . esc_attr( $font_name ) . '";' . "\n";
				$font_face .= 'src:';
				$font_face .= implode( ', ', $urls ) . ';';
				$font_face .= '}' . "\n";
			}				

			return $font_face . $css;

		}
		
		/**
		 * get_custom_fonts_array
		 * 
		 * @return [arr] fonts array
		 */
		function get_custom_fonts() {
		
			global $themethreads_options;
			
			$this->themethreads_custom_fonts = ! empty( $themethreads_options['custom_font_title'] ) ? $themethreads_options['custom_font_title'] : null;
			$this->themethreads_custom_fonts_woff2 = ! empty( $themethreads_options['custom_font_woff2'] ) ? $themethreads_options['custom_font_woff2'] : null;
			$this->themethreads_custom_fonts_woff = ! empty( $themethreads_options['custom_font_woff'] ) ? $themethreads_options['custom_font_woff'] : null;
			$this->themethreads_custom_fonts_ttf = ! empty( $themethreads_options['custom_font_ttf'] ) ? $themethreads_options['custom_font_ttf'] : null;
			$this->themethreads_custom_fonts_svg = ! empty( $themethreads_options['custom_font_svg'] ) ? $themethreads_options['custom_font_svg'] : null;			
		
		}

	}
	
	new ThemeThreads_Custom_Fonts;
	
}