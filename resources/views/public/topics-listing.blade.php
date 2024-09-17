@extends('public.layouts.main')
@section('head')

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Topic Listing Page</title>

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
                            <li class="breadcrumb-item active" aria-current="page">Topics Listing</li>
                        </ol>
                    </nav>
                            <h2 class="text-white">Topics Listing</h2>
                        </div>
                    </div>
                </div>
            </header>
@endsection

@section('content')
            {{-- popular topics --}}
            <section class="section-padding">  
                <div class="container">  
                    <div class="row">  
                        <div class="col-lg-12 col-12 text-center">  
                            <h3 class="mb-4">Popular Topics</h3>  
                        </div>  
                        <div class="col-lg-8 col-12 mt-3 mx-auto">  
                            @foreach($categories as $category)  
                                @if($category->topics->isNotEmpty())  
                                    @foreach ($category->topics as $topic)   
                                        <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">  
                                            <div class="d-flex">  
                                                <img src="{{ $topic->image ? asset('adminassets/images/topics/' . $topic->image) : asset('placeholder_image.jpg') }}"   
                                                     class="custom-block-image img-fluid"   
                                                     alt="">  
                                                <div class="custom-block-topics-listing-info d-flex">  
                                                    <div>  
                                                        <h5 class="mb-2">{{ $topic->topictitle }}</h5>  
                                                        <p class="mb-0">{{ Str::limit($topic->content, 50, '...') }}</p>  
                                                        <a href="{{ route('articles.topicsdetail', $topic->id) }}" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>  
                                                    </div>  
                                    
                                                    <span class="badge bg-design rounded-pill ms-auto">{{ $topic->views }}</span>  
                                                </div>  
                                            </div>  
                                        </div>  
                                        @endforeach
                                @endif  
                            @endforeach  
                        </div>   
          
                        {{-- pagination --}}
                    <div class="col-lg-12 col-12">  
                        <nav aria-label="Page navigation example">  
                            <ul class="pagination justify-content-center mb-0">  
                                <li class="page-item {{ $categories->onFirstPage() ? 'disabled' : '' }}">  
                                    <a class="page-link" href="{{ $categories->previousPageUrl() }}" aria-label="Previous">  
                                        <span aria-hidden="true">Prev</span>  
                                    </a>  
                                </li>  
                                @php  
                                    $currentPage = $categories->currentPage();  
                                    $lastPage = $categories->lastPage();  
                                    $start = max(1, $currentPage - 2); 
                                    $end = min($lastPage, $start + 4);  
                    
                                    if ($end - $start < 4) {  
                                        $start = max(1, $end - 4);  
                                    }  
                                @endphp  
                    
                                @for ($i = $start; $i <= $end; $i++)  
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">  
                                        <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a>  
                                    </li>  
                                @endfor  
                    
                                <li class="page-item {{ $categories->hasMorePages() ? '' : 'disabled' }}">  
                                    <a class="page-link" href="{{ $categories->nextPageUrl() }}" aria-label="Next">  
                                        <span aria-hidden="true">Next</span>  
                                    </a>  
                                </li>  
                            </ul>  
                        </nav>  
                    </div> 
                </div> 
            </section>  

            {{-- Trending --}}
            <section class="section-padding section-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <h3 class="mb-4">Trending Topics</h3>
                        </div>
                        @foreach ($topics as $topic)
                        <div class="col-lg-6 col-md-6 col-12 mt-3 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="{{ route('articles.topicsdetail', $topic->id) }}">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">{{ $topic->topictitle }}</h5>

                                            <p class="mb-0">{{ Str::limit($topic->content, 30) }}</p>
                                        </div>

                                        <span class="badge bg-finance rounded-pill ms-auto">{{ $topic->views }}</span>
                                    </div>

                                    <img src="{{asset('adminassets/images/topics/' . $topic->image) }}" class="custom-block-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach 
                    </div>
                </div>
            </section>
@endsection
