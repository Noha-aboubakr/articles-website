<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Topic Listing Bootstrap 5 Template</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <link href="{{asset('publicassets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('publicassets/css/bootstrap-icons.css')}}" rel="stylesheet">

    <link href="{{asset('publicassets/css/templatemo-topic-listing.css')}}" rel="stylesheet">
    <!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->
</head>

<body id="top">

    <main>

        @include('public.includes.navbar')
        
        <section class="hero-section d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h1 class="text-white text-center"><i class="bi bi-exclamation-triangle"
                                style="font-size: 150px;"></i></h1>
                        <h6 class="text-center">404| page not found</h6>
                    </div>
                    <div class="col-12 text-center">
                        <a href="#" class="text-center fs-6 link mt-5">Back to Home Page ✈</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('public.includes.footer')
    @include('public.includes.footerjs')