<?php

declare(strict_types=1);

namespace Modules\Geo\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class FormSearchAddressCategories extends Component {
    /**
     * Undocumented function.
<<<<<<< HEAD
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
=======
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
>>>>>>> 9de2ec4b (up)
        $view = 'geo::components.form_search_address_categories';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
