@extends('layouts.app')
 
@section('content')
 
<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h3>{{Session::get('msg')}}</h3>
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">Insert</button>
    <table class="table table-dark" id="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="success">
        </tbody>
    </table>

    {{--  modal  --}}
    <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('storeContact') }}" method="post" id="form-submit">
          <input type="hidden" name="_token" id="csrftoken" value="{{ csrf_token() }}">
          <input type="text" name="name" id="name" class="form-control" placeholder="Name">
          <input type="text" name="email" id="email" class="form-control" placeholder="email">
          <input type="number" name="phone" id="phone" class="form-control" placeholder="phone Number">

          <button type="submit" class="btn btn-dark" id="addbutton">Add Item</button>
          <button type="reset" id="reset" style="display:none">Reset</button>
        </form>
      </div>
      <div class="modal-footer">
        {{-- <button type="submit" class="btn btn-dark" id="addbutton">Save</button> --}}
      </div>
    </div>
  </div>
</div>

<!--Edit Modal -->
<input type="hidden" name="_token" id="csrftoken2" value="{{ csrf_token() }}">
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('update') }}" method="post" id="edit-form">
          

          
          
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


    </div>
</div>

<script>
</script>


 
@endsection
