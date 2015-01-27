<?php

// # Create Credit Card Sample
// You can store credit card details securely
// with PayPal. You can then use the returned
// Credit card id to process future payments.
// API used: POST /v1/vault/credit-card


//require __DIR__ . '/bootstrap.php';

require(BASEPATH.'libraries/paypal/bootstrap.php');	
//// register card 
use PayPal\Api\CreditCard; 
 
///// make payment lib
use PayPal\Api\Amount;
use PayPal\Api\FundingInstrument;
use PayPal\Api\CreditCardToken;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;




 $sum = number_format($array['amount'],2);
  
  
  $card = new CreditCard();
  $card->setType($array['card'])
	->setNumber($array['cnumber'])
	->setExpireMonth($array['exp_month'])
	->setExpireYear($array['exp_year'])
	->setCvv2($array['cvc'])
	->setFirstName('test')
	->setLastName('payment');

	try {
		 $card->create($apiContext);	
	     $arr['car_id'] = $card->id;
         $arr['number'] = $card->number;
		  
		 
// ### Credit card token
// Saved credit card id from a previous call to
// CreateCreditCard.php
		 $creditCardToken = new CreditCardToken();
		 $creditCardToken->setCreditCardId($arr['car_id']);
		 
// ### FundingInstrument
// A resource representing a Payer's funding instrument.
// For stored credit card payments, set the CreditCardToken
// field on this object.	 
		 $fi = new FundingInstrument();
         $fi->setCreditCardToken($creditCardToken);
		  
	
// ### Payer
// A resource representing a Payer that funds a payment
// For stored credit card payments, set payment method
// to 'credit_card'.

         $payer = new Payer();
         $payer->setPaymentMethod("credit_card")
	    ->setFundingInstruments(array($fi));

// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
		$amount = new Amount();
		$amount->setCurrency("USD")
			->setTotal($sum);
			 

// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it. 
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setDescription("Donation By user on crowdcause");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to 'sale'
		$payment = new Payment();
		$payment->setIntent("sale")
			->setPayer($payer)
			->setTransactions(array($transaction));
		
		// ###Create Payment
		// Create a payment by calling the 'create' method
		// passing it a valid apiContext.
		// (See bootstrap.php for more on `ApiContext`)
		// The return object contains the state.
		try {
		  $payment->create($apiContext);
		 
		$response = array('transection_id'=>$payment->id,'status'=>$payment->state,'card_id'=>$arr['car_id'],'card_number'=>$arr['number']);
		
		} catch (PayPal\Exception\PPConnectionException $ex) {
			 /*echo "Exception:" . $ex->getMessage() . PHP_EOL;
		
		var_dump($this->objectToArray($response));die;
			 $response = $ex->getData();*/
			$error_object = json_decode($ex->getData());
			 switch ($error_object->name)
			 {
				case 'VALIDATION_ERROR':
					$error = "Payment failed due to invalid Credit Card details:\n";
					foreach ($error_object->details as $e)
					{
						$error .= "\t" . $e->field . "\n\t" . $e->issue . "\n\n";
					}
					break;
			 }
			 /*$result1 = json_decode($result);
			  
			 $msg = $result1->details[0] ;
			 $response = array('status'=>'error','msg'=>$msg->issue);*/
			
	 }	 
		
	} catch (PayPal\Exception\PPConnectionException $ex) {
		     $error_object = json_decode($ex->getData());
			 switch ($error_object->name)
			 {
				case 'VALIDATION_ERROR':
					$error = "Payment failed due to invalid Credit Card details:\n";
					foreach ($error_object->details as $e)
					{
						$error .= "\t" . $e->field . "\n\t" . $e->issue . "\n\n";
					}
					break;
			 }
		   
		/* $response = $ex->getData();
		 
		 //$result=  objectToArray($response);
		 $result1 = json_decode($result);
		 
		 $msg = $result1->details[0] ;
		 $response = array('status'=> 'error','msg'=>$msg->issue);*/
	}
	
	//echo "<pre>"; print_r($response);die;

function objectToArray($d) {
		if (is_object($d)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return array_map(array($this,__FUNCTION__), $d);
		}
		else {
			// Return array
			return $d;
		}
	}
?>
