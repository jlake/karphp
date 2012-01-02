<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=320, initial-scale=1.0, user-scalable=yes, maximum-scale=2.0, minimum-scale=1.0, ">
    <meta name="format-detection" content="telephone=no"/>
    <title><?php e($title); ?></title>
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
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

    <header>
        <a href="/"><img src="/img/logo.png" alt="<?php e($title); ?>"  border="0" /></a>
    </header>
    <br />

    <div>
    <?php echo $content; ?>
    </div>
</body>
</html>
