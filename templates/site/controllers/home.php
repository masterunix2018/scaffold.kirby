<?php 

return function ($site, $pages, $page, $args) {
    $newsList = $site->children()->find('news')->children();
    return compact('newsList');
};
