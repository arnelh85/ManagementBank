@extends('layouts.layout')

@section('title','DELETE BANKEMPLOYEES')

@section('content')

<div class="form-responsive">
    <form method="POST" action="{{ route('bankemployees.deleteConfirm') }}">
    @csrf
        <div>
            <h2 style="margin:150px 50px 0 0;text-align:center;font-family:Helvetica;font-size:26px;font-weight:bold;color:#F72A31;">DELETE BANKEMPLOYEES</h2>
            <hr style="width:85%;height:1px;border:none;background-color:#F72A31;">
        </div>
        <div class="col col-md-12">
            <div class="col col-md-6 col-md-push-1">                
                <div class="form-group">
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">                        
                        <input type="hidden" id="employeeID" name="employeeID" value="{{ $v_deletionEmployee->ID }}">
                        <label for="l_name" class="control-label text-danger">Lastname</label>
                        <input type="text" class="form-control" id="l_name" name="l_name" tabindex="1" value="{{ $v_deletionEmployee->LastName }}" disabled>
                        @error('l_name')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="f_name" class="control-label text-danger">Firstname</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" tabindex="2" value="{{ $v_deletionEmployee->FirstName }}" disabled>
                        @error('f_name')
                            <div class="text text-danger">{{ $message }}</div>    
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="b_date" class="control-label text-danger">Birth Date</label>
                        <input type="date" class="form-control" id="b_date" name="b_date" tabindex="3" value="{{ $v_deletionEmployee->BirthDate->format('Y-m-d') }}" disabled>
                        @error('b_date')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="pin" class="control-label text-danger">Personal ID Number</label>
                        <input type="text" class="form-control" id="pin" name="pin" tabindex="4" value="{{ $v_deletionEmployee->PersonalID_No }}" disabled>
                        @error('pin')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="city" class="control-label text-danger">City</label>
                        <input type="text" class="form-control" id="city" name="city" tabindex="5" value="{{ $v_deletionEmployee->City }}" disabled>
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
                        <label for="cnt" class="control-label text-danger">Country</label>
                        <input type="text" class="form-control" id="cnt" name="cnt" tabindex="6" value="{{ $v_deletionEmployee->Country }}" disabled>
                        @error('cnt')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>                                  
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="addr" class="control-label text-danger">Address</label>
                        <input type="text" class="form-control" id="addr" name="addr" tabindex="7" value="{{ $v_deletionEmployee->Address }}" disabled>
                        @error('addr')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="ph_num" class="control-label text-danger">Phone Number</label>
                        <input type="text" class="form-control" id="ph_num" name="ph_num" tabindex="8" value="{{ $v_deletionEmployee->PhoneNumber }}" disabled>
                        @error('ph_num')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="email" class="control-label text-danger">Email</label>
                        <input type="email" class="form-control" id="email" name="email" tabindex="9" value="{{ $v_deletionEmployee->Email }}" disabled>
                        @error('email')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                </div>
            </div>            
            <div class="row text-center">        
                <input style="margin:0 870px 0 800px;" type="submit" class="btn btn-lg btn-danger" tabindex="10" value="Delete">  
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