<?php

namespace App\Options;

use Log1x\AcfComposer\Options;
use StoutLogic\AcfBuilder\FieldsBuilder; 
use App\Support\SectionClasses;

class CtaBgOptions extends Options
{
    // Nazwa widoczna w menu WP
    public $name = 'CTA '; 
    public $slug = 'cta-bg-options'; 
    public $title = ' CTA ';
    public $capability = 'edit_posts';
    public $redirect = false;
	public $position = 82;

    public function fields(): array
    {
        $ctaBgOptions = new FieldsBuilder('cta_bg_options');

        $ctaBgOptions
            ->addTab('Treść CTA', ['placement' => 'top'])

            ->addGroup('g_cta_bg', [
                'label' => ' CTA ',
            ])
                ->addImage('image', [
                    'label' => 'Obraz',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                ])
                ->addText('header', [
                    'label' => 'Tytuł',
                ])
                ->addWysiwyg('txt', [
                    'label' => 'Treść',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => true,
                    'rows' => 4,
                ])
                ->addLink('button', [
                    'label' => 'Przycisk',
                    'return_format' => 'array',
                ])
				   ->addLink('button2', [
                    'label' => 'Przycisk #2',
                    'return_format' => 'array',
                ])
			
            ->endGroup();

        return $ctaBgOptions->build();
    }
}