<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Blog Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

     

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      /* stylelint-disable selector-list-comma-newline-after */

        .blog-header {
        line-height: 1;
        border-bottom: 1px solid #e5e5e5;
        }

        .blog-header-logo {
        font-family: "Playfair Display", Georgia, "Times New Roman", serif/*rtl:Amiri, Georgia, "Times New Roman", serif*/;
        font-size: 2.25rem;
        }

        .blog-header-logo:hover {
        text-decoration: none;
        }

        h1, h2, h3, h4, h5, h6 {
        font-family: "Playfair Display", Georgia, "Times New Roman", serif/*rtl:Amiri, Georgia, "Times New Roman", serif*/;
        }

        .display-4 {
        font-size: 2.5rem;
        }
        @media (min-width: 768px) {
        .display-4 {
            font-size: 3rem;
        }
        }

        .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
        }

        .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
        }

        .nav-scroller .nav-link {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: .875rem;
        }

        .card-img-right {
        height: 100%;
        border-radius: 0 3px 3px 0;
        }

        .flex-auto {
        flex: 0 0 auto;
        }

        .h-250 { height: 250px; }
        @media (min-width: 768px) {
        .h-md-250 { height: 250px; }
        }

        /* Pagination */
        .blog-pagination {
        margin-bottom: 4rem;
        }
        .blog-pagination > .btn {
        border-radius: 2rem;
        }

        /*
        * Blog posts
        */
        .blog-post {
        margin-bottom: 4rem;
        }
        .blog-post-title {
        margin-bottom: .25rem;
        font-size: 2.5rem;
        }
        .blog-post-meta {
        margin-bottom: 1.25rem;
        color: #727272;
        }

        /*
        * Footer
        */
        .blog-footer {
        padding: 2.5rem 0;
        color: #727272;
        text-align: center;
        background-color: #f9f9f9;
        border-top: .05rem solid #e5e5e5;
        }
        .blog-footer p:last-child {
        margin-bottom: 0;
        }

    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
    
<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a  href="{{route('cart.index')}}" class="btn btn-primary position-relative">
          Panier
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{Cart::count()}}
            <span class="visually-hidden">unread messages</span>
          </span>
        </a>
      </div>
      <div class="col-4  text-center d-flex align-items-center">
        <img width="75" src="/storage/produit/kisspng-computer-icons-scalable-vector-graphics-applicatio-tynor-wrist-splint-ambidextrous-rs-274-wrist-s-5bac3149dcb297.944285061538011465904-removebg-preview.png" alt="">
        <a class=" d-block blog-header-logo text-dark font-weight-light text-decoration-none" href="/boutique">Shopping</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <nav class="navbar navbar-light ">
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </nav>
        @auth
        <div class="dropdown">
          <a class="d-inline-block dropdown-toggle text-decoration-none text-secondary m-3" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
           Admin
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <form action="{{route("logout")}}" method="post">
                 @csrf
                 <button class="dropdown-item" type="submit">Deconnexion</button>
              </form>
            </li>
          </ul>
        </div>
        @endauth
        @guest
        <a class="text-decoration-none m-2 text-secondary" href="{{route('login')}}">Login</a>
        <a class="text-decoration-none text-dark" href="{{route('login')}}">Register</a>
        @endguest
      </div>
    </div>
  </header>



  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      @foreach ($categories as $category)
         <a class="p-2 link-secondary text-decoration-none" href="{{$category->id}}">{{$category->name}}</a>
      @endforeach
    </nav>
  </div>
</div>

<main class="container">
@if (session('success'))
  <div class="alert alert-success">
      {{session('success')}}
  </div>  
@endif
@if (session('danger'))
  <div class="alert alert-danger">
    {{session('danger')}}
  </div>  
@endif

<div class="row mb-2">
    @yield('content')
</div>

</main>

<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
