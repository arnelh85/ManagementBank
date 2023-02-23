@extends('layouts.layout')

@section('title','CREATE BANKCARDS')

@section('content')

<div class="form-responsive">
    <form id="frm_card_create" method="POST" action="{{ route('issuedcards.createConfirm') }}">
    @csrf 
        <div>
            <h2 style="margin:240px 50px 0 0;text-align:center;font-family:Helvetica;font-size:26px;font-weight:bold;color:#14733A;">CREATE BANKCARDS</h2>
            <hr style="width:85%;height:1px;border:none;background-color:#14733A;">
        </div>       
        <div class="col col-md-12">
            <div class="col col-md-6 col-md-push-1">                
                <div class="form-group">
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <input type="hidden" id="clientID" name="clientID" value="{{ $v_card->BankClientID }}">               
                        <label for="c_type" class="control-label text-success">Card Type</label>
                        <input type="text" class="form-control" id="c_type" name="c_type" tabindex="1" placeholder="Enter your card type" value="{{ $v_card->CardType }}">
                        @error('c_type')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="c_num" class="control-label text-success">Card Number</label>
                        <input type="text" class="form-control" id="c_num" name="c_num" tabindex="2" placeholder="Enter your card number" value="{{ $v_card->Card_No }}">
                        @error('c_num')
                            <div class="text text-danger">{{ $message }}</div>    
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="exp_month" class="control-label text-success">Expiration Month</label>
                        <input type="text" class="form-control" id="exp_month" name="exp_month" tabindex="3" placeholder="Enter your expiration month" value="{{ $v_card->ExpMonth }}">
                        @error('exp_month')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>                
            </div>
            <div class="col col-md-6 col-md-push-1">
                <div class="form-group">
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="exp_year" class="control-label text-success">Expiration Year</label>
                        <input type="text" class="form-control" id="exp_year" name="exp_year" tabindex="4" placeholder="Enter your expiration year" value="{{ $v_card->ExpYear }}">
                        @error('exp_year')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>                                               
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="sec_code" class="control-label text-success">Security Code</label>
                        <input type="text" class="form-control" id="sec_code" name="sec_code" tabindex="5" placeholder="Enter your security code" value="{{ $v_card->SecurityCode }}">
                        @error('sec_code')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>                                 
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="pin_code" class="control-label text-success">PIN Code</label>
                        <input type="text" class="form-control" id="pin_code" name="pin_code" tabindex="6" placeholder="Enter your pin code" value="{{ $v_card->PIN_Code }}">
                        @error('pin_code')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>                     
                </div>
            </div>
            <div class="row text-center">        
                <input style="margin:0 65px 0 0;" type="submit" class="btn btn-lg btn-success" tabindex="7" value="Submit">  
            </div>
            <br>               
            <hr style="width:85%;height:1px;border:none;background-color:#14733A;">
        </div>
    </form>
</div>

@endsection

@section('cssStyles')

@endsection

@section('scripts')

<script>
    populateFormAfterSubmit('frm_card_create');
        
</script>

@endsection