<?php

/**
 * 预处理 page-header.tpl.php 模板变量.
 *
 */
function template_preprocess_cnenterprise_common_page_header(&$vars) {
  global $base_url;
  
  $vars['theme_path'] = $base_url . '/' . drupal_get_path('theme', 'default');  
  $vars['front_page'] = url();
  
  $vars += _template_preprocess_default_variables();
}

/**
 * 预处理 page-footer.tpl.php 模板变量.
 *
 */
function template_preprocess_cnenterprise_common_page_footer(&$vars) {
  global $base_url, $user;
  
  $vars['theme_path'] = $base_url . '/' . drupal_get_path('theme', 'default');  
}

