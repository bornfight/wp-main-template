<?php

namespace {=namespaceSlug=}\postTypes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

interface ICustomPostTypeSettings {
	public function get_labels(): array;

	public function get_args(): array;
}
