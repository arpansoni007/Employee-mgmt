@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">

                <div width="110%" class="card-header bg-light text-secondary">List</div>


                <div class="card-body">
                <h4>User List</h4>
                    <div id="user" class="card">



                        <table class="table" >
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody id="user_table2">

                                @if(!empty($user_data))
                                @foreach($user_data as $key=>$value)
                                <tr>
                                    <td>{{$value['id']}}</td>
                                    <td>{{$value['name']}}</td>
                                    <td>{{$value['email']}}</td>
                                    <td>{{$value['mobile']}}</td>
                                    <td>{{$value['status'] == 1 ? 'Active' : 'Blocked'}}</td>
                                    <th>
                                    @php $status = $value['status'] == 1 ? 'btn-danger' : 'btn-success'; @endphp
                                    <button type="button" class="btn {{$status}}" id="block-user-btn" data-id="{{$value['id']}}"  data-toggle="modal" data-target="#example2Modal">
                                    {{$value['status'] == 1 ? 'Block' : 'Unblock'}}
                                    </button>
                                    <a href="/user-details/{{$value['id']}}"><button type="button" class="btn btn-info" id="user-details" data-id="{{$value['id']}}">
                                       Details
                                    </button></a>
                                    </th>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="ml-4">{{$user_data->links()}}</div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Modal -->
            <div class="modal fade" id="example2Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example2ModalLabel">Block/Unblock User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel-modal">No</button>
                            <button type="button" class="btn btn-danger" id="block-user">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        var type = 'user';
        var statusText;
        var id;
        $(document).on('click', '#block-user-btn', function(e) {
           
            e.preventDefault();
            id=$(this).attr('data-id');
           
        });
            $('#block-user').click(function() {
             
            $.ajax({
                'url': '/block/' + type + '/' + id,
                'type': 'GET',
                success: function(response) {
                    
                    $('#cancel-modal').click();
                    location.reload();
                },
                error: function(response) {
                    $('#cancel-modal').click();
                }



            });
        });
    });
</script>





@endsection