<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class CardInfo extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $cardInfo = new FieldsBuilder('card_info', ['position' => 'side']);

        $cardInfo
            ->setLocation('post_type', '==', 'card');

        $cardInfo
        ->addTextarea('card_description');

        return $cardInfo->build();
    }
}
