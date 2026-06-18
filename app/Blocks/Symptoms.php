<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Symptoms extends Block
{
    public $name = 'Objawy i wskazania';
    public $description = 'symtopms - Blok wyświetlający poziome kafelki z objawami, które po kliknięciu zmieniają treść opisu poniżej';
    public $slug = 'symptoms';
    public $category = 'formatting';
    public $keywords = ['symptoms', 'objawy', 'zakładki', 'symptoms'];
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
        $symptoms = new FieldsBuilder('symptoms');

        $symptoms
            ->setLocation('block', '==', 'acf/symptoms')
            ->addText('block-title', [
                'label' => 'Tytuł',
                'required' => 0,
            ])
            ->addAccordion('accordion1', [
                'label' => 'Objawy i wskazania',
                'open' => false,
                'multi_expand' => true,
            ])

            /*--- KARTA 1: TREŚĆ GŁÓWNA ---*/
            ->addTab('Nagłówek', ['placement' => 'top'])
            ->addGroup('g_symptoms', ['label' => ''])
                ->addText('title', ['label' => 'Tytuł'])
                ->addWysiwyg('txt', [
                    'label' => 'Opis',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                ])
            ->endGroup()

            /*--- KARTA 2: KAFELKI ---*/
            ->addTab('Lista objawów', ['placement' => 'top'])
            ->addRepeater('r_symptoms', [
                'label' => 'Konfiguracja kafelków z objawami',
                'layout' => 'block',
                'button_label' => 'Dodaj zakladkę',
            ])
                ->addImage('icon', [
                    'label' => 'Ikona',
                    'return_format' => 'array',
                ])
                ->addText('tab_title', [
                    'label' => 'Nazwa kafelka',
                ])
                // Zawartość dolna po kliknięciu
                ->addText('content_title', [
                    'label' => 'Nagłówek wewnątrz opisu',
                ])
                ->addWysiwyg('content_txt', [
                    'label' => 'Pełna treść objawu',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                ])
            ->endRepeater()

             /*--- KARTA 3: USTAWIENIA BLOKU (wewnątrz akordeonu) ---*/
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
                'label' => 'Odwrotna kolejność (zdjęcie po prawej)',
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

        return $symptoms;
    }

    public function with(): array
    {
        $fields = [
            'g_symptoms' => get_field('g_symptoms'),
            'r_symptoms' => get_field('r_symptoms'),
            'section_id' => get_field('section_id'),
            'section_class' => get_field('section_class'),

            'nolist' => (bool) get_field('nolist'),
            'flip' => (bool) get_field('flip'),
            'wide' => (bool) get_field('wide'),
            'nomt' => (bool) get_field('nomt'),
            'gap' => (bool) get_field('gap'),

            'background' => get_field('background') ?: 'none',
        ];

        $fields['sectionClass'] = SectionClasses::fromMap($fields, [
            'nolist' => 'no-list',
            'flip' => 'order-flip',
            'wide' => 'wide',
            'nomt' => '!mt-0',
            'gap' => 'wider-gap',
        ]);

        return $fields;
    }
}