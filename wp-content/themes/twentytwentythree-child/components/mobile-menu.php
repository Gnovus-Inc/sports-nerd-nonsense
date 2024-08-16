<?php
/**
 * Mobile Menu Display
 *
 * @category   Components
 * @package    WordPress
 */

?>
<section class="menu__mobile">
	<div class="mobile-logo">
		<a class="site__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php bloginfo('name'); ?>
		</a>
	</div>
    <button class="menu-close">
        <p>Close</p>
        <div class="hamburger--holder">
            <span></span>
            <span></span>
        </div>
    </button>
	<?php
		$args = array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'menu',
		);
		wp_nav_menu( $args );
	?>
</section>
