<?php
// $Id$
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> <?php print 'node-' . $node->type; ?> clear-block">

<?php print $picture ?>

<?php if (!$page): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>

  <div class="content">
    <?php if ($submitted): ?>
      <div class="submitted"><?php print $submitted ?></div>
    <?php endif; ?>
    <?php print $content ?>
  </div>

<?php if ($terms || $links): ?>
  <div class="meta">
  <?php if ($terms): ?>
    <div class="terms terms-inline"><?php print $terms ?></div>
  <?php endif;?>
  <?php if ($links): ?>
    <div class="extra-links terms-inline"><?php print $links; ?></div>
  <?php endif;?>
  </div>
<?php endif; ?>

</div>
