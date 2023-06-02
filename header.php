<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
      <meta charset=<?php bloginfo('charset'); ?>>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
      <header class="site-header">
        <div class="header-container">
          <div class="logo">
            <a href="<?php echo site_url(); ?>"><?= get_custom_logo() ?></a>
          </div>
          <div class="site-header-menu">
              <?php
                wp_nav_menu(array(
                  'menu' => 'meu-menu', 
                  'theme_location' => 'headerMenuLocation'                  
                ));
              ?>
          </div>
        </div>
      </header>
    
      
