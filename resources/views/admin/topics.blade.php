<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')

<body>
@include('admin.includes.header')
    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Topics</h2>
                <a href="{{route('admin.topics.create')}}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new topic</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Content</th>
                            <th scope="col">No. of views</th>
                            <th scope="col">Published</th>
                            <th scope="col">Trending</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($topics as $topic)
                        <tr>
                            <th scope="row">{{date('d M Y', strtotime($topic['created_at']))}}</th>
                            <td><a class="text-decoration-none text-dark" href="{{route('admin.topics.details', $topic['id'])}}">{{$topic['topicTitle']}}</a>
                            </td>
                            <td>{{$topic->category->categoryName}}</td>
                            <td>{{Str::limit($topic['content'],20)}}</td>
                            <td>{{$topic['views']}}</td>
                            <td>{{$topic['published'] ? 'YES' : 'NO'}}</td>
                            <td>{{$topic['trending'] ? 'YES' : 'NO'}}</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="{{route('admin.topics.edit', $topic['id'])}}"><img src="{{asset('admin/assets/images/edit-svgrepo-com.svg')}}"></a></td>
                            <td class="text-center"><a class="text-decoration-none text-dark">
                                <form action="{{route('admin.topics.destroy', $topic->id)}}" method="POST" method="POST" onclick="return confirm('Are you sure you want to delete?')">
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