<?php

$url = current_page_url();

echo elgg_view('output/url', [
    'text' => elgg_view_icon('sticky-note'),
    'href' => 'javascript:void(0)',
    'class' => 'admin-pagenotes'
]);

$close = elgg_format_element('div', ['class' => 'close-wrapper'], elgg_view('output/url', [
    'text' => elgg_view_icon('close'),
    'href' => 'javascript:void(0)',
    'class' => 'admin-pagenotes-close'
]));

$list = elgg_format_element('div', ['class' => 'admin-pagenotes-list'], '');
$form = elgg_view_form('admin_pagenotes/edit');

echo elgg_format_element('div', ['class' => 'admin-pagenotes-wrapper'], $close . $list . $form);

?>
<script>
    require(['admin_pagenotes/ui']);
</script>
