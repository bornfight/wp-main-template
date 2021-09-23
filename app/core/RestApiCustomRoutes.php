<?php

namespace {=namespaceSlug=}\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class RestApiCustomRoutes {

	public function register(): void {
		$this->register_routes();
	}

	private function register_routes(): void {
		add_action(
			'rest_api_init',
			function () {
//				register_rest_route(
//					ApiHelper::BASE_PATH,
//					ApiHelper::FILTER_BLOG,
//					array(
//						'methods'  => array( 'GET' ),
//						'callback' => array( new SingleFilter(), 'filter_blog_posts' ),
//					)
//				);
			}
		);
	}
}
