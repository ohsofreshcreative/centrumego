<?php

/*--- CPT - Produkty ---*/

add_action('init', function () {
	register_post_type('problems', [
		'label'         => 'Problemy',
		'labels'        => [
	   'name'               => 'Problemy',
        'singular_name'      => 'Problem',
        'menu_name'          => 'Problemy',
        'name_admin_bar'     => 'Problem',
        'add_new'            => 'Dodaj nowy',
        'add_new_item'       => 'Dodaj nowy problem',
        'new_item'           => 'Nowy problem',
        'edit_item'          => 'Edytuj problem',
        'view_item'          => 'Zobacz problem',
        'all_items'          => 'Wszystkie problemy',
        'search_items'       => 'Szukaj problemów',
        'parent_item_colon'  => 'Rodzic:',
        'not_found'          => 'Nie znaleziono problemów.',
        'not_found_in_trash' => 'Brak problemów w koszu.'
		],
		'public'        => true,
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-warning',
		'menu_position' => 20,
		'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
		'taxonomies'    => ['problem_category'],
		'show_in_rest'  => true,
		'rewrite'       => ['slug' => 'problemy', 'with_front' => false],
	]); 
});

add_action('init', function () {
	register_taxonomy('problem_category', ['problems'], [
		'label'        => 'Kategorie problemów',
		'labels'       => [
			'name'              => 'Kategorie problemów',
			'singular_name'     => 'Kategoria problemu',
			'search_items'      => 'Szukaj kategorii',
			'all_items'         => 'Wszystkie kategorie',
			'parent_item'       => 'Kategoria nadrzędna',
			'parent_item_colon' => 'Kategoria nadrzędna:',
			'edit_item'         => 'Edytuj kategorię',
			'update_item'       => 'Aktualizuj kategorię',
			'add_new_item'      => 'Dodaj nową kategorię',
			'new_item_name'     => 'Nazwa nowej kategorii',
			'menu_name'         => 'Kategorie',
		],
		'hierarchical' => true,
		'public'       => true,
		'show_in_rest' => true,
		'rewrite'      => ['slug' => 'kategoria-problemów', 'with_front' => false],
	]);
});
