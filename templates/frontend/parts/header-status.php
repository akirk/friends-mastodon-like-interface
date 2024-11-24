<?php
/**
 * This template contains the content header part for an article on /friends/.
 *
 * @version 1.0
 * @package Friends
 */

$friend_user = $args['friend_user'];
$avatar = $args['avatar'];
$author_name = $args['friend_user']->display_name;

/**
 * Allows overriding the authorname for a post.
 *
 * @param string $override_author_name The author name to override with.
 * @param string $author_name The author name.
 * @param int $post_id The post ID.
 *
 * Example:
 * ```php
 * add_filter( 'friends_override_author_name', function( $override_author_name, $author_name, $post_id ) {
 *     if ( ! $override_author_name ) { // Only override if not already overridden.
 *         $override_author_name = get_post_meta( $post_id, 'author', true );
 *     }
 *     return $override_author_name;
 * }, 10, 3 );
 * ```
 */
$override_author_name = apply_filters( 'friends_override_author_name', '', $author_name, get_the_id() );
$avatar = apply_filters( 'friends_author_avatar_url', $avatar, $friend_user, get_the_id() );
?><div class="status__info">
	<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="status__relative-time" target="_blank" rel="noopener noreferrer">
		<time datetime="<?php echo esc_attr( date( 'r', get_post_time( 'U', true ) ) ); ?>" title="<?php echo esc_attr( get_post_time() ); ?>"><?php echo esc_html( human_time_diff( get_post_time( 'U', true ) ) ); ?></time>
	</a>

	<a href="<?php echo esc_attr( $friend_user->get_local_friends_page_url() . get_the_ID() . '/' ); ?>" title="<?php echo esc_html( $friend_user->display_name ); ?>" class="status__display-name" target="_blank" rel="noopener noreferrer">
		<div class="status__avatar">
			<div class="account__avatar" style="width: 46px; height: 46px;">
				<?php if ( ! $avatar && in_array( get_post_type(), apply_filters( 'friends_frontend_post_types', array() ), true ) ) : ?>
					<?php echo get_avatar( $args['friend_user']->user_login, 46 ); ?>
				<?php else : ?>
					<img src="<?php echo esc_url( $avatar ? $avatar : get_avatar_url( get_the_author_meta( 'ID' ) ) ); ?>" width="46" height="46" class="avatar" />
				<?php endif; ?>
			</div>
		</div>
		<span class="display-name">
			<bdi>
				<strong class="display-name__html"><?php echo esc_html( $friend_user->display_name ); ?></strong>
				<?php if ( $override_author_name && trim( str_replace( $override_author_name, '', $author_name ) ) === $author_name ) : ?>
					– <?php echo esc_html( $override_author_name ); ?>
				<?php endif; ?>
			</bdi>
			<span class="display-name__account">
				<?php echo esc_html( $friend_user->user_login ); ?>
			</span>
		</span>
	</a>

</div>
