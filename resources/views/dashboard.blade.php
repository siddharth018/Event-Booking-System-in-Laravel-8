<!DOCTYPE html>
<html>
   <head>
      <title>Admin Event Mangement</title>
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <!-- Our Custom CSS -->
      <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
   </head>
   <body>
      <div class="wrapper">
         <!-- Sidebar  -->
         <!-- Page Content  -->
         <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="container-fluid">
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="nav navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                           <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <!-- <li class="nav-item">
                           <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                        </li> -->
                        @else
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ route('events.index') }}">Event</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                        </li>
                        @endguest
                     </ul>
                  </div>
               </div>
            </nav>
         </div>
      </div>
      @yield('content')
      <!-- jQuery CDN - Slim version (=without AJAX) -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <!-- Popper.JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
      <!-- Bootstrap JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
      <script type="text/javascript">
         $('.date').datepicker({  
         format: 'yyyy-mm-dd'
         });  
      </script> 
   </body>
</html>