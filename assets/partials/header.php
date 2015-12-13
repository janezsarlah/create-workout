<!DOCTYPE html>
<html>
  <head>
    <title>Create Workout</title>

    <!-- When developing *Remove*-->
    <link rel="stylesheet" href="/node_modules/normalize.css/normalize.css">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/datepicker3.css" rel="stylesheet">
    <link href="/assets/css/styles.css" rel="stylesheet">

    <!-- Production *Remove comments* -->
    <link rel="stylesheet" href="/assets/css/main.css">

  </head>
  <body>

  <?php if(isset($_SESSION['username'])) : ?>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
          <ul class="user-menu">
            <li class="dropdown pull-right">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                <li><a href="/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>

      </div><!-- /.container-fluid -->
    </nav>

  <?php endif; ?>