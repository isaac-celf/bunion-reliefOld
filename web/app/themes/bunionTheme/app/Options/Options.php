<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Options extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Options';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Options';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $options = new FieldsBuilder('options');

        // social
        $options
        ->addTab('site_socials', [
            'label' => 'Social Medias'
        ])
        // Facebook
        ->addUrl('facebook_link', ['label' => 'Facebook'])
        // Instagram
        ->addUrl('instagram_link', ['label' => 'Instagram'])
        // Twitter
        ->addUrl('twitter_link', ['label' => 'Twitter']);


        // address
        $options
        ->addTab('site_contact', ['label' => 'Contact Details'])
        ->addTextArea('contact_office_address', ['label' => 'Address', 'new_lines' => 'br'])
        ->addText('contact_office_number', ['label' => 'Number'])
        ->addText('contact_office_email', ['label' => 'Email']);
        
        $options
        ->addTab('site_button', ['label'=>'Footer Buttons'])
        ->addRepeater('footer_buttons', ['label' => 'Buttons', 'layout' => 'block'])
        ->addText('footer_button', ['label' => 'Button'])
        ->addUrl('footer_button_link', ['label' => 'Link']);

        $options
        ->addTab('site_surgeon', ['label'=>'Surgeon Button'])
        ->addText('surgeon_button', ['label' => 'Button Name'])
        ->addUrl('surgeon_button_link', ['label' => 'Link']);

        // scripts **later
        return $options->build();
    }
}
