<?php

// 公司简介页面节点ID
define('ABOUT_NID', 2);
define('ABOUT_NID_EN', 3);

/**
 * 预处理 page.tpl.php 模板变量.
 *
 */
function default_preprocess_page(&$vars) {
  global $base_url;
  // 主题路径
  $vars['theme_path'] = $base_url . '/' . drupal_get_path('theme', 'default');
}

/**
 * 根据不同node类型路由到不同的preprocess函数进行预处理
 */
function default_preprocess_node(&$vars) {
  $function = __FUNCTION__ . '_' . $vars['type'];
  if (function_exists($function)) {
    $function($vars);
  }
$path_alias = drupal_get_path_alias();
//print_r($path_alias);
if(arg(0) == 'taxonomy') {
  array_push($vars['theme_hook_suggestions'], 'node__taxonomy__'.$path_alias);
  }
}

/**
 * 预处理 node--news.tpl.php 变量
 */
function default_preprocess_node_news(&$vars) { 
  $node = $vars['node'];
  
  // 浏览数
  $statistics = statistics_get($node->nid);
  $vars['view_count'] = $statistics['totalcount'] ? $statistics['totalcount'] : 0;
  
  // 类型
  if ($node->field_type['und'][0]['value'] == 1) {
    $type_title = '新品资讯';
    $type_url = url('news');
  }
  else {
    $type_title = '公司动态';
    $type_url = url('news/trends');
  }
  $vars['type'] = array('title' => $type_title, 'url' => $type_url);
  
  // 前一篇、后一篇
  $vars['prev'] = db_query("SELECT n.nid, n.title FROM {node} n WHERE n.nid < :nid AND n.type = :type  ORDER BY n.nid DESC LIMIT 1", array(':nid' => $node->nid, ':type' => 'news'))->fetchObject();
  $vars['next'] = db_query("SELECT n.nid, n.title FROM {node} n WHERE n.nid > :nid AND  n.type = :type ORDER BY n.nid ASC LIMIT 1", array(':nid' => $node->nid, ':type' => 'news'))->fetchObject();
}

/**
 * 预处理 node--product.tpl.php 变量
 */
function default_preprocess_node_product(&$vars) { 
   global $base_url;
  
  // 主题路径
  $vars['theme_path'] = $base_url . '/' . drupal_get_path('theme', 'default');
}