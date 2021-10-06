<?php

namespace App\Http\Livewire\Components\Admin\Courier;

use App\Courier;
use App\Couriercontent;
use App\Couriertype;
use App\Courierweight;
use App\Franchise;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCourier extends Component
{
    use WithFileUploads;
    public $editable = false;
    public $DfranchiseLocations = null;
    public $courier, $couriertypeId, $couriertypePrice = 0 , $couriercontentId, $couriercontentPrice = 0 ,$Courierweight,$Courierpieces;
    public $OfranchiseId, $OfranchiseLocation,$DfranchiseId, $DfranchiseLocation,$DfranchiseLocationCourierKgPrice = 0,$TotalAmount =0 ;
    public $discount = 0;
    public $info;
    public $validation = false;
    public $courier_details;
    public $courier_calculations;
    public $tracking_no;
    public $couriertype;
    public $couriercontent;
    public $OfranchiseName;
    public $DfranchiseName;
    public $sender_address;
    public $recipient_address;
    public $array_data;

    public function mount()
    {
        $this->courier = new Courier();
        $this->sender_address = $this->sender_address;
        $this->recipient_address = $this->recipient_address;
    }

    public function GenerateTrackingNum()
    {
       $number =  rand(1111111,9999999);
       $this->tracking_no = 'MRC'.''.(string)$number;
    }

    public function ResetTrackingNum()
    {
        $this->tracking_no = '';
    }

    public function updatedCouriertypeId()
    {
        $this->couriertypePrice = Couriertype::findOrFail($this->couriertypeId)->price;
        $this->couriertype= Couriertype::findOrFail($this->couriertypeId)->name;

    }

    public function updatedCouriercontentId()
    {
        $this->couriercontentPrice = Couriercontent::findOrFail($this->couriercontentId)->price;
        $this->couriercontent = Couriercontent::findOrFail($this->couriercontentId)->name;

    }

    public function updatedOfranchiseId()
    {

        $this->OfranchiseLocation = Courierweight::where('id',$this->OfranchiseId)->first()->id;

        $this->OfranchiseName = Franchise::findOrFail($this->OfranchiseLocation)->name;
        $this->DfranchiseLocations = Courierweight::where('id',"!=",$this->OfranchiseLocation)->get();


    }

    public function updatedDfranchiseId()
    {
        if($this->OfranchiseId == $this->DfranchiseId){
            $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',
                'message' => 'Sorry Location Same.?',
                'text' => 'Cannot Select the Same Location!'
            ],500);
        }else{
            $this->DfranchiseLocationCourierKgPrice = Courierweight::where([['ofranchise_id',$this->OfranchiseId],['dfranchise_id',$this->DfranchiseId]])->first()->price;
            $this->DfranchiseName = Franchise::findOrFail($this->DfranchiseId)->name;
        }


    }

    public function calculate()
    {
        $this->TotalAmount = ($this->Courierweight * $this->DfranchiseLocationCourierKgPrice * $this->Courierpieces) + $this->couriertypePrice + $this->couriercontentPrice;
    }

    public function updatedDiscount()
    {
        if($this->discount == !"" && $this->TotalAmount == !0){

            $discountPrice = ($this->TotalAmount/100)*$this->discount;
            $this->TotalAmount = $this->TotalAmount - $discountPrice;
        }else{

            if($this->TotalAmount == !0){
                $this->discount = 0;
                $this->calculate();
            }
                $this->discount = 0;
        }

    }

    protected $rules = [
        'courier.recipient_name' => 'required',
        'courier.recipient_phone' => 'required',
        'recipient_address' => 'required',
        'courier.recipient_email' => '',
        'tracking_no' => 'required',
        'couriertypeId' => 'required',
        'couriercontentId' => 'required',
        'Courierweight' => 'required',
        'Courierpieces' => 'required',
        'OfranchiseId' => 'required',
        'courier.ofranchise_saved' => '',
        'DfranchiseId' => 'required',
        'courier.dfranchise_saved' => '',
        'courier.sender_name' => 'required',
        'courier.sender_phone' => 'required',
        'sender_address' => 'required',
        'courier.sender_email' => '',

    ];


    public function resetForm()
    {
        $this->courier->recipient_name = '';
        $this->courier->recipient_phone = '';
        $this->recipient_address = '';
        $this->courier->recipient_email = '';
        $this->tracking_no = '';
        $this->couriertypeId = '';
        $this->couriercontentId = '';
        $this->Courierweight = '';
        $this->Courierpieces = '';
        $this->OfranchiseId = '';
        $this->ofranchise_saved = '';
        $this->DfranchiseId = '';
        $this->dfranchise_saved = '';
        $this->courier->sender_name = '';
        $this->courier->sender_phone = '';
        $this->sender_address = '';
        $this->courier->sender_email = '';

        //calculated values
        $this->couriertypePrice = '';
        $this->couriercontentPrice = '';
        $this->DfranchiseLocationCourierKgPrice = '';
        $this->Courierpieces = '';
        $this->discount = '';
        $this->TotalAmount = '';

    }

    public function save()
    {

        $this->validate();
        $this->courier->recipient_address = $this->recipient_address;
        $this->courier->sender_address = $this->sender_address;
        $this->courier->tracking_no = $this->tracking_no;
        $this->courier->couriertypeId = $this->couriertypeId;
        $this->courier->couriercontentId = $this->couriercontentId;
        $this->courier->Courierweight = $this->Courierweight;
        $this->courier->Courierpieces = $this->Courierpieces;
        $this->courier->OfranchiseId = $this->OfranchiseId;
        $this->courier->DfranchiseId = $this->DfranchiseId;
        $this->courier->couriertypePrice = $this->couriertypePrice;
        $this->courier->couriercontentPrice = $this->couriercontentPrice;
        $this->courier->DfranchiseLocationCourierKgPrice = $this->DfranchiseLocationCourierKgPrice;
        $this->courier->discount = $this->discount;
        $this->courier->TotalAmount = $this->TotalAmount;
        $this->courier->save();
        $recipient_phone = $this->courier->recipient_phone;
        $sender_phone = $this->courier->sender_phone;
        $phones = [$recipient_phone,$sender_phone];
        foreach($phones as $phone){
            $input_xml = '<SMSRequest>
            <Username>03028510615</Username>
            <Password>Jazz@123</Password>
            <From>MASST RIDES</From>
            <To>'.$phone.'</To>
            <Message>Welcome To Masst Rides ! You are now our company participent, Thank you choosing us..</Message>
            <urdu>0</urdu>
            <statuscode>0</statuscode>
            </SMSRequest>';

            $url = "https://connect.jazzcmt.com/sendsms_xml.html";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS,"xmldoc=" . $input_xml);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
            // curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 1 );
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
             $data = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            //convert the XML result into array
            $array_data = json_decode(json_encode(simplexml_load_string($data)), true);

            }

        $this->resetForm();
        $this->courier = new Courier();
        $this->emit('CourierCreated');
            //Sweet Alert popup
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Courier Record Saved Successfully',
            'text' => $array_data['statusmessage'] . ' '. 'To Sender & Recipient Mobiles Number !'
        ]);

    }



    protected $listeners = ['CourierEdit','SenderAddress','RecipientAddress'];
    public function SenderAddress($location)
    {
        $this->sender_address = $location;
    }
    public function RecipientAddress($location)
    {
        $this->recipient_address = $location;
    }
    public function CourierEdit($editId)
    {

           $this->editable = true;
           $this->courier = Courier::where('id',$editId)->first();
           $this->recipient_address = $this->courier->recipient_address;
           $this->sender_address = $this->courier->sender_address;
           $this->tracking_no = $this->courier->tracking_no;
           $this->couriertypeId = $this->courier->couriertypeId;
           $this->couriercontentId = $this->courier->couriercontentId;
           $this->Courierweight = $this->courier->Courierweight;
           $this->Courierpieces = $this->courier->Courierpieces;
           $this->OfranchiseId = $this->courier->OfranchiseId;
           $this->DfranchiseId = $this->courier->DfranchiseId;
           $this->couriertypePrice = $this->courier->couriertypePrice;
           $this->couriercontentPrice = $this->courier->couriercontentPrice;
           $this->DfranchiseLocationCourierKgPrice = $this->courier->DfranchiseLocationCourierKgPrice;
           $this->discount = $this->courier->discount;
           $this->TotalAmount = $this->courier->TotalAmount;


    }

    public function update()
    {
        $this->validate();
        $this->courier->recipient_address = $this->recipient_address;
        $this->courier->sender_address = $this->sender_address;
        $this->courier->tracking_no = $this->tracking_no;
        $this->courier->couriertypeId = $this->couriertypeId;
        $this->courier->couriercontentId = $this->couriercontentId;
        $this->courier->Courierweight = $this->Courierweight;
        $this->courier->Courierpieces = $this->Courierpieces;
        $this->courier->OfranchiseId = $this->OfranchiseId;
        $this->courier->DfranchiseId = $this->DfranchiseId;
        $this->courier->couriertypePrice = $this->couriertypePrice;
        $this->courier->couriercontentPrice = $this->couriercontentPrice;
        $this->courier->DfranchiseLocationCourierKgPrice = $this->DfranchiseLocationCourierKgPrice;
        $this->courier->discount = $this->discount;
        $this->courier->TotalAmount = $this->TotalAmount;
        $this->resetForm();
        $this->editable = false;
        $this->courier = new Courier();
        $this->emit('CourierUpdated');
        // Sweet Alert popup
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Record Updated Successfully!',
            'text' => 'click ok to close'
        ]);

    }

    public function render()
    {
        $couriertypes = Couriertype::all();
        $couriercontents = Couriercontent::all();
        $franchises  = Franchise::all();
        $courierweights = Courierweight::all();

        return view('livewire.components.admin.courier.create-courier',compact('couriertypes','couriercontents','franchises','courierweights'))->layout('layouts.app1');
    }
}
