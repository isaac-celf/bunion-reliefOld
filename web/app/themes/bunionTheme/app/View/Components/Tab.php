<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tab extends Component
{

    public $tabDescription;
    public $tabImage;
    public $tabTitle;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->tabDescription = $this->getDescription();
        $this->tabImage = get_the_post_thumbnail_url($id);
        $this->tabTitle = get_the_title($id);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tab');
    }

    public function getDescription() {
        // return 'asd';
        // return get_field('tab_description');
    }
    
}
