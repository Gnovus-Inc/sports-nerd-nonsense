
</body>

<footer>
    <div class="footer-container">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        <nav>
            <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
        </nav>
    </div>
</footer>

<?php wp_footer(); ?>

</html>
