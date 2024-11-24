<?php
/**
 * This template contains the content part for an article on /friends/.
 *
 * @version 1.0
 * @package Friends
 */

$content = get_the_content();
?>
<div class="status__content status__content--with-action">
	<?php
	if ( empty( $content ) ) {
		the_title();
	} else {
		the_content();
	}
	?>
</div>
