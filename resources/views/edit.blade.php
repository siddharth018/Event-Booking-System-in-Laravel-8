<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Edit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
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
                    <strong>event Title:</strong>
                    <input type="text" name="title" value="{{ $event->title }}" class="form-control" placeholder="event Title">
                    @error('title')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>event Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="event Description">{{ $event->description }}</textarea>
                    @error('description')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>event Image:</strong>
                 <input type="file" name="image" class="form-control" placeholder="event Title">
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

</body>
</html>