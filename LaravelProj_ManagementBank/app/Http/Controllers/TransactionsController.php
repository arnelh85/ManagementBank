<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Account;
use App\Mappers\TransactionMapper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TransactionsController extends Controller {

    private function validateByCreateTransaction(Request $rqst) {
    
        try {
        
            $validator = Validator::make($rqst -> all(), [                
                'trans_amt' => 'required|string'    
            ]);
            return $validator;
            
        } 
        
        catch (\Exception $exc) {
        
            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();
            
        }

    }
      
    private function getFullName($id) {

        try {
        
            $retrievingBankClient = DB::table('bankclients') -> select(DB::raw("CONCAT(bankclients.LastName,' ',bankclients.FirstName) AS FullName"))
                                    -> where('ID',$id)
                                    -> first();
            return $retrievingBankClient -> FullName;
            
        }

        catch (\Exception $exc) {
        
            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();
            
        } 

    }

    private function getAccountBalance($clientID) {

        try {
        
            $retrievingAccount = Account::select('Balance') -> where('BankClientID',$clientID) -> first();
            return $retrievingAccount -> Balance;

        } 
        
        catch (\Exception $exc) {
        
            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();
            
        } 

    }

    private function getAccountIDByClient($clientID) {

        try {
        
            $retrievingAccount = Account::select('ID') -> where('BankClientID',$clientID) -> first();
            return $retrievingAccount -> ID;
            
        } 
        
        catch (\Exception $exc) {
        
            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();
            
        } 

    }

    private function getAccountBalanceForPayer($accountID) {

        try {
        
            $retrievingAccount = Account::select('Balance') -> where('ID',$accountID) -> first();
            return $retrievingAccount -> Balance;

        } 
        
        catch (\Exception $exc) {
        
            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();
            
        } 

    }
    
    private function changeBalanceForRecipient(Request $rqst) {

        try {
                        
            $accountRecord = Account::find($rqst -> recipientAccountID);
            $accountRecord -> update([
                'Balance' => ($accountRecord -> Balance + $rqst -> trans_amt)           
            ]);

        }

        catch (\Exception $exc) {
        
            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();
            
        }

    }

    private function changeBalanceForPayer(Request $rqst) {

        try {

            $accountRecord = Account::find($rqst -> payerAccountID);
            $accountRecord -> update([
                'Balance' => ($accountRecord -> Balance - $rqst -> trans_amt)                           
            ]);
           
        }

        catch (\Exception $exc) {
        
            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();
            
        }

    }

    private function createTransactionForClient(Request $rqst, $Is_Recipient) {

        try {
        
            $additionTransaction = new Transaction();                            
            $additionTransaction -> TransactionAmount = $rqst -> trans_amt;
            $additionTransaction -> AccountID = ($Is_Recipient == 1 ? $rqst -> recipientAccountID : $rqst -> payerAccountID);
            $additionTransaction -> Is_Recipient = $Is_Recipient;                        
            $additionTransaction -> save();

        }

        catch (\Exception $exc) {
        
            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();
            
        }

    }

    public function getRecipientAccounts($clientID) {

        try {
        
            $recipientAccounts = DB::table('bankclients') 
                                 -> join('accounts','bankclients.ID','=','accounts.BankClientID') 
                                 -> select(DB::raw("accounts.ID,CONCAT(bankclients.LastName,' ',bankclients.FirstName) AS FullName"))              
                                 -> where('bankclients.ID','!=',$clientID)
                                 -> get();
            return $recipientAccounts;

        } 
        
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }                 
                                             
    }

    public function createTransaction($id) {
            
        try {
            
            $trans_map = new TransactionMapper();
            $trans_map -> payerFullName = $this -> getFullName($id);
            $trans_map -> accountBalance = $this -> getAccountBalance($id);
            $trans_map -> payerAccountID = $this -> getAccountIDByClient($id);
            $trans_map -> recipients = $this -> getRecipientAccounts($id);
            return view('transactions.create') -> with('v_transaction',$trans_map);
            
        } 
        
        catch (\Exception $exc) {

            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();           

        }

    }

    public function executeTransaction(Request $rqst) {
    
        try {
        
            $validatorData = $this -> validateByCreateTransaction($rqst);

            if ($validatorData -> fails()) {
                return redirect() -> back() -> withErrors($validatorData);   
            }
            
            $validated = $validatorData -> validated();

            if ($rqst -> trans_amt > $this -> getAccountBalanceForPayer($rqst -> payerAcoountID)) {
            
                return redirect() -> back() -> withErrors(['trans_amt' => ['Please check if Your account balance is exceeded!']]);
            }

            if ($validated == true) {

                $this -> changeBalanceForPayer($rqst);
                $this -> changeBalanceForRecipient($rqst);
                $this -> createTransactionForClient($rqst,1);
                $this -> createTransactionForClient($rqst,0);                           
                return redirect() -> route('transactions.index');
                
            }
            
        } 
        
        catch (\Exception $exc) {
        
            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        }

    }

    public function index() {

        try {
        
            $retrievingTransaction = Transaction::join('accounts','accounts.ID','=','transactions.AccountID')
                                     -> select('transactions.ID','transactions.TransactionAmount','transactions.Is_Recipient','transactions.TransactionDate',
                                               'accounts.Balance','accounts.Account_No')                                                                                            
                                     -> orderBy('transactions.ID','desc')
                                     -> get();
            return view('transactions.index') -> with('transactions',$retrievingTransaction); 

        } 
        
        catch (\Exception $exc) {
        
            return 'Message: ' . $exc -> getMessage();
            //return $exc -> getTrace();

        }

    }
    
}

?>