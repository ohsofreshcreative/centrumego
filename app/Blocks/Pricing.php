<?php

namespace App\Blocks;

use App\Support\SectionClasses;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Pricing extends Block
{
	public $name = 'Pricing';
	public $description = 'Warianty programu z cenami';
	public $slug = 'pricing';
	public $category = 'formatting';
	public $icon = 'money-alt';
	public $keywords = ['pricing', 'cennik', 'warianty', 'program'];
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
		$pricing = new FieldsBuilder('pricing');

		$pricing
			->setLocation('block', '==', 'acf/pricing')
			->addTab('Nagłówek', ['placement' => 'top'])
			->addGroup('g_pricing', ['label' => ''])
				->addText('header', ['label' => 'Nagłówek'])
			->endGroup()
			->addTab('Warianty', ['placement' => 'top'])
			->addRepeater('r_plans', [
				'label' => 'Warianty programu',
				'layout' => 'block',
				'button_label' => 'Dodaj wariant',
			])
				->addText('label', [
					'label' => 'Etykieta wariantu',
					'default_value' => 'OPCJA I',
				])
				->addTrueFalse('recommended', [
					'label' => 'Polecane',
					'ui' => 1,
					'ui_on_text' => 'Tak',
					'ui_off_text' => 'Nie',
				])
				->addText('title', ['label' => 'Nazwa programu'])
				->addRepeater('r_features', [
					'label' => 'Pozycje wariantu',
					'layout' => 'table',
					'button_label' => 'Dodaj pozycję',
				])
					->addText('label', ['label' => 'Nazwa pozycji'])
					->addText('price', ['label' => 'Cena lub opis'])
					->addTrueFalse('included', [
						'label' => 'Wyróżnij jako w cenie',
						'ui' => 1,
						'ui_on_text' => 'Tak',
						'ui_off_text' => 'Nie',
					])
				->endRepeater()
				->addText('total_price', ['label' => 'Łączna cena'])
				->addLink('button', [
					'label' => 'Przycisk',
					'return_format' => 'array',
				])
			->endRepeater()
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

		return $pricing;
	}

	public function with(): array
	{
		$fields = [
			'g_pricing' => get_field('g_pricing'),
			'r_plans' => get_field('r_plans'),
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