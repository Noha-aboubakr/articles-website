<section class="featured-section">  
    <div class="container">  
        <div class="row justify-content-center">  
            @foreach($topics as $topic)  
            <div class="col-lg-4 col-12 mb-4 mb-lg-0">  
                <div class="custom-block bg-white shadow-lg">  
                    <a href="{{ route('articles.topicsdetail', $topic->id) }}">  
                        <div class="d-flex"> 
                            <div>  
                                <h5 class="mb-2">{{ $topic->topictitle }}</h5>  
                                <p class="mb-0">{{ Str::limit($topic->content, 50, '...') }}</p>  
                            </div>  
                            <span class="badge bg-design rounded-pill ms-auto"> {{ $topic->views }} </span>  
                        </div>  
                        <img src="{{ asset('adminassets/images/topics/' . $topic->image) }}"  
                             class="custom-block-image img-fluid" alt="{{ $topic->topictitle }}">  
                    </a> 
                </div>  
            </div>  
            @endforeach 
        </div>  
    </div>  
</section>