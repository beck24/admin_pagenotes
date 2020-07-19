<?php

echo elgg_view_field([
    '#type' => 'hidden',
    'name' => 'url',
    'value' => current_page_url(),
    'class' => 'admin-pagenotes-url-input'
]);

echo elgg_view_field([
    '#type' => 'longtext',
    'name' => 'content',
    'required' => true,
]);

echo elgg_view_field([
    '#type' => 'submit',
    'value' => elgg_echo('submit')
]);