@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">

                <div class="card-header bg-light text-secondary">Search</div>


                <div class="card-body">
                    @php $role = \Auth::user()->role_id; @endphp
                    @if(\Auth::user()->role_id == 1)
                    <input type="radio" id="user_type" name="type" value="0">
                    <label for="male">User</label>&nbsp;&nbsp;
                    <input type="radio" id="employee_type" name="type" value="1" checked>
                    <input type="hidden" id="role_id" value="{{ $role}}">
                    <label for="male">Employee</label><br>
                    @endif
                    <input type="text" class="form-control mb-4" name="search_field" id="search_field" placeholder="Type to Search">
                    <button class="btn btn-success btn-sm" id="search-submit">Submit</button>
                </div>
            </div>
            <br>
            <!------------------------------------------ user table --------------------------------------------------->
            <div id="user-table" style="display: none;" class="card">

                <div class="card-header bg-light text-secondary">User Result</div>


                <div class="card-body">

                <table class="table table-striped table-bordered  table-sm" cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr>

                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>

                            </tr>
                        </thead>
                        <tbody class="user_table">

                        </tbody>
                    </table>
                </div>
            </div>
            <!------------------------------------------ employee table --------------------------------------------------->
            <div id="employee-table" style="display: none;" class="card  ">

                <div class="card-header bg-light text-secondary">Employee Result</div>


                <div class="card-body">

                    <table class="table table-striped table-bordered  table-sm" cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr>

                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Age</th>
                                <th>Salary</th>
                                <th>Designation</th>
                                <th>Department</th>

                            </tr>
                        </thead>
                        <tbody id="emp_table">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {

        $(document).on('click', '#search-submit', function(e) {
            var type = '';
            if($('#search_field').val() == '')
            {
                alert('Please Enter Text to Search');
                return false;
            }
            e.preventDefault();
            type = $('input[name=type]:checked').val();
            
            var query = $('#search_field').val();
            //  console.log(type, query);
            $.ajax({
                'url': '/search-filter/' + query + '/' + type,
                'type': 'GET',
                success: function(response) {
                    console.log(response);
                    html ='';
                    
                   
                    $('#search_field').val('');
                    $('.user_table').html(''); 
                    // $('#emp_table').html(html);
                    if (Object.keys(response) != 'employee') {
                        $('#employee-table').css({'display':'none'});

                        if(response.user.length == 0)
                        {  
                            $('#user-table').css({'display':'none'});
                        }
                        else
                        {
                            $('#user-table').css({'display':'block'});
                        }

                       
                        $('.user_table').html('');
                        
                        $.each(response.user, function(i, item) {
                           
                            html +=
                                '<tr>' +
                                '<td>' + item.name + '</td>' +
                                '<td>' + item.email + '</td>' +
                                '<td>' + item.mobile + '</td>' +
                                '</td></tr>';
                                
                                $('.user_table').html(html);

                        });
                       
                    } 
                    
                    else {
                        $('#user-table').css({'display':'none'});

                        if(response.employee.length == 0)
                        {  
                            $('#employee-table').css({'display':'none'});
                        }
                        else
                        {
                            $('#employee-table').css({'display':'block'});
                        }

                       
                       
                        $('#emp_table').html('');
                       
                        $.each(response.employee, function(i, item) {
                             console.log(i,item);

                            html +=
                                '<tr>' +
                                '<td>' + item.emp_name + '</td>' +
                                '<td>' + item.emp_email_id + '</td>' +
                                '<td>' + item.emp_mobile + '</td>' +
                                '<td>' + item.emp_age + '</td>' +
                                '<td>' + item.employee_official_details.emp_salary + '</td>' +
                                '<td>' + item.employee_official_details.emp_designation + '</td>' +
                                '<td>' + item.employee_official_details.emp_department + '</td>' +
                                '</td></tr>';

                             $('#emp_table').html(html);
                        });
                       
                    }
  
                },
                error: function(response) {
                    $('#search_field').val('');
                    alert('Error' + response);
                }



            });
        });

    });
</script>





@endsection