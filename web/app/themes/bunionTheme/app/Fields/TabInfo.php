<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class TabInfo extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $tabInfo = new FieldsBuilder('tab_info');

        $tabInfo
            ->setLocation('post_type', '==', 'tab');

        $tabInfo
            ->addTextarea('tab_description', [
                'label' => 'Tab Description',
            ])
            ->addPostObject('available_pages', [
                'label' => 'Direct Page to',
                'instructions' => 'Choose which page to direct',
                'required' => 0,
                'conditional_logic' => [],
                'post_type' => ['page'],
                'return_format' => 'object',
            ]);

        return $tabInfo->build();
    }
}
