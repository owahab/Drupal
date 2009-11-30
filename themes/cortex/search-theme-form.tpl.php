<?php
// $Id$
?>
<div id="search" class="container-inline">
  <?php
    global $theme_path, $base_path;
    $search_form = str_replace('type="submit"', 'type="image" src="' . $base_path . $theme_path .'/images/left-arrow.png"', $search_form);
  ?>
  <?php print $search_form; ?>
</div>
