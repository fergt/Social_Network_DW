<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

		 <!-- CSS only -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
			<link rel="stylesheet" href="{{asset('css/style.css')}}" crossorigin="anonymous">
	</head>
    <body>
    	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  		<div class="container">
	  			<div class="row py-4">	
		  			<a class="navbar-brand" href="landing">Socia Network</a>
		  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		   			 	<span class="navbar-toggler-icon"></span>
		  			</button>
		  			<div class="collapse navbar-collapse" id="navbarText">
		    			<ul class="navbar-nav mr-auto">
		      				<li class="nav-item active">
		        				<a class="nav-link" href="landing">Inicio <span class="sr-only">(current)</span></a>
		      				</li>
		      				<li class="nav-item">
		        				<a class="nav-link" href="#">About Us</a>
		      				</li>
						    <li class="nav-item">
						        <a class="nav-link" href="login">Sign In</a>
						    </li>
		   				</ul>
                    </div>
				</div>
			</div>		
		</nav>
		<Header class="container-fluid">
			<div class="row" style="height: 680px; background-color:#04a4ac">
				<div class="col-12 align-self-center text-center">
					<img src="{{asset('images/image1.png')}}" class="img-fluid" alt="">
					<h1>Bienvenido a Social Network</h1>
					<hr>
					<p> Conectate con tus amigos, familiares y tu crush</p>
				</div>			
			</div>
		</Header>
		<Footer class="container-fluid">
			<div class="row justify-content-center" style="background-color: #1a252f;">
				<div class="col-12 p-3 text-center">
					<p> Copyright © Social Network 2020
				</div> 
			</div>
		</Footer>
    </body>
</html>
