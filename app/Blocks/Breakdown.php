<?php

namespace App\Blocks;

use App\Support\SectionClasses;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Breakdown extends Block
{
	public $name = 'Breakdown';
	public $description = 'Rozpiska programu z kosztami';
	public $slug = 'breakdown';
	public $category = 'formatting';
	public $icon = 'editor-ul';
	public $keywords = ['breakdown', 'program', 'koszty', 'cennik'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
		'anchor' => true,
		'customClassName' => true,
	];

	public function fields()
	{
		$breakdown = new FieldsBuilder('breakdown');

		$breakdown
			->setLocation('block', '==', 'acf/breakdown')
			->addTab('Wprowadzenie', ['placement' => 'top'])
			->addGroup('g_breakdown', ['label' => ''])
				->addText('eyebrow', [
					'label' => 'Nadtytuł',
					'default_value' => 'ETAP II',
				])
				->addText('header', ['label' => 'Nagłówek'])
				->addTextarea('txt', [
					'label' => 'Opis',
					'rows' => 4,
				])
			->endGroup()
			->addTab('Elementy programu', ['placement' => 'top'])
			->addRepeater('r_items', [
				'label' => 'Karty',
				'layout' => 'block',
				'button_label' => 'Dodaj kartę',
			])
				->addText('title', ['label' => 'Nazwa elementu'])
				->addText('price', ['label' => 'Cena'])
				->addTextarea('calculation', [
					'label' => 'Pasek z wyliczeniem',
					'rows' => 2,
				])
				->addTextarea('txt', [
					'label' => 'Opis',
					'rows' => 3,
				])
			->endRepeater()
			->addTab('Podsumowanie', ['placement' => 'top'])
			->addText('total_label', [
				'label' => 'Etykieta podsumowania',
				'default_value' => 'Łączna wartość podstawowego programu',
			])
			->addText('total_price', ['label' => 'Łączna kwota'])
			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addText('section_id', ['label' => 'ID'])
			->addText('section_class', ['label' => 'Dodatkowe klasy CSS'])
			->addTrueFalse('wide', [
				'label' => 'Szeroka kolumna',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('gap', [
				'label' => 'Większy odstęp',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addSelect('background', [
				'label' => 'Kolor tła',
				'choices' => [
					'none' => 'Brak (domyślne)',
					'section-white' => 'Białe',
					'section-light' => 'Jasne',
					'section-gray' => 'Szare',
					'section-brand' => 'Marki',
					'section-gradient' => 'Gradient',
					'section-dark' => 'Ciemne',
					'section-soft-blue' => 'Jasnoniebieskie (#F4F9FF)',
					'section-lighter-grad' => 'Gradient pionowy (Lighter)',
					'section-light-horizontal' => 'Gradient poziomy',
				],
				'default_value' => 'section-soft-blue',
				'allow_null' => 0,
			]);

		return $breakdown;
	}

	public function with(): array
	{
		$fields = [
			'g_breakdown' => get_field('g_breakdown'),
			'r_items' => get_field('r_items'),
			'total_label' => get_field('total_label'),
			'total_price' => get_field('total_price'),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'wide' => (bool) get_field('wide'),
			'nomt' => (bool) get_field('nomt'),
			'gap' => (bool) get_field('gap'),
			'background' => get_field('background') ?: 'section-soft-blue',
		];

		$fields['sectionClass'] = SectionClasses::fromMap($fields, [
			'wide' => 'wide',
			'nomt' => '!mt-0',
			'gap' => 'wider-gap',
		]);

		return $fields;
	}
}