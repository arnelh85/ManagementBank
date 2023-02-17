@extends('layouts.layout')

@section('title','CREATE BANKEMPLOYEES')

@section('content')

<div class="form-responsive">
    <form id="frm_bankemployeee_create" method="POST" action="{{ route('bankemployees.createConfirm') }}">
    @csrf  
        <div>            
            <h2 style="margin:130px 50px 0 0;text-align:center;font-family:Helvetica;font-size:26px;font-weight:bold;color:#14733A;">CREATE BANKEMPLOYEES</h2>
            <hr style="width:85%;height:1px;border:none;background-color:#14733A;">                                         
        </div>                                      
        <div class="col col-md-12">                                        
            <div class="col col-md-6 col-md-push-1">
                <div class="form-group">
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">                        
                        <label for="l_name" class="control-label text-success">Lastname</label>
                        <input type="text" class="form-control" id="l_name" name="l_name" tabindex="1" placeholder="Enter your lastname" value="{{ $v_employee->LastName }}">
                        @error('l_name')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                        
                    </div>                                    
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="f_name" class="control-label text-success">Firstname</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" tabindex="2" placeholder="Enter your firstname" value="{{ $v_employee->FirstName }}">
                        @error('f_name')
                            <div class="text text-danger">{{ $message }}</div>    
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="b_date" class="control-label text-success">Birth Date</label>
                        <input type="date" class="form-control" id="b_date" name="b_date" tabindex="3" placeholder="Enter your birth date" value="{{ $v_employee->BirthDate }}">
                        @error('b_date')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="pin" class="control-label text-success">Personal ID Number</label>
                        <input type="text" class="form-control" id="pin"  name="pin" tabindex="4" placeholder="Enter your personal id number" value="{{ $v_employee->PersonalID_No }}">
                        @error('pin')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="city" class="control-label text-success">City</label>
                        <input type="text" class="form-control" id="city" name="city" tabindex="5" placeholder="Enter your city" value="{{ $v_employee->City }}">
                        @error('city')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="cnt" class="control-label text-success">Country</label>
                        <input type="text" class="form-control" id="cnt" name="cnt" tabindex="6" placeholder="Enter your country" value="{{ $v_employee->Country }}">
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
                        <label for="addr" class="control-label text-success">Address</label>
                        <input type="text" class="form-control" id="addr" name="addr" tabindex="7" placeholder="Enter your address" value="{{ $v_employee->Address }}">
                        @error('addr')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="ph_num" class="control-label text-success">Phone Number</label>
                        <input type="text" class="form-control" id="ph_num" name="ph_num" tabindex="8" placeholder="Enter your phone number" value="{{ $v_employee->PhoneNumber }}">
                        @error('ph_num')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="email" class="control-label text-success">Email</label>
                        <input type="email" class="form-control" id="email" name="email" tabindex="9" placeholder="Enter your email" value="{{ $v_employee->Email }}">
                        @error('email')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="u_name" class="control-label text-success">Username</label>
                        <input type="text" class="form-control" id="u_name" name="u_name" tabindex="10" placeholder="Enter your username" value="{{ $v_employee->UserName }}">
                        @error('u_name')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="pssw" class="control-label text-success">Password</label>
                        <input type="password" class="form-control" id="pssw" name="pssw" tabindex="11" placeholder="Enter your password" value="{{ $v_employee->Password }}">
                        @error('pssw')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <label for="con_pssw" class="control-label text-success">Confirm Password</label>
                        <input type="password" class="form-control" id="con_pssw" name="con_pssw" tabindex="12" placeholder="Confirm your password" value="{{ $v_employee->Password }}">
                        @error('con_pssw')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>                     
                    </div>                          
                </div>
            </div>
            <div class="row text-center">        
                <input style="margin:0 70px 0 0;" type="submit" class="btn btn-lg btn-success" tabindex="13" value="Submit">  
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
    populateFormAfterSubmit('frm_bankemployeee_create');
</script>

@endsection