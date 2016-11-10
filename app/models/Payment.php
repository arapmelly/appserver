<?php

class Payment extends \Eloquent {



    public static function add($data){

    	$payment = new Payment;
    	$payment->service_name = array_get($data, 'service_name');
    	$payment->business_number = array_get($data, 'business_number');
    	$payment->transaction_reference = array_get($data, 'transaction_reference');
    	$payment->internal_transaction_id = array_get($data, 'internal_transaction_id');
    	$payment->transaction_timestamp = array_get($data, 'transaction_timestamp');
    	$payment->transaction_type = array_get($data, 'transaction_type');
    	$payment->account_number = array_get($data, 'account_number');
    	$payment->sender_phone = array_get($data, 'sender_phone');
    	$payment->first_name = array_get($data, 'first_name');
    	$payment->middle_name = array_get($data, 'middle_name');
    	$payment->last_name = array_get($data, 'last_name');
    	$payment->amount = array_get($data, 'amount');
    	$payment->currency = array_get($data, 'currency');
    	$payment->signature = array_get($data, 'signature');
    	$payment->save();
    }



    public static function confirmPayment($phone, $amount){


         $user_phone = substr($phone, -9);
         $prefix = '+254';
         $phn = $prefix.''.$user_phone;
    	//check payments where user phone and amount matches

    	$payment = DB::table('payments')->where('sender_phone', '=', $phn)->count();

      


        if($payment > 0){

            return true;

        } else {

            return false;
        }


    }



    public static function activateUser($phone){

        $user_id = DB::table('users')->where('phone', '=', $phone)->pluck('id');

        $user = User::find($user_id);

        $user->is_activated = true;
        $user->update();
    }



}


?>