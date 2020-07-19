<?php

namespace AdminPagenotes;

$url = get_input('url');

$pos = strpos($url, elgg_get_site_url());
if ($pos !== false) {
    $url = substr_replace($url, '', $pos, strlen(elgg_get_site_url()));
}

echo elgg_list_entities([
    'type' => 'object',
    'subtype' => Note::SUBTYPE,
    'metadata_name_value_pairs' => [
        [
            'name' => 'url',
            'value' => $url
        ]
    ],
    'limit' => false,
    'no_results' => elgg_echo('admin_pagenotes:note:no_results'),
    'order_by' => 'e.time_created asc'
]);