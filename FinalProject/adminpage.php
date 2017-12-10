<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
    <link rel="stylesheet" href="css/styles.css" type="text/css" />

    <!- bootstrap stuff->
    <style>
        body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #eee;
    }
    
    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }
    
    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }
    .form-signin .form-control:focus {
      z-index: 2;
    }
    .form-signin input[type="text"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
    </style>
    <!- end bootstrap stuff->
    
    <?php
      session_start();
      if($_SESSION['loggedin'] == 'y'){
        header('Location: admincontrolpanel.php');
      }
    ?>

</head>


<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">GSSP</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Admin <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>

    
    <main role="main" class="container">

      <div class="starter-template">
        <form method="POST" class="form-signin" action="php/adminsignin.php">
        <h2 class="form-signin-heading">Admin Sign in</h2>
        
        <input type="text" name="inputUser" class="form-control" placeholder="Username">
        <input type="password" name="inputPassword" class="form-control" placeholder="Password">
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign In">
      </form>
      </div>
    
    </main>
    
    
    <br>
    <br>
    <br>
    <script type="text/javascript" src="js/login.js"></script>
</body>


</html>
