@extends('dashboard')
@section('content')
<div class="container mt-2">
<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="pull-left">
         <h2>Event Create</h2>
      </div>
      <div class="pull-right mb-2">
         <a class="btn btn-success" href="{{ route('events.create') }}"> Create New event</a>
      </div>
   </div>
</div>
@if($message = Session::get('success'))
<div class="alert alert-success">
   <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
   <tr>
      <th>S.No</th>
      <th>Image</th>
      <th>Title</th>
      <th>Description</th>
      <th width="280px">Action</th>
   </tr>
   @foreach ($events as $event)
   <tr>
      <td>{{ $event->id }}</td>
      <td><img src="{{ Storage::url($event->image) }}" height="75" width="75" alt="" /></td>
      <td>{{ $event->title }}</td>
      <td>{{ $event->description }}</td>
      <td>
         <form action="{{ route('events.destroy',$event->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
         </form>
      </td>
   </tr>
   @endforeach
</table>
{!! $events->links() !!}
@endsection