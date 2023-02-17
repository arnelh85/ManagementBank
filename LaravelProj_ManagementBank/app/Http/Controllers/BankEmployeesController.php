<?php

namespace App\Http\Controllers;

use App\Models\Bankemployee;
use App\HelperFunctions\AuthHelperFunctions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BankEmployeesController extends Controller {
    
    private function validateByCreateEmployee(Request $rqst) {

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
                'email' => 'required|string|max:50',
                'u_name' => 'required|alpha_num|max:30',
                'pssw' => 'required|alpha_num|min:6|max:1000|same:con_pssw',
                'con_pssw' => 'required|alpha_num|min:6|max:1000'   
            ]);
            return $validator;
            
        } 
        
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }   
               
    }
    
    public function create(Request $rqst) {

        try {
        
            $employee = new Bankemployee();
            return view('bankemployees.create') -> with('v_employee',$employee);

        } 
        
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }   
                       
    }
       
    public function createConfirm(Request $rqst) {
        
        try { 
        
            $validatorData = $this -> validateByCreateEmployee($rqst);

            if ($validatorData -> fails()) {
                return redirect() -> back() -> withErrors($validatorData);
            }
                       
            $validated = $validatorData -> validated();

            if ($validated == true) {

                $additionEmployee = new Bankemployee();          
                $additionEmployee -> LastName = $rqst -> l_name;
                $additionEmployee -> FirstName = $rqst -> f_name;
                $additionEmployee -> BirthDate = $rqst -> b_date;
                $additionEmployee -> PersonalID_No = $rqst -> pin;
                $additionEmployee -> City = $rqst -> city;
                $additionEmployee -> Country = $rqst -> cnt;
                $additionEmployee -> Address = $rqst -> addr;
                $additionEmployee -> PhoneNumber = $rqst -> ph_num;
                $additionEmployee -> Email = $rqst -> email;
                $additionEmployee -> UserName = $rqst -> u_name;                
                $additionEmployee -> Password = Crypt::encryptString($rqst -> pssw);
                $additionEmployee -> Password = Crypt::encryptString($rqst -> con_pssw);                               
                $authHelperFunctions = new AuthHelperFunctions();                
                $additionEmployee -> BankEmployeeTypeID = $authHelperFunctions -> getEmployeeTypeID(2); 
                
                if ($authHelperFunctions -> existUserInDB($rqst -> u_name)) {
                    return redirect() -> route('bankemployees.create') -> with('s_error','The username already exists!');
                }
                
                else {

                    $additionEmployee -> save();                    
                    return redirect() -> route('bankemployees.index');
                    
                } 
                                                                    
            }

        }

        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }   

    }

    public function index() {

        try {

            $retrievingEmployee = Bankemployee::join('bankemployee_types','bankemployee_types.ID','=','bankemployees.BankEmployeeTypeID')
                                  -> select('bankemployees.ID','bankemployees.LastName','bankemployees.FirstName','bankemployees.City','bankemployees.Country',
                                            'bankemployees.Address','bankemployees.PhoneNumber','bankemployee_types.Description')                                            
                                  -> where('bankemployee_types.EmployeeType',2)                                            
                                  -> orderBy('bankemployees.ID','desc')                                                                                                
                                  -> get();
            return view('bankemployees.index') -> with('employees',$retrievingEmployee);

        }
        
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }   
                
    }

    public function edit($id) {

        try {
            
            $editingEmployee = Bankemployee::where('ID',$id) -> first();
            $editingEmployee -> Password = Crypt::decryptString($editingEmployee -> Password);
            return view('bankemployees.edit') -> with('v_editingEmployee',$editingEmployee);

        } 
        
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }   
           
    }

    public function editConfirm(Request $rqst) {
        
        try { 
        
            $validatorData = $this -> validateByCreateEmployee($rqst);

            if ($validatorData -> fails()) {
                return redirect() -> back() -> withErrors($validatorData);
            } 

            $validated = $validatorData -> validated();

            if ($validated == true) {

                $editingEmployee = Bankemployee::where('ID',$rqst -> employeeID) -> first();       
                $editingEmployee -> LastName = $rqst -> l_name;
                $editingEmployee -> FirstName = $rqst -> f_name;
                $editingEmployee -> BirthDate = $rqst -> b_date;
                $editingEmployee -> PersonalID_No = $rqst -> pin;
                $editingEmployee -> City = $rqst -> city;
                $editingEmployee -> Country = $rqst -> cnt;
                $editingEmployee -> Address = $rqst -> addr;
                $editingEmployee -> PhoneNumber = $rqst -> ph_num;
                $editingEmployee -> Email = $rqst -> email;
                $editingEmployee -> UserName = $rqst -> u_name;
                $editingEmployee -> Password = Crypt::encryptString($rqst -> pssw);
                $editingEmployee -> Password = Crypt::encryptString($rqst -> con_pssw);
                $authHelperFunctions = new AuthHelperFunctions();                
                $editingEmployee -> BankEmployeeTypeID = $authHelperFunctions -> getEmployeeTypeID(2);                           
                $editingEmployee -> save();             
                return redirect() -> route('bankemployees.index');
            
            }
        
        }

        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }   
        
    }

    public function delete($id) {

        try {

            $deletionEmployee = Bankemployee::where('ID',$id) -> first();
            return view('bankemployees.delete') -> with('v_deletionEmployee',$deletionEmployee);

        }

        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();
             
        }   
       
    }

    public function deleteConfirm(Request $rqst) {

        try {
            
            DB::select('CALL proc_delete_bankemployee(?)',array($rqst -> employeeID));                          
            return redirect() -> route('bankemployees.index');

        }
         
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }   
       
    }
         
} 

?>