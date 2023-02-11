@extends('layouts.layout')

@section('title','EDIT BANKEMPLOYEES')

@section('content')

<div class="form-responsive">
    <form method="POST" action="{{ route('bankemployees.editConfirm') }}">
    @csrf
        <div>
            <h2 style="margin:120px 40px 0 0;text-align:center;font-family:Helvetica;font-size:26px;font-weight:bold;color:#EBE72A;">EDIT BANKEMPLOYEES</h2>
            <hr style="width:85%;height:1px;border:none;background-color:#EBE72A;">
        </div>
        <div class="col col-md-12">
            <div class="col col-md-6 col-md-push-1">
                <div class="form-group">
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">             
                        <input type="hidden" id="employeeID" name="employeeID" value="{{ $v_editingEmployee->ID }}">                
                        <label for="l_name" class="control-label text-warning">Lastname</label>
                        <input type="text" class="form-control" id="l_name" name="l_name" tabindex="1" value="{{ $v_editingEmployee->LastName }}">
                        @error('l_name')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="f_name" class="control-label text-warning">Firstname</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" tabindex="2" value="{{ $v_editingEmployee->FirstName }}">
                        @error('f_name')
                            <div class="text text-danger">{{ $message }}</div>    
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="b_date" class="control-label text-warning">Birth Date</label>
                        <input type="date" class="form-control" id="b_date" name="b_date" tabindex="3" value="{{ $v_editingEmployee->BirthDate->format('Y-m-d') }}">
                        @error('b_date')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="pin" class="control-label text-warning">Personal ID Number</label>
                        <input type="text" class="form-control" id="pin" name="pin" tabindex="4" value="{{ $v_editingEmployee->PersonalID_No }}">
                        @error('pin')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="city" class="control-label text-warning">City</label>
                        <input type="text" class="form-control" id="city" name="city" tabindex="5" value="{{ $v_editingEmployee->City }}">
                        @error('city')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="cnt" class="control-label text-warning">Country</label>
                        <input type="text" class="form-control" id="cnt" name="cnt" tabindex="6" value="{{ $v_editingEmployee->Country }}">
                        @error('cnt')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>           
                </div>
            </div>
            <div class="col col-md-6 col-md-push-1">
                <div class="form-group">                
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="addr" class="control-label text-warning">Address</label>
                        <input type="text" class="form-control" id="addr" name="addr" tabindex="7" value="{{ $v_editingEmployee->Address }}">
                        @error('addr')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="ph_num" class="control-label text-warning">Phone Number</label>
                        <input type="text" class="form-control" id="ph_num" name="ph_num" tabindex="8" value="{{ $v_editingEmployee->PhoneNumber }}">
                        @error('ph_num')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="email" class="control-label text-warning">Email</label>
                        <input type="email" class="form-control" id="email" name="email" tabindex="9" value="{{ $v_editingEmployee->Email }}">
                        @error('email')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="u_name" class="control-label text-warning">Username</label>
                        <input type="text" class="form-control" id="u_name" name="u_name" tabindex="10" value="{{ $v_editingEmployee->UserName }}">
                        @error('u_name')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="pssw" class="control-label text-warning">Password</label>
                        <input type="password" class="form-control" id="pssw" name="pssw" tabindex="11" value="{{ $v_editingEmployee->Password }}">
                        @error('pssw')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="con_pssw" class="control-label text-warning">Confirm Password</label>
                        <input type="password" class="form-control" id="con_pssw" name="con_pssw" tabindex="12" value="{{ $v_editingEmployee->Password }}">
                        @error('con_pssw')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                </div>
            </div>            
            <div class="row text-center">        
                <input style="margin:0 60px 0 0;" type="submit" class="btn btn-lg btn-warning" tabindex="13" value="Edit">  
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