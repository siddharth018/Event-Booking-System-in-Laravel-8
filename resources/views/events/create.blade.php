@extends('dashboard')
@section('content')
<div class="container mt-2">
<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="pull-left mb-2">
         <h2>Add Event</h2>
      </div>
      <div class="pull-right">
         <a class="btn btn-primary" href="{{ route('events.index') }}"> Back</a>
      </div>
   </div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
   {{ session('status') }}
</div>
@endif
<form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Event Title:</strong>
            <input type="text" name="title" class="form-control" placeholder="Event Title">
            @error('title')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Event Description:</strong>
            <textarea class="form-control" style="height:150px" name="description" placeholder="Event Description"></textarea>
            @error('description')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Event Date:</strong>
            <input class="date form-control" type="text" name="date" placeholder="Event Date">
            @error('date')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Event Place:</strong>
            <input type="text" name="place" class="form-control" placeholder="Event Place">
            @error('place')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Event Type:</strong>
            <select class="form-control" name="event_type">
               <option value="free">Free</option>
               <option value="paid">Paid</option>
            </select>
            @error('event_type')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Event Status:</strong>
            <select class="form-control" name="status">
               <option value="1">Active</option>
               <option value="0">Inactive</option>
            </select>
            @error('event_type')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Event Image:</strong>
            <input type="file" name="image" class="form-control" placeholder="Event Title">
            @error('image')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
         </div>
      </div>
      <button type="submit" class="btn btn-primary ml-3">Submit</button>
   </div>
</form>
@endsection