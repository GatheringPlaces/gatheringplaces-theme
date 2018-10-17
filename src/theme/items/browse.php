<?php
$pageTitle = __('Browse Items');
echo head(array('title' => $pageTitle));
?>
<section class="landing-page">
  <section class="landing-page-intro" id="page-intro" aria-hidden="false">
    <h1><?php echo $pageTitle;?> </h1>
    <p><?php echo __('Showing %s items', $total_results); ?></p>
    <hr>
    <div id="outputs">
        <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
        <?php echo output_format_list(false); ?>
    </div>
  </section>
  <section class="landing-page-content">

    <?php if ($total_results > 0): ?>

      <?php
      $sortLinks[__('Title')] = 'Dublin Core,Title';
      $sortLinks[__('Creator')] = 'Dublin Core,Creator';
      $sortLinks[__('Date Added')] = 'added';
      ?>
      <div id="sort-links">
          <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
      </div>

    <?php endif; ?>

    <ul class="item-previews">
      <?php foreach (loop('items') as $item): ?>
        <li class="item-preview">
          <?php if (metadata('item', 'has files')): ?>
            <div class="item-preview-img">
                <?php echo link_to_item(item_image()); ?>
            </div>
          <?php endif; ?>
          <div class="item-preview-meta">
            <h2><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class' => 'permalink')); ?></h2>
            <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet' => 140))): ?>
            <div class="item-description">
                <?php echo $description; ?>
            </div>
            <?php endif; ?>
          </div>

          <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' => $item)); ?>

          </div><!-- end class="item-meta" -->
        </li><!-- end class="item hentry" -->
      <?php endforeach; ?>
    </ul>

    <?php echo pagination_links(); ?>
  </section>
</section>

<?php fire_plugin_hook('public_items_browse', array('items' => $items, 'view' => $this)); ?>

<?php echo foot(); ?>
