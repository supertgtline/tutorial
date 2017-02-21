<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Teepluss\Theme\Contracts\Theme;

class AdminController extends BaseController
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
        $this->theme = $theme->uses('admin')->layout('default');
    }
}
