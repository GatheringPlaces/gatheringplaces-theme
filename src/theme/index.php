<?php echo head(); ?>

<?php
  //get id for neatline iframe
  $neatlineExhibitID = get_theme_option('Homepage Neatline Exhibit');
  $neatline = get_record_by_id('NeatlineExhibit', $neatlineExhibitID );

  if (!$neatline) {
      return;
  }
?>

<section class="landing-page homepage">
  <section class="landing-page-intro section-collapsible" id="page-intro" aria-hidden="false">
    <button class="collapse-section-control" aria-expanded="true" aria-controls="page-intro"></button>
    <div class="landing-page-intro-inner">
      <p class="site-description"><?php echo get_theme_option('Homepage Tagline'); ?></p>
      <hr>
      <div class="site-actions">
        <?php echo get_theme_option('Homepage Actions'); ?>
      </div>
      <hr>
      <div class="site-meta">
        <p><?php echo get_theme_option('Homepage Sponsor Text'); ?></p>
      </div>
    </div>
  </section>

  <section class="landing-page-content section-expandable">
    <iframe src="<?php echo nl_getExhibitUrl($neatline, "fullscreen")  ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" seamless></iframe>
  </section>
</section>

<?php echo foot(); ?>
