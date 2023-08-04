<div class="container-fluid py-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Featured</h3>
            <a href="{{route('all-news',['data_from'=>'feature'])}}" class="text-secondary font-weight-medium text-decoration-none" >View All</a>
        </div>
        <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
            @foreach ($featured_news as $featured)
            <div class="position-relative overflow-hidden" style="height: 300px;">
                <img class="img-fluid w-100 h-100" src="{{asset('storage/app/public/news')}}/{{$featured->news['thumbnail']}}" style="object-fit: cover;">
                <div class="overlay">
                    <div class="mb-1" style="font-size: 13px;">
                        <a href="{{route('all-news',['data_from'=>'category','id'=>$featured->news->category['id']])}}" class="text-white">{{$featured->news->category->name}}</a>
                        <span class="px-1 text-white">/</span>
                        <a class="text-white" href="">{{date('M d, Y',$featured->news->created_at)}}</a>
                    </div>
                    <a  href="{{route('details',['id'=>$news->id])}}" class="h4 m-0 text-white" >{{$featured->news->title}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
