<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\EventAttendies;
use URL;
use Session;
use Redirect;
use Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $_api_context;

    public function __construct()
    {
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }


    public function index()
    {
        $data['events'] = Event::orderBy('id','desc')->paginate(5);
        return view('events.index', $data);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'date' => 'required',
            'place' => 'required',
            'event_type' => 'required',
            'status' => 'required',
        ]);

        $path = $request->file('image')->store('public/images');
        $event = new Event;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->place = $request->place;
        $event->event_type = $request->event_type;
        $event->image = $path;
        $event->status = $request->status;
        $event->save();
        return redirect()->route('events.index')
                        ->with('success','Event has been created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.index',compact('event'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit',compact('event'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'place' => 'required',
            'event_type' => 'required',
            'status' => 'required',
        ]);
        
        $event = Event::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $event->image = $path;
        }
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->place = $request->place;
        $event->event_type = $request->event_type;
        $event->status = $request->status;
        $event->save();
    
        return redirect()->route('events.index')
                        ->with('success','Event updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')
                        ->with('success','Event has been deleted successfully');
    }
    // Event Show
    public function event()
    {
        $data['events'] = Event::orderBy('id','desc')->where('status','1')->paginate(6);
        return view('event', $data);
    }
    public function getPaymentStatus(Request $request)
    {        
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('home');
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {         
            \Session::put('success','Payment success !!');
            return Redirect::route('home');
        }

        \Session::put('error','Payment failed !!');
		return Redirect::route('home');
    }
    
    public function eventAttendies(Request $request)
    {
        $event_type = $request->event_type;
       
        if($event_type == 'free'){
            $event = new EventAttendies;
            $event->title = $request->title;
            $event->event_type = $request->event_type;
            $event->name = $request->name;
            $event->email = $request->email;
            $event->phone = $request->phone;
            $event->description = $request->description;
            $event->save();
            \Session::put('success','Event successfully submited !!');
            return Redirect::route('home');             
        }
        else {
            $price = 10;
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
    
            $item_1 = new Item();
    
            $item_1->setName('Product Name')
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($price);
    
            $item_list = new ItemList();
            $item_list->setItems(array($item_1));
    
            $amount = new Amount();
            $amount->setCurrency('USD')
                ->setTotal($price);
    
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription($request->title);
    
            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::route('status'))
                ->setCancelUrl(URL::route('status'));
    
            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction)); 
            //  storing user information in database
            $event = new EventAttendies;
            $event->title = $request->title;
            $event->event_type = $request->event_type;
            $event->name = $request->name;
            $event->email = $request->email;
            $event->phone = $request->phone;
            $event->description = $request->description;
            $event->save();
            //  
            try {
                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    \Session::put('error','Connection timeout');
                    return Redirect::route('home');                
                } else {
                    \Session::put('error','Some error occur, sorry for inconvenient');
                    return Redirect::route('home');                
                }
            }
            
            foreach($payment->getLinks() as $link) {
                if($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }
            
            Session::put('paypal_payment_id', $payment->getId());
    
            if(isset($redirect_url)) {            
                return Redirect::away($redirect_url);
            }
    
            \Session::put('error','Unknown error occurred');
            return Redirect::route('home');
        }
    }
}