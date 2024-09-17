@extends('public.layouts.main')
@section('head')

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Topic Listing Contact Page</title>

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
    <body class="topics-listing-page" id="top">
@endsection

@section('header')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-12">
                 <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Homepage</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                    </ol>
                    </nav>
                    <h2 class="text-white">Testimonials</h2>
                        </div>
                    </div>
                </div>
            </header>
@endsection    

@section('content')    
     @include('public.includes.testimonials')
@endsection

        