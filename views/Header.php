<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="favicon.png"/>

    <title>BWT_test2</title>
    <link href="//cdnjs.cloudflare.com/ajax/libs/normalize/6.0.0/normalize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css"
          rel="stylesheet">
    <link href="/template/css/style.css" rel="stylesheet">
</head>

<body>
<header role="banner">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">BWT_test2</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/weather">Weather</a></li>
                <li><a href="/feedback/list">Feedback List</a></li>
                <li><a href="/feedback">Feedback</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($_SESSION['user'])): ?>
                    <li><a href="/"></span> Sign Up</a></li>
                    <li><a href="/login"></span> Login</a></li>
                <?php else: ?>
                    <li><a class="disabled" href="#"></span> <?php echo $_SESSION['userName']; ?></a></li>
                    <li><a href="/logout"></span> Log Out</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <!-- Navbar END -->
</header>
