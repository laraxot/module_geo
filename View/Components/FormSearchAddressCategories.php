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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> d4fc524 (rebase)
=======
>>>>>>> cd852c9 (rebase)
=======
>>>>>>> 4cc354ba (up)
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
<<<<<<< HEAD
=======
     *
     */
    public function render():Renderable {
        /** 
        * @phpstan-var view-string
        */
<<<<<<< HEAD
>>>>>>> f2b13f11 (.)
=======
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
>>>>>>> 9de2ec4b (up)
=======
>>>>>>> f2b13f1 (.)
<<<<<<< HEAD
>>>>>>> d4fc524 (rebase)
=======
=======
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
>>>>>>> 9de2ec4 (up)
>>>>>>> cd852c9 (rebase)
=======
>>>>>>> 4cc354ba (up)
        $view = 'geo::components.form_search_address_categories';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
