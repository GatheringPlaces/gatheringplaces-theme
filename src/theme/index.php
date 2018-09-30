<?php

  $neatlineExhibitID = get_theme_option('Homepage Neatline Exhibit');
  $neatline = get_record_by_id('NeatlineExhibit', $neatlineExhibitID );

  if (!$neatline) {
      return;
  }
?>

<style>
  iframe{
    width: 100%;
    height: 30rem;
  }
</style>
<div>
<iframe src="<?php echo nl_getExhibitUrl($neatline, "fullscreen")  ?>" seamless></iframe>
