<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Approach extends Block
{
    public $name = 'Tekst, zdjęcie i kafelki (Approach)';
    public $description = 'approach - tekst, zdjęcie i kafelki';
    public $slug = 'approach';
    public $category = 'formatting';
    public $icon = 'align-pull-left';
    public $keywords = ['tresc', 'zdjecie', 'approach', 'kafelki'];
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
        $approach = new FieldsBuilder('approach');

        $approach
            ->setLocation('block', '==', 'acf/approach') // ważne!
            ->addText('block-title', [
                'label' => 'Tytuł',
                'required' => 0,
            ])
            ->addAccordion('accordion1', [
                'label' => 'Tekst, zdjęcie oraz kafelki',
                'open' => false,
                'multi_expand' => true,
            ])
            /*--- GROUP ---*/
            ->addTab('Elementy', ['placement' => 'top'])
            ->addGroup('g_approach', ['label' => ''])
            ->addText('header', ['label' => 'Nagłówek'])
            ->endGroup()
            /*--- Tabs ---*/
            ->addTab('Kafelki', ['placement' => 'top'])
            ->addRepeater('r_approach', [
                'label' => 'Kafelki',
                'layout' => 'table',
                'min' => 1,
                'button_label' => 'Dodaj kafelek'
            ])

            ->addImage('card_image', [
                'label' => 'Obraz',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
            ])
            ->addText('card_title', [
                'label' => 'Nagłówek',
            ])
            ->addTextarea('card_text', [
                'label' => 'Opis',
            ])
            
            ->endRepeater()


            /*--- USTAWIENIA BLOKU ---*/

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
                'ui' => 0,
                'allow_null' => 0,
            ]);

        return $approach;
    }

    public function with(): array
    {
        $fields = [
            'g_approach' => get_field('g_approach'),
            'r_approach' => get_field('r_approach'),
            'section_id' => get_field('section_id'),
            'section_class' => get_field('section_class'),
        

            'flip' => (bool) get_field('flip'),
            'wide' => (bool) get_field('wide'),
            'nomt' => (bool) get_field('nomt'),
            'gap' => (bool) get_field('gap'),

            'background' => get_field('background') ?: 'none',
        ];

        $fields['sectionClass'] = SectionClasses::fromMap($fields, [
            'flip' => 'order-flip',
            'wide' => 'wide',
            'nomt' => '!mt-0',
            'gap' => 'wider-gap',
        ]);

        return $fields;
    }
}