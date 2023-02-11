@extends('layouts.layout')

@section('title','CREATE BANKCLIENTS')

@section('content')

<div class="form-responsive">
    <form id="frm_bankclient_create" method="POST" action="{{ route('bankclients.createConfirm') }}">
    @csrf
        <div>
            <h2 style="margin:160px 50px 0 0;text-align:center;font-family:Helvetica;font-size:26px;font-weight:bold;color:#14733A;">CREATE BANKCLIENTS</h2>            
            <hr style="width:85%;height:1px;border:none;background-color:#14733A;">
        </div>       
        <div class="col col-md-12">            
            <div class="col col-md-6 col-md-push-1">                
                <div class="form-group">
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <input type="hidden" id="employeeID" name="employeeID" value="{{ $v_client->BankEmployeeID }}">                 
                        <label for="l_name" class="control-label text-success">Lastname</label>
                        <input type="text" class="form-control" id="l_name" name="l_name" tabindex="1" placeholder="Enter your lastname" value="{{ $v_client->LastName }}">
                        @error('l_name')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="f_name" class="control-label text-success">Firstname</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" tabindex="2" placeholder="Enter your firstname" value="{{ $v_client->FirstName }}">
                        @error('f_name')
                            <div class="text text-danger">{{ $message }}</div>    
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="b_date" class="control-label text-success">Birth Date</label>
                        <input type="date" class="form-control" id="b_date" name="b_date" tabindex="3" placeholder="Enter your birth date" value="{{ $v_client->BirthDate }}">
                        @error('b_date')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="pin" class="control-label text-success">Personal ID Number</label>
                        <input type="text" class="form-control" id="pin" name="pin" tabindex="4" placeholder="Enter your personal id number" value="{{ $v_client->PersonalID_No }}">
                        @error('pin')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="city" class="control-label text-success">City</label>
                        <input type="text" class="form-control" id="city" name="city" tabindex="5" placeholder="Enter your city" value="{{ $v_client->City }}">
                        @error('city')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                </div>    
            </div>
            <div class="col col-md-6 col-md-push-1">
                <div class="form-group">
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="cnt" class="control-label text-success">Country</label>
                        <input type="text" class="form-control" id="cnt" name="cnt" tabindex="6" placeholder="Enter your country" value="{{ $v_client->Country }}">
                        @error('cnt')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>                                   
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="addr" class="control-label text-success">Address</label>
                        <input type="text" class="form-control" id="addr" name="addr" tabindex="7" placeholder="Enter your address" value="{{ $v_client->Address }}">
                        @error('addr')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="ph_num" class="control-label text-success">Phone Number</label>
                        <input type="text" class="form-control" id="ph_num" name="ph_num" tabindex="8" placeholder="Enter your phone number" value="{{ $v_client->PhoneNumber }}">
                        @error('ph_num')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="email" class="control-label text-success">Email</label>
                        <input type="email" class="form-control" id="email" name="email" tabindex="9" placeholder="Enter your email" value="{{ $v_client->Email }}">
                        @error('email')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                                            
                    </div>
                </div>                
            </div>                                  
            <div class="row text-center">        
                <input style="margin:0 850px 0 800px;" type="submit" class="btn btn-lg btn-success" tabindex="10" value="Submit">  
            </div>            
            @if(Session::exists('s_error'))
                <div class="alert alert-danger">
                    {{ Session::get('s_error') }}
                </div>            
            @endif
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
    populateFormAfterSubmit('frm_bankclient_create');
</script>

@endsection