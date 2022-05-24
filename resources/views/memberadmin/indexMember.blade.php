@extends('memberadmin.dashboard')
@section('content')
<main class="container">
<div class="card">
  <div class="card-header">
   <div class="row">
        <div class="col-md-6">
             <p>Total Members: {{$members->count()}} </p>
        </div>
        <div class="col-md-6">
              <a href="{{action('MemberController@create')}}" class="btn btn-success float-right">Add Member</a>
        </div>
    </div>
  </div>
  <div class="card-body">
    
    <div class="row" id="notifDiv">    </div>
<div class="row">
 <table class="table table-striped table-hover table-responsive" id="myTable">
    <thead>
        <tr>
        <th>No.#</th>
        <th>Full Name</th>
        <th>Mother Name</th>
        <th>Baptismal Name</th>
        <th>Rep-F-Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$member->fullName}}</td>
        <td>{{$member->motherName}}</td>
        <td>{{$member->baptismalName}}</td>
        <td>{{$member->repetanceFatherName}}</td>
        <td>{{$member->phone}}</td>
        <td>{{$member->address}}</td>
        <td>
            <input type="checkbox" class="toggle-class" data-id="{{ $member->id }}" data-toggle="toggle" data-style="slow" data-on="Active" data-off="InActive" {{ $member->status == true ? 'checked' : ''}}></td>
        </td>
        <td>
            <div class="d-flex">
                <a href="{{action('MemberController@edit', ['manage_member'=>$member->id])}}" title="edit" class=" text-success"><i class="fa fa-edit"></i></a>
            
            </div>
            
        </td>
        </tr>
        @endforeach 
    </tbody>
</table>
</div>
</div>
</div>

</main>
@endsection
@push('scripts')

<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Active',
      off: 'InActive'
    });
  })
</script>

<script>
    $('.toggle-class').on('change', function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var user_id = $(this).data('id');
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: '{{ route('changeStatus') }}',
            data: {
                'status': status,
                'user_id': user_id
            },
            success:function(data) {
                $('#notifDiv').fadeIn();
                $('#notifDiv').css('color', 'green');
                $('#notifDiv').text('Status Updated Successfully');
                setTimeout(() => {
                    $('#notifDiv').fadeOut();
                }, 3000);
            }
        });
    });
</script>


@endpush