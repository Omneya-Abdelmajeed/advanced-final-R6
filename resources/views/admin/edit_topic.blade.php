<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')

<body>
  @include('admin.includes.header')
  
  <div class="container my-5">
    <div class="mx-2">
      <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Topic</h2>
      <form action="{{route('admin.topics.update', $topic->id)}}" method="POST" enctype="multipart/form-data" class="px-md-5">
        @csrf
        @method('put')
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Topic Title:</label>
          <div class="col-md-10">
            <input type="text" placeholder="e.g. Design Patterns" class="form-control py-2" name="topicTitle" value="{{old('topicTitle', $topic['topicTitle'])}}"/>
            @error('topicTitle')
              <div class="alert alert-warning">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Category:</label>
          <div class="col-md-10">
            <select name="category_id" id="category_id" class="form-control py-1">
              <option value="">Select Category</option>
              @foreach($categories as $category)
              <option value="{{$category->id}}" @selected(old('category_id', $topic->category_id) == $category->id)>{{$category->categoryName}}</option>
              @endforeach
            </select>
            @error('category_id')
              <div class="alert alert-warning">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="content" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
          <div class="col-md-10">
            <textarea name="content" id="content" rows="5" class="form-control">{{old('content', $topic['content'])}}</textarea>
            @error('content')
              <div class="alert alert-warning">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Trending:</label>
          <div class="col-md-10">
          <input type="hidden" name="trending" value="0"> 
            <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="trending" value="1"  @checked(old('trending', $topic->trending))/>
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
          <div class="col-md-10">
            <input type="hidden" name="published" value="0"> 
            <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="published" value="1"  @checked(old('published', $topic->published))/>
          </div>
        </div>
        <hr>
        <div class="form-group mb-3 row">
          <label for="image" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
          <div class="col-md-10">
            <input type="file" class="form-control" style="padding: 0.7rem; margin-bottom: 10px;" name="image"/>

            @if($topic['image'])
              <div class="mb-3">
                <img src="{{asset('assets/images/topics/' . $topic['image'])}}" alt="article_image" style="width: 10rem;">
              </div>
            @endif
            
            @error('image')
                <div class="alert alert-warning">{{$message}}</div>
            @enderror

          </div>
        </div>
        <div class="text-md-end">
          <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            Edit Topic
          </button>
        </div>
      </form>
    </div>
  </div>
  </main>
  @include('admin.includes.footerJs')
</body>

</html>