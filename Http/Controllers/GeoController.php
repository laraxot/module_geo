<?php

namespace Modules\Geo\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//--------models-----------
use Modules\Geo\Models\GeoNamesCap;
//--- extends ---
use Modules\Theme\Services\ThemeService;
//--- services
use Modules\Xot\Traits\ArtisanTrait;

class GeoController extends Controller {
    public function index(Request $request) {
        if (1 == $request->routelist) {
            return ArtisanTrait::exe('route:list');
        }
        $rows = Post::all();
        $view = ThemeService::getView();

        return view($view)->with('rows', $rows);
    }

    public function show(Request $request) {
        //$this->authorize('view', $post);
        //return view('blog::posts.show', ['post' => $post]);
        $params = \Route::current()->parameters();
        $row = Post::where('guid', $params['guid_post'])->first();
        $view = ThemeService::getView();

        return view($view)->with('row', $row);
    }

    public function latlong(Request $request) {
        $params = \Route::current()->parameters();
        \extract($params);
        $orderby = '(('.$lat.'-latitude)*('.$lat.'-latitude))+(('.$long.'-longitude)*('.$long.'-longitude))';
        //echo '<pre>'.$orderby.'</pre>';
        $row = GeoNamesCap::orderbyRaw($orderby)->first();

        return response()->json($row->toArray());
    }
}
