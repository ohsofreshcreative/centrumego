<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class CtaBg extends Block
{
    public $name = 'Wezwanie do działania - Tło';
    public $description = 'cta-bg';
    public $slug = 'cta-bg';
    public $category = 'formatting';
    public $icon = 'button';
    public $keywords = ['cta-bg'];
    public $mode = 'edit';

    public $supports = [
        'align' => false,
        'mode' => false,
        'jsx' => true,
    ];

    public function fields()
    {
        $cta_bg = new FieldsBuilder('cta-bg');

        $cta_bg
            ->addText('block-title', [
                'label' => 'Tytuł lokalny',
                'required' => 0,
            ])
            ->addAccordion('accordion1', [
                'label' => 'Informacje i ustawienia',
                'open' => false,
                'multi_expand' => true,
            ])
            ->addMessage(
                'info',
                'Treści CTA edytujesz globalnie w zakładce "CTA" w menu bocznym'
            )
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
                ],
                'default_value' => 'none',
                'allow_null' => 0,
            ]);

        return $cta_bg;
    }

    public function with()
    {
        return [
          
            'cta_bg' => get_field('g_cta_bg', 'option') ?: [],

            // LOKALNE USTAWIENIA BLOKU
            'block_title' => get_field('block-title'),
            'section_id' => get_field('section_id'),
            'section_class' => get_field('section_class'),
            'nolist' => get_field('nolist'),
            'flip' => get_field('flip'),
            'wide' => get_field('wide'),
            'nomt' => get_field('nomt'),
            'gap' => get_field('gap'),
            'background' => get_field('background'),
        ];
    }
}