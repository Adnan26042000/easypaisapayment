<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Http;

use Livewire\Component;

class Login extends Component
{
    public $credentials = [];


    protected $rules = [
        'credentials.phone_no' => 'required|numeric|digits:11',
        'credentials.pin' => 'required|numeric|digits:5',
    ];

    protected $validationAttributes = [
        'credentials.phone_no' => 'Phone Number',
        'credentials.pin' => 'PIN',

    ];

    /**
     * @return RedirectResponse|void
     */
    public function loginAccount()
    {
        if (!empty($this->credentials)) {
            if (!empty($this->credentials['pin'])) {
                $pin = implode('', array_values($this->credentials['pin']));
                $this->credentials['pin'] = $pin;
            } else {
                $this->addError('error', 'Please enter PIN.');
            }
        } else {
            $this->addError('error', 'Please enter credentials.');
        }
        $this->validate();

        // Check if PIN is provided
        if (empty($this->credentials['pin'])) {
            $this->addError('error', 'Please enter PIN.');
            return; // Stop execution if PIN is not provided
        }

        $response = Http::withHeaders([
            'X-IBM-Client-Id' => '6f081750f32c0dc8ca81973154663369',
            'X-IBM-Client-Secret' =>  '27188ae4825d7968528fc8f8bd28ec7c',
            'X-Channel' => 'subgateway',
            'Content-Type' => 'application/json',
        ])->post('https://rgw.8798-f464fa20.eu-de.ri1.apiconnect.appdomain.cloud/tmfb/dev-catalog/CorporateLogin', [
            'LoginPayload' => 'iHUNC3k0YnbB6LnFAQ7g/rIjoTHhGaZcZuv4WKevQUoZieWl9SDB+ZJPM94lHeBPKGjqWIzO5T+ZlMzsFk72GW3c3aZUF3Vztv8BxocGvVH/CRHbKGQDtEWiCJNQmn9O8PeXdy3p/zLBSbDhWd7hAnXEvh80F+eIdsjlNnFl7TyF74gKEQveeTtrGaFQuFQrFklnJPfO4WI5AEfEAkCGvb9Z9r9jYLG7POP/mOXKM9k0ODCfxMf4r80xT5zDvPHWEfDOGxOTxE18zpBgDFCHH9BoxMlZLG78P7Pmfn4yj4ELXrEd9D9Bf/YnTKiFimFoA70CmIpj35BBB4KNB9fIwg==',
        ]);
        // Process API response
        $this->response = $response->json();
        dd($this->response);
    }

    public $response;

    public function makeApiRequest()
    {

    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
