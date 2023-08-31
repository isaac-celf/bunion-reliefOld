<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Log1x\Navi\Navi;

class Navigation extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'partials.navigation'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'navigation' => $this->getNavigation(),
        ];
    }

    public function getNavigation() {
        $navigation = (new Navi())->build('primary_navigation');

        if ($navigation->isEmpty()) {
            return;
        }
        return $navigation->toArray();
    }
}
