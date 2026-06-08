<?php

namespace App\Options;

use Log1x\AcfComposer\Options;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class ContactInfoOptions extends Options
{
    // Nazwa widoczna w menu WP
    public $name = 'Dane Kontaktowe'; 
    public $slug = 'contact-info-options'; 
    public $title = ' Dane Kontaktowe ';
    public $capability = 'edit_posts';
    public $redirect = false;
	public $position = 81;

    public function fields(): array
    {
        $contactInfoOptions = new FieldsBuilder('contact_info_options');

        $contactInfoOptions
            ->addTab('Dane Kontaktowe', ['placement' => 'top'])

            ->addGroup('g_contact_info', [
                'label' => ' Dane Kontaktowe ',
            ])
                ->addImage('image', [
                    'label' => 'Logo',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                ])
                ->addText('phone', [
                    'label' => 'Numer Telefonu',
                ])
				->addText('mail', [
                    'label' => 'e-mail',
                ])
                ->addWysiwyg('txt', [
                    'label' => 'Adres',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => true,
                    'rows' => 4,
                ])
            ->endGroup()
			->addRepeater('social_media', [
                    'label' => 'Media Społecznościowe',
                    'layout' => 'table',
                    'button_label' => 'Dodaj profil',
                ])
                    ->addSelect('platform', [ 
                        'label' => 'Wybierz portal',
                        'choices' => [
                            'facebook'  => 'Facebook',
                            'instagram' => 'Instagram',
                        ],
                        'default_value' => 'facebook',
                        'allow_null' => 0,
                    ])
                    ->addUrl('url', [
                        'label' => 'Link do profilu',
                        
                    ])
                ->endRepeater();

        return $contactInfoOptions->build();
    }
}