<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body class="friends-like-mastodon">
	<div class="app-holder">
		<div class="ui">
			<div class="columns-area__panels">
				<div class="columns-area__panels__pane">
					<div class="columns-area__panels__pane__inner">
						<div class="compose-panel">
							<div class="search">
								<input class="search__input" type="text" placeholder="Search or paste URL" aria-label="Search or paste URL" value=""><div role="button" tabindex="0" class="search__icon"><i class="fa fa-search active"></i>
							</div>

							<form class="compose-form">
								<textarea name="" id="" cols="30" rows="10" placeholder="<?php esc_attr_e( "What's on your mind?", 'friends' ); ?>"></textarea>


								<div class="compose-form__publish"><div class="compose-form__publish-button-wrapper"><button class="button button--block" type="submit"><?php esc_html_e( 'Publish!', 'friends' ); ?></button></div></div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="columns-area__panels__main">
				<div class="tabs-bar__wrapper"></div>
				<div class="columns-area columns-area--mobile">
					<div class="column">
						<div class="scrollable">
							<div class="item-list">
								<?php
									Friends\Frontend::have_posts();
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="columns-area__panels__pane columns-area__panels__pane--start columns-area__panels__pane--navigational">
				<div class="friends-brand">
					<a class="friends-logo" href="<?php echo esc_url( home_url( 'friends' ) ); ?>"><h2><?php esc_html_e( 'Friends', 'friends' ); ?></h2></a>
				</div>

		</div>
	</div>
</div>

<?php wp_footer(); ?>
