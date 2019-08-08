<!doctype html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Менеджер задач</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="/css/style.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
		<div class="container">
			<a class="navbar-brand" href="/">Задачник</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav navbar-nav mr-auto">
					<li class="<?= $_SERVER['REQUEST_URI'] == '/tasks' ? 'nav-item active' : '' ?>">
						<a class="nav-link" href="/">Задачи <span class="sr-only">(current)</span></a>
					</li>
					<li class="<?= $_SERVER['REQUEST_URI'] == '/task/create' ? 'nav-item active' : '' ?>">
						<a class="nav-link" href="/task/create">Новая задача <span class="sr-only">(current)</span></a>
					</li>
				</ul>
				<ul class="navbar-nav my-2 my-lg-0">
					<?php if (!isset($_SESSION['signinUser'])) { ?>
						<a class="btn btn-outline-primary my-2 my-sm-0" href="/login" role="button">Авторизация</a>
					<?php } else { ?>
						<a class="btn btn-outline-primary my-2 my-sm-0" href="/logout" role="button">Выйти</a>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>