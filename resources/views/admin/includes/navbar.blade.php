
<nav class="navbar navbar-expand-md bg-white border-bottom">
    <div class="container justify-content-md-center">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              USERS
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('users.create')}}">Add user</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item" href="{{route('users.index')}}">All users</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              TOPICS
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('topics.create')}}">Add topic</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item" href="{{route('topics.index')}}">All topics</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              CATEGORIES
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('categories.create')}}">Add category</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item" href="{{route('categories.index')}}">All categories</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              TESTIMONIALS
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('testimonials.create')}}">Add testimonial</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item" href="{{route('testimonials.index')}}">All testimonials</a></li>
            </ul>
          </li>
          {{-- <li><a class="nav-item nav-link" href="{{route('contacts.messages')}}">MESSAGES</a></li> --}}
        </ul>
      </div>
    </div>
  </nav>