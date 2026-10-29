<?php

namespace App\Blocks;

use App\Support\SectionBackgrounds;
use App\Support\SectionClasses;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Services extends Block
{
	public $name = 'Pakiety konsultacji';
	public $description = 'Pakiety pierwszej konsultacji z cenami i elementami wspólnymi';
	public $slug = 'services';
	public $category = 'formatting';
	public $icon = 'money-alt';
	public $keywords = ['usługi', 'ceny', 'konsultacja', 'pakiety'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
	];

	public function fields()
	{
		$services = new FieldsBuilder('services');

		$services
			->setLocation('block', '==', 'acf/services')
			->addTab('Pakiety konsultacji', ['placement' => 'top'])
			->addGroup('g_packages', ['label' => ''])
				->addText('header', ['label' => 'Nagłówek'])
			->endGroup()
			->addRepeater('r_packages', [
				'label' => 'Pakiety',
				'layout' => 'block',
				'button_label' => 'Dodaj pakiet',
			])
				->addText('label', ['label' => 'Etykieta'])
				->addTrueFalse('recommended', [
					'label' => 'Wyróżniony pakiet',
					'ui' => 1,
					'ui_on_text' => 'Tak',
					'ui_off_text' => 'Nie',
				])
				->addText('title', ['label' => 'Nazwa pakietu'])
				->addText('price', ['label' => 'Cena'])
				->addRepeater('r_features', [
					'label' => 'Elementy pakietu',
					'layout' => 'table',
					'button_label' => 'Dodaj element',
				])
					->addText('text', ['label' => 'Treść'])
				->endRepeater()
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
			->addTab('Wspólne elementy pakietów', ['placement' => 'top'])
			->addGroup('g_benefits', ['label' => ''])
				->addText('header', ['label' => 'Nagłówek'])
				->addWysiwyg('text', [
					'label' => 'Treść',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => true,
				])
			->endGroup()
			->addRepeater('r_benefits', [
				'label' => 'Elementy',
				'layout' => 'table',
				'button_label' => 'Dodaj element',
			])
				->addText('title', ['label' => 'Nazwa'])
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
			->addSelect('background', [
				'label' => 'Kolor tła',
				'choices' => SectionBackgrounds::choices(),
				'default_value' => 'none',
			]);

		return $services;
	}

	public function with(): array
	{
		$fields = [
			'g_packages' => get_field('g_packages') ?: [],
			'r_packages' => get_field('r_packages') ?: [],
			'g_benefits' => get_field('g_benefits') ?: [],
			'r_benefits' => get_field('r_benefits') ?: [],
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
