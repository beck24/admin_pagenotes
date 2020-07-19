<?php
/**
 * ElggObject default view.
 *
 * @warning This view may be used for other ElggEntity objects
 */

$entity = elgg_extract('entity', $vars);
if (!$entity instanceof ElggEntity) {
	return;
}

if (!isset($vars['icon'])) {
	$vars['icon'] = true;
}

if (!isset($vars['title']) && empty($entity->getDisplayName())) {
	$vars['title'] = false;
}

$vars['content'] = '';

if ($vars['show_location']) {
    $vars['content'] .= elgg_format_element('div', [], elgg_view('output/url', [
        'text' => elgg_normalize_url($entity->url),
        'href' => elgg_normalize_url($entity->url)
    ]));
}

$vars['content'] .= $entity->content;

echo elgg_view('object/elements/summary', $vars);
