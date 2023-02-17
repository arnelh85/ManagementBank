@extends('layouts.layout')

@section('title','LIST OF BANKEMPLOYEES')

@section('content')

<div style="width:85%;margin:auto;">
    <div>
        <h2 style="margin:100px 0 0 0;text-align:center;font-family:Helvetica;font-size:26px;font-weight:bold;color:#148E96;">LIST OF BANKEMPLOYEES</h2>
        <hr style="width:100%;height:1px;border:none;background-color:#148E96;">
        <a class="btn btn-md btn-success" href="{{ route('bankemployees.create') }}">Create</a>            
    </div>
    <br>
    <table id="bankemployees_table" class="table table-bordered text-white bg-primary">        
        <thead>
            <tr>
                <th style="display:none;">ID</th>
                <th>LASTNAME</th>
                <th>FIRSTNAME</th>                                                                        
                <th>CITY</th>
                <th>COUNTRY</th>
                <th>ADDRESS</th>
                <th>PHONE NUMBER</th>                
                <th>DESCRIPTION</th>
                <th>#</th>
                <th>#</th>                
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)           
            <tr>
                <td style="display:none;">{{ $employee->ID }}</td>
                <td>{{ $employee->LastName }}</td>
                <td>{{ $employee->FirstName }}</td>                                                                         
                <td>{{ $employee->City }}</td>
                <td>{{ $employee->Country }}</td>
                <td>{{ $employee->Address }}</td>
                <td>{{ $employee->PhoneNumber }}</td>                    
                <td>{{ $employee->Description }}</td>
                <td><a class="btn btn-md btn-warning" href="{{ route('bankemployees.edit/{id}',['id' => $employee->ID]) }}">Edit</a></td>
                <td><a class="btn btn-md btn-danger" href="{{ route('bankemployees.delete/{id}',['id' => $employee->ID]) }}">Delete</a></td>
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
    $('#bankemployees_table').DataTable({         
        "aaSorting": []
    });
</script>

@endsection