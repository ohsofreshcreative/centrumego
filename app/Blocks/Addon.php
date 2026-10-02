<?php

namespace App\Blocks;

use App\Support\SectionClasses;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Addon extends Block
{
	public $name = 'Addon';
	public $description = 'Opcjonalny dodatek z kosztem';
	public $slug = 'addon';
	public $category = 'formatting';
	public $icon = 'plus-alt2';
	public $keywords = ['addon', 'dodatek', 'opcjonalnie', 'cena'];
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
		$addon = new FieldsBuilder('addon');

		$addon
			->setLocation('block', '==', 'acf/addon')
			->addTab('Treść', ['placement' => 'top'])
			->addGroup('g_addon', ['label' => ''])
				->addText('label', [
					'label' => 'Etykieta',
					'default_value' => 'Opcjonalnie',
				])
				->addText('header', ['label' => 'Nagłówek'])
				->addWysiwyg('txt', [
					'label' => 'Treść',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => false,
				])
			->endGroup()
			->addTab('Koszt', ['placement' => 'top'])
			->addText('price_label', [
				'label' => 'Opis ceny',
				'default_value' => 'Koszt opracowania',
			])
			->addText('price', ['label' => 'Cena'])
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

		return $addon;
	}

	public function with(): array
	{
		$fields = [
			'g_addon' => get_field('g_addon'),
			'price_label' => get_field('price_label'),
			'price' => get_field('price'),
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