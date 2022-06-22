<div class="news d-flex flex-wrap">
    @foreach($posts as $post)
        <div class="news-block">
            <div class="news-img">
                <a href="{{route('news.show', $post->id)}}">
                    <img src="{{asset(sprintf('news_images/%s', is_null($post->image_preview) ? 'image.png' : $post->image_preview))}}">
                </a>
            </div>
            <div class="news-info d-flex align-items-center justify-content-between">
                <div class="clock">
                    <span class="date-act">{{$post->date}}</span>
                </div>
                <div class="views">
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.0826197 6.24694C0.198757 6.08807 2.96591 2.35693 6.50006 2.35693C10.0342 2.35693 12.8015 6.08807 12.9175 6.24679C13.0275 6.3975 13.0275 6.60193 12.9175 6.75264C12.8015 6.91151 10.0342 10.6426 6.50006 10.6426C2.96591 10.6426 0.198757 6.91149 0.0826197 6.75277C-0.0275249 6.60208 -0.0275249 6.3975 0.0826197 6.24694ZM6.50006 9.78551C9.10334 9.78551 11.3581 7.30908 12.0255 6.4995C11.3589 5.68921 9.10893 3.21407 6.50006 3.21407C3.89691 3.21407 1.64234 5.69007 0.97462 6.50008C1.6412 7.31035 3.8912 9.78551 6.50006 9.78551Z" fill="black" fill-opacity="0.3"></path>
                        <path d="M6.49985 3.92871C7.91772 3.92871 9.07129 5.08229 9.07129 6.50015C9.07129 7.91802 7.91772 9.07159 6.49985 9.07159C5.08198 9.07159 3.92841 7.91802 3.92841 6.50015C3.92841 5.08229 5.08198 3.92871 6.49985 3.92871ZM6.49985 8.21443C7.44514 8.21443 8.21413 7.44542 8.21413 6.50015C8.21413 5.55488 7.44512 4.78587 6.49985 4.78587C5.55458 4.78587 4.78557 5.55488 4.78557 6.50015C4.78557 7.44542 5.55456 8.21443 6.49985 8.21443Z" fill="black" fill-opacity="0.3"></path>
                    </svg>
                    <span>{{$post->views}}</span>
                </div>
            </div>
            <div class="news-text">
                <p class="d-flex align-items-center">{{$post->name}}</p>
                <p class="text">{{Str::limit($post->text, $limit = 70, $end = '...')}}</p>
                <a href="{{route('news.show', $post->id)}}">More</a>
            </div>
        </div>
    @endforeach
</div>
