<div class="preview">
  <span class="preview-label">Featured Item</span>
  <?php if (metadata('item', 'has files')): ?>
    <div class="preview-img">
        <?php echo link_to_item(item_image()); ?>
    </div>
  <?php endif; ?>
  <div class="preview-meta">
    <h2><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class' => 'permalink')); ?></h2>
    <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet' => 140))): ?>
      <div class="description">
          <?php echo $description; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
