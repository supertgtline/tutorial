<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Teepluss\Theme\Contracts\Theme;

class FrontController extends BaseController
{
    /**
     * Theme instance.
     *
     * @var \Teepluss\Theme\Theme
     */
    protected $theme;

    /**
     * Construct
     *
     * @return void
     */
    public function __construct(Theme $theme)
    {
        // Using theme as a global.
        $this->theme = $theme->uses('default')->layout('ipad');
    }
}
