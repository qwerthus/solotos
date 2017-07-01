<html>
<head>
  <title>E-Commerce Hotel - Add New Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
    .card {
      height: 450px;
    }
    .card-image {
      max-height: 300px;
      max-width: 350px;
      width: auto;
    }
    .image-display {
      height: 300px;
      width: auto;
    }
    .image-caption {
      height: 100px;
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

  <!-- Section to add new hotel -->
  <div class="container">
    <h1>Add New Hotel!</h1>
    <form method="post" action="{{url_for('add_hotel_success')}}">
      <div class="form-group">
        <label for="postName">Name:</label>
        <input type="text" class="form-control" id="postName" name="postName">
      </div>
      <div class="form-group">
        <label for="postDescription">Description:</label>
        <textarea class="form-control" rows="5" id="postDescription" name="postDescription"></textarea>
      </div>
      <div class="form-group">
        <label for="postImageUrl">Image URL:</label>
        <textarea class="form-control" rows="5" id="postImageUrl" name="postImageUrl"></textarea>
      </div>
      <div class="form-group">
        <label for="postStar">Star (1-5):</label>
        <input type="text" class="form-control" id="postStar" name="postStar">
      </div>
      <div class="form-group">
        <label for="postPrice">Price (in Rupiah):</label>
        <input type="text" class="form-control" id="postPrice" name="postPrice">
      </div>
      <button type="submit" class="btn btn-default">Save</button>
    </form>
  </div>
</body>
</html>