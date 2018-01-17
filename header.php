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

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'bs4wp' ); ?></a>





	<header id="masthead" class="site-header">


<nav class="navbar navbar-expand-lg navbar-dark bg-dark <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { echo 'has-logo'; } ?>">
<div class="container">



<?php /* gets custom logo if selected, otherwise displays site title */ ?>
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



	<div id="content" class="site-content">
