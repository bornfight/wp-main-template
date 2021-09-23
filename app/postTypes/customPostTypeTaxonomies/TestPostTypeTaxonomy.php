<?php
namespace {=namespaceSlug=}\postTypes\customPostTypeTaxonomies;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use {=namespaceSlug=}\helpers\CustomPostTypeHelper;
use {=namespaceSlug=}\helpers\CustomPostTypeTaxonomyHelper;
use {=namespaceSlug=}\postTypes\ICustomPostTypeTaxonomySettings;

class TestPostType implements ICustomPostTypeTaxonomySettings {
	private ?object $post_type_taxonomy_helper;
	const LABEL = 'Test';
	private array $post_types = array( 'post' );

	public function __construct() {
		$this->post_type_taxonomy_helper = new CustomPostTypeTaxonomyHelper();
		$this->set_post_type( CustomPostTypeHelper::POST_TYPE_TEST );
	}

	public function set_post_types( array $post_types ): void {
		$this->post_types = $post_types;
	}

	public function get_post_types(): array {
		return $this->post_types;
	}

	/**
	 * Change default labels here before return
	 *
	 * @return array
	 */
	public function get_labels(): array {
		return $this->post_type_taxonomy_helper->get_default_labels( self::LABEL );
	}

	/**
	 * Change default args here before return
	 *
	 * @return array
	 */
	public function get_args(): array {
		return $this->post_type_taxonomy_helper->get_default_args( $this->get_labels() );
	}
}
