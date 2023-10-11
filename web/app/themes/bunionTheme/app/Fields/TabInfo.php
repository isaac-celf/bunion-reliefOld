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
            ]);

        return $tabInfo->build();
    }
}
