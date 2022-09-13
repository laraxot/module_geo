<?php

declare(strict_types=1);

namespace Modules\Geo\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class FormSearchAddressCategories extends Component {
    /**
     * Undocumented function.
<<<<<<< HEAD
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
     *
     */
    public function render():Renderable {
        /** 
        * @phpstan-var view-string
        */
>>>>>>> f2b13f11 (.)
        $view = 'geo::components.form_search_address_categories';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}