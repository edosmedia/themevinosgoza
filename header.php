<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vinosgoza
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
          <meta charset="<?php bloginfo( 'charset' ); ?>">
          <!-- <meta http-equiv="cache-control" content="max-age=0" />
          <meta http-equiv="cache-control" content="no-cache" />
          <meta http-equiv="expires" content="0" />
          <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
          <meta http-equiv="pragma" content="no-cache" /> -->
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="profile" href="https://gmpg.org/xfn/11">

          <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
          <?php wp_body_open(); ?>
        <header id="header">
            <nav class="navbar navbar-expand-lg navbar-dark ">
                    <div class="container">
                              <a class="navbar-brand" href="#"><img class="logo" src="<?php echo get_template_directory_uri().'/assets/images/logo-goza.svg'; ?>"> </a>
                              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                              </button>
                              <div class="collapse navbar-collapse menu-nav" id="navbarNav">
                                        <?php
        wp_nav_menu( array(
          'menu' => 'menu-1',
          'theme_location' => 'menu-1',
	'menu_id'        => 'primary-menu',
          'depth' => 2,
          'container' => false,
          'menu_class' => 'navbar-nav',
          'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
          'walker' => new WP_Bootstrap_Navwalker()
        ) );
      ?>
                              </div>
                    </div>
          </nav>
        </header>