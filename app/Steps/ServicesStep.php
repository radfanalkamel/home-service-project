<?php

namespace App\Steps;

use Illuminate\Validation\Rule;
use Vildanbina\LivewireWizard\Components\Step;
use App\Models\Service;
use App\models\Provider;
use App\models\Order;
use App\Models\Order_ditail;
use Gloudemans\Shoppingcart\Facades\Cart;

class ServicesStep extends Step
{
    protected string $view = 'auth.register.email-step';

    public $services ,$providers,$provider;
    public array $quantity =[];
    public $successMessage = '';
    public $catchError = '';

    public $Steps = 1, $time, $date ,$city ,$state ,$note ,$paymentMethod ;
    public $category_id;
    public function mount($category_id)
    {
        $this->services = Service::with('category:name')->where('category_id',$this->category_id)->get();

        foreach($this->services as $service){
            $this->quantity[$service->id] =1;
        }

        $this->category_id = $category_id; 
        $this->mergeState([
            'email' => $this->model->email
        ]);
    }

    public function icon(): string
    {
        return 'check';
    }

    public function validate()
    {
        return [
            [
                'state.email' => ['required', 'email', Rule::unique('users', 'email')],
            ],
            [
                'state.email' => __('Email'),
            ],
        ];
    }

    public function title(): string
    {
        return __('Email');
    }
}
