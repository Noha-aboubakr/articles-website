@include('admin.includes.head')
@include('admin.includes.header')
  
<div class="container my-5">  
  <div class="mx-2">  
      <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Topic</h2>  
      <form action="{{ route('topics.update', $topic->id) }}" method="POST" enctype="multipart/form-data">
          @csrf  
          @method('PUT')  
          <div class="form-group mb-3 row">  
              <label for="topictitle" class="form-label col-md-2 fw-bold text-md-end">Topic Title:</label>  
              <div class="col-md-10">  
                  <input type="text" name="topictitle" id="topictitle" placeholder="e.g. Design Patterns" class="form-control py-2" 
                         value="{{ old('topictitle', $topic->topictitle) }}"/>  
                         @error('topictitle')
                         <div class="alert alert-warning">{{ $message }}</div>
                     @enderror
              </div>  
          </div>  
          <div class="form-group mb-3 row">  
            <label for="" class="form-label col-md-2 fw-bold text-md-end">Category:</label>
            <div class="col-md-10">
              <select name="category_id" id="" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" @selected($category->id == $topic->category_id)>  
                    {{$category->category_name }} </option>
                @endforeach
              </select>
              @error('category')
                <div class="alert alert-warning">{{$message}}</div>
              @enderror
              </div>  
          </div>  
          <div class="form-group mb-3 row">  
              <label for="content" class="form-label col-md-2 fw-bold text-md-end">Content:</label>  
              <div class="col-md-10">  
                  <textarea name="content" id="content" rows="5" class="form-control">{{ old('content', $topic->content) }}</textarea>  
                  @error('content')
                  <div class="alert alert-warning">{{$message}}</div>
                @enderror
              </div>  
          </div>  
          <div class="form-group mb-3 row">  
              <label for="trending" class="form-label col-md-2 fw-bold text-md-end">Trending:</label>  
              <div class="col-md-10">  
                  <input type="checkbox" name="trending" id="trending" class="form-check-input" style="padding: 0.7rem;"  @checked(old('trending', $topic->trending)) />  
                </div>  
          </div>  
          <div class="form-group mb-3 row">  
              <label for="published" class="form-label col-md-2 fw-bold text-md-end">Published:</label>  
              <div class="col-md-10">  
                  <input type="checkbox" name="published" id="published" class="form-check-input" style="padding: 0.7rem;"  @checked(old('published', $topic->published)) />  
              </div>  
          </div>  
          <hr>  
         <div class="form-group mb-3 row">  
    <label for="image" class="form-label col-md-2 fw-bold text-md-end">Image:</label>  
    @if($topic->image)  
    <div class="col-md-10">  
        <input type="file" name="image" class="form-control" style="padding: 0.7rem; margin-bottom: 10px;" />  
            <img src="{{asset('adminassets/images/topics/' . $topic->image) }}" alt="{{ $topic->topictitle }}" style="width: 10rem;">  
            @endif 
        @error('image')  
            <div class="alert alert-warning">{{ $message }}</div>  
        @enderror  
    </div>  
    </div>
    </div>  
    </div>  
          <div class="text-md-end">  
              <button type="submit" class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">  
                  Edit Topic  
              </button>  
          </div>  
      </form>  
  </div>  
</div>

  @include('admin.includes.footerjs')

