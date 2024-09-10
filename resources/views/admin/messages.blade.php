<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')

<body>
  @include('admin.includes.header')
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
                        @foreach($unreadMessages as $unreadMessage)
                        <tr>
                            <th scope="row">{{date('d M Y', strtotime($unreadMessage['created_at']))}}</th>
                            <td><a href="{{ route('admin.message.details', $unreadMessage->id) }}" class="text-decoration-none text-dark">{{Str::limit($unreadMessage['message'], 20)}}</a></td>
                            <td>{{$unreadMessage['name']}}</td>
                            <td class="text-center"><a class="text-decoration-none text-dark">
                                <form action="{{route('admin.message.destroy', $unreadMessage->id)}}" method="POST" method="POST" onclick="return confirm('Are you sure you want to delete?')">
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
                    @foreach($readMessages as $readMessage)
                        <tr>
                            <th scope="row">{{date('d M Y', strtotime($readMessage['created_at']))}}</th>
                            <td><a href="{{ route('admin.message.details', $readMessage->id) }}" class="text-decoration-none text-dark">{{Str::limit($readMessage['message'],20)}}</a></td>
                            <td>{{$readMessage['name']}}</td>
                            <td class="text-center"><a class="text-decoration-none text-dark">
                                <form action="{{route('admin.message.destroy', $readMessage->id)}}" method="POST" method="POST" onclick="return confirm('Are you sure you want to delete?')">
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