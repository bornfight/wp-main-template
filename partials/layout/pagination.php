<?php
/**
 * @var $current_page
 * @var $max_pages
 */

use {=namespaceSlug =}\helpers\PaginationHelper;

if ( empty( $current_page ) ) {
	$current_page = 1;
}

if ( empty( $max_pages ) ) {
	$max_pages = 10;
}

if ( $max_pages > 1 ) {
	$prev_page = PaginationHelper::get_pagination_start_page( $current_page );
	$next_page = PaginationHelper::get_pagination_end_page( $current_page, $max_pages );
	?>
    <div class="o-pagination-wrapper">

        <ul class="c-pagination u-b0">

            <li class="c-pagination__item">
                <a href="#" data-val="<?= $current_page > 1 ? $current_page - 1 : ''; ?>"
                   class="c-pagination-arrow c-pagination-arrow--previous js-pagination-item <?= $current_page > $prev_page ? '' : 'is-disabled'; ?>">
					<?= get_icon( "arrow-right" ) ?>
                    <span class="">Prev</span>
                </a>
            </li>

			<?php
			if ( $prev_page > 1 ) { ?>
                <li class="c-pagination__item">
                    <a href="#" data-val="1" id="1"
                       class="c-pagination-number <?= $prev_page === $current_page ? 'is-active' : '' ?> js-pagination-item">
                        <span>1</span>
                    </a>
                </li>
                <li class="c-pagination__item">
                    <span class="c-pagination-separator">
                        ...
                    </span>
                </li>
				<?php
			}
			for ( $i = $prev_page; $i < $next_page; $i ++ ) {
				?>
                <li class="c-pagination__item">
                    <a href="#" data-val="<?= $i ?>" id="<?= $i ?>"
                       class="c-pagination-number <?= $i === $current_page ? 'is-active' : '' ?> js-pagination-item">
						<?= $i ?>
                    </a>
                </li>
				<?php
			}
			if ( $next_page < $max_pages ) { ?>
                <li class="c-pagination__item">
                    <span class="c-pagination-separator">
                        ...
                    </span>
                </li>
                <li class="c-pagination__item">
                    <a href="#" data-val="<?= $max_pages ?>" id="<?= $max_pages ?>"
                       class="c-pagination-number <?= $max_pages === $current_page ? 'is-active' : '' ?>js-pagination-item">
						<?= $max_pages ?>
                    </a>
                </li>
				<?php
			}
			?>

            <li class="c-pagination__item">
                <a href="#" data-val="<?= $current_page < $max_pages ? $current_page + 1 : ''; ?>"
                   class="c-pagination-arrow c-pagination-arrow--next <?= $current_page < $max_pages ? '' : 'is-disabled'; ?> js-pagination-item">
                    <span class="">Next</span>
					<?= get_icon( "arrow-right" ) ?>
                </a>
            </li>

        </ul>

    </div>
	<?php
}
