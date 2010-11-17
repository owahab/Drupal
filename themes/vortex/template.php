<?php
// $Id$

/**
 * Return a themed set of links.
 *
 * @param $links
 *   A keyed array of links to be themed.
 * @param $attributes
 *   A keyed array of attributes
 * @return
 *   A string containing an unordered list of links.
 */
function phptemplate_links($links, $attributes = array('class' => 'links')) {
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

function phptemplate_preprocess_page(&$vars) {
  $columns = 1;
  if (!empty($vars['alpha'])) {
    $columns++;
  }
  if (!empty($vars['bravo'])) {
    $columns++;
    //= ($variables['layout'] == 'two') ? 'three' : 'two';
  }
  if (!empty($vars['charlie'])) {
    // No need to count charlie
    //= ($variables['layout'] == 'two') ? 'three' : 'two';
  }
  if (!empty($vars['delta'])) {
    //$variables['layout'] = ($variables['layout'] == 'charlie') ? 'four' : ($variables['layout'] == 'charlie') ? 'three' : 'delta';
    $columns++;
  }

  // Compile a list of classes that are going to be applied to the body element.
  // This allows advanced theming based on context (home page, node of certain type, etc.).
  $body_classes = array();
  // Add a class that tells us whether we're on the front page or not.
  $body_classes[] = $vars['is_front'] ? 'front' : 'not-front';
  // Add a class that tells us whether the page is viewed by an authenticated user or not.
  $body_classes[] = $vars['logged_in'] ? 'logged-in' : 'not-logged-in';
  // Add arg(0) to make it possible to theme the page depending on the current page
  // type (e.g. node, admin, user, etc.). To avoid illegal characters in the class,
  // we're removing everything disallowed. We are not using 'a-z' as that might leave
  // in certain international characters (e.g. German umlauts).
  $body_classes[] = preg_replace('![^abcdefghijklmnopqrstuvwxyz0-9-_]+!s', '', 'page-'. form_clean_id(drupal_strtolower(arg(0))));
  $body_classes[] = preg_replace('![^abcdefghijklmnopqrstuvwxyz0-9-_]+!s', '', 'pn-'. str_replace('/', '-', drupal_get_normal_path($_GET['q'])));
  $body_classes[] = preg_replace('![^abcdefghijklmnopqrstuvwxyz0-9-_]+!s', '', 'pa-'. str_replace('/', '-', drupal_get_path_alias($_GET['q'])));
  // If on an individual node page, add the node type.
  if (isset($vars['node']) && $vars['node']->type) {
    $body_classes[] = 'node-type-'. form_clean_id($vars['node']->type);
  }

  // Add information about the number of columns.
  $body_classes[] = 'column-count-' . $columns;
  // Implode with spaces.
  $vars['body_classes'] = implode(' ', $body_classes);
}
