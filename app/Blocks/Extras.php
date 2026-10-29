<?php

namespace App\Blocks;

use App\Support\SectionBackgrounds;
use App\Support\SectionClasses;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Extras extends Block
{
	public $name = 'Pozostałe usługi';
	public $description = 'Karty usług z ceną i rozwijanym opisem';
	public $slug = 'extras';
	public $category = 'formatting';
	public $icon = 'list-view';
	public $keywords = ['usługi', 'ceny', 'jadłospis', 'konsultacja'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
	];

	public function fields()
	{
		$extras = new FieldsBuilder('extras');

		$extras
			->setLocation('block', '==', 'acf/extras')
			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('g_extras', ['label' => ''])
				->addText('header', ['label' => 'Nagłówek'])
				->addWysiwyg('text', [
					'label' => 'Treść',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => true,
				])
				->addRepeater('r_extras', [
					'label' => 'Usługi',
					'layout' => 'block',
					'button_label' => 'Dodaj usługę',
				])
					->addText('title', ['label' => 'Nazwa usługi'])
					->addText('price', ['label' => 'Cena'])
					->addWysiwyg('description', [
						'label' => 'Opis rozwijany',
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => true,
					])
					->addLink('button', [
						'label' => 'Przycisk rezerwacji',
						'return_format' => 'array',
					])
				->endRepeater()
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

		return $extras;
	}

	public function with(): array
	{
		$fields = [
			'g_extras' => get_field('g_extras') ?: [],
			'extras' => get_field('g_extras')['r_extras'] ?? [],
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
