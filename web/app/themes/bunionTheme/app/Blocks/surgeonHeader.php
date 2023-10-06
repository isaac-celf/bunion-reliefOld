<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use Log1x\SageSvg\SageSvg;

use WP_Query;

class surgeonHeader extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Surgeon Header';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Surgeon Header block.';

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
    public $post_types = ['wpsl_stores'];

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
            'name' => 'light',
            'label' => 'Light',
            'isDefault' => true,
        ],
        [
            'name' => 'dark',
            'label' => 'Dark',
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
            'surgeon' => $this->getSurgeon(),
            'surgeonPhone' => $this->getSurgeonPhone(),
            'surgeonURL' => $this->getSurgeonURL(),
            'formDescription' => $this->getFormDescription(),
            'formIcon' => $this->getFormSVG(),
        ]; 
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $surgeonHeader = new FieldsBuilder('surgeon_header');

        $surgeonHeader
        ->addPostObject('Surgeon', ['post_type' => ['wpsl_stores']]);

        return $surgeonHeader->build();
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

    public function getSurgeon() {

        $storePost = new WP_Query(['post_type' => 'wpsl_stores']);

        return isset($storePost) ? $storePost : null;
    }

    public function getSurgeonPhone() {

        $surgeonPhone = get_post_meta(get_the_ID(), 'wpsl_phone', true);

        return isset($surgeonPhone) ? $surgeonPhone : null;
    }

    public function getSurgeonURL() {

        $surgeonURL = get_post_meta(get_the_ID(), 'wpsl_url', true);

        return isset($surgeonURL) ? $surgeonURL : null;
    }

    public function getFormDescription() {

        $formDescription = get_field('form_description', 'option');

        return isset($formDescription) ? $formDescription : null;
    }

    public function getFormSVG() {
        $formIcon = \App(SageSvg::class)->render('images.human-form', 'w-100');

        return $formIcon;
    }
}