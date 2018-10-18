<?php
$pageTitle = __('Search');
echo head(array('title' => $pageTitle));
$searchRecordTypes = get_search_record_types();
?>

<section class="landing-page">
  <section class="landing-page-intro" id="page-intro" aria-hidden="false">
    <h1><?php echo $pageTitle; ?></h1>
    <?php if ($total_results): ?>
      <?php echo search_filters(); ?>
    <?php endif; ?>
  </section>

  <section class="landing-page-content">
    <?php if ($total_results): ?>
      <table id="search-results">
          <thead>
              <tr>
                  <th><?php echo __('Record Type');?></th>
                  <th><?php echo __('Title');?></th>
              </tr>
          </thead>
          <tbody>
              <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
              <?php foreach (loop('search_texts') as $searchText): ?>
              <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
              <?php $recordType = $searchText['record_type']; ?>
              <?php set_current_record($recordType, $record); ?>
              <tr class="<?php echo strtolower($filter->filter($recordType)); ?>">
                  <td>
                      <?php echo $searchRecordTypes[$recordType]; ?>
                  </td>
                  <td>
                      <?php if ($recordImage = record_image($recordType)): ?>
                          <?php echo link_to($record, 'show', $recordImage, array('class' => 'image')); ?>
                      <?php endif; ?>
                      <a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a>
                  </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
      <?php echo pagination_links(); ?>
    <?php else: ?>
    <div id="no-results">
        <p><?php echo __('Your query returned no results.');?></p>
    </div>
    <?php endif; ?>
  </section>
</section>

<?php echo foot(); ?>
