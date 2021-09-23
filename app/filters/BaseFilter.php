<?php

namespace {=namespaceSlug=}\filters;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class BaseFilter {
	protected function get_request_params( \WP_REST_Request $request, array $params ): array {
		$request_params = array();
		$query_params   = $request->get_query_params();

		foreach ( $params as $param ) {
			$request_params[ $param[0] ] = isset( $query_params[ $param[0] ] ) && '' !== $query_params[ $param[0] ] ? $query_params[ $param[0] ] : $param[1];
		}

		return $request_params;
	}

	protected function hide_featured( $page, $filtered ) {
		if ( ( 1 === $page || 0 === $page ) && ! $filtered ) {
			return false;
		}

		return true;
	}

	protected function get_pagination_partial( int $current_page, int $max_pages ): string {
		return get_partial( 'layout/pagination', [
			'current_page' => $current_page,
			'max_pages'    => $max_pages
		], true );
	}

	protected function create_new_url( string $base_url, int $page ): string {

		if ( $page > 1 ) {
			$base_url .= 'page/' . $page;
		}

		return $base_url;
	}
}
