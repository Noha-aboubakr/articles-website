@extends('admin.layouts.main')
@section('content')
       
    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">Unread Messages</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-borderless display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($contacts as $contact) 
                      @if(!$contact->is_read)
                        <tr>
                            <th scope="row">{{ $contact->created_at->format('d M Y') }}</th>
                            <td><a href="{{ route('message.show', $contact->id) }}" 
                              class="text-decoration-none text-dark">{{Str::limit($contact->message, 30, '...') }}</a></td>
                            <td>{{ $contact->name }}</td>
          
                            <td class="text-center">  
                                <form action="{{ route('message.destroy', $contact->id) }}" method="POST"  
                                 onclick="return confirm('Are you sure you want to delete this message?');">  
                                 @csrf  
                                 @method('DELETE')  
                                <button type="submit" class="bg-transparent border-0">  
                                 <img src="{{asset('adminassets/images//trash-can-svgrepo-com.svg')}}" class="text-decoration-none text-dark" alt="Delete">  
                                </button>  
                                </form>  
                              </td>
                          </tr>
                          @endif
                      @endforeach
      
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">Read Messages</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-borderless display" id="_table2">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($contacts as $contact) 
                      @if($contact->is_read)
                        <tr>
                            <th scope="row">{{ $contact->created_at->format('d M Y') }}</th>
                            <td><a href="{{ route('message.show', $contact->id) }}" 
                              class="text-decoration-none text-dark">{{Str::limit($contact->message, 30, $end = '...') }}</a></td>
                            <td>{{ $contact->name }}</td>
          
                            <td class="text-center">  
                                <form action="{{ route('message.destroy', $contact->id) }}" method="POST"  
                                 onclick="return confirm('Are you sure you want to delete this message?');">  
                                 @csrf  
                                 @method('DELETE')  
                                <button type="submit" class="bg-transparent border-0">  
                                 <img src="{{asset('adminassets/images//trash-can-svgrepo-com.svg')}}" class="text-decoration-none text-dark" alt="Delete">  
                                </button>  
                                </form>  
                              </td>
                          </tr>
                          @endif
                      @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection
  