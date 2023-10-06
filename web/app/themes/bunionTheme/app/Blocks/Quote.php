<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Quote extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Quote';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Quote block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'formatting';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => false,
        'multiple' => true,
        'jsx' => true,
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [
        [
            'name' => 'default',
            'label' => 'Default',
            'isDefault' => true,
        ],
        [
            'name' => 'no-image',
            'label' => 'No Image',
        ]
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'quotes' => $this->getQuotes(),
            'location' => $this->getLocation(),
            'quoterQuote' => $this->getQuote(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $quote = new FieldsBuilder('quote');

        $quote
            ->addRelationship('quotes', [
                'post_type' => ['quote'],
                'filters' => [
                    0 => 'search',
                ],
                ]);

        return $quote->build();
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }

    /**
     * @return 
     */
    public function getQuotes() {
        $quotes = get_field("quotes");

        return isset($quotes) ? $quotes : null;
    }

    public function getLocation() {
        $location = get_field("quoter_location");

        return isset($location) ? $location : null;
    }

    public function getQuote() {
        $quote = get_field('quoter_quote');

        return isset($quote) ? $quote : null;
    }

}
