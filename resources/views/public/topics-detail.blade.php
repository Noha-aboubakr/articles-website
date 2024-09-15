<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Topic Detail Page</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
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
       @include('public.includes.topicsdetailheader')

            <section class="topics-detail-section section-padding" id="topics-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12 m-auto">
                            <h3 class="mb-4">{{ $topic->topictitle }}</h3>
                            <p>{{ $topic->content }}</p>
                        </div>
                    </div>
                </div>
            </section>


            <section class="section-padding section-bg">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-5 col-12">
                            <img src="{{ asset('publicassets/images/rear-view-young-college-student.jpg') }}" class="newsletter-image img-fluid" alt="">
                        </div>

                        <div class="col-lg-5 col-12 subscribe-form-wrap d-flex justify-content-center align-items-center">
                            <form class="custom-form subscribe-form" action="#" method="post" role="form">
                                <h4 class="mb-4 pb-2">Get Newsletter</h4>

                                <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address" required="">

                                <div class="col-lg-12 col-12">
                                    <button type="submit" class="form-control">Subscribe</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </main>
		
        @include('public.includes.footer')
        @include('public.includes.footerjs')