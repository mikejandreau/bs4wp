<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BS4WP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php 
			// this method gets the post headings inside of links for lists of posts
			if ( is_archive() || is_home() ) :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
			<div class="blog-author-date">
				<?php /* <span class="blog-date">Posted on <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_date('M j, Y'); ?></a></span> */ ?>
				<?php 
					// get post date and permalink
					echo '<span class="blog-date">Posted on <a href="' . esc_url( get_permalink() ) . '">' . get_the_date('M j, Y') . '</a></span>';

					// get post author name and link
					$temp_post = get_post($post_id);
					$user_id = $temp_post->post_author;
					$user_url = get_author_posts_url($user_id);
					$first_name = get_the_author_meta('first_name',$user_id);
					$last_name = get_the_author_meta('last_name',$user_id);
					$full_name = "{$first_name} {$last_name}";
					echo '<span class="blog-author"> by <a href="' . $user_url . '">' . $full_name . '</a></span>';
				?>
			</div>

		<?php endif; ?>

<?php 

		// this is the original method, which gets title or link depending on page type
		// if ( is_singular() ) :
		// 	the_title( '<h1 class="entry-title">', ' the if part</h1>' );
		// else :
		// 	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a> the else part</h2>' );

		// endif;

/*
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php bs4wp_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; 
		*/ ?>


	</header><!-- .entry-header -->

	<?php bs4wp_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="sr-only"> "%s"</span>', 'bs4wp' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bs4wp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php bs4wp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
