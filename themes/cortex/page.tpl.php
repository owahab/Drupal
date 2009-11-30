<?php
// $Id$
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  <?php print $head; ?>
  <title><?php print t($head_title); ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <?php print cortex_get_ie_styles(); ?>
</head>
<body class="<?php print $body_classes; ?>">
  <div id="header-wrapper">
    <div id="header">
      <div id="logo-title">
        <?php if (!empty($logo)): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
          </a>
        <?php endif; ?>
        <div id="name-and-slogan">
          <?php if (!empty($site_name)): ?>
            <h1 id="site-name">
              <a href="<?php print $front_page ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print t($site_name); ?></span></a>
            </h1>
          <?php endif; ?>
          <?php if (!empty($site_slogan)): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div> <!-- /name-and-slogan -->
      </div> <!-- /logo-title -->
      <?php if (!empty($search_box)): ?>
        <div id="search-box"><?php print $search_box; ?></div>
      <?php endif; ?>
      <?php // print $feed_icons; ?>
      <?php if (!empty($header)): ?>
        <div id="header-region">
          <?php print $header; ?>
        </div>
      <?php endif; ?>
      <div id="navigation" class="menu <?php if (!empty($primary_links)) { print "withprimary"; } if (!empty($secondary_links)) { print " withsecondary"; } ?> ">
        <?php if (!empty($primary_links)): ?>
          <div id="primary" class="clear-block">
            <?php print theme('links', $primary_links, array('class' => 'links primary-links')); ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($secondary_links)): ?>
          <div id="secondary" class="clear-block">
            <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')); ?>
          </div>
        <?php endif; ?>
      </div> <!-- /navigation -->
    </div> <!-- /header -->
  </div> <!-- /header-container -->

  <div id="container-wrapper" class="clear-block">
    <div id="main">
      <?php if (!empty($left)): ?>
        <div id="sidebar-left" class="column sidebar">
          <?php print $left; ?>
        </div> <!-- /sidebar-left -->
      <?php endif; ?>
      <div id="content-wrapper" class="column"><div id="main-squeeze">
        <?php if (!empty($mission)): ?><div id="mission"><?php print $mission; ?></div><?php endif; ?>
        <?php if (!empty($content_upper)): ?><div id="content-upper"><?php print $content_upper; ?></div><?php endif; ?>
        <div id="content">
          <?php if (!empty($messages)): print $messages; endif; ?>
          <?php if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
          <?php if (!empty($help)): print $help; endif; ?>
          <?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
          <div id="content-content" class="clear-block">
            <?php print $content; ?>
          </div> <!-- /content-content -->
          <div id="content-lower" class="clear-block">
            <?php print $content_lower; ?>
          </div> <!-- /content-lower -->
        </div> <!-- /content -->
      </div></div> <!-- /main-squeeze /main -->
      <?php if (!empty($right)): ?>
        <div id="sidebar-right" class="column sidebar">
          <?php print $right; ?>
        </div> <!-- /sidebar-right -->
      <?php endif; ?>
    </div> <!-- /content-wrapper -->
  </div> <!-- /container -->

  <div id="footer-wrapper">
    <div id="footer">
      <?php if (!empty($breadcrumb)): ?><div id="breadcrumb" class="<?php if (!empty($footer_message)) { print "withfootermessage"; } ?>"><?php print $breadcrumb; ?></div><?php endif; ?>
      <?php if (!empty($footer_upper)): ?><div id="footer-upper"><?php print $footer_upper; ?></div><?php endif; ?>
      <?php if ($footer_left): ?>
      <div id="footer-left" class="footer-column"><?php print $footer_left; ?></div>
      <?php endif; ?>
      <?php if ($footer_middle): ?>
      <div id="footer-middle" class="footer-column"><?php print $footer_middle; ?></div>
      <?php endif; ?>
      <?php if ($footer_right): ?>
      <div id="footer-right" class="footer-column"><?php print $footer_right; ?></div>
      <?php endif; ?>
      <?php if (!empty($footer_lower)): ?><div id="footer-lower"><?php print $footer_lower; ?></div><?php endif; ?>
      <div id="footer-message" class="<?php if (!empty($breadcrumb)) { print "withbreadcrumb"; } ?>"><?php print $footer_message; ?></div>
    </div> <!-- /footer -->
  </div> <!-- /footer-wrapper -->
  <?php print $closure; ?>
</body>
</html>
