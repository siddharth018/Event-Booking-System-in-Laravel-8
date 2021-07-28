<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Event Book</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <style>
         body {
         font: 400 15px Lato, sans-serif;
         line-height: 1.8;
         color: #818181;
         }
         h2 {
         font-size: 24px;
         text-transform: uppercase;
         color: #303030;
         font-weight: 600;
         margin-bottom: 30px;
         }
         h4 {
         font-size: 19px;
         line-height: 1.375em;
         color: #303030;
         font-weight: 400;
         margin-bottom: 30px;
         }  
         .jumbotron {
         background-color: #f4511e;
         color: #fff;
         padding: 100px 25px;
         font-family: Montserrat, sans-serif;
         }
         .container-fluid {
         padding: 60px 50px;
         }
         .bg-grey {
         background-color: #f6f6f6;
         }
         .logo-small {
         color: #f4511e;
         font-size: 50px;
         }
         .logo {
         color: #f4511e;
         font-size: 200px;
         }
         .thumbnail {
         padding: 0 0 15px 0;
         border: none;
         border-radius: 0;
         }
         .thumbnail img {
         width: 100%;
         height: 100%;
         margin-bottom: 10px;
         }
         .carousel-control.right, .carousel-control.left {
         background-image: none;
         color: #f4511e;
         }
         .carousel-indicators li {
         border-color: #f4511e;
         }
         .carousel-indicators li.active {
         background-color: #f4511e;
         }
         .item h4 {
         font-size: 19px;
         line-height: 1.375em;
         font-weight: 400;
         font-style: italic;
         margin: 70px 0;
         }
         .item span {
         font-style: normal;
         }
         .panel {
         border: 1px solid #f4511e; 
         border-radius:0 !important;
         }
         .panel:hover {
         box-shadow: 5px 0px 40px rgba(0,0,0, .2);
         }
         .panel-footer .btn:hover {
         border: 1px solid #f4511e;
         background-color: #fff !important;
         color: #f4511e;
         }
         .panel-heading {
         color: #fff !important;
         background-color: #f4511e !important;
         padding: 25px;
         border-bottom: 1px solid transparent;
         border-top-left-radius: 0px;
         border-top-right-radius: 0px;
         border-bottom-left-radius: 0px;
         border-bottom-right-radius: 0px;
         }
         .panel-footer {
         background-color: white !important;
         }
         .panel-footer h3 {
         font-size: 32px;
         }
         .panel-footer h4 {
         color: #aaa;
         font-size: 14px;
         }
         .panel-footer .btn {
         margin: 15px 0;
         background-color: #f4511e;
         color: #fff;
         }
         .navbar {
         margin-bottom: 0;
         background-color: #f4511e;
         z-index: 9999;
         border: 0;
         font-size: 12px !important;
         line-height: 1.42857143 !important;
         letter-spacing: 4px;
         border-radius: 0;
         font-family: Montserrat, sans-serif;
         }
         .navbar li a, .navbar .navbar-brand {
         color: #fff !important;
         }
         .navbar-nav li a:hover, .navbar-nav li.active a {
         color: #f4511e !important;
         background-color: #fff !important;
         }
         .navbar-default .navbar-toggle {
         border-color: transparent;
         color: #fff !important;
         }
         footer .glyphicon {
         font-size: 20px;
         margin-bottom: 20px;
         color: #f4511e;
         }
         .slideanim {visibility:hidden;}
         .slide {
         animation-name: slide;
         -webkit-animation-name: slide;
         animation-duration: 1s;
         -webkit-animation-duration: 1s;
         visibility: visible;
         }
         @keyframes slide {
         0% {
         opacity: 0;
         transform: translateY(70%);
         } 
         100% {
         opacity: 1;
         transform: translateY(0%);
         }
         }
         @-webkit-keyframes slide {
         0% {
         opacity: 0;
         -webkit-transform: translateY(70%);
         } 
         100% {
         opacity: 1;
         -webkit-transform: translateY(0%);
         }
         }
         @media screen and (max-width: 768px) {
         .col-sm-4 {
         text-align: center;
         margin: 25px 0;
         }
         .btn-lg {
         width: 100%;
         margin-bottom: 35px;
         }
         }
         @media screen and (max-width: 480px) {
         .logo {
         font-size: 150px;
         }
         }
         .modal-content {
            margin-top: 78px;
         }
         .button  {
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
         }
         .event_book {
            background-color: #008CBA;
         }
         .title {
            margin: 10px;
         }
      </style>
   </head>
   <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
      <nav class="navbar navbar-default navbar-fixed-top">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>                        
               </button>
               <a class="navbar-brand" href="#myPage">EVENT</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav navbar-right">
                  @if (Route::has('login'))
                  @auth
                  <li><a href="{{ url('/events') }}">Dashboard</a></li>
                  <li><a class="nav-link" href="{{ route('signout') }}">Logout</a></li>
                  @else
                  <li><a href="{{ route('login') }}">Log in</a></li>
                  @if (Route::has('register'))
                  <li><a href="{{ route('register') }}">Register</a></li>
                  @endif
                  @endauth
                  @endif
               </ul>
            </div>
         </div>
      </nav>
      <div id="event" class="container-fluid text-center bg-grey">
         <h2>Event</h2>
         <br>
         @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif

                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
                
         <div class="row text-center">
            @foreach ($events as $event)  
            <div class="col-sm-4">
               <div class="thumbnail">
                  <img src="{{ Storage::url($event->image) }}" alt="{{ $event->place }}" style="height:300px">
                  <h4 class="title">{{ $event->title }}</h4>
                  <p>{{ str_limit($event->description, 70) }}</p>
                  <p>Date: <?php echo date('d/m/Y', strtotime($event->date)); ?></p>
                  <p>{{ ucfirst($event->event_type) }} </p>
                  <h5><strong>City: </strong>{{ $event->place }}</h5>
                  <button type="button" class="btn btn-primary event_book button" data-toggle="modal" data-title="{{ $event->title }}" data-event-type="{{ $event->event_type }}" data-target="#exampleModal">Book</button>
               </div>
            </div>
            @endforeach
         </div>
         <br>
         {!! $events->links() !!}
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h3 class="modal-title" id="exampleModalLabel">Event Book</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form action="{{ url('event-attendies') }}" method="post">
                     @csrf
                     <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" name="name">
                        <input type="hidden" name="title" class="form-control title" value=''>
                        <input type="hidden" name="event_type" class="form-control event_type" value=''>
                     </div>
                     <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="text" name="email" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Phone:</label>
                        <input type="text" name="phone" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control" name="description" id="message-text"></textarea>
                     </div>
                     <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
                  </form>
               </div>
               
            </div>
         </div>
      </div>
      <script>
         $('.event_book').on('click', function (event) {
            var title     = $(this).attr('data-title');
            var event_type     = $(this).attr('data-event-type');
            $('.title').val(title);
            $('.event_type').val(event_type);
         });
      </script>
   </body>
</html>