<?php
/**
 * Mobile Menu Display
 *
 * @category   Components
 * @package    WordPress
 */

?>
<section class="menu__mobile">
	<a class="site__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php bloginfo('name'); ?>
	</a>
    <button class="menu-close">
        <p>Close</p>
        <div class="hamburger--holder">
            <span></span>
            <span></span>
        </div>
    </button>
	<?php
		$args = array(
			'theme_location' => 'header-menu',
			'container'      => false,
			'menu_class'     => 'menu',
		);
		wp_nav_menu( $args );
	?>
</section>
