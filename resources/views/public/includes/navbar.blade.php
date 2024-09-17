<main>
    <nav class="navbar navbar-expand-lg">  
        <div class="container">  
            <a class="navbar-brand" href="{{ route('articles.index') }}">  
                <i class="bi-back"></i>  
                <span>Topic</span>  
            </a>  

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">  
                <span class="navbar-toggler-icon"></span>  
            </button>  

            <div class="collapse navbar-collapse" id="navbarNav">  
                <ul class="navbar-nav ms-lg-5 me-lg-auto">  
                    <li class="nav-item">  
                        <a class="nav-link {{ request()->routeIs('articles.index') ? 'active' : '' }}"   
                            href="{{ route('articles.index') }}">Home</a>  
                    </li>  

                    <li class="nav-item">  
                        <a class="nav-link {{ request()->routeIs('articles.topicslisting') ? 'active' : '' }}"   
                            href="{{ route('articles.topicslisting') }}">Topics Listing</a>   
                    </li>  

                    <li class="nav-item">  
                        <a class="nav-link {{ request()->routeIs('articles.contact') ? 'active' : '' }}"   
                            href="{{ route('articles.contact') }}">Contact Us</a>   
                    </li>  

                    <li class="nav-item">  
                        <a class="nav-link {{ request()->routeIs('articles.testimonials') ? 'active' : '' }}"   
                            href="{{ route('articles.testimonials') }}">Our Client Says</a>   
                    </li>  
                </ul>  

                <div class="d-none d-lg-block">  
                    <a href="{{ route('register') }}" class="navbar-icon bi-person smoothscroll"></a>  
                </div>  
            </div>  
        </div>  
    </nav>
</main>
