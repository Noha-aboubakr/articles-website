@include('admin.includes.head')

<body>
    <header>
        <div class="p-3 text-center bg-white border-bottom welcome-section">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-md-3 d-flex justify-content-center justify-content-md-start mb-3 mb-md-0">
                <a href="#" class="navbar-brand fs-2 fw-bold">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
                    <path fill="currentColor"
                      d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                  </svg>
    
                  <span>Topic</span>
                </a>
              </div>
              <div class="col-md-3 d-flex justify-content-center justify-content-md-end align-items-center">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown dropdown-center user-dropdown">
                    <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="true">
                      <img class="img-xs rounded-circle" src="{{asset('adminassets/images/avatar-default.svg')}}" alt="Profile image" />
                    </a>
                    <div class="dropdown-menu dropdown-center navbar-dropdown" aria-labelledby="UserDropdown">
                      <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="{{asset('adminassets/images/avatar-default.svg')}}" alt="Profile image"
                          width="80" height="80" />
                        <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                        <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                      </div>
                      <a class="dropdown-item">My Profile</a>
                      <a class="dropdown-item">Sign Out</a>
                      <p class="footer" style="padding-top: 15px; font-size: 9px; text-align: center">
                        Privacy Policy . Terms . Cookies
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    
        @include('admin.includes.navbar')
      </header>

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Categories</h2>
                <a href="{{route('categories.create')}}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new category</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->created_at->format('d M Y') }}</th>
                            <td>{{$category['categoryname']}}</td>

                            <td class="text-center">
                              <a class="text-decoration-none text-dark" href="{{ route('categories.edit', $category->id) }}">
                                  <img src="{{ asset('adminassets/images/edit-svgrepo-com.svg') }}" alt="Edit">
                              </a>
                          </td>
                          
                          <td class="text-center">
                              <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onclick="return confirm('Are you sure you want to delete this category?');">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-link text-decoration-none text-dark" style="background: none; border: none; padding: 0;">
                                      <img src="{{ asset('adminassets/images/trash-can-svgrepo-com.svg') }}" alt="Delete" style="vertical-align: middle;">
                                  </button>
                              </form>
                          </td>
                          
                        
                      </td>  
                      @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
   @include('admin.includes.footerjs')