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
		$summary_cutoff = apply_filters( 'friends_mastodon_like_summary_cutoff', 600 );
		if ( strlen( $content ) > $summary_cutoff ) {
			$excerpt = substr( $content, 0, $summary_cutoff );
			$excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
			// close tags that have not been ended with a >
			$excerpt = preg_replace( '/<([a-z]+)([^>]*[^\/])$/', '<$1$2>', $excerpt );
			$excerpt = force_balance_tags( $excerpt );
			$excerpt = apply_filters( 'the_content', $excerpt );




			?><details>
				<summary>
				<?php
				echo wp_kses_post( $excerpt );
				?>
				</summary>
				<?php
				the_content();
				?>
			</details>
			<?php
		} else {
			the_content();
		}
	}
	?>
</div>
