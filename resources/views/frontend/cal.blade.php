
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Nutrical</title>

  <link rel="stylesheet" href="/css/theme.css">
  <link rel="stylesheet" href="/css/frontend/cal/libs.css">
  <link rel="stylesheet" href="/font-awesome/css/font-awesome.css">
</head>

<body class="nav-md">
  <div class="container body">
    <div id="app" class="main_container">

      <router-view name="sidebar"></router-view>
      <router-view name="navbar"></router-view>

      <!-- page content -->
      <div  class="right_col" role="main">
        <router-view></router-view>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
  </script>
  <script type="text/javascript" src="/js/frontend/cal/app.js"></script>
  <script type="text/javascript" src="/js/theme.js"></script>
  <script type="text/javascript" src="/js/frontend/cal/libs.js"></script>
</body>
</html>
