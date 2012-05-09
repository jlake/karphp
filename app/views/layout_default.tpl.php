<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php e($title); ?></title>
    <meta name="description" content="A php framework based on Konstrukt and ActiveRecord">
    <meta name="author" content="Jlake Ou">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
<?php foreach ($styles as $style): ?>
    <link rel="stylesheet" href="<?php e($style); ?>" type="text/css" />
<?php endforeach; ?>
<?php foreach ($scripts as $script): ?>
    <script type="text/javascript" src="<?php e($script); ?>"></script>
<?php endforeach; ?>
<?php foreach ($onload as $javascript): ?>
    <script type="text/javascript">
        <?php echo $javascript; ?>
    </script>
<?php endforeach; ?>
  </head>

  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/">KarPHP</a>
          <div class="nav-collapse">
            <ul class="nav">
                <li<?php if(empty($active)) { ?> class="active"<?php } ?>><a href="/">Home</a></li>
                <li<?php if($active == 'dummy') { ?> class="active"<?php } ?>><a href="/dummy">Dummy</a></li>
                <li<?php if($active == 'about') { ?> class="active"<?php } ?>><a href="#about">About</a></li>
                <li<?php if($active == 'contact') { ?> class="active"<?php } ?>><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <?php echo $content; ?>
      <hr>
      <footer>
        <p> &copy; Jlake Ou 2011</p>
      </footer>
    </div>

    <!-- Le javascript
    ================================================== -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>

  </body>
</html>

