@include('admin.includes.head')
@include('admin.includes.header')

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
                            <td>{{$category['category_name']}}</td>

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