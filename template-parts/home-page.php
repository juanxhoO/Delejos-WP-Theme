<?php
/**
 * Template part for displaying posts
 * Template Name: Home Template 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Delejos_Theme
 */

?>
<div>
	<header class="entry-header">
		<?php
		get_header();
		?>
		<div class="top_menu container d-flex flex-wrap">
			<ul class="nav me-auto">
				<li class="nav-item"><a href="">+1-646-597-8034 </a></li>

				<li class="nav-item"><a href="">+1-646-597-8034 </a></li>

				<li class="nav-item"><a href="">+1-646-597-8034 </a></li>
			</ul>

			<div>
				currency exchanger
			</div>
			<div>

				Languaje Siwtch
			</div>
		</div>
	</header><!-- .entry-header -->
	<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1"
				aria-current="true"></button>
			<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
				class=""></button>
			<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"
				class=""></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item carousel-item-next carousel-item-start">
				<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
					aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
					<rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
				</svg>
				<div class="container">
					<div class="carousel-caption text-start">
						<h1>Example headline.</h1>
						<p class="opacity-75">Some representative placeholder content for the first slide of the
							carousel.</p>
						<p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
					aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
					<rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
				</svg>
				<div class="container">
					<div class="carousel-caption">
						<h1>Another example headline.</h1>
						<p>Some representative placeholder content for the second slide of the carousel.</p>
						<p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
					</div>
				</div>
			</div>
			<div class="carousel-item active carousel-item-start">
				<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
					aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
					<rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
				</svg>
				<div class="container">
					<div class="carousel-caption text-end">
						<h1>One more for good measure.</h1>
						<p>Some representative placeholder content for the third slide of this carousel.</p>
						<p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
					</div>
				</div>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>

	<div class="jumbotrons mt-5 row align-items-md-stretch">
		<div class="col-md-6">
			<div class="h-100 p-5 text-bg-dark rounded-3">
				<h2>Change the background</h2>
				<p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look.
					Then, mix and match with additional component themes and more.</p>
				<button class="btn btn-outline-light" type="button">Example button</button>
			</div>
		</div>
		<div class="col-md-6">
			<div class="h-100 p-5 text-bg-dark rounded-3">
				<h2>Change the background</h2>
				<p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look.
					Then, mix and match with additional component themes and more.</p>
				<button class="btn btn-outline-light" type="button">Example button</button>
			</div>
		</div>
	</div>
	<div class="entry-content">
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		get_footer();
		?>

	</footer><!-- .entry-footer -->
</div>