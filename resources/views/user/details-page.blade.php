@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">

                <div width="110%" class="card-header bg-light text-secondary">List</div>


                <div class="card-body">
                <h4>User Details</h4>
                    <div id="user" class="card">

            
                    
                        <table class="table" >
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Login Time</th>

                                </tr>
                            </thead>
                            <tbody id="user_table1">

                                @if(!empty($user_data))
                                @foreach($user_data as $key=>$value)
                                <tr>
                                    <td>{{$value['id']}}</td>
                                    <td>{{$value['name']}}</td>
                                    <td>{{$value['email']}}</td>
                                    <td>{{$value['mobile']}}</td>
                                    <td>{{$value['status'] == 1 ? 'Active' : 'Blocked'}}</td>
                                    <td>{{$value['login_date_time'] != null ? date('d F Y, h:i:s A',strtotime($value['login_date_time'])) : null}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
            
@endsection