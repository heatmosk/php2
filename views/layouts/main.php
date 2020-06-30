<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" media="all" href="/css/style.css">
  <title>Document</title>
</head>

<body>
  <div>
    <a href="/">Catalog</a>&nbsp;
    <a href="/index.php?a=login&c=user">Login</a>&nbsp;
    <a href="/index.php?a=logout&c=user">Logout</a>&nbsp;
    <a href="/index.php?c=user">Личный кабинет</a>
  </div>
  <div>
    <?= $content ?>
  </div>
</body>

</html>