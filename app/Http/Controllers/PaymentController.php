<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use App\Mail\CoursePurchasedSuccessful;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;
use App\User;
use URL;

class PaymentController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }

    public function index()
    {

        return view('paypal');
    }

    public function payWithpaypal(Request $request)
    {
        $email = $request->email;
        $amount = $request->amount;
        $plan = $request->plan;
        $industry = $request->industry;
        $job = $request->job;
        $company = $request->company;
        $imageUrl = $request->imageUrl;
        $interest = $request->interest;
        
        $jobtitle = $request->jobtitle;
        $level = $request->level;

       

        
       session()->put(['email'=>$email,'amount'=>$amount,'plan'=>$plan,'industry'=>$industry,'job'=>$job,'company'=>$company,'imageUrl'=>$imageUrl,'interest'=>$interest,'jobtitle'=>$jobtitle,'level'=>$level]);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('flash_error', 'Connection timeout');
                return Redirect::to('/paypal');
            } else {
                \Session::put('flash_error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/paypal');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('flash_error', 'Unknown error occurred');
        return Redirect::to('/paypal');
    }
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('flash_error', 'Payment failed');
            return Redirect::to('/paypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            
          
        $order = User::find(auth()->id());
        
        $order->industry = (session()->get('industry'));
        $order->plan = (session()->get('plan'));
        $order->employer = (session()->get('company'));
        $order->job_role = (session()->get('job'));
        $order->jobtitle = (session()->get('jobtitle'));
        $order->level = (session()->get('level'));
        $order->imageUrl = (session()->get('imageUrl'));
        $interest = (session()->get('interest'));
        $myArray = explode(',', $interest);
        $order->save();
        foreach ( $myArray as $value) {
            Auth::user()->interests()->create([
                'interest' => $value,

            ]);

        }
        if ($order) {
            try {
               // Mail::to($order->email)->send(new CoursePurchasedSuccessful($order));
            } catch (\Exception $ex) {
                //throw $th;
            }
        }
        //\Session::put('flash_message', 'Your Payment was successful');
            return Redirect::to('/feed')->with([
                'flash_message' => 'Your Payment was successful'
            ]);
        }
        \Session::put('error', 'Payment failed');
        return Redirect::to('/paypal');
    }
}

