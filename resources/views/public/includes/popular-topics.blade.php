<section class="section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">
                <h3 class="mb-4">Popular Topics</h3>
            </div>

            @foreach($topics as $topic)
            <div class="col-lg-8 col-12 mt-3 mx-auto">
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                    <div class="d-flex">
                        <img src="{{asset('assets/images/topics/' . $topic['image'])}}" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block-topics-listing-info d-flex">
                            <div>
                                <h5 class="mb-2">{{ $topic['topicTitle'] }}</h5>

                                <p class="mb-0">{!! Str::limit($topic['content'], 50, '.') !!}</p>

                                <a href="{{route('detail', $topic->id)}}" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                            </div>

                            <span class="badge bg-design rounded-pill ms-auto">{{$topic['views']}}</span>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

            <div class="col-lg-12 col-12">
                <nav aria-label="Page navigation example">
                    {{ $topics->links('pagination::bootstrap-5') }}
                </nav>
            </div>

        </div>
    </div>
</section>