@extends('layouts.layout')

@section('title','LOGIN BANKEMPLOYEES')

@section('content')

<div class="form-responsive">
    <form method="POST" action="{{ route('authentication.loginConfirm') }}">
    @csrf 
        <div>
            <h2 style="margin:275px 0 0 0;text-align:center;font-family:Helvetica;font-size:26px;font-weight:bold;color:#5AA9ED;">LOGIN BANKEMPLOYEES</h2>
            <hr style="width:50%;height:1px;border:none;background-color:#5AA9ED;">
        </div>
        <div style="width:25%;margin:auto;">
            <div class="form-outline mb-4">                                                             
                <label for="u_name" class="control-label text-primary">Username</label>
                <input type="text" class="form-control" id="u_name" name="u_name" tabindex="1" placeholder="Enter your username" value="{{ $v_logEmployee->UserName }}">
                @error('u_name')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
                <br>                               
            </div>                
            <div class="form-outline mb-4">            
                <label for="pssw" class="control-label text-primary">Password</label>
                <input type="password" class="form-control" id="pssw" name="pssw" tabindex="2" placeholder="Enter your password" value="{{ $v_logEmployee->Password }}">
                @error('pssw')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
                <br>                                
            </div>
        </div>       
        <input type="hidden" id="match_user" name="match_user" value="">
        @error('match_user')
            <div class="text text-danger">{{ $message }}</div>
        @enderror
        <br>                                         
        <div class="row text-center">        
            <input type="submit" class="btn btn-lg btn-primary" tabindex="3" value="Submit">  
        </div>            
        <hr style="width:50%;height:1px;border:none;background-color:#5AA9ED;">                
    </form>
</div>

@endsection

@section('cssStyles')

@endsection

@section('scripts')

@endsection