<?php
$pageTitle = __('Browse Places');
echo head(array('title' => $pageTitle));
?>

<section class="landing-page">
  <section class="landing-page-intro" id="page-intro" aria-hidden="false">
    <h1><?php echo $pageTitle; ?></h1>
    <p><?php echo __('We have %s places to explore.', $total_results); ?></p>
  </section>
  <section class="landing-page-content">
    <?php
      $sortLinks[__('Title')] = 'Dublin Core,Title';
      $sortLinks[__('Date Added')] = 'added';
    ?>
    <div id="sort-links">
        <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
    </div>

    <ul class="previews">
      <?php foreach (loop('collections') as $collection): ?>

        <li class="preview">
          <div class="preview-img">
            <?php if ($collectionImage = record_image('collection')): ?>
                <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
            <?php endif; ?>
          </div>
          <div class="preview-meta">
            <h2><?php echo link_to_collection(); ?></h2>
            <?php if (metadata('collection', array('Dublin Core', 'Description'))): ?>
              <div class="collection-description">
                  <?php echo text_to_paragraphs(metadata('collection', array('Dublin Core', 'Description'), array('snippet' => 150))); ?>
              </div>
            <?php endif; ?>
            <p class="collection-size">This place has <?php echo metadata('collection', 'total_items'); ?> items to view.</p>
          </div>
        </div><!-- end class="collection" -->
      <?php endforeach; ?>
    </ul>
    <?php echo pagination_links(); ?>
  </section>
</section>

<?php fire_plugin_hook('public_collections_browse', array('collections' => $collections, 'view' => $this)); ?>

<?php echo foot(); ?>
