<?php
/**
 * Page.php
 *
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'components/blocks' ); ?>
	<?php endwhile; ?> 
<?php endif; ?>  

<?php
get_footer();