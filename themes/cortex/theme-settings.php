<?php
// $Id$

/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   array An array of saved settings for this theme.
 * @return
 *   array A form array.
 */
function phptemplate_settings($saved_settings) {
  /*
   * The default values for the theme variables. Make sure $defaults exactly
   * matches the $defaults in the template.php file.
   */
  $defaults = array(
    'cortex_add_ie_js' => 1,
  );

  // Merge the saved variables and their default values
  $settings = array_merge($defaults, $saved_settings);

  // Create the form widgets using Forms API
  $form['cortex_add_ie_js'] = array(
    '#type' => 'checkbox',
    '#title' => t('Add IE JavaScript patch'),
    '#description' => t('For more information see: !link', array('!link' => l('http://dean.edwards.name/weblog/2008/01/ie7-2/', 'http://dean.edwards.name/weblog/2008/01/ie7-2/'))),
    '#default_value' => $settings['cortex_add_ie_js'],
  );

  // Return the additional form widgets
  return $form;
}
?>
