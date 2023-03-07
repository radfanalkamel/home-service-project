<?php

namespace App\Http\Livewire;
use App\Models\Service;
use App\models\Provider;
use App\models\User;
use App\models\Order;
use App\Models\Order_ditail;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Checkout extends Component
{
    use WithFileUploads;
    public $services ,$providers,$provid ,$barLength = 0;
    public array $quantity =[];
    public $successMessage = '';
    public $catchError = '';
    public $Steps = 1,$time, $date ,$city ,$state ,$note,$photo,$paymentMethod ;
    public $category_id;



    

    public function mount($category_id){
        $this->services = Service::with('category:name')->where('category_id',$this->category_id)->get();   

        $this->providers = Provider::with('user')->get();

        foreach($this->services as $service){
            $this->quantity[$service->id] =1;
        }

        $this->category_id = $category_id;       
    }
    
    public function render()
    { 
        $cart =Cart::content();
        //dd($cart);
        return view('livewire.checkout' ,['cart'=> $cart ])->layout('layouts.service');
    }
    public function addToCart(Service $service){
        //$service = Service::findOrFail($service_id);
        Cart::add([
           'id'=> $service->id,
           'name'=> $service->name,
           'qty' => $this->quantity[$service->id],
           'price' => $service->price / 100 ,
           'weight' => 550,
           'options' => ['size' => 'large'],
            
        ]);
        $this->emit('cart_updated');
    }
    public function removeFromCart($id){
        //Cart::remove($id);
        $cart = Cart::content()->where('id',$id);
        Cart::remove($cart->value('rowId'));
        //$cart->value('rowId');
        //$cv=$var->rowId;
        //$var = $cart['rowId'];
        //Cart::remove()->where('id',$id);
        //dd($var);
        // Cart::remove($id);
        //dd($cart);
    //    if($cart->isNotEmpty()){
    //        Cart::remove($cart);
    //    }
       $this->emit('cart_updated');
    }
    public function increment($service_id)
    {
       //dd($service_id);
        $this->quantity[$service_id] ++;    
        $cart = Cart::content()->where('id',$service_id);
        //dd($this->quantity[$service_id] ) ;
        if($cart->has('rowId')){   
        Cart::update($cart->value('rowId'),$this->quantity[$service_id]);   
        }

    }
    public function decrease($service_id)
    {
        //dd($service_id);
        $this->quantity[$service_id] --;
        $cart = Cart::content()->where('id',$service_id);
        $rowId = $cart->value('rowId');
        //dd($this->quantity[$service_id]);
        if($rowId){   
        Cart::update($rowId,$this->quantity[$service_id]);   
        }
    }
    public function Next()
    {
        $this->Steps++;
        if($this->Steps > 4)
        {
            $this->Steps = 4;
        }
        $this->barLength = (($this->Steps - 1) / (4 - 1)) * 100;
    }
    public function Previous()
    {
        $this->Steps--;
        if($this->Steps< 1)
        {
            $this->Steps = 1;
        }
        $this->barLength = (($this->Steps - 1) / (4 - 1)) * 100;

    }
    // public function UpdateBar()
    // {
    //     //draw the active line
    
    //     $this->barLength = (($this->Steps - 1) / (4 - 1)) * 100;

    //     //handle buttons
    //     if ($this->Steps == 1)
    //     {
    //         $this->prevDisabled = true;
    //     }
    //     else if($this->Steps == 4)
    //     {
    //         $this->nextDisabled = true;
    //     }
    //     else
    //     {
    //         $this->prevDisabled = false;
    //         $this->nextDisabled = false;
    //     }
    // }
    
    // public function fristStepSubmit(){
    //     $this->Steps= 2;
        
    // }
    // public function secondStepSubmit(){
    //     $this->Steps=3;
    // }
    // public function thridStepSubmit(){
    //     $this->Steps= 4;
    // }
    // public function back(){
    //     $this->Steps --;
    // }

    public function createOrder(){


        $address = [$this-> city,$this-> state ];
        $service_schedule = [ $this->date , $this-> time ];
        //dd($address , $service_schedule);
        $notes = $this-> note; 
        $prov =$this->provid;
        $date= $this-> date ;
        $time= $this-> time ;
        $ctiy= $this-> city;
        $state= $this-> state;
        // $photo = $this->uploadImgae($this->photo);
        //$cart =Cart::subtotal();
        //$var =0;
        // foreach($cart as $itmes){
        //     $total_cost  = $var +  $itmes->price * $itmes->qty;
        //     $var = $total_cost;

        // }  
        $cart = Cart::content();
       // dd($cart);  
       $order = Order::create([
          'user_id'=>1,
          'category_id'=> $this->category_id,
          'provider_id'=> $this->provid,
          'note'=> $this->note,
          'address'=> implode(' , ',$address ),
          'service_date'=> $this->date, 
          'service_time'=> $this->time,
          'total_cost'=> Cart::subtotal() ,
        ]);
        
        foreach($cart as $itmes){
        Order_ditail::create([
            'order_id'=> $order->id,
            'service_id'=> $itmes->id,
            'service_cost'=> $itmes->price,
            'quantity'=> $itmes->qty,
            'total_cost'=> $itmes->price*$itmes->qty,
        ]);
        }
        
    }
    public function time_select(){
        $datea= $this-> date ;
        $times= $this-> time ;
        $ctiys= $this-> city;
        $states= $this-> state;
        $notes= $this-> note; 
        $prov =$this->provider;
        $cart =Cart::content();

        dd($datea,$times,$ctiys,$states,$notes,$prov,$cart);
    
    }
    // protected function uploadImgae($image){
     
    //     if(!$image->hasFile('image')){
    //         return;
    //     }
    //     $file =$image->file('image');

    //     $path = $file->store('uploads', [
    //         'disk' => 'public'
    //     ]);
    //     return $path;
    // }
}
