@extends('layouts.layout')

@section('title','LIST OF TRANSACTIONS')

@section('content')

<div style="width:85%;margin:auto;">
    <div>
        <h2 style="margin:100px 0 0 0;text-align:center;font-family:Helvetica;font-size:26px;font-weight:bold;color:#148E96;">LIST OF TRANSACTIONS</h2>
        <hr style="width:100%;height:1px;border:none;background-color:#148E96;">        
    </div>
    <br>
    <table id="transactions_table" class="table table-bordered text-white bg-primary">        
        <thead>
            <tr>
                <th style="display:none;">ID</th>                                               
                <th>TRANSACTION AMOUNT</th>
                <th>RECIPIENT</th>
                <th>TRANSACTION DATE</th>
                <th>BALANCE</th>
                <th>ACCOUNT NUMBER</th>                                                                                                                                                                                                                                                            
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)           
                <tr>
                    <td style="display:none;">{{ $transaction->ID }}</td>                                        
                    <td>{{ $transaction->TransactionAmount }}</td>
                    <td>{{ $transaction->Is_Recipient == 1 ? 'Yes' : 'No' }}</td>
                    <td>{{ $transaction->TransactionDate }}</td>
                    <td>{{ $transaction->Balance }}</td>
                    <td>{{ $transaction->Account_No }}</td>                                                                                                                                                                                                                                                                                
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
    $('#transactions_table').DataTable({         
        "aaSorting": []
    });
</script>

@endsection