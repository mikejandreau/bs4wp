<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BS4WP
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class('site-wrap'); ?>>
<div id="page" class="site">
	<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'bs4wp' ); ?></a>



	<header id="masthead" class="site-header">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { echo 'has-logo'; } ?>">
			<div class="container">

			<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php the_custom_logo(); ?></a>
			<?php else : ?> 
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>

			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<?php 
				wp_nav_menu( array(
					'theme_location'	=> 'menu-1',
					'depth'				=> 2, 
					'container' 		=> 'div',
					'container_id'		=> 'bs4navbar',
					'container_class' 	=> 'collapse navbar-collapse',
					'menu_class'		=> 'navbar-nav ml-auto', 
					'menu_id'			=> 'primary-menu',
					'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'walker'			=> new WP_Bootstrap_Navwalker(),
				) ); 
			?>

			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->



	<?php if ( is_front_page() ) : ?>

		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<!-- Slide One - Set the background image for this slide in the line below -->
				<div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
					<div class="carousel-caption d-none d-md-block">
						<h3>First Slide</h3>
						<p>This is a description for the first slide. Booyah.</p>
					</div>
				</div>
				<!-- Slide Two - Set the background image for this slide in the line below -->
				<div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
					<div class="carousel-caption d-none d-md-block">
						<h3>Second Slide</h3>
						<p>This is a description for the second slide.</p>
					</div>
				</div>
				<!-- Slide Three - Set the background image for this slide in the line below -->
				<div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
					<div class="carousel-caption d-none d-md-block">
						<h3>Third Slide</h3>
						<p>This is a description for the third slide.</p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

	<?php endif; ?>









	<div class="hero">
		<div class="heading">
			<div class="container">

				<?php if ( is_front_page() ) : ?>

					<?php /*
					<div class="call-to-action">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<h1 class="entry-title">Title Goes Here</h1>
						<p>Base Install is a starter theme for WordPress development based on <a href="http://underscores.me/" target="_blank">Underscores</a>. It features a <a href="http://scribu.net/wordpress/theme-wrappers.html" target="_blank">theme wrapper</a>, a <a href="http://getskeleton.com/" target="_blank">responsive grid</a>, and a powerful <a href="https://labs.ahmadawais.com/WPGulp/" target="_blank">Gulp</a> workflow.</p>
						<a class="button button-primary" href="https://github.com/mikejandreau/Base-Install" target="_blank">View on GitHub</a><a class="button button-primary" href="https://github.com/mikejandreau/Base-Install/archive/master.zip" download="Base_Install">Download ZIP</a>
					</div>
					*/ ?>

				<?php elseif ( is_single() ) : ?>
					<?php the_title( '<h1 class="entry-title"><span class="sr-only">Article Title: </span>', '</h1>' ); ?>
					<div class="blog-author-date">
						<span class="blog-date">Posted on <?php echo get_the_date('M j, Y'); ?></span>
						<?php 
							$temp_post = get_post($post_id);
							$user_id = $temp_post->post_author;
							$user_url = get_author_posts_url($user_id);
							$first_name = get_the_author_meta('first_name',$user_id);
							$last_name = get_the_author_meta('last_name',$user_id);
							$full_name = "{$first_name} {$last_name}";
							echo '<span class="blog-author">by <a href="' . $user_url . '">' . $full_name . '</a></span>';
						?>
					</div>

				<?php elseif ( is_author() ) : ?>
					<?php
						$temp_post = get_post($post_id);
						$user_id = $temp_post->post_author;
						$first_name = get_the_author_meta('first_name',$user_id);
						$last_name = get_the_author_meta('last_name',$user_id);
						$full_name = "{$first_name} {$last_name}";
						echo '<h1 class="entry-title">Posts by ' . $full_name . ' </h1>';
					?>

				<?php elseif ( is_category() ) : ?>
					<?php single_cat_title( '<h1 class="entry-title">Category: ', '</h1>' ); ?>

				<?php elseif ( is_tag() ) : ?>
					<?php single_tag_title( '<h1 class="entry-title">Tag: ', '</h1>' ); ?>

				<?php elseif ( is_month() ) : ?>
					<?php the_archive_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<?php elseif ( is_post_type_archive() ) : ?>
					<?php post_type_archive_title( '<h1 class="entry-title">Archives: ', '</h1>' ); ?>

				<?php elseif ( is_search() ) : ?>
					<?php echo '<h1 class="entry-title">Search Results for: ' . get_search_query() .  '</h1>'; ?>

				<?php elseif ( is_home() ) : ?>
					<h1>Blog</h1>

				<?php elseif ( is_404() ) : ?>
					<h1>Oops! That page can&rsquo;t be found.</h1>

				<?php elseif ( is_page_template( 'contact.php' ) ) : ?>
					<h1>Get in Touch</h1>

				<?php else : ?>
					<?php the_title( '<h1 class="entry-title"><span class="sr-only">Article Title: </span>', '</h1>' ); ?>

				<?php endif; ?>

			</div><?php // end .container ?>
		</div><?php // end .heading ?>

		<?php 
			if ( is_front_page() ) : // show scroll to content button on homepage only
			// if ( is_front_page() || is_single() ) : // show scroll to content button on homepage and single posts
		 ?>
			<a class="scroll-to-content" href="#content"></a>
		<?php endif; ?>

	</div>







	<div id="content" class="site-content">
		<div class="container">
