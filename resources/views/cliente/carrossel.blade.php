<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	{{-- <ol class="carousel-indicators"> --}}
	  {{-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li> --}}
	  {{-- <li data-target="#myCarousel" data-slide-to="1"></li> --}}
	  {{-- <li data-target="#myCarousel" data-slide-to="2"></li> --}}
	{{-- </ol> --}}

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
	  <div class="item active">
		<img src="{{ 'data:image/jpeg;base64,' . $banners[0]->foto1 }}" alt="Los Angeles">
	  </div>

	  <div class="item">
		<img src="{{ 'data:image/jpeg;base64,' . $banners[0]->foto2 }}" alt="Chicago">
	  </div>

	  <div class="item">
		<img src="{{ 'data:image/jpeg;base64,' . $banners[0]->foto3 }}" alt="New York">
	  </div>
	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
	  <span class="glyphicon glyphicon-chevron-left"></span>
	  <span class="sr-only">‹</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
	  <span class="glyphicon glyphicon-chevron-right"></span>
	  <span class="sr-only">›</span>
	</a>
  </div>



{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
	<div class="carousel-inner">
	  <div class="carousel-item active">
		<img class="d-block w-100" src="{{ 'data:image/jpeg;base64,' . $banners[0]->foto1 }}">
	  </div>
	  <div class="carousel-item">
		<img class="d-block w-100" src="{{ 'data:image/jpeg;base64,' . $banners[0]->foto2 }}">
	  </div>
	  <div class="carousel-item">
		<img class="d-block w-100" src="{{ 'data:image/jpeg;base64,' . $banners[0]->foto3 }}">
	  </div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
	  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	  <span class="sr-only">Anterior</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
	  <span class="carousel-control-next-icon" aria-hidden="true"></span>
	  <span class="sr-only">Próximo</span>
	</a>
  </div> --}}
