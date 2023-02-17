@extends('layouts.layout')

@section('title','DELETE BANKCARDS')

@section('content')

<div class="form-responsive">
    <form method="POST" action="{{ route('issuedcards.deleteConfirm') }}">
    @csrf
        <div>
            <h2 style="margin:250px 50px 0 0;text-align:center;font-family:Helvetica;font-size:26px;font-weight:bold;color:#F72A31;">DELETE BANKCARDS</h2>
            <hr style="width:85%;height:1px;border:none;background-color:#F72A31;">
        </div> 
        <div class="col col-md-12">
            <div class="col col-md-6 col-md-push-1">                
                <div class="form-group">
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">  
                        <input type="hidden" id="cardID" name="cardID" value="{{ $v_deletionCard->ID }}">               
                        <label for="c_type" class="control-label text-danger">Card Type</label>
                        <input type="text" class="form-control" id="c_type" name="c_type" tabindex="1" value="{{ $v_deletionCard->CardType }}" disabled>
                        @error('c_type')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <label for="c_num" class="control-label text-danger">Card Number</label>
                        <input type="text" class="form-control" id="c_num" name="c_num" tabindex="2" value="{{ $v_deletionCard->Card_No }}" disabled>
                        @error('c_num')
                            <div class="text text-danger">{{ $message }}</div>    
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="exp_month" class="control-label text-danger">Expiration Month</label>
                        <input type="text" class="form-control" id="exp_month" name="exp_month" tabindex="3" value="{{ $v_deletionCard->ExpMonth }}" disabled>
                        @error('exp_month')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>                
                </div>
            </div>
            <div class="col col-md-6 col-md-push-1">
                <div class="form-group">
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="exp_year" class="control-label text-danger">Expiration Year</label>
                        <input type="text" class="form-control" id="exp_year" name="exp_year" tabindex="4" value="{{ $v_deletionCard->ExpYear }}" disabled>
                        @error('exp_year')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                
                    </div>                
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="sec_code" class="control-label text-danger">Security Code</label>
                        <input type="text" class="form-control" id="sec_code" name="sec_code" tabindex="5" value="{{ $v_deletionCard->SecurityCode }}" disabled>
                        @error('sec_code')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>                                 
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="pin_code" class="control-label text-danger">PIN Code</label>
                        <input type="text" class="form-control" id="pin_code" name="pin_code" tabindex="6" value="{{ $v_deletionCard->PIN_Code }}" disabled>
                        @error('pin_code')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>                     
                </div>
            </div>
            <div class="row text-center">        
                <input style="margin:0 870px 0 800px;" type="submit" class="btn btn-lg btn-danger" tabindex="7" value="Submit">  
            </div>
            <br>               
            <hr style="width:85%;height:1px;border:none;background-color:#F72A31;">
        </div>
    </form>
</div>

@endsection

@section('cssStyles')

@endsection

@section('scripts')

@endsection