@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">

                <div width="110%" class="card-header bg-light text-secondary">List</div>


                <div class="card-body">

                
                       
                        <h4>Employee Details</h4>
                        <table class="table table-bordered my-2" >
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    
                            
                                </tr>
                            </thead>
                            <tbody id="employee_table">
                            
                                @php $i=1; @endphp
                                @if(!empty($employee_data))
                                @foreach($employee_data as $key=>$value)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$value['emp_name']}}</td>
                                    <td>{{$value['emp_age']}}</td>
                                    <td>{{$value['emp_email_id']}}</td>
                                    <td>{{$value['emp_mobile']}}</td>
                                    <td>{{$value['status'] == 1 ? 'Active' : 'Blocked'}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                            
                        </table>
                        <br>
                        <h4>Employee Official Details</h4>
                        <table class="table table-bordered my-3" >
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Salary</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="employee_table">
                                @php $j=1; @endphp
                               
                                @if(!empty($employee_data[0]['employee_official_details']))
                                @foreach(@$employee_data as $values)
                                <tr> 
                                    <td>{{$j}}</td>
                                    <td>{{$values['employee_official_details']['emp_salary']}}</td>
                                    <td>{{$values['employee_official_details']['emp_department']}}</td>
                                    <td>{{$values['employee_official_details']['emp_designation']}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        
                  
                </div>
            </div>
            <br>
           
@endsection
