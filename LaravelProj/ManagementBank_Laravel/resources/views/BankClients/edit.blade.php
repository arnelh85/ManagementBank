@extends('layouts.layout')

@section('title','EDIT BANKCLIENTS')

@section('content')

<div class="form-responsive">
    <form method="POST" action="{{ route('bankclients.editConfirm') }}">
    @csrf
        <div>
            <h2 style="margin:150px 35px 0 0;text-align:center;font-family:Helvetica;font-size:26px;font-weight:bold;color:#EBE72A;">EDIT BANKCLIENTS</h2>
            <hr style="width:85%;height:1px;border:none;background-color:#EBE72A;">
        </div> 
        <div class="col col-md-12">
            <div class="col col-md-6 col-md-push-1">
                <div class="form-group">
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">                         
                        <input type="hidden" id="clientID" name="clientID" value="{{ $v_editingClient->ID }}">                
                        <label for="l_name" class="control-label text-warning">Lastname</label>
                        <input type="text" class="form-control" id="l_name" name="l_name" tabindex="1" value="{{ $v_editingClient->LastName }}">
                        @error('l_name')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="f_name" class="control-label text-warning">Firstname</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" tabindex="2" value="{{ $v_editingClient->FirstName }}">
                        @error('f_name')
                            <div class="text text-danger">{{ $message }}</div>    
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="b_date" class="control-label text-warning">Birth Date</label>
                        <input type="date" class="form-control" id="b_date"  name="b_date" tabindex="3" value="{{ $v_editingClient->BirthDate->format('Y-m-d') }}">
                        @error('b_date')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="pin" class="control-label text-warning">Personal ID Number</label>
                        <input type="text" class="form-control" id="pin" name="pin" tabindex="4" value="{{ $v_editingClient->PersonalID_No }}">
                        @error('pin')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="city" class="control-label text-warning">City</label>
                        <input type="text" class="form-control" id="city" name="city" tabindex="5" value="{{ $v_editingClient->City }}">
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
                        <label for="cnt" class="control-label text-warning">Country</label>
                        <input type="text" class="form-control" id="cnt" name="cnt" tabindex="6" value="{{ $v_editingClient->Country }}">
                        @error('cnt')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>                                   
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="addr" class="control-label text-warning">Address</label>
                        <input type="text" class="form-control" id="addr" name="addr" tabindex="7" value="{{ $v_editingClient->Address }}">
                        @error('addr')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="ph_num" class="control-label text-warning">Phone Number</label>
                        <input type="text" class="form-control" id="ph_num" name="ph_num" tabindex="8" value="{{ $v_editingClient->PhoneNumber }}">
                        @error('ph_num')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="email" class="control-label text-warning">Email</label>
                        <input type="email" class="form-control" id="email" name="email" tabindex="9" value="{{ $v_editingClient->Email }}">
                        @error('email')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>                
                </div>
            </div>
            <div class="row text-center">        
                <input style="margin:80px 800px 0 -220px;" type="submit" class="btn btn-lg btn-warning" tabindex="10" value="Edit"> 
            </div>
            <br>           
            <hr style="width:85%;height:1px;border:none;background-color:#EBE72A;">
        </div>
    </form>
</div>

@endsection

@section('cssStyles')

@endsection

@section('scripts')

@endsection