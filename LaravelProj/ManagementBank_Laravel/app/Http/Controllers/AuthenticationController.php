<?php

namespace App\Http\Controllers;

use App\Models\Bankemployee;
use App\HelperFunctions\AuthHelperFunctions;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AuthenticationController extends Controller {
                    
    private function validateByLogin(Request $rqst) {

        try {
        
            $validator = Validator::make($rqst -> all(), [            
                'u_name' => 'required|alpha_num|max:30',
                'pssw' => 'required|alpha_num|min:6|max:1000'  
            ]);
            return $validator;

        } 
        
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }   
               
    }

    private function existUserInDB($username,$password) {

        try {
        
            $log_user = Bankemployee::where('UserName','=',$username)
                        -> select('ID','Password')
                        -> first();
        
            if ($log_user == null) {
                return false;
            }

            elseif (Crypt::decryptString($log_user -> Password) == $password) {
                return true;    
            }

        } 
        
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }   
                                                 
    }

    private function retrieveFullName($username) {

        try {
        
            $retrievingBankEmployee = DB::table('bankemployees') -> select(DB::raw("CONCAT(bankemployees.FirstName,' ',bankemployees.LastName) AS FullName"))
                                    -> where('UserName',$username)
                                    -> first();
            return $retrievingBankEmployee -> FullName;
            
        }

        catch (\Exception $exc) {
        
            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();
            
        } 

    }

    public function login() {

        try {
                       
            $log_employee = new Bankemployee();                                                                               
            return view('authentication.login') -> with('v_logEmployee',$log_employee);
                   
        } 
        
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }   
            
    }

    public function loginConfirm(Request $rqst) {
    
        try {
        
            $validatorData = $this -> validateByLogin($rqst);

            if ($validatorData -> fails()) {
                return redirect() -> back() -> withErrors($validatorData);
            }

            elseif ($this -> existUserInDB($rqst -> u_name,$rqst -> pssw) != true) {
                return redirect() -> back() -> withErrors(['match_user' => ['Please check if Your credentials are corrected!']]); 
            }
            
            else {

                $authHelperFunctions = new AuthHelperFunctions();                
                $employeeType = $authHelperFunctions -> getEmployeeType($rqst -> u_name);
                Session::put('s_username',$rqst -> u_name);
                Session::put('s_employeeType',$employeeType);
                Session::put('s_bankEmployeeFullname',$this -> retrieveFullName($rqst -> u_name));
                                
                if ($employeeType == 1) {
                    return redirect() -> route('bankemployees.index');
                }

                elseif ($employeeType == 2) {
                    return redirect() -> route('bankclients.index');   
                }

            }
                                  
        }
        
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }   

    }

    public function logout() {

        try {
            
            Session::forget('s_username');
            Session::forget('s_employeeType');
            Session::forget('s_bankEmployeeFullname');           
            return redirect() -> route('authentication.login'); 
        } 
        
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }   
                
    }

}

?>