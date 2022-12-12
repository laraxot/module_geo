<?php

declare(strict_types=1);

namespace Modules\Geo\View\Components;

<<<<<<< HEAD
=======
use Illuminate\Contracts\Support\Renderable;
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
use Illuminate\View\Component;

class FormSearchAddressCategories extends Component {
    /**
     * Undocumented function.
<<<<<<< HEAD
     *
     * @return void
     */
    public function render() {
=======
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
        $view = 'geo::components.form_search_address_categories';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
