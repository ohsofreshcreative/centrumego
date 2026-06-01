<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

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
    ];

    public function fields()
    {
        $blogLatest = new FieldsBuilder('blog-latest');

        $blogLatest
            ->setLocation('block', '==', 'acf/blog-latest')
            ->addAccordion('accordion1', [
                'label' => 'Ustawienia sekcji bloga',
                'open' => true,
                'multi_expand' => true,
            ])
            
            ->addTab('Treści', ['placement' => 'top'])
            ->addGroup('posts_settings', ['label' => ''])
                ->addText('title', [
                    'label' => 'Tytuł sekcji',
                   
                ])
              
                ->addLink('button', [
                    'return_format' => 'array',
                ])
            ->endGroup()

            ->addTab('Ustawienia bloku', ['placement' => 'top'])
            ->addText('section_id', ['label' => 'ID sekcji'])
            ->addText('section_class', ['label' => 'Dodatkowe klasy CSS'])
            ->addTrueFalse('flip', ['label' => 'Odwrotna kolejność', 'ui' => 1])
            ->addTrueFalse('wide', ['label' => 'Szeroka kolumna', 'ui' => 1])
            ->addTrueFalse('nomt', ['label' => 'Usunięcie marginesu górnego', 'ui' => 1])
            ->addTrueFalse('gap', ['label' => 'Większy odstęp', 'ui' => 1])
            ->addTrueFalse('lightbg', ['label' => 'Jasne tło', 'ui' => 1])
            ->addTrueFalse('graybg', ['label' => 'Szare tło', 'ui' => 1])
            ->addTrueFalse('whitebg', ['label' => 'Białe tło', 'ui' => 1])
            ->addTrueFalse('brandbg', ['label' => 'Tło marki', 'ui' => 1]);

        return $blogLatest;
    }

    public function with()
    {
        $posts_settings = get_field('posts_settings') ?: [];

        // Pobieramy zawsze dokładnie 3 najnowsze wpisy z bloga
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 3,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        ];

        $query = new \WP_Query($args);

        return [
            'posts_settings' => $posts_settings,
            'posts' => $query->posts,
            'section_id' => get_field('section_id'),
            'section_class' => get_field('section_class'),
            'flip' => get_field('flip'),
            'wide' => get_field('wide'),
            'nomt' => get_field('nomt'),
            'gap' => get_field('gap'),
            'lightbg' => get_field('lightbg'),
            'graybg' => get_field('graybg'),
            'whitebg' => get_field('whitebg'),
            'brandbg' => get_field('brandbg'),
        ];
    }
}