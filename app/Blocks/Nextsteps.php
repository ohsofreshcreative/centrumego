<?php

namespace App\Blocks;

use App\Support\SectionBackgrounds;
use App\Support\SectionClasses;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Nextsteps extends Block
{
	public $name = 'Co dalej';
	public $description = 'Numerowane ścieżki dalszego postępowania z banerem programu';
	public $slug = 'nextsteps';
	public $category = 'formatting';
	public $icon = 'editor-ol';
	public $keywords = ['kroki', 'ścieżki', 'program', 'co dalej'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
	];

	public function fields()
	{
		$nextsteps = new FieldsBuilder('nextsteps');

		$nextsteps
			->setLocation('block', '==', 'acf/nextsteps')
			->addTab('Ścieżki', ['placement' => 'top'])
			->addGroup('g_nextsteps', ['label' => ''])
				->addText('header', ['label' => 'Nagłówek'])
				->addRepeater('r_nextsteps', [
					'label' => 'Ścieżki',
					'layout' => 'table',
					'button_label' => 'Dodaj ścieżkę',
				])
					->addText('text', ['label' => 'Treść'])
				->endRepeater()
				->addLink('button', [
					'label' => 'Przycisk',
					'return_format' => 'array',
				])
			->endGroup()
			->addTab('Baner programu', ['placement' => 'top'])
			->addGroup('g_program', ['label' => ''])
				->addText('anchor', ['label' => 'ID kotwicy banera'])
				->addText('header', ['label' => 'Nagłówek'])
				->addWysiwyg('text', [
					'label' => 'Treść',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => true,
				])
				->addLink('button', [
					'label' => 'Przycisk',
					'return_format' => 'array',
				])
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

		return $nextsteps;
	}

	public function with(): array
	{
		$fields = [
			'g_nextsteps' => get_field('g_nextsteps') ?: [],
			'nextsteps' => get_field('g_nextsteps')['r_nextsteps'] ?? [],
			'g_program' => get_field('g_program') ?: [],
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
