<?php

namespace App\HelperFunctions;

use App\HelperFunctions\AuthHelperFunctions;
use App\Models\BankemployeeType;
use App\Models\Bankemployee;
use App\Models\Bankclient;
use Illuminate\Support\Facades\DB;

class AuthHelperFunctions { 
   
    public function getEmployeeTypeID($employeeType) {

        try {

            // Pass 1 for Type = 'Administrator', 2 for Type = 'User'
            $retrievingEmployeeType = BankemployeeType::select('ID') -> where('EmployeeType',$employeeType) -> first();
            return $retrievingEmployeeType -> ID; 
            
        } 
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        }                         
       
    }

    public function getEmployeeType($username) {

        try {
        
            $employeeType = Bankemployee::join('bankemployee_types','bankemployee_types.ID','=','bankemployees.BankEmployeeTypeID')
                            -> select('bankemployee_types.EmployeeType') 
                            -> where('bankemployees.UserName','=',$username)                   
                            -> first();
            return $employeeType -> EmployeeType;

        } 
        
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }                 
                                             
    }

    public function existUserInDB($username) {

        try {
        
            $matchingUsername = Bankemployee::select('ID') -> where('UserName',$username) -> first();
            
            if ($matchingUsername != null) {
                return true;   
            }

            else {
                return false;
            }
           
        } 
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        }                 
                                             
    }

    public function getEmployeeID($username) {

        try {
        
            $employee = Bankemployee::select('ID') -> where('UserName',$username) -> first();
            return $employee -> ID;
                                               
        } 
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        }                 
                                             
    }

    public function existPersonalIDNumberInDB($personalIDNumber) {
    
        try {
            
            $matchingPersonalIDNumber = Bankclient::select('ID') -> where('PersonalID_No',$personalIDNumber) -> first();
            
            if ($matchingPersonalIDNumber != null) {
                return true;
            }

            else {
                return false;
            }

        }
        
        catch (\Exception $exc) {
            
            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        }

    }
                          
}  

?>