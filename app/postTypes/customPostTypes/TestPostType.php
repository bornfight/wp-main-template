<?php
namespace {=namespaceSlug=}\postTypes\customPostTypes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use {=namespaceSlug=}\helpers\CustomPostTypeHelper;
use {=namespaceSlug=}\postTypes\ICustomPostTypeSettings;

class TestPostType implements ICustomPostTypeSettings {
	private ?object $post_type_helper;
	const LABEL = 'Test';
	const LABEL_PLURAL = 'Tests';

	public function __construct() {
		$this->post_type_helper = new CustomPostTypeHelper();
	}

	/**
	 * Change default labels here before return
	 *
	 * @return array
	 */
	public function get_labels(): array {
		return $this->post_type_helper->get_default_labels( self::LABEL, self::LABEL_PLURAL );
	}

	/**
	 * Change default args here before return
	 *
	 * @return array
	 */
	public function get_args(): array {
		return $this->post_type_helper->get_default_args( $this->get_labels() );
	}
}
