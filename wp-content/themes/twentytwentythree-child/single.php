<?php
/**
 * single.php
 *
 * @category   Components
 * @package    WordPress
 */

get_header(); ?>

<section class=" ">
	<div class="">
		<div class="">
			<div class="">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?> 
				<?php endif; ?>  
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
