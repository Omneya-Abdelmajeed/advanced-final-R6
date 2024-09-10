<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')

<body>
@include('admin.includes.header')
    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Categories</h2>
                <a href="{{route('admin.categories.create')}}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new category</a>
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
                                <th scope="row">{{date('d M Y', strtotime($category['created_at']))}}</th>
                                <td>{{$category['categoryName']}}</td>
                                <td class="text-center"><a class="text-decoration-none text-dark" href="{{route('admin.categories.edit', $category['id'])}}"><img src="{{asset('admin/assets/images/edit-svgrepo-com.svg')}}"></a></td>
                                <td class="text-center"><a class="text-decoration-none text-dark">
                                    <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST" method="POST" onclick="return confirm('Are you sure you want to delete?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-link m-0 p-0"><img src="{{asset('admin/assets/images/trash-can-svgrepo-com.svg')}}"></button> 
                                    </form></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.includes.footerJs')
</body>

</html>