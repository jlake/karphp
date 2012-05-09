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

    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="/">My Project</a>
          <ul class="nav">
            <li<?php if(empty($active)) { ?> class="active"<?php } ?>><a href="/">Home</a></li>
            <li<?php if($active == 'dummy') { ?> class="active"<?php } ?>><a href="/dummy">Dummy</a></li>
            <li<?php if($active == 'about') { ?> class="active"<?php } ?>><a href="#about">About</a></li>
            <li<?php if($active == 'contact') { ?> class="active"<?php } ?>><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container">
      <?php echo $content; ?>
      <footer>
        <p> &copy; Jlake Ou 2011</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>

