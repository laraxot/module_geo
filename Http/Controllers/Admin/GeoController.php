<?php

namespace Modules\Geo\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//--- services
use Modules\Theme\Services\ThemeService;

class GeoController extends Controller {
    public function index(Request $request) {
        if (1 == $request->routelist) {
            return ArtisanTrait::exe('route:list');
        }
        $view = ThemeService::getView();

        return view($view);
    }

    //end function
 //
}//end class
