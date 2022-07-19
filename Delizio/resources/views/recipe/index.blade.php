 @extends('layouts.main')

 

@section('title')

Landing Page
@endSection

@section('main')
    <!-- Top Recipes -->
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h5><i class="fa fa-cutlery" aria-hidden="true"></i> les Tops recettes de petits-déjeunner </h5>
                    <div class="box clearfix">
                        <a href="recipe-detail.html"><img src="images/square-recipes1.jpg" alt=""></a>
                        <h3><a href="recipe-detail.html">Cinnamon Baked Doughnuts</a></h3>
                        <p>Lorem ipsum dolor sit amet, adipiscing elit...</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5><i class="fa fa-cutlery" aria-hidden="true"></i> Top Lunch Recipes</h5>
                    <div class="box clearfix">
                        <a href="recipe-detail.html"><img src="images/square-recipes2.jpg" alt=""></a>
                        <h3><a href="recipe-detail.html">Fruit Mix With Lemon Gravy</a></h3>
                        <p>Lorem ipsum dolor sit amet, adipiscing elit...</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5><i class="fa fa-cutlery" aria-hidden="true"></i> Top Dinner Recipes</h5>
                    <div class="box clearfix">
                        <a href="recipe-detail.html"><img src="images/square-recipes3.jpg" alt=""></a>
                        <h3><a href="recipe-detail.html">Red Cilly Sauce Cheese</a></h3>
                        <p>Lorem ipsum dolor sit amet, adipiscing elit...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Recipes-->
    <div class="featured">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h4>Oct 30, 2018</h4>
                    <h3>Recipes of the day</h3>
                </div>
                <div class="col-lg-8">
                    <div class="box grid recipes">
                        <div class="by"><i class="fa fa-user" aria-hidden="true"></i> Gerina Amy</div>
                        <a href="recipe-detail.html"><img src="images/recipe1.jpg" alt=""></a>
                        <h2><a href="recipe-detail.html">Roast Chicken With Lemon Gravy</a></h2>
                        <p>Dapibus mattis a. Nec lacus nam. Volutpat molestie ipsum. Eu et fermentum malesuada et et lorem mauris aenean partur..</p>
                        <div class="tag">
                            <a href="#">Chicken</a>
                            <a href="#">Lemon</a>
                            <a href="#">Sayur</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- List Recipes -->
    <div class="list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <h5><i class="fa fa-cutlery" aria-hidden="true"></i> List Recipes</h5>

                    <div class="box list recipes">
                        <div class="by"><i class="fa fa-user" aria-hidden="true"></i> Gerina Amy</div>
                        <a href="recipe-detail.html"><img src="images/square-recipes3.jpg" alt=""></a>
                        <h2><a href="recipe-detail.html">Milk fruit fresh with vegetables </a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <div class="tag">
                            <a href="#">Milk</a>
                            <a href="#">Lemon</a>
                            <a href="#">Sayur</a>
                        </div>
                    </div>

                    <div class="box list recipes">
                        <div class="by"><i class="fa fa-user" aria-hidden="true"></i> Gerina Amy</div>
                        <a href="recipe-detail.html"><img src="images/square-recipes3.jpg" alt=""></a>
                        <h2><a href="recipe-detail.html">Milk fruit fresh with vegetables </a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <div class="tag">
                            <a href="#">Milk</a>
                            <a href="#">Lemon</a>
                            <a href="#">Sayur</a>
                        </div>
                    </div>

                    <div class="box list recipes">
                        <div class="by"><i class="fa fa-user" aria-hidden="true"></i> Gerina Amy</div>
                        <a href="recipe-detail.html"><img src="images/square-recipes3.jpg" alt=""></a>
                        <h2><a href="recipe-detail.html">Milk fruit fresh with vegetables </a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <div class="tag">
                            <a href="#">Milk</a>
                            <a href="#">Lemon</a>
                            <a href="#">Sayur</a>
                        </div>
                    </div>

                    <div class="box list recipes">
                        <div class="by"><i class="fa fa-user" aria-hidden="true"></i> Gerina Amy</div>
                        <a href="recipe-detail.html"><img src="images/square-recipes3.jpg" alt=""></a>
                        <h2><a href="recipe-detail.html">Milk fruit fresh with vegetables </a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <div class="tag">
                            <a href="#">Milk</a>
                            <a href="#">Lemon</a>
                            <a href="#">Sayur</a>
                        </div>
                    </div>

                    <div class="box list recipes">
                        <div class="by"><i class="fa fa-user" aria-hidden="true"></i> Gerina Amy</div>
                        <a href="recipe-detail.html"><img src="images/square-recipes3.jpg" alt=""></a>
                        <h2><a href="recipe-detail.html">Milk fruit fresh with vegetables </a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <div class="tag">
                            <a href="#">Milk</a>
                            <a href="#">Lemon</a>
                            <a href="#">Sayur</a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-12 text-center">
                    <a href="#" class="btn btn-load">Load More</a>
                </div>

            </div>
        </div>
    </div>

@endSection



