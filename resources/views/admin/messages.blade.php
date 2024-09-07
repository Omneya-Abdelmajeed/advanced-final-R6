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
                        <tr>
                            <th scope="row">18 Jul 2024</th>
                            <td><a href="message_details.html" class="text-decoration-none text-dark">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis possimus distinctio amet in explicabo ea perspiciatis, sit, modi quasi illo...</a></td>
                            <td>Jhon Doe</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="#"><img src="{{asset('admin/assets/images/trash-can-svgrepo-com.svg')}}"></a></td>
                        </tr>
                        <tr>
                            <th scope="row">18 Jul 2024</th>
                            <td><a href="message_details.html" class="text-decoration-none text-dark">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis possimus distinctio amet in explicabo ea perspiciatis, sit, modi quasi illo...</a></td>
                            <td>Jhon Doe</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="#"><img src="{{asset('admin/assets/images/trash-can-svgrepo-com.svg')}}"></a></td>
                        </tr>
                        <tr>
                            <th scope="row">18 Jul 2024</th>
                            <td><a href="message_details.html" class="text-decoration-none text-dark">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis possimus distinctio amet in explicabo ea perspiciatis, sit, modi quasi illo...</a></td>
                            <td>Jhon Doe</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="#"><img src="{{asset('admin/assets/images/trash-can-svgrepo-com.svg')}}"></a></td>
                        </tr>
                        <tr>
                            <th scope="row">18 Jul 2024</th>
                            <td><a href="message_details.html" class="text-decoration-none text-dark">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis possimus distinctio amet in explicabo ea perspiciatis, sit, modi quasi illo...</a></td>
                            <td>Jhon Doe</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="#"><img src="{{asset('admin/assets/images/trash-can-svgrepo-com.svg')}}"></a></td>
                        </tr>
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
                        <tr>
                            <th scope="row">18 Jul 2024</th>
                            <td><a href="message_details.html" class="text-decoration-none text-dark">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis possimus distinctio amet in explicabo ea perspiciatis, sit, modi quasi illo...</a></td>
                            <td>Jhon Doe</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="#"><img src="{{asset('admin/assets/images/trash-can-svgrepo-com.svg')}}"></a></td>
                        </tr>
                        <tr>
                            <th scope="row">18 Jul 2024</th>
                            <td><a href="message_details.html" class="text-decoration-none text-dark">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis possimus distinctio amet in explicabo ea perspiciatis, sit, modi quasi illo...</a></td>
                            <td>Jhon Doe</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="#"><img src="{{asset('admin/assets/images/trash-can-svgrepo-com.svg')}}"></a></td>
                        </tr>
                        <tr>
                            <th scope="row">18 Jul 2024</th>
                            <td><a href="message_details.html" class="text-decoration-none text-dark">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis possimus distinctio amet in explicabo ea perspiciatis, sit, modi quasi illo...</a></td>
                            <td>Jhon Doe</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="#"><img src="{{asset('admin/assets/images/trash-can-svgrepo-com.svg')}}"></a></td>
                        </tr>
                        <tr>
                            <th scope="row">18 Jul 2024</th>
                            <td><a href="message_details.html" class="text-decoration-none text-dark">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis possimus distinctio amet in explicabo ea perspiciatis, sit, modi quasi illo...</a></td>
                            <td>Jhon Doe</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="#"><img src="{{asset('admin/assets/images/trash-can-svgrepo-com.svg')}}"></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.includes.footerJs')
</body>

</html>