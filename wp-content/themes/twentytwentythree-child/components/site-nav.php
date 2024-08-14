<?php
/**
 * Display Site Nav
 *
 * @category   Components
 * @package    WordPress
 */

?>

<nav class="site-nav">
	<div class="site-log">
		<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php bloginfo('name'); ?>
		</a>
	</div>

	<div class="site-nav-menu">
		<?php
			$args = array(
				'theme_location' => 'primary-menu',
				'container'      => false,
				'menu_class'     => 'menu',
			);
			wp_nav_menu( $args );
		?>
	</div>

	<button data-toggle="menu">
		<div class="hamburger--holder">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</button>
</nav>
