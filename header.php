<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package project-name
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="initial-scale=1">
	<meta name="viewport" content="maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,500;0,600;0,700;1,300;1,400;1,600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>


	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>
  data-component="class-toggle"
  data-class-toggle-target-class="menu-open">
	<!-- <div id="mobile-menu-overlay"></div> -->
	<header
    id="main-header"
    class="active"
    data-component="collapsible-header">
    <div class="header__content">
      <a
        id="logo-anchor" class="anchor-animation"
        href="<?php echo get_home_url(); ?>">
        <h1> RAW AUDIO </h1>
        <h1> RAW AUDIO </h1>
      </a>

      <button
        id="mobile-menu-trigger"
        data-component="trigger"
        data-trigger-target="body">
        <div>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </button>

      <nav
        class="header-menu-container"
        id="main-menu-container"
        data-component="menu">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'menu_id'        => 'main-menu',
          ));
        ?>

        <div class="menu-featherlight">
          <a href="#" data-featherlight="#mylightbox">CONTATO</a>
          <div id="mylightbox">
            <h1>CONTACT</h1>
            <div class="menu-featherlight__boxes">
              <div class="menu-featherlight__box">
                <?php if(carbon_get_theme_option('email')):  ?>
                <div>
                  <h3>E-MAIL</h3>
                  <p>
                    <?php echo carbon_get_theme_option('email'); ?>
                  </p>
                </div>
                <?php endif ?>
                <?php if(carbon_get_theme_option('phone')):  ?>
                <div>
                  <h3>TELEPHONE</h3>
                  <a href="tel:<?php echo carbon_get_theme_option('phone'); ?>">
                    <?php echo carbon_get_theme_option('phone'); ?>
                  </a>
                </div>
                <?php endif ?>
              </div>
              <div class="menu-featherlight__box">
                <?php if(carbon_get_theme_option('address')):  ?>
                <div>
                  <h3>ADDRESS</h3>
                  <div class="rich-text">
                    <p>
                      <?php echo carbon_get_theme_option('address'); ?>
                    </p>
                  </div>
                </div>
                <?php endif ?>
                <div>
                  <h3>SOCIAL MEDIA</h3>
                  <?php if(carbon_get_theme_option('instagram')):  ?>
                  <a href="<?php echo carbon_get_theme_option('instagram'); ?>">Instagram</a>
                  <?php endif ?>
                  <?php if(carbon_get_theme_option('facebook')):  ?>
                  <a href="<?php echo carbon_get_theme_option('facebook'); ?>">Facebook</a>
                  <?php endif ?>
                  <?php if(carbon_get_theme_option('vimeo')):  ?>
                  <a href="<?php echo carbon_get_theme_option('vimeo'); ?>">Vimeo</a>
                  <?php endif ?>
                  <?php if(carbon_get_theme_option('youtube')):  ?>
                  <a href="<?php echo carbon_get_theme_option('youtube'); ?>">Youtube</a>
                  <?php endif ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <a
        class="header-content__name"
        href="<?php echo get_home_url(); ?>">
        
      </a>
    </div>
	  
	</header>
