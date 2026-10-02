<?php

namespace App\Blocks;

use App\Support\SectionClasses;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Qualification extends Block
{
	public $name = 'Kwalifikacja';
    public $description = 'Etap kwalifikacji z zakresem i cennikiem';
	public $slug = 'qualification';
	public $category = 'formatting';
	public $icon = 'list-view';
	public $keywords = ['kwalifikacja', 'etap', 'cennik', 'cena'];
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
		$qualification = new FieldsBuilder('qualification');

		$qualification
			->setLocation('block', '==', 'acf/qualification')
			->addTab('Treść', ['placement' => 'top'])
			->addGroup('g_qualification', ['label' => ''])
				->addText('eyebrow', [
					'label' => 'Nadtytuł',
					'default_value' => 'ETAP I',
				])
				->addText('header', ['label' => 'Nagłówek'])
				->addWysiwyg('txt', [
					'label' => 'Treść',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => false,
				])
			->endGroup()
			->addTab('Korzyści', ['placement' => 'top'])
			->addRepeater('r_benefits', [
				'label' => 'Punkty',
				'layout' => 'table',
				'button_label' => 'Dodaj punkt',
			])
				->addText('text', ['label' => 'Treść'])
			->endRepeater()
			->addTab('Cennik', ['placement' => 'top'])
			->addRepeater('r_prices', [
				'label' => 'Pozycje cennika',
				'layout' => 'table',
				'button_label' => 'Dodaj pozycję',
			])
				->addText('title', ['label' => 'Nazwa usługi'])
				->addText('price', ['label' => 'Cena'])
			->endRepeater()
			->addText('total_label', [
				'label' => 'Etykieta podsumowania',
				'default_value' => 'Łączna wartość etapu',
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

		return $qualification;
	}

	public function with(): array
	{
		$fields = [
			'g_qualification' => get_field('g_qualification'),
			'r_benefits' => get_field('r_benefits'),
			'r_prices' => get_field('r_prices'),
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