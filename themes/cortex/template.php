<?php
// $Id$

/**
 * Initialize theme settings
 */
if (is_null(theme_get_setting('cortex_add_ie_js'))) {
  global $theme_key;

  /*
   * The default values for the theme variables. Make sure $defaults exactly
   * matches the $defaults in the theme-settings.php file.
   */
  $defaults = array(
    'cortex_add_ie_js' => 1,
  );

  // Get default theme settings.
  $settings = theme_get_settings($theme_key);
  // Don't save the toggle_node_info_ variables.
  if (module_exists('node')) {
    foreach (node_get_types() as $type => $name) {
      unset($settings['toggle_node_info_' . $type]);
    }
  }
  // Save default theme settings.
  variable_set(
    str_replace('/', '_', 'theme_'. $theme_key .'_settings'),
    array_merge($defaults, $settings)
  );
  // Force refresh of Drupal internals.
  theme_get_setting('', TRUE);
}

function phptemplate_preprocess_page(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}

function cortex_preprocess_node(&$variables) {
  //$node = $variables['node'];
}


function cortex_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    // comment the next line to disable current page in the breadcrumb trail
    $breadcrumb[] = '<span class="active-breadcrumb">' . drupal_get_title() . '</span>';
    return '<div class="breadcrumb">'. implode(' » ', $breadcrumb) .'</div>';
  }
}

function cortex_links($links, $attributes = array('class' => 'links')) {
  global $language;
  $output = '';

  if (count($links) > 0) {
    $output = '<ul'. drupal_attributes($attributes) .'>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = $key;

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class .= ' first';
      }
      if ($i == $num_links) {
        $class .= ' last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page())) && (empty($link['language']) || $link['language']->language == $language->language)) {
        $class .= ' active';
      }
      if ($link['href'] == '<front>') {
        $class .= ' home-link';
      }

      $output .= '<li'. drupal_attributes(array('class' => $class)) .'>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      else if (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span'. $span_attributes .'>'. $link['title'] .'</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}

function cortex_node_submitted($node) {
  if ($node->type != 'forum') {
    return t('!datetime',
      array(
        '!datetime' => format_date($node->created, 'small'),
      ));
  }
}

function cortex_comment_submitted($comment) {
  return t('<strong>!username</strong> on !datetime',
    array(
      '!username' => theme('username', $comment),
      '!datetime' => format_date($comment->timestamp)
    ));
}

function cortex_status_messages($display = NULL) {
  $output = '';
  foreach (drupal_get_messages($display) as $type => $messages) {
    $output .= "<div class=\"messages message-$type $type\">\n";
    $output .= " <ul>\n";
    foreach ($messages as $message) {
      $output .= '  <li>'. $message ."</li>\n";
    }
    $output .= " </ul>\n";
    $output .= "</div>\n";
  }
  return $output;
}

function cortex_get_ie_styles() {
  /*
  $iecss = '
    <!--[if lt IE 8]>
    <script src="' . base_path() . path_to_theme() . '/scripts/IE8.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/style-ie8.css" />
    <![endif]-->
    <!--[if IE ]>
    <link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/style-ie.css" />
    <![endif]-->';
   */
  $iecss = '
    <!--[if lt IE 8]>
    <script src="' . base_path() . path_to_theme() . '/scripts/IE8.js" type="text/javascript"></script>
    <![endif]-->';
  return $iecss;
}

