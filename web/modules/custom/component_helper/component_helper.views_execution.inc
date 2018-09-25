<?php

use Drupal\views\ViewExecutable;

/**
 * Implements hook_views_query_substitutions().
 * Sets the number of items based on the paragraph bundle setting
 * Using this hook instead of alter so that queries can be cached.
 */
function component_helper_views_query_substitutions(ViewExecutable $view) {
  if ($view->id() == 'tagged_content') {
    $limit = (isset($view->args[2])) ? $view->args[2] : 0;
    if ($limit > 0) {
      $view->query->setLimit($limit);
    }
  }
}
