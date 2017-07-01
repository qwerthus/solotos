<html>
<head>
	<title>E-Commerce Hotel - Detail</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
    .image-display {
      height: 300px;
      width: auto;
    }
    .card-image {
      max-height: 300px;
      max-width: 400px;
      width: auto;
      vertical-align: middle;
    }
    .helper {
      display: inline-block;
      height: 100%;
      vertical-align: middle;
    }
    .star {
      color: orange;
    }
  </style>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{url_for('main')}}">E-Commerce Hotel</a>
    </div>
    <ul class="nav navbar-nav navbar-right">

      <!--IF LOGGED IN-->
      {% if session.mail %}
      <li><a href="#">Welcome back,  {{ session.mail }}</a></li>
      <!--AS ADMIN-->
      {% if session.mail == 'admin@bookinglah.com' %}
      <li><a href="{{url_for('add_hotel')}}"><span class="glyphicon glyphicon-user"></span>Add Hotel</a></li>
      <!--AS USER-->
      {% else %}
      <li><a href="{{url_for('view_booking',id=session.id)}}"><span class="glyphicon glyphicon-user"></span>Manage my bookings</a></li>
      {% endif %}
      <li><a href="{{url_for('logout')}}">Logout</a></li>
      <!--IF NOT LOGGED IN-->
      {% else %}
      <li><a href="{{url_for('register')}}">Sign Up</a></li>
      <li><a href="{{url_for('login')}}">Login</a></li>
      {% endif %}
    </ul>
  </div>
</nav>

  <div class="container">
  <div class="row">
    <div class="col-sm-4 card">
      <img src="{{row[3]}}" width=300 height=300>
      </div>
      <div class="col-sm-8">
      <div>
      <a href="{{url_for('view_hotel',id=row[0])}}">{{row[1]}}</a>
      </div>  
      <div>
      {% for i in range(0,row[4]) %}
      <span class="glyphicon glyphicon-star"></span>
      {% endfor %}
      </div>
      <h3>{{row[2]}}</h3>
      <h4>{{row[5]}}</h4>
      {% if session.mail %}
      <a href="{{url_for('add_booking',hotelId=row[0])}}" class="btn btn-success">Book Now</a>
      <br><br><br><br>
      {% endif %}
</div>
</div>
</div>
    

</body>
</html>