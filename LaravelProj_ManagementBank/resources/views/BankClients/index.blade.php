@extends('layouts.layout')

@section('title','LIST OF BANKCLIENTS')

@section('content')

<div style="width:85%;margin:auto;">
    <div>
        <h2 style="margin:100px 0 0 0;text-align:center;font-family:Helvetica;font-size:26px;font-weight:bold;color:#148E96;">LIST OF BANKCLIENTS</h2>
        <hr style="width:100%;height:1px;border:none;background-color:#148E96;">
        <a class="btn btn-md btn-success" href="{{ route('bankclients.create') }}">Create</a>            
    </div>
    <br>
    <table id="bankclients_table" class="table table-bordered text-white bg-primary">        
        <thead>
            <tr>
                <th style="display:none;">ID</th>
                <th>LASTNAME</th>
                <th>FIRSTNAME</th>
                <th>ACCOUNT NUMBER</th>
                <th>BALANCE</th>                                                                                                                                                                                 
                <th>COUNTRY</th>                
                <th>PHONE NUMBER</th>                                                
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>                                                                
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)           
                <tr>
                    <td style="display:none;">{{ $client->ID }}</td>
                    <td>{{ $client->LastName }}</td>
                    <td>{{ $client->FirstName }}</td>
                    <td>{{ $client->Account_No }}</td>
                    <td>{{ $client->Balance }}</td>                                                                                
                    <td>{{ $client->Country }}</td>                    
                    <td>{{ $client->PhoneNumber }}</td>
                    <td><a class="btn btn-md btn-success" href="{{ route('transactions.create/{id}',['id' => $client->ID]) }}">Create Transaction</a></td>                                        
                    <td><a class="btn btn-md btn-success" href="{{ route('issuedcards.create/{id}',['id' => $client->ID]) }}">Add Bankcard</a></td>
                    <td>@if($client -> issuedcards_ID != null)<a class="btn btn-md btn-danger" href="{{ route('issuedcards.delete/{id}',['id' => $client->issuedcards_ID]) }}">Delete Bankcard</a>@else<span class="text-danger">For this client does not exist issued card!</span>@endif</td>                                        
                    <td><a class="btn btn-md btn-warning" href="{{ route('bankclients.edit/{id}',['id' => $client->ID]) }}">Edit</a></td>
                    <td><a class="btn btn-md btn-danger" href="{{ route('bankclients.delete/{id}',['id' => $client->ID]) }}">Delete</a></td>                   
                </tr>               
            @endforeach           
        </tbody>
    </table>
    <br>
    <hr style="width:100%;height:1px;border:none;background-color:#148E96;">
</div>

@endsection

@section('cssStyles')

@endsection

@section('scripts')

<script type="text/javascript">
    $('#bankclients_table').DataTable({        
        "aaSorting": []
    });   
</script>

@endsection