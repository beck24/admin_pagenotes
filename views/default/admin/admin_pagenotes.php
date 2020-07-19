<?php

namespace AdminPagenotes;

echo elgg_list_entities([
    'type' => 'object',
    'subtype' => Note::SUBTYPE,
    'limit' => 50,
    'no_results' => elgg_echo('admin_pagenotes:note:no_results'),
    'order_by' => 'e.time_created asc',
    'show_location' => true
]);