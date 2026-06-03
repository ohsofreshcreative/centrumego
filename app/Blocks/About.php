<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class About extends Block
{
    public $name = 'Tekst oraz zdjęcie';
    public $description = 'about us';
    public $slug = 'about';
    public $category = 'formatting';
    public $icon = 'align-pull-left';
    public $keywords = ['tresc', 'zdjecie', 'o nas'];
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
        $about = new FieldsBuilder('about');

        $about
            ->setLocation('block', '==', 'acf/about')
            ->addText('block-title', [
                'label' => 'Tytuł',
                'required' => 0,
            ])
            ->addAccordion('accordion1', [
                'label' => 'Tekst oraz zdjęcie',
                'open' => false,
                'multi_expand' => true,
            ])
            /*--- GROUP ---*/
            ->addTab('Elementy', ['placement' => 'top'])
            ->addGroup('g_content', ['label' => ''])
                ->addImage('image', [
                    'label' => 'Obraz',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ])
                ->addText('header', ['label' => 'Nagłówek'])
                ->addWysiwyg('txt', [
                    'label' => 'Treść',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => true,
                ])
            
                ->addLink('button1', [
                    'label' => 'Przycisk #1',
                    'return_format' => 'array',
                ])
              
            ->endGroup()

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

        return $about;
    }

    public function with(): array
    {
        $fields = [
            'g_content' => get_field('g_content'),
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