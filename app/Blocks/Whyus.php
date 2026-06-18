<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Whyus extends Block
{
    public $name = 'Sekcja: Dlaczego my?';
    public $description = 'Pobiera i wyświetla dane z Options Page (Dlaczego my)';
    public $slug = 'whyus-block';
    public $category = 'formatting';
    public $icon = 'groups';
    public $keywords = ['whyus', 'dlaczego-my'];
    public $mode = 'edit';
    public $supports = [
        'align' => false,
        'mode' => false,
        'jsx' => true,
        'anchor' => true,
        'customClassName' => true,
    ];

    public function fields()
    {
        $whyUsBlock = new FieldsBuilder('whyus_block');

        $whyUsBlock
            ->setLocation('block', '==', 'acf/whyus-block')
            ->addText('block-title', [
                'label' => 'Tytuł',
                'required' => 0,
            ])
            ->addAccordion('accordion1', [
                'label' => 'Dlaczego Centrum EGO',
                'open' => false,
                'multi_expand' => true,
            ])

            /*--- KARTA 1: INFORMACJE ---*/
            ->addTab('Informacja', ['placement' => 'top'])
            ->addMessage('Info', 'Treść tej sekcji edytujesz globalnie w zakładce "Dlaczego my?" w menu bocznym.')

            /*--- KARTA 2: USTAWIENIA WIZUALNE BLOKU ---*/
            ->addTab('Ustawienia bloku', ['placement' => 'top'])
            ->addText('section_id', [
                'label' => 'ID',
            ])
            ->addText('section_class', [
                'label' => 'Dodatkowe klasy CSS',
            ])
            ->addTrueFalse('nolist', [
                'label' => 'Brak punktatorów',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addTrueFalse('flip', [
                'label' => 'Odwrotna kolejność',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
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
                    'section-lighter-grad' => 'Gradient Pionowy (Lighter)',
                    'section-light-horizontal' => 'Gradient Poziomy',
                ],
                'default_value' => 'none',
                'allow_null' => 0,
            ]);

        return $whyUsBlock;
    }

    public function with(): array
    {
        $fields = [
            // GLOBLANE DANE Z OPTIONS PAGE
            'title'         => get_field('title', 'option'),
            'description'   => get_field('description', 'option'),
            'counters'      => get_field('counters', 'option'),
            'cards'         => get_field('features_cards', 'option'),

            // LOKALNE USTAWIENIA BLOKU
            'block_title'   => get_field('block-title'),
            'section_id'    => get_field('section_id'),
            'section_class' => get_field('section_class'),

            'nolist'        => (bool) get_field('nolist'),
            'flip'          => (bool) get_field('flip'),
            'wide'          => (bool) get_field('wide'),
            'nomt'          => (bool) get_field('nomt'),
            'gap'           => (bool) get_field('gap'),

            'background'    => get_field('background') ?: 'none',
        ];

        $fields['sectionClass'] = SectionClasses::fromMap($fields, [
            'nolist' => 'no-list',
            'flip'   => 'order-flip',
            'wide'   => 'wide',
            'nomt'   => '!mt-0',
            'gap'    => 'wider-gap',
        ]);

        return $fields;
    }
}