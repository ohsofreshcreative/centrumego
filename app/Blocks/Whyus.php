<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Whyus extends Block
{
	public $name = 'Sekcja: Dlaczego my?';
	public $description = 'Pobiera i wyświetla dane z Options Page (Dlaczego my)';
	public $slug = 'why-us-block';
	public $category = 'formatting';
	public $icon = 'groups';
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
	];

	public $view = 'blocks.whyus-block';

	public function fields()
	{
		$whyUsBlock = new FieldsBuilder('why_us_block');

		$whyUsBlock
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Dlaczego Centrum EGO',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- FIELDS ---*/
			->addMessage('Informacja', 'Treść tej sekcji edytujesz globalnie w zakładce "Dlaczego my?" w menu bocznym.');

		return $whyUsBlock->build();
	}

	public function with()
	{
		return [
			'title'       => get_field('title', 'option'),
			'description' => get_field('description', 'option'),
			'counters'    => get_field('counters', 'option'),
			'cards'       => get_field('features_cards', 'option'),
		];
	}
}
