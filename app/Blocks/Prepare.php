<?php

namespace App\Blocks;

use App\Support\SectionBackgrounds;
use App\Support\SectionClasses;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Prepare extends Block
{
	public $name = 'Przygotowanie do wizyty';
	public $description = 'Karta z instrukcją przygotowania do wizyty';
	public $slug = 'prepare';
	public $category = 'formatting';
	public $icon = 'clipboard';
	public $keywords = ['przygotowanie', 'wizyta', 'karta pacjenta'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
	];

	public function fields()
	{
		$prepare = new FieldsBuilder('prepare');

		$prepare
			->setLocation('block', '==', 'acf/prepare')
			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('g_prepare', ['label' => ''])
				->addText('header', ['label' => 'Nagłówek'])
				->addWysiwyg('text', [
					'label' => 'Treść',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => true,
				])
				->addLink('button', [
					'label' => 'Przycisk pobrania',
					'return_format' => 'array',
				])
				->addText('note', ['label' => 'Informacja dodatkowa'])
			->endGroup()
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
			->addSelect('background', [
				'label' => 'Kolor tła',
				'choices' => SectionBackgrounds::choices(),
				'default_value' => 'none',
			]);

		return $prepare;
	}

	public function with(): array
	{
		$fields = [
			'g_prepare' => get_field('g_prepare') ?: [],
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'wide' => (bool) get_field('wide'),
			'nomt' => (bool) get_field('nomt'),
			'background' => get_field('background') ?: 'none',
		];

		$fields['sectionClass'] = SectionClasses::fromMap($fields, [
			'wide' => 'wide',
			'nomt' => '!mt-0',
		]);

		return $fields;
	}
}
