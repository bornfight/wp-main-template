<?php

namespace {=namespaceSlug=}\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class AcfDefaults {
	public function init(): void {

		// add acf field key
		// constructor paramters for AcfDefaultsBase class is options
		// example array of options
		// Apply to all fields.
		// add_filter('acf/load_field', 'my_acf_load_field');

		// Apply to select fields.
		// add_filter('acf/load_field/type=select', 'my_acf_load_field');

		// Apply to fields named "custom_select".
		// add_filter('acf/load_field/name=custom_select', 'my_acf_load_field');

		// Apply to field with key "field_123abcf".
		// add_filter('acf/load_field/key=field_123abcf', 'my_acf_load_field');

//		add_filter( 'acf/load_field/key=', array(
//			new AcfDefaultsBase( array() ),
//			'populate_acf_fields_with_options'
//		) );

	}
}
