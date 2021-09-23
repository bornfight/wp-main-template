<?php

namespace {=namespaceSlug=}\blocks;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

interface ICustomBlockSettings {
	public function get_settings( array $settings ): array;
}
