<?php
    $collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
    echo head(array('title'=> $collectionTitle));
?>

<article class="page collection show">
  <header class="page-header">
    <div class="container">
      <ul class="breadcrumbs">
        <li><a href="<?php echo get_theme_option('baseurl'); ?>">Home</a></li>
        <li><a href="<?php echo get_theme_option('baseurl'); ?>collections/browse/">Places</a></li>
      </ul>
      <div class="page-header-content">
        <h1><?php echo $collectionTitle; ?></h1>
        <p class="collection-curator">This place curated by <?php echo (metadata('collection', array('Dublin Core', 'Creator'))?metadata('collection', array('Dublin Core', 'Creator')):metadata('collection', array('Dublin Core', 'Contributor'))); ?></p>
      </div>
    </div>
  </header>
  <section class="page-content">
    <div class="container">
      <div class="collection-description">
        <p><?php echo text_to_paragraphs(metadata('collection', array('Dublin Core', 'Description'))); ?></p>
      </div>
      <?php if (metadata('collection', 'total_items') > 0): ?>
          <ul class="collection-items">
            <?php foreach (loop('items') as $item): ?>
              <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
              <li class="collection-item">
                <a href="<?php echo get_theme_option('baseurl'); ?>items/show/<?php echo $item->id; ?>">
                  <figure class="collection-item-asset">
                    <?php echo item_image('square_thumbnail', array('alt' => $itemTitle)); ?>
                    <figcaption>
                      <?php echo $itemTitle; ?>
                    </figcaption>
                  </figure>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
            <p><?php echo __("There are currently no items within this collection."); ?></p>
        <?php endif; ?>
    </div>
  </section>
</article>

<?php echo foot(); ?>
