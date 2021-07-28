@extends('dashboard')
@section('content')
<div class="container mt-2">
   <div class="row">
      <div class="col-lg-12 margin-tb">
         <div class="pull-left">
            <h2>Edit event</h2>
         </div>
         <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('events.index') }}" enctype="multipart/form-data"> Back</a>
         </div>
      </div>
   </div>
   @if(session('status'))
   <div class="alert alert-success mb-1 mt-1">
      {{ session('status') }}
   </div>
   @endif
   <form action="{{ route('events.update',$event->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Event Title:</strong>
               <input type="text" name="title" value="{{ $event->title }}" class="form-control" placeholder="Event Title">
               @error('title')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Event Description:</strong>
               <textarea class="form-control" style="height:150px" name="description" placeholder="Event Description">{{ $event->description }}</textarea>
               @error('description')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Event Date:</strong>
               <input class="date form-control" value="{{ $event->date }}" type="text" name="date" placeholder="Event Date">
               @error('date')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Event Place:</strong>
               <input type="text" name="place" class="form-control" placeholder="Event Place" value="{{ $event->place }}">
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
               <strong>Event Type:</strong>
               <select class="form-control" name="event_type">
               <option {{ $event->event_type == 'paid' ?'selected':'' }} value="paid"> Paid </option>
               <option {{ $event->event_type == 'free' ?'selected':'' }} value="free"> Free </option>
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
               <option {{ $event->status == '1' ?'selected':'' }} value="1"> Active </option>
               <option {{ $event->status == '0' ?'selected':'' }} value="0"> Inactive </option>
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
            <div class="form-group">
               <img src="{{ Storage::url($event->image) }}" height="200" width="200" alt="" />
            </div>
         </div>
         <button type="submit" class="btn btn-primary ml-3">Submit</button>
      </div>
   </form>
</div>
@endsection