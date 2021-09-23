<?php


namespace {=namespaceSlug=}\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class ThemeOptions {

	public function register() : void {
		$this->register_theme_options();
	}

	private function register_theme_options(): void {
		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page(
				array(
					'page_title'  => 'Theme options',
					'menu_title'  => 'Theme options',
					'menu_slug'   => 'theme-options',
					'capability'  => 'edit_posts',
					'parent_slug' => '',
					'position'    => null,
					'icon_url'    => false,
					'redirect'    => false,
				)
			);

//			acf_add_options_sub_page(
//				array(
//					'page_title'  => 'Archive People Options',
//					'menu_title'  => 'Archive People Options',
//					'menu_slug'   => 'archive-people-options',
//					'capability'  => 'edit_posts',
//					'parent_slug' => 'theme-options',
//					'position'    => 1,
//					'icon_url'    => false,
//					'redirect'    => false,
//				)
//			);
		}
	}

}
