@extends('layouts.layout')

@section('title','CREATE TRANSACTIONS')

@section('content')

<div class="form-responsive">
    <form id="frm_transaction_create" method="POST" action="{{ route('transactions.executeTransaction') }}">
    @csrf
        <div>
            <h2 style="margin:300px 20px 0 0;text-align:center;font-family:Helvetica;font-size:26px;font-weight:bold;color:#14733A;">CREATE TRANSACTIONS</h2>
            <hr style="width:80%;height:1px;border:none;background-color:#14733A;">
        </div>
        <div class="row col-md-12">
            <div class="col col-md-6 col-md-push-3">
                <div class="form-group">
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">                
                        <label class="control-label text-success">Payer Account:</label>                                    
                        <input type="hidden" id="payerAccountID" name="payerAccountID" value="{{ $v_transaction->payerAccountID }}">
                        <div class="text-warning">
                            <strong>Payer: {{ $v_transaction -> payerFullName }}</strong>    
                        </div>
                        <div class="text-warning">
                            <strong>Balance: {{ $v_transaction -> accountBalance }}</strong>
                        </div>                                                   
                        <br>                
                        <label for="trans_amt" class="control-label text-success">Transaction Amount</label>
                        <input type="number" class="form-control" id="trans_amt" name="trans_amt" tabindex="1" placeholder="Enter your transaction amount" value="{{ $v_transaction->TransactionAmount }}">
                        @error('trans_amt')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                                
                    </div>
                </div>
            </div>
            <div class="col col-md-6 col-md-push-1">
                <div class="form-group">
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">    
                        <label for="receivedBankClient" class="control-label text-success">Choose a recipient of the bank:</label>
                        <select class="form-control form-control-md" name="select_receivedBankClient" id="select_receivedBankClient" data-attr="dropdown">
                        @foreach($v_transaction -> recipients as $recipient)
                            <option value="{{ $recipient->ID }}">{{ $recipient->FullName }}</option>
                        @endforeach                    
                        </select>  
                        <input type="hidden" id="recipientAccountID" name="recipientAccountID" value="">
                        <br> 
                    </div>   
                </div>
            </div>              
            <div class="row text-center">       
                <input style="margin:80px 700px 0 -150px;" type="submit" class="btn btn-lg btn-success" tabindex="2" value="Submit">              
            </div>
            <br>
            <hr style="width:80%;height:1px;border:none;background-color:#14733A;">
        </div>                                                                                                                                                                  
    </form>
</div>

@endsection

@section('cssStyles')

<style>
    div.form-responsive {
        margin-left: 140px;    
    }

    input#trans_amt,select#select_receivedBankClient {           
        width: 55%;            
    }

    div#buttonContainer {        
        margin-right: 200px;
    }
</style>

@endsection

@section('scripts')

<script>  
    populateFormAfterSubmit('frm_transaction_create');

    $('#select_receivedBankClient').on('change', function (e) {
        var optionSelected = $("option:selected",this);
        $('#recipientAccountID').val(this.value);    
    });   
    $('#select_receivedBankClient').change();
</script>

@endsection