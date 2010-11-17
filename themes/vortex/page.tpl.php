<?php
// $Id$
?>
<!DOCTYPE html>
<html lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
</head>
<body class="<?php print $body_classes; ?>">
  <div id="page-wrapper">
    <div id="page">
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
                  <a href="<?php print $front_page ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
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
          <?php if (!empty($header)): ?>
            <div id="header-region">
              <?php print $header; ?>
            </div>
          <?php endif; ?>
        </div> <!-- /header -->
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
      </div> <!-- /header-container -->

      <div id="container-wrapper" class="clear-block">
        <div id="main">
          <?php if (!empty($alpha)): ?>
          <div id="column-alpha" class="column sidebar">
            <?php print $alpha; ?>
          </div> <!-- /column-alpha -->
          <?php endif; ?>
          <?php if (!empty($bravo)): ?>
          <div id="column-bravo" class="column sidebar">
            <?php print $bravo; ?>
          </div> <!-- /column-bravo -->
          <?php endif; ?>
          <div id="column-charlie" class="column">
            <div id="main-squeeze">
            <?php print $charlie; ?>
            <?php if (!empty($breadcrumb)): ?><div id="breadcrumb"><?php print $breadcrumb; ?></div><?php endif; ?>
            <?php if (!empty($mission)): ?><div id="mission"><?php print $mission; ?></div><?php endif; ?>
            <div id="content-wrapper">
              <?php if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
              <?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
              <?php if (!empty($messages)): print $messages; endif; ?>
              <?php if (!empty($help)): print $help; endif; ?>
              <div id="content" class="clear-block">
                <?php print $content; ?>
              </div> <!-- /content -->
              <?php print $feed_icons; ?>
            </div> <!-- /content-wrapper -->
          </div> <!-- /main-squeeze --> 
          </div> <!-- /column-charlie -->
          <?php if (!empty($delta)): ?>
          <div id="column-delta" class="column sidebar">
            <?php print $delta; ?>
          </div> <!-- /column-delta -->
          <?php endif; ?>
        </div> <!-- /main -->
      </div> <!-- /container-wrapper -->

      <div id="footer-wrapper">
        <div id="footer">
          <?php if (!empty($footer)): print $footer; endif; ?>
          <div id="footer-message">
            <?php print $footer_message; ?>
          </div>
        </div> <!-- /footer -->
      </div> <!-- /footer-wrapper -->
      <?php print $scripts; ?>
      <?php print $closure; ?>
    </div> <!-- /page -->
  </div> <!-- /page-wrapper -->
</body>
</html>
