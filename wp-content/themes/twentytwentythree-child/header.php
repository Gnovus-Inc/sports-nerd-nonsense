<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Custom Post Type Accordion</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <div class="header-container">
        <div class="logo">
            <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
        </div>
        <nav>
            <?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>
        </nav>
    </div>
</header>
