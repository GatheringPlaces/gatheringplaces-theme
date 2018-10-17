<?php
  echo head(array('title' => metadata('item', array('Dublin Core', 'Title'))));
?>

<article class="page item show">
  <header class="page-header">
    <div class="container">
      <ul class="breadcrumbs">
        <li><a href="/">Home</a></li>
        <li><a href="/items/browse/">Items</a></li>
      </ul>
      <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
    </div>
  </header>
  <section class="page-content">
    <div class="container">
      <section class="item-assets">
        <?php $images = $item->Files; $imagesCount = 1; ?>
          <?php if ($images): ?>
          <ul class="item-images">
            <?php foreach ($images as $image): ?>
              <?php if ($imagesCount === 1): ?>
                <li>
                  <figure class="item-image">
                    <img src="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>" /></li>
                  </figure>
                </li>
              <?php endif; ?>
            <?php $imagesCount++; endforeach; ?>
          </ul>
        <?php else: ?>
          <div class="no-image">No photos available.</div>
        <?php endif; ?>
      </section>
      <section class="item-metadata">
        <p class="item-description"><?php echo metadata($item, array('Dublin Core', 'Description')); ?></p>
        <?php if (metadata('item', 'Collection Name')): ?>
          <div id="collection" class="element">
            <p class="item-collection-statement">Find related items in the <?php echo link_to_collection_for_item(); ?> collection.</p>
          </div>
        <?php endif; ?>
        <?php if (metadata('item', 'has tags')): ?>
          <ul class="item-tags">
            <?php
              $tags = $item->Tags;
              foreach ($tags as $tag) {
                echo '<li class="tag">' . link_to_items_browse($tag, array('tags' => $tag['name'])) . '</li>';
              }
            ?>
          </ul>
        <?php endif;?>
        <ul class="item-additional-metadata">
          <li>Source: <?php echo metadata($item, array('Dublin Core', 'Source')); ?></li>
          <li>Creator: <?php echo metadata($item, array('Dublin Core', 'Creator')); ?></li>
        </ul>
      </section>
      <section class="pagination">
        <ul class="pager">
            <li class="previous"><?php echo link_to_previous_item_show(); ?></li>
            <li class="next"><?php echo link_to_next_item_show(); ?></li>
        </ul>
      </section>
    </div>
  </section>
</article>

<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

<?php echo foot(); ?>
