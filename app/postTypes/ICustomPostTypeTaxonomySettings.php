<?php

namespace {=namespaceSlug=}\postTypes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

interface ICustomPostTypeTaxonomySettings extends ICustomPostTypeSettings {
	public function get_post_types(): array;

	public function set_post_types( array $post_types ): void;
}
