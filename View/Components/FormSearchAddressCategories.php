<?php

declare(strict_types=1);

namespace Modules\Geo\View\Components;

use Illuminate\View\Component;

class FormSearchAddressCategories extends Component {
    /**
     * Undocumented function.
     *
     * @return void
     */
    public function render() {
        $view = 'geo::components.form_search_address_categories';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
