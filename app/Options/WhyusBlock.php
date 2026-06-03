<?php

namespace App\Options;

use Log1x\AcfComposer\Options;
use StoutLogic\AcfBuilder\FieldsBuilder;

class WhyusBlock extends Options
{
	public $name = 'Dlaczego Centrum EGO?';
	public $slug = 'whyus';
	public $title = 'Sekcja: Dlaczego Centrum EGO';
	public $capability = 'edit_posts';
	public $redirect = false;

	public function fields(): array
	{
		$whyUs = new FieldsBuilder('why_us_options');

		$whyUs
			->addTab('Nagłówek', ['placement' => 'top'])
			->addText('title', [
				'label' => 'Tytuł sekcji',
			])
			->addTextarea('description', [
				'label' => 'Opis pod tytułem',
				'rows' => 3,
			])

			->addTab('Statystyki', ['placement' => 'top'])
			->addRepeater('counters', [
				'label' => 'Statystyki',
				'layout' => 'table',
				'button_label' => 'Dodaj statystykę',
			])
			->addText('number', [
				'label' => 'Liczba / Wartość',
			])
			->addText('label', [
				'label' => 'Etykieta',
			])
			->endRepeater()

			->addTab('Kafelki główne', ['placement' => 'top'])
			->addRepeater('features_cards', [
				'layout' => 'block',
				'button_label' => 'Dodaj kartę',
			])
			->addImage('image', [
				'label' => 'Zdjęcie w tle',
				'return_format' => 'array',
				'wrapper' => ['width' => '30%'],
			])
			->addText('title', [
				'label' => 'Tytuł karty',
				'wrapper' => ['width' => '70%'],
			])
			->addWysiwyg('txt', [
				'label' => 'Treść',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => true,
			])
			->endRepeater();

		return $whyUs->build();
	}
}
