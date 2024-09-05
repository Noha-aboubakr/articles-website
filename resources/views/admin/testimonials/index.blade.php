@include('admin.includes.head')
@include('admin.includes.header')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Testimonials</h2>
                <a href="{{ route('testimonials.create') }}" class="btn btn-link 
                 link-dark fw-semibold col-auto me-3">➕Add new testimonial</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Name</th>
                            <th scope="col">Content</th>
                            <th scope="col">Published</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($testimonials as $testimonial)
                        <tr>
                            <th scope="row">{{ $testimonial->created_at->format('d M Y') }}</th>
                            <td>{{ $testimonial['name']}}</td>
                            <td>{{ Str::limit($testimonial['content'], 20, $end = '...') }}</td>
                            <td>@if ($testimonial['published'] == 1) Yes @else No @endif </td>

                            {{-- <td class="text-center"><a class="text-decoration-none text-dark" href="edit_testimonial.html"><img src="assests/images/edit-svgrepo-com.svg"></a></td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="#"><img src="assests/images/trash-can-svgrepo-com.svg"></a></td> --}}
                        
                        <td class="text-center"><a class="text-decoration-none text-dark"
                            href={{ route('testimonials.edit', $testimonial['id']) }}>
                            <img src="{{ asset('adminassets/images/edit-svgrepo-com.svg') }}"></a></td>

                                <td class="text-center">  
                                  <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST"  
                                   onclick="return confirm('Are you sure you want to delete this topic?');">  
                                   @csrf  
                                   @method('DELETE')  
                                  <button type="submit" class="bg-transparent border-0">  
                                   <img src="{{ asset('adminassets/images/trash-can-svgrepo-com.svg') }}" class="text-decoration-none text-dark" alt="Delete">  
                                  </button>  
                                  </form>  
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.includes.footerjs')
   