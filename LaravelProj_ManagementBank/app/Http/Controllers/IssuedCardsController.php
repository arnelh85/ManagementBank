<?php

namespace App\Http\Controllers;

use App\Models\Issuedcard;
use App\Models\Bankclient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class IssuedCardsController extends Controller {

    private function validateByCreateCard(Request $rqst) {

        try {
        
            $validator = Validator::make($rqst -> all(), [
                'c_type' => 'required|string|max:30',
                'c_num' => 'required|string|max:25',
                'exp_month' => 'required|string|max:5',
                'exp_year' => 'required|string|max:5',                
                'sec_code' => 'required|string|max:5',
                'pin_code' => 'required|string|max:5'                             
            ]);
            return $validator;
            
        } 
        
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        } 

    }
    
    public function createCardByClient($id) {

        try {
            
            $additionCardByClient = new Issuedcard();
            $additionCardByClient -> BankClientID = $id;                       
            return view('issuedcards.create') -> with('v_card',$additionCardByClient);

        } 
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();
            
        }

    }
    
    public function createConfirm(Request $rqst) {

        try {
        
            $validatorData = $this -> validateByCreateCard($rqst);

            if ($validatorData -> fails()) {
                return redirect() -> back() -> withErrors($validatorData);
            }

            $validated = $validatorData -> validated();

            if ($validated == true) {
            
                $issuingCard = new Issuedcard();         
                $issuingCard -> CardType = $rqst -> c_type;
                $issuingCard -> Card_No = $rqst -> c_num;
                $issuingCard -> ExpMonth = $rqst -> exp_month;
                $issuingCard -> ExpYear = $rqst -> exp_year;                
                $issuingCard -> SecurityCode = $rqst -> sec_code;
                $issuingCard -> PIN_Code = $rqst -> pin_code; 
                $issuingCard -> BankClientID = $rqst -> clientID;                
                $issuingCard -> save();
                return redirect() -> route('issuedcards.index');
                          
            }
            
        } 
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();
            
        }

    }

    public function index() {

        try {
        
            $retrievingCard = Issuedcard::join('bankclients','bankclients.ID','=','issuedcards.BankClientID')
                              -> select('issuedcards.ID','bankclients.LastName','bankclients.FirstName','issuedcards.CardType','issuedcards.Card_No',
                                        'issuedcards.ExpYear','issuedcards.ModifiedDate','bankclients.PhoneNumber')                                                                                                                                                                                   
                              -> orderBy('issuedcards.ID','desc')
                              -> get();
            return view('issuedcards.index') -> with('cards',$retrievingCard);
                              
        } 
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();
            
        }

    }
    
    public function delete($id) {

        try {
        
            $deletionCard = Issuedcard::where('ID',$id) -> first();
            return view('issuedcards.delete') -> with('v_deletionCard',$deletionCard);

        }

        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();
            
        }

    }

    public function deleteConfirm(Request $rqst) {
    
        try {
            
            Issuedcard::where('ID',$rqst -> cardID) -> delete();
            return redirect() -> route('issuedcards.index');

        }
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        }   

    }
               
}

?>