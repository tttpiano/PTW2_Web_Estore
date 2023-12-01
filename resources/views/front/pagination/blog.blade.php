<div class="row abc">
    @foreach($posts as $post)
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="blog__item" style="height: 590px;">
            @if ($post->image_post)
            <div class="blog__item__pic">
                <img src="{{ asset('storage/img/' . $post->image_post) }}" width="400" height="300" alt="">
            </div>
            @else
            <div class="blog__item__pic">
                <img src="{{ asset('storage/img/error.jpg')}}" alt="">
            </div>
            @endif
            <div class="blog__item__text">
                <ul>
                    <li><i class="fa fa-calendar-o"></i>{{$post->formattedCreatedAt}}</li>
                </ul>
                <h5 style="white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;"><a href="{{route('posts.show', $post->url_seo)}}">
                        {{$post->title}} </a></h5>
                <p style="white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;">{{ \Illuminate\Support\Str::limit($post->description, 50) }}</p>
                <a href="{{route('posts.show', $post->url_seo)}}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
            </div>
        </div>
    </div>
    @endforeach
    {{$posts->links('pagination::bootstrap-4')}}
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    const describeSection = document.querySelector(".abc");
    const scrollToPosition = describeSection.getBoundingClientRect().top + window.pageYOffset - 300;
    window.scrollTo({
        top: scrollToPosition,
        behavior: "smooth"
    });
});
</script>
