<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses; // Pamiętaj o dodaniu tego importu!

class Whyus extends Block
{
	public $name = 'Sekcja: Dlaczego my?';
	public $description = 'Pobiera i wyświetla dane z Options Page (Dlaczego my)';
	public $slug = 'whyus-block';
	public $category = 'formatting';
	public $icon = 'groups';
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
	];

	public function fields()
	{
		$whyUsBlock = new FieldsBuilder('whyus_block');

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
			'title'         => get_field('title', 'option'),
			'description'   => get_field('description', 'option'),
			'counters'      => get_field('counters', 'option'),
			'cards'         => get_field('features_cards', 'option'),

			'section_id'    => get_field('section_id', 'option'),
			'section_class' => get_field('section_class', 'option'),
			'background'    => get_field('background', 'option') ?: 'none',
			'sectionClass'  => SectionClasses::fromMap([
				'flip' => (bool) get_field('flip', 'option'),
				'wide' => (bool) get_field('wide', 'option'),
				'nomt' => (bool) get_field('nomt', 'option'),
				'gap'  => (bool) get_field('gap', 'option'),
			], [
				'flip' => 'order-flip',
				'wide' => 'wide',
				'nomt' => '!mt-0',
				'gap'  => 'wider-gap',
			]),
		];
	}
}
