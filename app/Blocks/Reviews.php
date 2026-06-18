<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Reviews extends Block
{
    public $name = 'Slider - Opinie';
    public $description = 'Pobiera i wyświetla opinie z Options Page';
    public $slug = 'reviews';
    public $category = 'formatting';
    public $icon = 'format-quote';
    public $keywords = ['reviews', 'kafelki'];
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
        $reviews = new FieldsBuilder('reviews');

        $reviews
            ->setLocation('block', '==', 'acf/reviews')
            ->addText('block-title', [
                'label' => 'Tytuł (lokalny nagłówek)',
                'required' => 0,
            ])
            ->addAccordion('accordion1', [
                'label' => 'Ustawienia i informacje',
                'open' => false,
                'multi_expand' => true,
            ])

            /*--- KARTA 1: INFORMACJE ---*/
            ->addTab('Informacja', ['placement' => 'top'])
            ->addMessage('Info', 'Treści i listę opinii edytujesz globalnie w zakładce "Opinie" w menu bocznym WordPressa.')

            /*--- KARTA 2: USTAWIENIA WIZUALNE BLOKU ---*/
            ->addTab('Ustawienia bloku', ['placement' => 'top'])
            ->addText('section_id', [
                'label' => 'ID sekcji',
            ])
            ->addText('section_class', [
                'label' => 'Dodatkowe klasy CSS',
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

        return $reviews;
    }

    public function with(): array
    {
        $fields = [
            // Dane pobierane globalnie z Options Page:
            'g_reviews'               => get_field('g_reviews', 'option'),
            'r_reviews'               => get_field('r_reviews', 'option'),
            'global_link_google'      => get_field('global_link_google', 'option'),
            'global_link_znanylekarz' => get_field('global_link_znanylekarz', 'option'),

            // Ustawienia pobierane lokalnie z danego bloku:
            'block_title'    => get_field('block-title'),
            'section_id'     => get_field('section_id'),
            'section_class'  => get_field('section_class'),

            'flip'           => (bool) get_field('flip'),
            'wide'           => (bool) get_field('wide'),
            'nomt'           => (bool) get_field('nomt'),

            'background'     => get_field('background') ?: 'none',
        ];

        $fields['sectionClass'] = SectionClasses::fromMap($fields, [
            'flip' => 'order-flip',
            'wide' => 'wide',
            'nomt' => '!mt-0',
        ]);

      
        $bg = $fields['background'] ?? 'none';
        $fields['lightbg'] = $bg === 'section-light';
        $fields['graybg'] = $bg === 'section-gray';
        $fields['whitebg'] = $bg === 'section-white';
        $fields['brandbg'] = $bg === 'section-brand';
        return $fields;
    }

    public function enqueue()
    {
        // Pozostaw tę metodę pustą.
    }
}