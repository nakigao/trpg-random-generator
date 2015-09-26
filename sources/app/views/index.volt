<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ pageTitle }} | {{ siteTitle }}</title>
    <link rel="stylesheet" href="/bower/bootstrap/dist/css/bootstrap.min.css" type="text/css">
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>Random Generator for TRPG</h1>
        <ul class="nav nav-pills">
            <li role="presentation" class="{% if router.getControllerName() == 'index' or router.getControllerName() == ''%}active{% else %}{% endif %}"><a href="index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
            <li role="presentation" class="{% if router.getControllerName() == 'real' or router.getControllerName() == ''%}active{% else %}{% endif %}"><a href="real">REAL</a></li>
            <li role="presentation" class="{% if router.getControllerName() == 'fantasy'%}active{% else %}{% endif %}"><a href="fantasy">FANTASY</a></li>
            <li role="presentation" class="{% if router.getControllerName() == 'fantasy_sword_world_2'%}active{% else %}{% endif %}"><a href="fantasy_sword_world_2">FANTASY(SW2.0)</a></li>
        </ul>
    </div>
    <div>
        {{ content() }}
    </div>
</div>
<script src="/bower/jquery/dist/jquery.min.js"></script>
<script src="/bower/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
