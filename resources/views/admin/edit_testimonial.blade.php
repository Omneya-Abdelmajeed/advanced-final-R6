<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')

<body>
  @include('admin.includes.header')
  
  <div class="container my-5">
    <div class="mx-2">
      <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Testimonial</h2>
      <form action="{{route('admin.testimonials.update', $testimonial->id)}}" method="POST" enctype="multipart/form-data" class="px-md-5">
        @csrf
        @method('put')
        <div class="form-group mb-3 row">
          <label for="categoryName" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
          <div class="col-md-10">
            <input type="text" placeholder="e.g. Jhon Doe" class="form-control py-2" name="name" value="{{old('name', $testimonial['name'])}}"/>
            @error('name')
              <div class="alert alert-warning">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="content" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
          <div class="col-md-10">
            <textarea name="content" id="content" rows="5" class="form-control">{{old('content', $testimonial['content'])}}</textarea>
            @error('content')
              <div class="alert alert-warning">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="published" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
          <div class="col-md-10">
            <input type="hidden" name="published" value="0">
            <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="published" value="1"  @checked(old('published', $testimonial->published))/>
          </div>
        </div>
        <hr>
        <div class="form-group mb-3 row">
          <label for="image" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
          <div class="col-md-10">
            <input type="file" class="form-control" style="padding: 0.7rem; margin-bottom: 10px;" name="image"/>

            @if($testimonial['image'])
              <div class="mb-3">
                <img src="{{asset('assets/images/testimonials/' . $testimonial['image'])}}" alt="Testimonial_img" style="width: 10rem;">
              </div>
            @endif

            @error('image')
              <div class="alert alert-warning">{{$message}}</div>
            @enderror

          </div>
        </div>
        <div class="text-md-end">
          <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            Edit Testimonial
          </button>
        </div>
      </form>
    </div>
  </div>
  </main>
  @include('admin.includes.footerJs')
</body>

</html>