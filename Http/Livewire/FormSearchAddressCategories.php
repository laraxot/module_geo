<?php

/**
 * https://forum.laravel-livewire.com/t/wire-ignore-with-google-autocomplete/734/3.
 * $this->dispatchBrowserEvent('address:list:refresh');.
 */

declare(strict_types=1);

namespace Modules\Geo\Http\Livewire;

<<<<<<< HEAD
=======
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Session\SessionManager;
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
use Livewire\Component;
use Modules\Xot\Services\ActionService;

/**
 * Undocumented class.
 */
class FormSearchAddressCategories extends Component {
<<<<<<< HEAD
    //public \Illuminate\View\ComponentAttributeBag $attributes;
    //public \Illuminate\Support\HtmlString $slot;
=======
    // public \Illuminate\View\ComponentAttributeBag $attributes;
    // public \Illuminate\Support\HtmlString $slot;
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
    public string $name = 'address';
    public array $form_data = [];

    public bool $showActivityTypes = false;
    public \Illuminate\Support\Collection $enabledTypes;
    public bool $warningSuggestedAddresses = false;
    public bool $warningCivicNumber = false;

    public string $email = '';
    public string $cap = '';

    public bool $messageError = false;
<<<<<<< HEAD
=======
    public SessionManager $session;
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

    /**
     * Mount function.
     *
<<<<<<< HEAD
     * @param \Illuminate\View\ComponentAttributeBag $attributes
     * @param \Illuminate\Support\HtmlString         $slot
     *
     * @return void
     */
    public function mount(/*$attributes, $slot*/) {
        //$this->attributes = $attributes;
        //$this->slot = $slot;
=======
     * param \Illuminate\View\ComponentAttributeBag $attributes
     * param \Illuminate\Support\HtmlString         $slot
     *
     * @return void
     */
    public function mount(SessionManager $session/* $attributes, $slot */) {
        $this->session = $session;
        // $this->attributes = $attributes;
        // $this->slot = $slot;
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
        $this->form_data[$this->name] = json_encode((object) []);
        $this->form_data[$this->name.'_value'] = null;
    }

    /**
     * Undocumented function.
<<<<<<< HEAD
     *
     * @return Renderable
     */
    public function render() {
=======
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
        $view = 'geo::livewire.form_search_address_categories';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function search() {
        $this->warningSuggestedAddresses = false;
        $this->warningCivicNumber = false;
        $this->showActivityTypes = false;

        if (! isset($this->form_data['latlng'])) {
            $this->warningSuggestedAddresses = true;

            return;
        }

        if (! isset($this->form_data['street_number'])) {
            $this->warningCivicNumber = true;

            return;
        }

        $ltlng = $this->form_data['latlng'];
        $city = $this->form_data['locality'];
        $lat = $ltlng['lat'];
        $lng = $ltlng['lng'];

<<<<<<< HEAD
        $this->enabledTypes = ActionService::getShopsCatsByCityLatLng($city, $lat, $lng);
=======
        // $this->enabledTypes = ActionService::getShopsCatsByCityLatLng($city, $lat, $lng);
        $this->enabledTypes = collect([]);
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

        if ($this->enabledTypes->isEmpty()) {
            $this->dispatchBrowserEvent('openModalNotServed');

            return;
        }

        $this->showActivityTypes = true;

<<<<<<< HEAD
        //session()->put('address', $this->form_data['value']);
        //forse meglio portarmi tutto per utilizzarlo poi nella gestione checkout
        session()->put('address', $this->form_data);
=======
        // session()->put('address', $this->form_data['value']);
        // forse meglio portarmi tutto per utilizzarlo poi nella gestione checkout
        // Cannot call method put() on mixed
        // session()->put('address', $this->form_data);
        $this->session->put('address', $this->form_data);
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
    }

    /**
     * Undocumented function.
     */
    public function formatAddress(): string {
        $data = (object) $this->form_data;

        if (! isset($data->street_number)) {
            $data->street_number = '';
            $this->warningCivicNumber = true;
        }
        $val = collect([
            $data->route ?? '',
            $data->street_number ?? '',
            $data->locality ?? '',
        ])->implode(', ');

        return $val;
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function placeChanged(string $val0, string $val1) {
        $this->warningSuggestedAddresses = false;
        $this->warningCivicNumber = false;
        $this->showActivityTypes = false;

        $data = json_decode($val0, true);
<<<<<<< HEAD
        if (! is_array($data)) {
=======
        if (! \is_array($data)) {
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
            $data = [];
        }
        $this->form_data = array_merge($this->form_data, $data);
        $this->form_data[$this->name] = $val0;
        $this->form_data[$this->name.'_value'] = $val1;

<<<<<<< HEAD
        if (strlen($val1) < 4) {
=======
        if (\strlen($val1) < 4) {
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
            $val2 = $this->formatAddress();
            $this->form_data[$this->name.'_value'] = $val2;
        }
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function saveNotServed() {
<<<<<<< HEAD
        //dddx('aaa');
        //la VALIDAZIONE rompe le scatole
        //appena inizia a validare mi scompare il modal
=======
        // dddx('aaa');
        // la VALIDAZIONE rompe le scatole
        // appena inizia a validare mi scompare il modal
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
        $validatedData = $this->validate([
            'email' => 'required|email|unique:not_served',
            'cap' => 'required|not_regex:/[a-z]/i|min:5|max:5',
        ]);
        /*


        //dddx([$this->email, filter_var($this->email, FILTER_VALIDATE_EMAIL)]);
        //sembra andare bene

        if (false == filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            //$this->dispatchBrowserEvent('closeModalNotServed');
            //$this->dispatchBrowserEvent('openModalWrongEmailCap');
            $this->messageError = true;
            dddx('mail non valida');

            return;
        }

        //dddx([$this->cap, preg_match('/[a-z]/i', $this->cap)]);

        if (preg_match('/[a-z]/i', $this->cap)) {
            $this->messageError = true;
            dddx('it has alphabet!');
            //$this->dispatchBrowserEvent('closeModalNotServed');
            //$this->dispatchBrowserEvent('openModalWrongEmailCap');

            return;
        }
        */

        $not_served = xotModel('not_served');
<<<<<<< HEAD

        $not_served = new $not_served();
        $not_served->cap = $this->cap;
        $not_served->email = $this->email;
        //$not_served->creation_date =
        $not_served->save();

        //$this->dispatchBrowserEvent('openWrongEmailCap');
=======
        /*
        $not_served = new $not_served();
        $not_served->cap = $this->cap;
        $not_served->email = $this->email;
        // $not_served->creation_date =
        $not_served->save();
        */
        $data = [
            'cap' => $this->cap,
            'email' => $this->email,
        ];
        $not_served->create($data);
        // $this->dispatchBrowserEvent('openWrongEmailCap');
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

        $this->dispatchBrowserEvent('closeModalNotServed');
    }
}
