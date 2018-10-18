
<?php
  $pageTitle = metadata('simple_pages_page', 'title');
  echo head(array('title' => $pageTitle));
?>

<article class="page simple-page show">
  <header class="page-header">
    <div class="container">
      <ul class="breadcrumbs">
        <li><a href="/">Home</a></li>
        <li><a href="/about/">About</a></li>
      </ul>
      <h1><?php echo $pageTitle ?></h1>
    </div>
  </header>
  <section class="page-content">
    <div class="container">
      <div class="simple-page-content">
        <?php
          $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
          echo $this->shortcodes($text);
        ?>
      </div>
    </div>
  </section>
</article>

<?php echo foot(); ?>
