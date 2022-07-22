<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>

    <style>
        body {
            font-family: 'Varela Round', sans-serif;
            letter-spacing: .5px;
            color: #666;
            background: #fff
        }

        body,
        html {
            height: 100%
        }

        body {
            padding-top: 71px
        }

        .navbar {
            padding-top: 0;
            padding-bottom: 0;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, .1)
        }

        .navbar .navbar-brand {
            font-weight: 700;
            position: absolute;
            left: 30px;
            letter-spacing: 5px
        }

        .navbar .navbar-brand i {
            color: #eb9228
        }

        .navbar .navbar-nav .btn-submit-recipe {
            position: absolute;
            right: 30px
        }

        .navbar .navbar-nav .btn-submit-recipe a {
            margin-top: 13px;
            padding: 10px;
            color: #fff;
            border-radius: 4px;
            background-color: #eb9228
        }

        .border-circle {
            border-radius: 100% !important;
        }

        .navbar .navbar-nav .btn-submit-recipe a i {
            margin-right: 5px
        }

        .navbar .navbar-nav .btn-submit-recipe a:hover {
            color: #fff
        }

        .navbar .dropdown-item.active,
        .navbar .dropdown-item:active {
            text-decoration: none;
            color: #fff;
            background-color: #eb9228
        }

        .navbar .dropdown-item:focus,
        .navbar .dropdown-item:hover {
            text-decoration: none;
            color: #fff;
            background-color: #eb9228
        }

        .navbar-light .navbar-nav .nav-link {
            font-weight: 700;
            padding: 23px 25px;
            color: #333
        }

        .navbar-light .navbar-nav .active>.nav-link,
        .navbar-light .navbar-nav .nav-link.active {
            color: #eb9228;
            border-bottom: 3px solid #eb9228
        }

        .btn-warning,
        .bg-warning,
        .text-warning {
            background-color: #eb9228 !important;
        }

        .dropdown-menu {
            margin: 0;
            border-radius: 4px
        }

        .carousel-item img {
            width: 100%
        }

        .carousel-item .btn {
            padding: 10px;
            color: #fff;
            border-radius: 4px;
            background-color: #eb9228;
            border: 0
        }

        .carousel-item h1 {
            text-shadow: 0 1px 12px #555
        }

        .carousel-item h1 a {
            color: #fff
        }

        .carousel-item h1 a:hover {
            text-decoration: none
        }

        .carousel-item p {
            text-shadow: 0 1px 5px #555
        }

        .featured {
            margin-top: 70px;
            margin-bottom: 50px;
            text-align: center
        }

        .featured h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 40px;
            color: #333
        }

        .featured h4 {
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #cacaca
        }

        .top {
            padding: 60px 0;
            background-color: #f7f7f7
        }

        .top h5 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #dadada
        }

        .top .box {
            padding: 25px;
            background-color: #fff;
            box-shadow: 0 6px 15px rgba(36, 37, 38, .08)
        }

        .top .box h3 {
            font-size: 1.2rem;
            font-weight: 700;
            padding-left: 120px
        }

        .top .box h3 a {
            color: #333
        }

        .top .box p {
            line-height: 22px;
            margin-bottom: 0;
            padding-left: 120px
        }

        .top .box img {
            float: left;
            width: 100px;
            height: 100px;
            border-radius: 6px
        }

        .list {
            margin-top: 80px
        }

        .list h5 {
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #dedede
        }

        .list .btn-load {
            padding: 10px 25px;
            color: #666;
            border: 1px solid #dedede;
            border-radius: 50px
        }

        .box.grid.recipes {
            margin-bottom: 40px;
            padding-bottom: 30px;
            text-align: center;
            border: 1px solid #dedede;
            background-color: #fff;
            box-shadow: 0 6px 15px rgba(36, 37, 38, .08);
            border-top-left-radius: 1em !important;
            border-top-right-radius: 1em !important;
        }

        .box.grid.recipes .by {
            padding: 10px 15px;
            text-align: center !important;
            font-family: Comfortaa;
            color: #fff;
            background-color: #eb7628;

        }

        .box.grid.recipes h2 {
            font-size: 1.3rem;
            font-weight: 700;
            padding-right: 15px;
            padding-left: 15px;
            text-transform: capitalize
        }

        .box.grid.recipes h2 a {
            color: #333
        }

        .box.grid.recipes p {
            padding-right: 15px;
            padding-left: 15px
        }

        .box.grid.recipes img {
            width: 100%;
            margin-bottom: 30px
        }

        .box.grid.recipes .tag {
            padding-right: 15px;
            padding-left: 15px
        }

        .box.grid.recipes .tag a {
            display: inline-block;
            padding: 3px 15px;
            color: #666;
            border: 1px solid #dedede;
            border-radius: 50px
        }

        .box.grid.recipes .tag a:hover {
            text-decoration: none;
            background-color: #f8f8f8
        }

        .box.list.recipes {
            margin-top: 0;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border: 1px solid #dedede;
            background-color: #fff;
            box-shadow: 0 6px 15px rgba(36, 37, 38, .08)
        }

        .box.list.recipes img {
            float: left;
            width: 100px;
            height: 100px;
            margin-left: 20px
        }

        .box.list.recipes h2 {
            font-size: 1.2rem;
            padding-left: 140px
        }

        .box.list.recipes h2 a {
            font-weight: 700;
            color: #333
        }

        .box.list.recipes p {
            padding-left: 140px
        }

        .box.list.recipes .tag {
            padding-left: 140px
        }

        .box.list.recipes .tag a {
            display: inline-block;
            padding: 3px 15px;
            color: #666;
            border: 1px solid #dedede;
            border-radius: 50px
        }

        .box.list.recipes .tag a:hover {
            text-decoration: none;
            background-color: #f8f8f8
        }

        .box.list.recipes .by {
            margin-bottom: 20px;
            padding: 10px 15px;
            text-align: left;
            color: #fff;
            background-color: #eb7628
        }

        .page {
            margin-top: 70px;
            margin-bottom: 50px
        }

        .page .title h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 40px;
            color: #333
        }

        .page .title h4 {
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #cacaca
        }

        .page .content .aligncenter,
        .page .content div.aligncenter {
            display: block;
            margin: 5px auto;
            text-align: center
        }

        .page .content .alignright {
            float: right;
            margin: 5px 0 20px 20px
        }

        .page .content .alignleft {
            float: left;
            margin: 5px 20px 20px 0
        }

        .page .content .caption-text {
            font-size: 12px;
            font-style: italic;
            text-align: center
        }

        .page.contact {
            padding-bottom: 40px
        }

        .page.contact input {
            height: 45px
        }

        .page.contact .btn {
            color: #fff;
            background-color: #eb9228
        }

        .search {
            padding: 60px 0;
            background-color: #f8f8f8
        }

        .search h2 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            color: #eb9228;
            border-bottom: 1px dashed #dedede
        }

        .search .form-group {
            position: relative
        }

        .search .form-group .form-control {
            height: 45px
        }

        .search .form-group label {
            display: block
        }

        .search .form-group input {
            height: 45px
        }

        .search .form-group .btn {
            position: absolute;
            top: 0;
            right: 0;
            height: 45px;
            color: #fff;
            border-radius: 0 4px 4px 0;
            background-color: #eb9228
        }

        .search .select2-container .select2-selection--single {
            height: 45px
        }

        .search .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 45px;
            color: #444
        }

        .search .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px
        }

        .search .select2-container .select2-selection--multiple {
            height: 45px
        }

        .search .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin-top: 8px
        }

        .search .select2-container .select2-search--inline .select2-search__field {
            margin-top: 0
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #eb9228 !important
        }

        .select2 {
            width: 100% !important
        }

        .submit .title {
            padding: 30px 0;
            background-color: #f8f8f8
        }

        .submit .title h2 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0
        }

        .submit .content {
            padding: 40px 0
        }

        .submit .content .form-group {
            margin-bottom: 40px
        }

        .submit .content .form-group hr {
            border-top: 1px dashed #dedede
        }

        .submit .content .form-group .btn-light {
            background-color: #363636;
            color: #fff
        }

        .submit .content input {
            height: 45px
        }

        .submit .content .btn-submit {
            padding: 15px;
            color: #fff;
            background-color: #eb9228
        }

        .submit .content .select2-container .select2-selection--single {
            height: 45px
        }

        .submit .content .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 45px;
            color: #444
        }

        .submit .content .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px
        }

        .submit .content .box {
            background-color: #f8f8f8;
            margin-bottom: 15px;
            padding: 20px;
            text-align: center
        }

        .submit .content .box:hover {
            cursor: pointer
        }

        .submit .content .box .fa-arrows {
            padding-top: 13px
        }

        .submit .content .box .fa-times-circle-o {
            font-size: 20px;
            padding-top: 13px
        }

        .submit .content .box .fa-times-circle-o:hover {
            color: #eb9228
        }

        .recipe-detail {
            padding: 120px 0
        }

        .recipe-detail h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333
        }

        .recipe-detail .by {
            margin-bottom: 40px
        }

        .recipe-detail .by i {
            color: #eb9228
        }

        .recipe-detail h4 {
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #cacaca
        }

        .recipe-detail img {
            width: 100%
        }

        .recipe-detail .tag a {
            font-size: .9rem;
            display: inline-block;
            padding: 3px 15px;
            color: #666;
            border: 1px solid #dedede;
            border-radius: 50px
        }

        .recipe-detail .tag a:hover {
            text-decoration: none;
            background-color: #f8f8f8
        }

        .recipe-detail .info {
            margin-bottom: 20px;
            padding: 20px;
            color: #fff;
            background-color: #eb9228
        }

        .recipe-detail .info p {
            font-size: .8rem;
            margin-bottom: 0
        }

        .recipe-detail .info p strong {
            font-size: 1rem;
            color: #fff
        }

        .recipe-detail .ingredient-direction {
            margin-top: 30px
        }

        .recipe-detail .ingredient-direction h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 20px
        }

        .recipe-detail .ingredient-direction ul.ingredients {
            padding: 30px;
            list-style: none;
            background: #f9f9f9
        }

        .recipe-detail .ingredient-direction ul.ingredients li {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #dedede
        }

        .recipe-detail ol.directions>li {
            position: relative;
            margin-bottom: 30px;
            padding-left: 20px
        }

        .recipe-detail ol.directions {
            list-style-type: decimal;
            margin: 15px 0 0 34px;
            padding: 0;
            counter-reset: li-counter
        }

        .recipe-detail ol.directions>li:before {
            font-size: 16px;
            font-weight: 700;
            line-height: 32px;
            position: absolute;
            top: 3px;
            left: -34px;
            width: 34px;
            height: 34px;
            text-align: center;
            color: #999;
            background-color: #f4f4f4;
            content: counter(li-counter);
            counter-increment: li-counter;
            cursor: default
        }

        .recipe-detail .nutrition-facts {
            position: relative;
            margin-bottom: 50px;
            padding-top: 20px;
            padding-bottom: 20px;
            border-top: 1px dashed #dedede;
            border-bottom: 1px dashed #dedede
        }

        .recipe-detail .nutrition-facts h3 {
            font-size: .9rem;
            position: absolute;
            top: -20px;
            left: 0;
            padding: 8px 10px;
            color: #fff;
            background-color: #666
        }

        .recipe-detail .nutrition-facts p {
            font-size: .8rem
        }

        .recipe-detail .nutrition-facts p strong {
            font-size: 1rem
        }

        .recipe-detail .nutrition-facts div {
            float: left;
            width: 20%
        }

        .recipe-detail .nutrition-facts div p {
            margin-bottom: 0
        }

        .recipe-detail .blog-comment h3 {
            font-size: 14px;
            font-weight: 800;
            line-height: 30px;
            text-decoration: underline;
            text-transform: uppercase;
            color: #333
        }

        .recipe-detail .blog-comment a {
            font-weight: 700;
            color: #333
        }

        .recipe-detail .blog-comment ul {
            padding: 0;
            list-style-type: none
        }

        .recipe-detail .blog-comment img {
            opacity: 1;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -o-border-radius: 4px
        }

        .recipe-detail .blog-comment img.avatar {
            position: relative;
            float: left;
            width: 65px;
            height: 65px;
            margin-top: 0;
            margin-left: 0
        }

        .recipe-detail .blog-comment .post-comments {
            position: relative;
            margin-right: 0;
            margin-bottom: 20px;
            padding: 10px 20px;
            color: #6b6e80;
            border: 1px dashed #dedede;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            background: #fff;
            -o-border-radius: 4px
        }

        .recipe-detail .blog-comment .meta {
            font-size: 13px;
            margin-bottom: 10px !important;
            padding-bottom: 8px;
            color: #aaa;
            border-bottom: 1px solid #eee
        }

        .recipe-detail .blog-comment ul.comments ul {
            margin-left: 85px;
            padding: 0;
            list-style-type: none
        }

        .recipe-detail .reply {
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 4px
        }

        .recipe-detail .reply h3 {
            margin-top: 0;
            text-decoration: none
        }

        .recipe-detail .reply .required {
            color: red
        }

        .recipe-detail .reply .btn-submit {
            margin-top: 10px;
            padding: 17px;
            color: #fff;
            background: #eb9228
        }

        footer {
            margin-top: 40px;
            padding: 50px 0;
            background-color: #333
        }

        footer h5 {
            margin-bottom: 20px;
            padding-bottom: 10px;
            color: #fff;
            border-bottom: 1px dashed #484848
        }

        footer p {
            color: #858585
        }

        footer ul {
            padding-left: 0
        }

        footer ul li {
            list-style: none
        }

        footer ul li a {
            color: #858585
        }

        footer ul li a:hover {
            color: #858585
        }

        footer .btn {
            background-color: #eb9228;
            color: #fff
        }

        .copyright {
            font-size: .9rem;
            padding: 15px 0;
            background-color: #212121
        }

        .copyright a {
            color: #858585
        }

        .copyright i {
            color: #f44336
        }

        .demo h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #333
        }

        .demo p {
            margin-bottom: 50px
        }

        .demo .box {
            box-shadow: 0 0 15px rgba(0, 0, 0, .1);
            border: 1px solid #dedede;
            margin-bottom: 30px;
            position: relative
        }

        .demo .box:hover {
            opacity: .9
        }

        .demo .box img {
            width: 100%
        }

        .demo .box .title {
            background-color: #eb9228;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: .8rem
        }

        .demo .box .status {
            position: absolute;
            right: -15px;
            top: -20px;
            background-color: #feca2f;
            padding: 20px 15px;
            border-radius: 50px;
            color: #000
        }

        @media only screen and (max-width:992px) {
            .navbar {
                padding: 10px 0
            }

            .navbar .container-fluid {
                padding-right: 15px;
                padding-left: 15px
            }

            .navbar .navbar-brand {
                position: unset;
                left: unset
            }

            .navbar .justify-content-center {
                justify-content: space-between !important
            }

            .navbar .navbar-nav .btn-submit-recipe {
                position: unset;
                right: unset;
                text-align: center
            }

            .navbar-light .navbar-nav .active>.nav-link,
            .navbar-light .navbar-nav .nav-link.active {
                border-bottom: 1px solid #eb9228
            }

            .navbar-light .navbar-nav .nav-link {
                padding: 15px 15px
            }
        }

        @media only screen and (max-width:768px) {
            body {
                padding-top: 61px
            }

            .navbar {
                padding: 10px 0
            }

            .navbar .container-fluid {
                padding-right: 15px;
                padding-left: 15px
            }

            .navbar .navbar-brand {
                position: unset;
                left: unset
            }

            .navbar .justify-content-center {
                justify-content: space-between !important
            }

            .navbar .navbar-nav .btn-submit-recipe {
                position: unset;
                right: unset;
                text-align: center
            }

            .navbar-light .navbar-nav .active>.nav-link,
            .navbar-light .navbar-nav .nav-link.active {
                border-bottom: 1px solid #eb9228
            }

            .navbar-light .navbar-nav .nav-link {
                padding: 15px 15px
            }

            .top .box {
                margin-bottom: 30px
            }

            .top .box img {
                width: 60px;
                height: 60px
            }

            .top .box h3,
            .top .box p {
                padding-left: 80px
            }

            .carousel-item img {
                width: unset;
                height: 400px
            }

            .search .form-group .btn {
                position: static;
                margin-top: 20px;
                border-radius: 4px;
                width: 100%
            }

            .box.grid.recipes .tag a {
                margin-bottom: 5px
            }
        }

        @media only screen and (max-width:480px) {
            body {
                padding-top: 61px
            }

            .navbar {
                padding: 10px 0
            }

            .navbar .container-fluid {
                padding-right: 15px;
                padding-left: 15px
            }

            .navbar .navbar-brand {
                position: unset;
                left: unset
            }

            .navbar .justify-content-center {
                justify-content: space-between !important
            }

            .navbar .navbar-nav .btn-submit-recipe {
                position: unset;
                right: unset;
                text-align: center
            }

            .navbar-light .navbar-nav .active>.nav-link,
            .navbar-light .navbar-nav .nav-link.active {
                border-bottom: 1px solid #eb9228
            }

            .navbar-light .navbar-nav .nav-link {
                padding: 15px 15px
            }

            .carousel-item img {
                width: unset;
                height: 500px
            }

            .featured {
                margin-bottom: 20px
            }

            .featured h3 {
                font-size: 1.6rem
            }

            .top {
                padding: 40px 0
            }

            .top .box {
                margin-bottom: 30px
            }

            .list {
                margin-top: 40px
            }

            .list .tag a {
                margin-bottom: 5px
            }

            body {
                padding-top: 60px
            }

            .box.list.recipes img {
                width: 60px;
                height: 60px
            }

            .box.list.recipes .tag,
            .box.list.recipes h2,
            .box.list.recipes p {
                padding-left: 100px;
                padding-right: 15px
            }

            .submit .content input {
                width: 100%
            }

            .recipe-detail {
                padding: 60px 0
            }

            .recipe-detail h1 {
                font-size: 1.8rem
            }

            .recipe-detail .col-lg-4 {
                margin-bottom: 10px
            }

            .recipe-detail .nutrition-facts {
                margin-top: 30px
            }

            .recipe-detail .nutrition-facts div {
                width: 50%;
                margin-bottom: 10px
            }
        }
    </style>
</head>

<body>
    <!-- Detail Recipes-->
    <div class="recipe-detail">
        <div class="container">

            <h1>RECETTE DELIZIO</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">

                <h4 class="bg-light text-gray-500 h2 p-3">{{ $recette->title }}</h4>
                <h5 style="padding:1em;" class=" text-warning"><i class="fa fa-user "></i> Chef : {{ $fullname }}
                </h5>
                <h4> Publie le : {{ $recette->created_at }}</h4>
            </div>
            <div class="col-lg-10">


                <!-- Button trigger modal -->
                <button type="button" class=" text-white btn btn-warning w-100 p-3 fa fa-play my-2 text-small"
                    data-toggle="modal" data-target="#exampleModal">

                </button>

                <!-- Modal -->
                <div class="modal w-100 fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="container-fluid d-flex justify-content-center align-items-center">



                        </div>
                    </div>
                </div>

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img class="d-block w-100"
                                src="{{ public_path('') . Storage::url($recette->main_image) }}" alt="First slide">
                        </div>


                    </div>

                </div>


                <div class="info">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            <p>Temps de repos:</p>
                            <p><strong><i class="fa fa-users" aria-hidden="true"></i>
                                    {{ $recette->temps_repos }}min</strong></p>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <p>Temps de préparation:</p>
                            <p><strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                    {{ $recette->temps_preparation }}min</strong></p>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <p>Temps de cuisson:</p>
                            <p><strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                    {{ $recette->temps_cuisson }}min</strong></p>
                        </div>
                    </div>
                </div>


                <p>{{ $recette->summary }}</p>

                <div class="tag">
                    <a href="#">{{ $recette->tag }}</a>
                </div>

                <div class="ingredient-direction">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <h3>Ingredients</h3>
                            <ul class="ingredients">

                                @foreach ($ingredients as $ingredient)
                                    <li>
                                        {{ $ingredient->quantite . ' x ' . $ingredient->ingredient . ' (' . $ingredient->unite . ')' }}
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <h3>Etapes</h3>
                            <ol class="directions">
                                @foreach ($etapes as $etape)
                                    <li>{{ $etape->step_details }}</li>
                                @endforeach

                            </ol>
                        </div>
                    </div>
                </div>



                <div class="nutrition-facts clearfix">
                    <h3>Valeur Nutritive</h3>
                    <div>
                        <p>Calories:</p>
                        <p><strong>{{ $recette->calories }} kcal</strong></p>
                    </div>
                    <div>
                        <p>Carbohydrate:</p>
                        <p><strong>{{ $recette->carbohydrates }} g</strong></p>
                    </div>
                    <div>
                        <p>Matière Gras:</p>
                        <p><strong>{{ $recette->gras }} g</strong></p>
                    </div>
                    <div>
                        <p>Proteines:</p>
                        <p><strong>{{ $recette->proteines }} g</strong></p>
                    </div>
                    <div>
                        <p>Cholésterole:</p>
                        <p><strong>{{ $recette->cholesterole }} mg</strong></p>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
</body>

</html>
