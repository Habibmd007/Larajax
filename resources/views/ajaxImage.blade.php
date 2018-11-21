@extends('layouts.app')
 
@section('content')

<div class="container">
  <h1>Laravel 5 - Ajax Image Uploading Tutorial</h1>

  <form action="" id="upform"  method="POST" enctype="multipart/form-data">
  	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
    <input type="hidden" name="_token" id="csrftokenimg" value="{{ csrf_token() }}">
    
    <div class="form-group">
      <label>Alt Title:</label>
      <input type="text" name="title" id="title" class="form-control" placeholder="Add Title">
    </div>

	<div class="form-group">
      <label>Image:</label>
      <input type="file" name="image" id="image" accept="image/*" class="form-control">
    </div>

  <div class="form-group">
      <button class="btn btn-success" type="submit" id="submitform">Upload Image</button>
  </div>
  </form>
</div>





@endsection


