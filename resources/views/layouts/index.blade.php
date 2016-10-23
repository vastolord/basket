<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            {{config('app.name')}}
        </title>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet" >

            <!-- Scripts -->
        <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="/js/bootstrap.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        {{-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
         <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    {{-- [if lt IE 9]> --}}
      <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.js"></script>
    {{-- <![endif] --}}
  

  <style>
                                /* Remove the navbar's default rounded borders and increase the bottom margin */
   
   
  .center {
    margin: 0 auto;
    width: 80%;
  }
  .container
  {
 
  padding: 15px;
  }

  
  .navbar {
      box-shadow: 0px 1px 2px #888888;
      margin-bottom: 50px;
      border-radius: 0;
    }
  
    /* Remove the jumbotron's default bottom margin */
     .jumbotron {
      height: 30vw;
      min-width: 300px;
      padding: 0;
      margin-bottom: 0;
      max-height:200px;
    }
  
   .affix {
      top: 0;
      width: 100%;
    z-index: 9999 !important;
  }
    .affix ~ .container-fluid {
     position: relative;
     top: 102px;
  }
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
      height: 50px;
    }
   
.parent {
  position: relative;
}
.child {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
}

    </style>

    
    </head>
    

    <body>


    {{-- Jumbotron --}}
    <div class="jumbotron">

      {{-- Carousel --}}
      <div class="carousel slide carousel-fade" id="featured" data-ride="carousel">
        
        {{-- Carousel Images URL --}}
         <ol class="carousel-indicators">
            <li data-target="#featured" data-slide-to="0"></li>
            <li data-target="#featured" data-slide-to="1" class="active"></li>
            <li data-target="#featured" data-slide-to="2"></li>
        </ol>           

        {{-- Carousel Caption --}}
        <div class="carousel-caption text-centered">
          <h1>One-Stop Shop</h1>
        </div>


        <div class="carousel-inner">
                <div class="item">
                    <img alt="Sparrow n Butterfly"  class="img-responsive" src="a.jpg">   
                </div>
                <div class="item active">
                    <img alt="Cherry Blossom" class="img-responsive" src="b.jpg" >
                </div>
                <div class="item">
                    <img alt="City Lights" class="img-responsive" src="c.jpg" >
                </div>
        </div>
        {{-- Carousel Inner Ends --}}

            {{-- Carousel Control Starts--}}
            <a class="left carousel-control" href="#featured" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>

            <a class="right carousel-control" href="#featured" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a> 
            {{-- Carousel Control Ends--}}

        </div>  
        {{-- Div Carousel Ends--}}

    </div>
    {{-- Div Jumbotron Ends--}}


            {{-- NavBar --}}
            <nav class="navbar navbar-inverse" data-smart-affix="198px">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#myNavbar" data-toggle="collapse" type="button">
                            <span class="icon-bar">
                            </span>
                            <span class="icon-bar">
                            </span>
                            <span class="icon-bar">
                            </span>
                        </button>
                        <a class="navbar-brand" href="#">
                            OSS
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="/">
                                    Home
                                </a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-th-list">
                                    </span>
                                    Products
                                    <span class="caret">
                                    </span> </a>
                                
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">
                                            Category
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Brand
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Price
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#">
                                    Deals
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Stores
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    

                        <ul class="nav navbar-nav navbar-right">
                        {{-- cart-start --}}
                         <li><a href="{{route('shop.cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                    <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                    </a></li>
                        {{-- cart-end --}}



                             <!-- Authentication Links -->
                            @if (Auth::guest())
                            {{-- <li><a data-toggle="modal"  href="modal.html" class="ls-modal" data-target="#myModal">@lang('auth.login')</a></li> --}}
                            <li><a id="loginhref" name="login_link">@lang('auth.login')</a></li>
                            <li><a href="{{ url('/register') }}">@lang('auth.register')</a></li>
                            @else
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="fa fa-user" aria-hidden="true"></span>
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                
                                {{-- User Conditions --}}
                                @if(Auth::user()->first_name=='rkb')

                                    <li>
                                    <a href="{{ url('/#') }}">
                                        <span class="fa fa-sticky-note-o" aria-hidden="true"></span> Shortlist
                                    </a>
                                    </li>

                                    <li>
                                    <a href="{{ url('/#') }}">
                                        <span class="fa fa-history" aria-hidden="true"></span> History
                                    </a>
                                    </li>


                                    @elseif(Auth::user()->first_name=='atik')
                                    <li>
                                    <a href="{{ url('admin/post') }}">
                                        <span class="fa fa-tachometer" aria-hidden="true"></span> Dashboard
                                    </a>
                                    </li>

                                    @else
                                    <li>
                                    <a href="{{ url('/#') }}">
                                        <span class="fa fa-sticky-note-o" aria-hidden="true"></span> Dashboard
                                    </a>
                                    </li>


                                @endif                                    

                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <span class="glyphicon glyphicon-log-out"></span> Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;<span class="glyphicon glyphicon-log-out"></span>">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>-->
                            <!--<li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>-->
                        </ul>
                    </div>
                </div>
            </nav>


@yield('content')

{{-- modal --}}

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">@lang('auth.login')</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" method="POST" action="{{url('/login')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="fnl">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
        </div>

<script>
  $("#fnl").click(function(){
  $(this).data('clicked', true);
});

</script>
{{-- 
@if($errors->any())
<script>
    $('#myModal').modal('show');
    // or any other way you want to manually open your modal.
</script>
@endif --}}

{{-- @if (count($errors))
    <ul>
        @foreach($errors->all() as $error)
            // Remove the spaces between the brackets
            <li>{{ var_dump($error) }}</li>
        @endforeach
    </ul>
@endif
 --}}




        <div class="modal-footer">

        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        Don't have an account?  
        <a href="{{ url('/register') }}">@lang('auth.createone').</a>
        </div>

        <div class="col-md-3">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

        </div>
      </div>
      
    </div>
  </div>
  
</div>


{{-- Modal End --}}



     
<script src="js/script.js"></script>

<script>

var $attribute = $('[data-smart-affix]');
$attribute.each(function(){
  $(this).affix({
    offset: {
      top: $(this).offset().top,
    }
  })
})



$(window).on("resize", function(){
  $attribute.each(function(){
    $(this).data('bs.affix').options.offset = $(this).offset().top
  })
})



// // Login
// $('ls-modal').on('click', function (e) {
//     e.preventDefault();
//     $('#myModal').modal('show').find('.modal-body').load($(this).attr('href'));
// });


$(document).ready(function(){
    $("#loginhref").click(function(){
        $("#myModal").modal({show: true});
    });
});




</script>

                    
<div class=container-fluid><br><br><br></div>
<footer class="footer navbar-fixed-bottom">
                       
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 parent"><span class="child">Join Us</span></div>
    <div class="col-md-6"><span class="pull-right text-right text-muted">© 2016 One-Stop Shop All rights reserved.</span></div>
  </div>
</div>
</footer>

    @yield('script')
</body>

</html>
