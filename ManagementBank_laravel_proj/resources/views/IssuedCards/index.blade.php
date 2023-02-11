@extends('layouts.layout')

@section('title','LIST OF BANKCARDS')

@section('content')

<div style="width:85%;margin:auto;">
    <div>
        <h2 style="margin:100px 0 0 0;text-align:center;font-family:Helvetica;font-size:26px;font-weight:bold;color:#148E96;">LIST OF BANKCARDS</h2>
        <hr style="width:100%;height:1px;border:none;background-color:#148E96;">                   
    </div>
    <br>
    <table id="bankcards_table" class="table table-bordered text-white bg-primary">        
        <thead>
            <tr>
                <th style="display:none;">ID</th>
                <th scope="col">LASTNAME</th>
                <th scope="col">FIRSTNAME</th>
                <th scope="col">CARD TYPE</th>                
                <th scope="col">CARD NUMBER</th>                
                <th scope="col">YEAR OF EXPIRATION</th>
                <th scope="col">DATE OF MODIFICATION</th>                                                                                       
                <th scope="col">PHONE NUMBER</th>                                                                                                             
            </tr>
        </thead>
        <tbody>
            @foreach($cards as $card)           
                <tr>
                    <td style="display:none;">{{ $card->ID }}</td>
                    <td>{{ $card->LastName }}</td>
                    <td>{{ $card->FirstName }}</td>
                    <td>{{ $card->CardType }}</td>                    
                    <td>{{ $card->Card_No }}</td>                    
                    <td>{{ $card->ExpYear }}</td>                   
                    <td>{{ $card->ModifiedDate }}</td>                                        
                    <td>{{ $card->PhoneNumber }}</td>                                                                                                    
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
    $('#bankcards_table').DataTable({        
        "aaSorting": []
    });   
</script>

@endsection