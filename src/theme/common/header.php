<!-- Based on https://github.com/InteractiveMechanics/omeka-starter-theme -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if ( $description = option('description')): ?>
      <meta name="description" content="<?php echo $description; ?>" />
  <?php endif; ?>

  <!-- Will build the page <title> -->
  <?php
      if (isset($title)) { $titleParts[] = strip_formatting($title); }
      $titleParts[] = option('site_title');
  ?>
  <title><?php echo implode(' | ', $titleParts); ?></title>
  <?php echo auto_discovery_link_tags(); ?>

  <!-- Will fire plugins that need to include their own files in <head> -->
  <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,700" rel="stylesheet">
  <!-- Need to add custom and third-party CSS files? Include them here -->
  <?php
      queue_css_file('styles');
      echo head_css();
  ?>

  <!-- Need more JavaScript files? Include them here -->
  <?php
      queue_js_file('globals');
      echo head_js();
  ?>
</head>
<?php echo body_tag(); ?>
  <header class="site-header" role="banner">
    <div class="container">
      <a href="/" class="brand"><svg viewBox="0 0 42 48" xmlns="http://www.w3.org/2000/svg"><title>Gathering Places Logo</title><g fill="#FFF" fill-rule="nonzero" opacity="0.373828125"><path d="M11.199 20.212l-7.67-7.289-2.496 2.373 7.668 7.29L0 30.857l2.497 2.374 11.199-10.646zM13.402 9.225l-2.445 2.38 9.888 9.626 2.446-2.38-.001-.002L39.26 3.304 36.816.924l-15.97 15.545z"/><path d="M18.956 11.443l2.37 2.403 10.63-10.78-2.37-2.404-8.26 8.377L12.414 0l-2.37 2.403 8.914 9.039zM18.766 32.937l.001.001L6.391 45.524 8.826 48l12.376-12.586 7.407 7.533 2.434-2.476-9.842-10.01z"/><path d="M18.897 25.556v.001l-7.94 8.319 2.367 2.479 7.94-8.318 12.89 13.501 2.368-2.479-15.258-15.982zM24.41 20.152l-2.497 2.384 11.2 10.695 2.498-2.384-8.703-8.31 11.44-10.922L35.85 9.23 24.41 20.153z"/><path d="M33.992 22.465l4.152-4.3-2.387-2.473-6.54 6.774 2.387 2.472.001-.001 8.008 8.294L42 30.759zM17.628 24.731l2.459-2.417-7.674-7.545-2.46 2.418 5.214 5.126-13.34 13.115 2.458 2.418L17.627 24.73z"/></g></svg> Gathering Places</a>
      <nav class="site-nav">
        <?php
          $navOptions = array(
            'ulClass' => 'nav',
            'activeClass' => 'active'
          );
        ?>
        <?php echo public_nav_main(array('role' => 'navigation'))->renderMenu(null, $navOptions); ?>
        <form class="search-form" role="search" action="<?php echo public_url(''); ?>search">
            <div class="form-control">
              <label for="query" style="display: none;">Search</label>
              <input type="text" name="query" id="query" value="" title="Search" placeholder="Search the site">
            </div>
            <button type="submit" class="search-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" version="1.1"><title>path12423</title><desc>Created with Sketch.</desc><g><g transform="translate(-1178.000000, -43.000000)"><g transform="translate(1178.000000, 43.000000)"><path d="M2.7 2.7C-0.9 6.3-0.9 12.2 2.7 15.8 5.7 18.8 10.4 19.3 14 17.2L20.3 23.3C21.2 24.2 22.6 24.1 23.4 23.2 24.2 22.4 24.2 21 23.3 20.1L17.1 14.1C19.3 10.5 18.8 5.8 15.8 2.7 12.2-0.9 6.3-0.9 2.7 2.7L2.7 2.7 2.7 2.7ZM5.3 5.3C7.5 3.2 11 3.2 13.1 5.3 15.3 7.5 15.3 11 13.1 13.1 11 15.3 7.5 15.3 5.3 13.1 3.2 11 3.2 7.5 5.3 5.3L5.3 5.3Z"/></g></g></g></svg>
            </button>
        </form>
      </nav>
    </div>
  </header>
  <main class="content" role="main">
      <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
