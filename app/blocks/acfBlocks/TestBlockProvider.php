<?php

namespace {=namespaceSlug=}\blocks\acfBlocks;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use {=namespaceSlug=}\core\Constants;
use {=namespaceSlug=}\blocks\ICustomBlockSettings;

class TestBlockProvider implements ICustomBlockSettings {
	public function get_settings( array $settings ): array {
		$settings['name']        = 'cta-block';
		$settings['title']       = __( 'CTA Block', Constants::DOMAIN_NAME_ADMIN );
		$settings['description'] = __( 'CTA Block description', Constants::DOMAIN_NAME_ADMIN );
		$settings['keywords']    = array( 'cta' );

		return $settings;
	}
}
