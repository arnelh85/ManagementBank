<?php

namespace App\Mappers;

use App\Mappers\TransactionMapper;
use App\Models\Transaction;

class TransactionMapper extends Transaction {
    
    public $payerFullName;
    public $accountBalance;
    public $payerAccountID;
    public $recipients = [];
    
}