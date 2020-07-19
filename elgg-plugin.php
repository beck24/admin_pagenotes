<?php

namespace AdminPagenotes;

return [
	'bootstrap' => __NAMESPACE__ . '\\Bootstrap',
	'entities' => [
		[
			'type' => 'object',
			'subtype' => 'admin_pagenote',
			'class' => __NAMESPACE__ . '\\Note',
			'searchable' => false,
		],
	],

	'actions' => [
		'admin_pagenotes/edit' => [
			'access' => 'admin',
		],
	],

	'hooks' => [
		'view_vars' => [
			'page/elements/html' => [
				__NAMESPACE__ . '\\Hooks::notesJSInjector' => []
			]
		]
	]
];
