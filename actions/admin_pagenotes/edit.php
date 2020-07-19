<?php

namespace AdminPagenotes;

$content = get_input('content');
$url = get_input('url');

$pos = strpos($url, elgg_get_site_url());
if ($pos !== false) {
    $url = substr_replace($url, '', $pos, strlen(elgg_get_site_url()));
}

$guid = get_input('guid');

if (!$content) {
    return elgg_error_response(elgg_echo('admin_pagenotes:note:error:content_empty'));
}

$note = get_entity($guid);
if (!$note instanceof Note) {
    $note = new Note();
}

$note->url = $url;
$note->content = $content;

if (!$note->save()) {
    return elgg_error_response(elgg_echo('admin_pagenotes:note:error:cannot_save'));
}

$notes = elgg_view('admin_pagenotes/notes_list', ['url' => $url]);

return elgg_ok_response($notes, elgg_echo('admin_pagenotes:note:saved'));