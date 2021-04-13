<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Imagining New Worlds</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css?v4">

  <style>
    @import url("https://use.typekit.net/soq1gkl.css");
  </style>

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <header class="fixed-top">
    <div class="navbar navbar-light bg-light shadow-sm">
      <div class="container d-flex justify-content-between">

        <h1 class="h3 page-heading">Imagining New Worlds</h1>

        <a href="http://www.hackneypirates.org/" class="navbar-brand">
          <img alt="Literacy Pirates" src="/img/lp_logo.png" height="42px" width="auto" class="brand-logo hidden-xs-down">
        </a>
      </div>
    </div>
  </header>

  <main role="main">
    <div id="page-top" class="container-fluid pt-5">
      <section class="container text-center py-5">
        <div class="row">
          <div class="col-sm">
            <p class="mb-3">Nam quis nulla sodales, sagittis elit a, tincidunt eros. Mauris dignissim varius luctus. Sed non dolor ex. Aenean nec enim enim. Vivamus tincidunt sed massa vitae mattis. Suspendisse odio metus, fringilla non arcu at, laoreet egestas lectus. In sit amet erat dictum, efficitur ante a, consectetur magna.</p>
            <footer class="blockquote-footer">XXXX, <cite title="Source Title">Director of Learning</cite></footer>
          </div>
          <div class="col-sm">
            <p class="mb-3">Nam ex quam, suscipit sed malesuada eget, cursus non quam. Integer ac facilisis tortor. Vestibulum congue scelerisque arcu ac volutpat. Fusce id ornare lectus. Suspendisse potenti. Integer turpis mauris, mollis quis dapibus ac, eleifend eu metus. Integer malesuada ipsum ornare erat lacinia, sed cursus purus iaculis. Fusce sed nunc luctus, porttitor est ut, faucibus est.</p>
            <footer class="blockquote-footer">XXXX, <cite title="Source Title">Young Pirate</cite></footer>
          </div>
        </div>
      </section>

      <section class="container filter-group pb-2">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <button class="filter-button btn btn-outline-secondary" type="button" data-filter="*">All</button>
            <button class="filter-button btn btn-outline-secondary" type="button" data-filter=".young">Primary Pirates</button>
            <button class="filter-button btn btn-outline-secondary" type="button" data-filter=".senior">Secondary Pirates</button>
          </div>
          <input class="quicksearch form-control transparent-input" id="quicksearch" type="search" placeholder="Search for a person or a story" aria-label="Search for a person or a story" />
          <div class="input-group-append">
            <button class="search-button btn btn-outline-secondary" type="button">Find</button>
          </div>
        </div>
      </section>
    </div>

    <div id="stories" class="container-fluid py-2 text-white background-container">
      <img src="img/london-city.png" alt="Background city" class="background city"/>

      <video autoplay="" muted="" loop="" class="background sky">
        <source src="img/bg_sky.mp4" type="video/mp4">
      </video>

      <div class="flex-grid container">

      <?php // Horrible horrible code :)
      $files = glob("./audio/*/*.webm");
      $mp3_files = glob("./audio/*/*.mp3");
      $types = ['car', 'rocket'];
      foreach ($files as $path) {
          $mp3 = str_replace('.webm', '.mp3', $path);
          $file = basename($path, ".webm");

          $id = uniqid();
          $class = 'r' . rand(1,3) . 'c' . rand(1,5);
          $class_type = $types[array_rand($types, 1)];
          list($name, $title, $group) = array_map('trim', explode('-', $file));

          $group = strtolower($group) == 'primary' ? 'primary' : 'secondary';

          echo <<<TPL
<div class="grid-item $group">
    <a data-action="$id-story" class="story $class_type $class_type-$class">
        <p class="name">$name</p>
        <p class="title">$title</p>
    </a>
    <audio class="audio" id="$id-story">
        <source src="$path">
        <source src="$mp3">
        Your browser does not support the audio element.
    </audio>
</div>

TPL;
      }
      ?>

    </div>
  </main>

  <footer class="text-muted bg-light text-light">
    <div class="container">
      <br>
      <p>Check out the <a href="http://www.hackneypirates.org/writing-challenge" class="alert-link" target="_blank">Literacy Pirates Writing Challenge</a></p>
      <p class="float-right">
        <a href="#">Back to top</a>
      </p>
      <p>Imagining New Worlds &copy; <a href="http://www.hackneypirates.org/">Literary Pirates</a> 2020</p>
    </div>
  </footer>


  <!-- Script tags -->
  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  <script src="node_modules/isotope-layout/dist/isotope.pkgd.js"></script>
  <script src="node_modules/bounce.js/bounce.min.js"></script>
  <script src="node_modules/rellax/rellax.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
</body>

</html>
