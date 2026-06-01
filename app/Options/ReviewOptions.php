<?php

namespace App\Options;

use Log1x\AcfComposer\Options;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ReviewOptions extends Options
{
	public $name = 'Opinie';
	public $slug = 'review-options';
	public $title = 'Globalne Zarządzanie Opiniami';
	public $capability = 'edit_posts';
	public $redirect = false;

	public function fields(): array
	{
		$reviewOptions = new FieldsBuilder('review_options');

		$reviewOptions
			/*--- TREŚCI GŁÓWNE ---*/
			->addTab('Treści nagłówka', ['placement' => 'top'])
			->addGroup('g_reviews', ['label' => 'Nagłówek sekcji opinii'])
			->addText('title', ['label' => 'Tytuł'])
			->addWysiwyg('text', ['label' => 'Opis', 'media_upload' => 0, 'tabs' => 'visual'])
			->endGroup()
			
			// Tabs - linki  do opinii 
			->addTab('Linki opinii', ['placement' => 'top'])
			->addUrl('global_link_google', [
				'label' => 'Link do profilu Google',
			])
			->addUrl('global_link_znanylekarz', [
				'label' => 'Link do profilu Znany Lekarz',
			])

			/*--- OPINIE ---*/
			->addTab('Opinie', ['placement' => 'top'])
			->addRepeater('r_reviews', [
				'label' => 'Slider - Opinie',
				'layout' => 'table',
				'min' => 1,
				'max' => 15,
				'button_label' => 'Dodaj kafelek'
			])
			->addTextarea('txt', [
				'label' => 'Opis',
				'rows' => 4,
				'new_lines' => 'br',
			])
			->addText('name', [
				'label' => 'Klient',
			])

			->addSelect('source_platform', [
				'label' => 'Źródło opinii',
				'choices' => [
					'google' => 'Google',
					'znanylekarz' => 'Znany Lekarz',
				],
				'default_value' => 'google',
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 1,
			])
			->endRepeater();

		return $reviewOptions->build();
	}
}
