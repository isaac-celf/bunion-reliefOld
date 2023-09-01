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
    public $name = 'Site Options';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Site Options | Options';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $siteOptions = new FieldsBuilder('site_options');

        $siteOptions
            ->addRepeater('items')
                ->addText('item')
            ->endRepeater();

        return $siteOptions->build();
    }
}
