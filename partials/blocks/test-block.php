<?php
/**
 *
 * @var array $block
 *
 */

use {=namespaceSlug=}\acfProviders\BlocksACFDataProvider;

// Example partial
?>

<div>
	<h1><?= BlocksACFDataProvider::get_title( $block['id'] ); ?></h1>
</div>
