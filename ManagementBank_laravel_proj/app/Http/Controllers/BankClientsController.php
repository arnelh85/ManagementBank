<?php

namespace App\Http\Controllers;

use App\Models\Bankclient;
use App\Models\Account;
use App\HelperFunctions\AuthHelperFunctions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BankClientsController extends Controller {
   
    private function validateByCreateClient(Request $rqst) {

        try {
        
            $validator = Validator::make($rqst -> all(), [
                'l_name' => 'required|alpha|max:30',
                'f_name' => 'required|alpha|max:20',
                'b_date' => 'required|date|date_format:Y-m-d|before:2005-01-01',
                'pin' => 'required|string|max:15',
                'city' => 'required|string|max:30',
                'cnt' => 'required|string|max:30',
                'addr' => 'required|string|max:50',
                'ph_num' => 'required|string|max:25',
                'email' => 'required|string|max:50'              
            ]);
            return $validator;

        }
       
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        } 
       
    }

    private function generateAccountNumber() {

        try {
        
            $initialAccountNumber = 10000000000;
            $accountNumber_rec = Account::select('Account_No') -> orderBy('accounts.ID','desc') -> first();
            
            if ($accountNumber_rec == null) {
                return $initialAccountNumber;     
            }

            elseif ($accountNumber_rec != null) {

                $retrievedAccountNumber = $accountNumber_rec -> Account_No; 
                return ++$retrievedAccountNumber;

            }

        } 
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        } 

    }

    private function createAccountByClient($clientID) {
    
        try {
        
            $additionAccount = new Account();
            $additionAccount -> Account_No = $this -> generateAccountNumber();
            $additionAccount -> Balance = 0;            
            $additionAccount -> BankClientID = $clientID;
            $additionAccount -> save();
            
        } 
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        } 
        
        
    }
                   
    public function create() {

        try {
        
            $client = new Bankclient();
            $authHelperFunctions = new AuthHelperFunctions();
            $client -> BankEmployeeID = $authHelperFunctions -> getEmployeeID(Session::get('s_username')); 
            return view('bankclients.create') -> with('v_client',$client);

        } 
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        } 
        
    }
   
    public function createConfirm(Request $rqst) {

        try {

            $validatorData = $this -> validateByCreateClient($rqst);

            if ($validatorData -> fails()) {
                return redirect() -> back() -> withErrors($validatorData);
            }
           
            $validated = $validatorData -> validated();

            if ($validated == true) {
              
                $authHelperFunctions = new AuthHelperFunctions();
                
                if ($authHelperFunctions -> existPersonalIDNumberInDB($rqst -> pin)) {
                    return redirect() -> route('bankclients.create') -> with('s_error','The personal ID number already exists!');
                }

                else {

                    $lastinsertedID = DB::table('bankclients') -> insertGetId(['LastName' => $rqst -> l_name,'FirstName' => $rqst -> f_name,'BirthDate' => $rqst -> b_date,
                                                                               'PersonalID_No' => $rqst -> pin,'City' => $rqst -> city,'Country' => $rqst -> cnt,
                                                                               'Address' => $rqst -> addr,'PhoneNumber' => $rqst -> ph_num,'Email' => $rqst -> email,
                                                                               'BankEmployeeID' => $rqst -> employeeID]);                     
                    $this -> createAccountByClient($lastinsertedID);                                                                              
                    return redirect() -> route('bankclients.index');
                     
                }
                                
            }                                                                            
            
        } 

        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace(); 
        } 

    }

    public function index() {

        try {
        
            $retrievingClient = Bankclient::join('accounts','bankclients.ID','=','accounts.BankClientID')
                                -> leftjoin('issuedcards','bankclients.ID','=','issuedcards.BankClientID')
                                -> select('bankclients.ID','bankclients.LastName','bankclients.FirstName','accounts.Account_No','accounts.Balance','bankclients.Country',
                                          'bankclients.PhoneNumber','issuedcards.ID as issuedcards_ID')                                                                                   
                                -> orderBy('bankclients.ID','desc')
                                -> get();
            return view('bankclients.index') -> with('clients',$retrievingClient);

        } 
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace(); 

        }         

    }

    public function edit($id) {

        try {
        
            $editingClient = Bankclient::where('ID',$id) -> first();
            return view('bankclients.edit') -> with('v_editingClient',$editingClient);
               
        }
         
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace(); 

        }         
       
    }

    public function editConfirm(Request $rqst) {

        try {

            $validatorData = $this -> validateByCreateClient($rqst);

            if ($validatorData -> fails()) {
                return redirect() -> back() -> withErrors($validatorData);
            }

            $validated = $validatorData -> validated();

            if ($validated == true) {

                $editingClient = Bankclient::where('ID',$rqst -> clientID) -> first();       
                $editingClient -> LastName = $rqst -> l_name;
                $editingClient -> FirstName = $rqst -> f_name;
                $editingClient -> BirthDate = $rqst -> b_date;
                $editingClient -> PersonalID_No = $rqst -> pin;
                $editingClient -> City = $rqst -> city;
                $editingClient -> Country = $rqst -> cnt;
                $editingClient -> Address = $rqst -> addr;
                $editingClient -> PhoneNumber = $rqst -> ph_num;
                $editingClient -> Email = $rqst -> email;                                           
                $editingClient -> save();             
                return redirect() -> route('bankclients.index');
            
            }
                    
        } 
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        }   

    }

    public function delete($id) {

        try {

            $deletionClient = Bankclient::where('ID',$id) -> first();
            return view('bankclients.delete') -> with('v_deletionClient',$deletionClient);  
        
        }

        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        }

    }

    public function deleteConfirm(Request $rqst) {
    
        try {
                        
            DB::select('CALL proc_delete_bankclient(?)',array($rqst -> clientID));                          
            return redirect() -> route('bankclients.index');

        }
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        }   

    }

}

?>