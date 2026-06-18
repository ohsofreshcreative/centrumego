<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class BlogLatest extends Block
{
    public $name = 'Blog - Najnowsze wpisy';
    public $description = 'Wyświetla 3 najnowsze kafelki z bloga w układzie Bazy Wiedzy';
    public $slug = 'blog-latest';
    public $category = 'formatting';
    public $icon = 'welcome-widgets-menus';
    public $keywords = ['blog', 'wpisy', 'najnowsze', 'baza wiedzy'];
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
        $blogLatest = new FieldsBuilder('blog-latest');

        $blogLatest
            ->setLocation('block', '==', 'acf/blog-latest')
            ->addText('block-title', [
                'label' => 'Tytuł (lokalny nagłówek)',
                'required' => 0,
            ])
            ->addAccordion('accordion1', [
                'label' => 'Ustawienia sekcji bloga',
                'open' => false,
                'multi_expand' => true,
            ])
            
            /*--- KARTA 1: TREŚCI ---*/
            ->addTab('Treści', ['placement' => 'top'])
            ->addGroup('posts_settings', ['label' => ''])
                ->addText('title', [
                    'label' => 'Tytuł sekcji',
                ])
                ->addLink('button', [
                    'return_format' => 'array',
                ])
            ->endGroup()

            /*--- KARTA 2: USTAWIENIA WIZUALNE BLOKU ---*/
            ->addTab('Ustawienia bloku', ['placement' => 'top'])
            ->addText('section_id', ['label' => 'ID sekcji'])
            ->addText('section_class', ['label' => 'Dodatkowe klasy CSS'])
            ->addTrueFalse('flip', ['label' => 'Odwrotna kolejność', 'ui' => 1])
            ->addTrueFalse('wide', ['label' => 'Szeroka kolumna', 'ui' => 1])
            ->addTrueFalse('nomt', ['label' => 'Usunięcie marginesu górnego', 'ui' => 1])
            ->addTrueFalse('gap', ['label' => 'Większy odstęp', 'ui' => 1])
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

        return $blogLatest;
    }

    public function with(): array
    {
        $query = new \WP_Query([
            'post_type' => 'post',
            'posts_per_page' => 3,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        ]);

        $fields = [
            'posts_settings' => get_field('posts_settings') ?: [],
            'posts'          => $query->posts,
            'section_id'     => get_field('section_id'),
            'section_class'  => get_field('section_class'),

            'flip'           => (bool) get_field('flip'),
            'wide'           => (bool) get_field('wide'),
            'nomt'           => (bool) get_field('nomt'),
            'gap'            => (bool) get_field('gap'),

            'background'     => get_field('background') ?: 'none',
        ];

        $fields['sectionClass'] = SectionClasses::fromMap($fields, [
            'flip' => 'order-flip',
            'wide' => 'wide',
            'nomt' => '!mt-0',
            'gap'  => 'wider-gap',
        ]);

 
        $bg = $fields['background'] ?? 'none';
        $fields['lightbg'] = $bg === 'section-light';
        $fields['graybg'] = $bg === 'section-gray';
        $fields['whitebg'] = $bg === 'section-white';
        $fields['brandbg'] = $bg === 'section-brand';

        return $fields;
    }
}