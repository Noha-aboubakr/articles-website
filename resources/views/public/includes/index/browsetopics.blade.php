<section class="explore-section section-padding" id="section_2">  
    <div class="container">  
        <div class="row">  
            <div class="col-12 text-center">  
                <h2 class="mb-4">Browse Topics</h2> 
            </div>  
        </div>  
    </div>  

    <div class="container-fluid">  
        <div class="row">  
            <ul class="nav nav-tabs" id="myTab" role="tablist">  
                @foreach($categories as $category)  
                <li class="nav-item" role="presentation">  
                    <button class="nav-link {{$loop->first ? 'active' : ''}}" id="tab-{{$category->id}}-tab" data-bs-toggle="tab"  
                        data-bs-target="#tab-{{$category->id}}" type="button" role="tab"  
                        aria-controls="tab-{{$category->id}}" aria-selected="{{$loop->first ? 'true' : 'false'}}">  
                        {{$category->category_name}}  
                    </button>   
                </li>  
                @endforeach  
            </ul>  
        </div>  
    </div>  

    <div class="container">  
        <div class="row">  
            <div class="col-12">  
                <div class="tab-content" id="myTabContent">  
                    @foreach($categories as $category)  
                    <div class="tab-pane fade {{$loop->first ? 'show active' : ''}}" id="tab-{{$category->id}}" role="tabpanel"  
                        aria-labelledby="tab-{{$category->id}}-tab" tabindex="0">  
                       
                        <div class="row">  
                            @foreach($category->topics as $topic)  
                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">  
                                <div class="custom-block bg-white shadow-lg">  
                                    <a href="{{ route('articles.topicsdetail', $topic->id) }}">  
                                        <div class="d-flex">  
                                            <div>  
                                                <h5 class="mb-2">{{$topic->topictitle}}</h5>  
                                                <p class="mb-0">{{$topic->content}}</p>  
                                            </div>  
                                            <span class="badge bg-design rounded-pill ms-auto">{{$topic->views}}</span>  
                                        </div>  
                                        <img src="{{ asset('adminassets/images/topics/'. $topic->image) }}"  
                                            class="custom-block-image img-fluid" alt="{{ $topic->topictitle }}">  
                                    </a>  
                                </div>  
                            </div>  
                            @endforeach   
                        </div>  
                    </div>  
                    @endforeach  
                </div>  
            </div>  
        </div>  
    </div>  
</section>
                         
</main>