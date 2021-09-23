<?php

namespace {=namespaceSlug=}\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WordpressDefaults {

	public function init(): void {
		add_filter( 'wp_image_editors', array( $this, 'wpb_image_editor_default_to_gd' ) );

		// CF fix
		add_action( 'init', array( $this, 'allow_rich_edit_cloud_front' ), 9 );
		remove_action( 'wp_head', 'wp_generator' );
		$this->add_theme_support_options();

		// Gutenberg
		add_action( 'enqueue_block_editor_assets', array( $this, 'custom_gutenberg_styles' ) );
		add_action( 'admin_head', array( $this, 'ea_disable_classic_editor' ) );
		add_filter( 'gutenberg_can_edit_post_type', array( $this, 'ea_disable_gutenberg' ), 10, 2 );
		add_filter( 'use_block_editor_for_post_type', array( $this, 'ea_disable_gutenberg' ), 10, 2 );
	}

	public function add_theme_support_options(): void {
		add_theme_support( 'align-wide' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'editor-styles' );
	}

	public function custom_gutenberg_styles(): void {
		wp_enqueue_style( 'custom-gutenberg', get_theme_file_uri( '/static/admin/gutenberg.css' ), array(), '1.0', 'all' );
//		wp_enqueue_style( 'admin-blocks', get_theme_file_uri( '/static/dist/style.css' ), array(), '1.0', 'all' );
	}

	public function wpb_image_editor_default_to_gd( $editors ): array {
		$gd_editor = 'WP_Image_Editor_GD';
		$editors   = array_diff( $editors, array( $gd_editor ) );
		array_unshift( $editors, $gd_editor );

		return $editors;
	}

	public function allow_rich_edit_cloud_front(): void {
		add_filter( 'user_can_richedit', '__return_true' );
	}

	public function ea_disable_classic_editor(): void {

		$screen = get_current_screen();
		if ( 'page' !== $screen->id || ! empty( filter_input (INPUT_GET, 'post') ) ) {
			return;
		}

		if ( $this->ea_disable_editor( filter_input (INPUT_GET, 'post') ) ) {
			remove_post_type_support( 'page', 'editor' );
		}

	}

	public function ea_disable_gutenberg( $can_edit, $post_type ): bool {

		if ( ! ( is_admin() && ! empty( filter_input (INPUT_GET, 'post') ) ) ) {
			return $can_edit;
		}

		if ( $this->ea_disable_editor( filter_input (INPUT_GET, 'post') ) ) {
			$can_edit = false;
		}

		return $can_edit;

	}

	public function ea_disable_editor( $post_id ): bool {

		$excluded_templates = array();

		if ( empty( $post_id ) ) {
			return false;
		}

		$post_id       = intval( $post_id );
		$template = get_page_template_slug( $post_id );

		return in_array( $template, $excluded_templates, true );
	}
}
