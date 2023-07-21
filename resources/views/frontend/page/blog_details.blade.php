@extends('frontend.front_master')

@section('content')
 <section class="standard__blog blog__details">
  <div class="container">
   <div class="row">

    <div class="col-lg-8">
     <div class="standard__blog__post">
      <div class="standard__blog__thumb">
       <img src="{{ asset($blog->image) }}" alt="">
      </div>
      <div class="blog__details__content services__details__content">
       <ul class="blog__post__meta">
        <li><i class="fal fa-calendar-alt"></i>

         {{ Carbon\Carbon::parse($blog->updated_at)->diffForHumans() }}
        </li>
        {{-- Commments --}}
        {{-- <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>

        <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li> --}}
        {{-- Comments End --}}
       </ul>
       <h2 class="title">{{ $blog->title }}</h2>
       <p>{!! $blog->description !!}</p>

      </div>
      <div class="blog__details__bottom">
       <ul class="blog__details__tag">
        <li class="title">Tag:</li>

        @php
         $tags = explode(',', $blog->tags);

         $dataString = $blog->tags;

         // Split the string into an array using the comma as a delimiter
         $dataArray = explode(',', $dataString);
        @endphp
        @foreach ($dataArray as $data)
         <li class="tags-list">
          <a href="#">{{ $data }}
          </a>
         </li>
        @endforeach
       </ul>

       <ul class="blog__details__social">
        <li class="title">Share :</li>
        <li class="social-icons">
         <a href="#"><i class="fab fa-facebook"></i></a>
         <a href="#"><i class="fab fa-twitter-square"></i></a>
         <a href="#"><i class="fab fa-linkedin"></i></a>
         <a href="#"><i class="fab fa-pinterest"></i></a>
        </li>
       </ul>
      </div>

      <div class="blog__next__prev">
       <div class="row justify-content-between">
        <div class="col-xl-5 col-md-6">
         <div class="blog__next__prev__item">
          <h4 class="title">Previous Post</h4>
          <div class="blog__next__prev__post">
           <div class="blog__next__prev__thumb">
            <a href="blog-details.html"><img src="assets/img/blog/blog_prev.jpg" alt=""></a>
           </div>
           <div class="blog__next__prev__content">
            <h5 class="title"><a href="blog-details.html">Digital Marketing Agency Pricing Guide.</a></h5>
           </div>
          </div>
         </div>
        </div>
        <div class="col-xl-5 col-md-6">
         <div class="blog__next__prev__item next_post text-end">
          <h4 class="title">Next Post</h4>
          <div class="blog__next__prev__post">
           <div class="blog__next__prev__thumb">
            <a href="blog-details.html"><img src="assets/img/blog/blog_next.jpg" alt=""></a>
           </div>
           <div class="blog__next__prev__content">
            <h5 class="title"><a href="blog-details.html">App Prototyping
              Types, Example & Usages.</a></h5>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>

      <div class="comment comment__wrap">
       <div class="comment__title">
        <h4 class="title">(04) Comment</h4>
       </div>
       <ul class="comment__list">
        <li class="comment__item">
         <div class="comment__thumb">
          <img src="assets/img/blog/comment_thumb01.png" alt="">
         </div>
         <div class="comment__content">
          <div class="comment__avatar__info">
           <div class="info">
            <h4 class="title">Rohan De Spond</h4>
            <span class="date">25 january 2021</span>
           </div>
           <a href="#" class="reply"><i class="far fa-reply-all"></i></a>
          </div>
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many
           variations of passages of Lorem Ipsum available, but the majority have</p>
         </div>
        </li>
        <li class="comment__item children">
         <div class="comment__thumb">
          <img src="assets/img/blog/comment_thumb02.png" alt="">
         </div>
         <div class="comment__content">
          <div class="comment__avatar__info">
           <div class="info">
            <h4 class="title">Johan Ritaxon</h4>
            <span class="date">25 january 2021</span>
           </div>
           <a href="#" class="reply"><i class="far fa-reply-all"></i></a>
          </div>
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many
           variations of passages</p>
         </div>
        </li>
        <li class="comment__item">
         <div class="comment__thumb">
          <img src="assets/img/blog/comment_thumb03.png" alt="">
         </div>
         <div class="comment__content">
          <div class="comment__avatar__info">
           <div class="info">
            <h4 class="title">Alexardy Ditartina</h4>
            <span class="date">25 january 2021</span>
           </div>
           <a href="#" class="reply"><i class="far fa-reply-all"></i></a>
          </div>
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many
           variations of passages of Lorem Ipsum available, but the majority have</p>
         </div>
        </li>
        <li class="comment__item children">
         <div class="comment__thumb">
          <img src="assets/img/blog/comment_thumb04.png" alt="">
         </div>
         <div class="comment__content">
          <div class="comment__avatar__info">
           <div class="info">
            <h4 class="title">Rashedul islam Kabir</h4>
            <span class="date">25 january 2021</span>
           </div>
           <a href="#" class="reply"><i class="far fa-reply-all"></i></a>
          </div>
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many
           variations of passages</p>
         </div>
        </li>
       </ul>
      </div>

      <div class="comment__form">
       <div class="comment__title">
        <h4 class="title">Write your comment</h4>
       </div>
       <form action="#">
        <div class="row">
         <div class="col-md-6">
          <input type="text" placeholder="Enter your name*">
         </div>
         <div class="col-md-6">
          <input type="email" placeholder="Enter your mail*">
         </div>
         <div class="col-md-6">
          <input type="text" placeholder="Enter your number*">
         </div>
         <div class="col-md-6">
          <input type="text" placeholder="Website*">
         </div>
        </div>
        <textarea name="message" id="message" placeholder="Enter your Massage*"></textarea>
        <div class="form-grp checkbox-grp">
         <input type="checkbox" id="checkbox">
         <label for="checkbox">Save my name, email, and website in this browser for the next time I comment.</label>
        </div>
        <button type="submit" class="btn">post a comment</button>
       </form>
      </div>
     </div>
    </div>
    {{-- Blog Sidebar --}}
    <div class="col-lg-4">
     <aside class="blog__sidebar">
      <div class="widget">
       <form action="#" class="search-form">
        <input type="text" placeholder="Search">
        <button type="submit"><i class="fal fa-search"></i></button>
       </form>
      </div>
      <div class="widget">
       <h4 class="widget-title">Recent Blog</h4>
       <ul class="rc__post">
        <li class="rc__post__item">
         <div class="rc__post__thumb">
          <a href="blog-details.html"><img src="assets/img/blog/rc_thumb01.jpg" alt=""></a>
         </div>
         <div class="rc__post__content">
          <h5 class="title"><a href="blog-details.html">Best website traffick booster with
            great tools.</a></h5>
          <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
         </div>
        </li>
        <li class="rc__post__item">
         <div class="rc__post__thumb">
          <a href="blog-details.html"><img src="assets/img/blog/rc_thumb02.jpg" alt=""></a>
         </div>
         <div class="rc__post__content">
          <h5 class="title"><a href="blog-details.html">How to become a best sale marketer
            in a year!</a></h5>
          <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
         </div>
        </li>
        <li class="rc__post__item">
         <div class="rc__post__thumb">
          <a href="blog-details.html"><img src="assets/img/blog/rc_thumb03.jpg" alt=""></a>
         </div>
         <div class="rc__post__content">
          <h5 class="title"><a href="blog-details.html">Google take latest step & catch the
            black SEO</a></h5>
          <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
         </div>
        </li>
        <li class="rc__post__item">
         <div class="rc__post__thumb">
          <a href="blog-details.html"><img src="assets/img/blog/rc_thumb04.jpg" alt=""></a>
         </div>
         <div class="rc__post__content">
          <h5 class="title"><a href="blog-details.html">Businesses are thriving societies. Time for urgent change</a>
          </h5>
          <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
         </div>
        </li>
        <li class="rc__post__item">
         <div class="rc__post__thumb">
          <a href="blog-details.html"><img src="assets/img/blog/rc_thumb05.jpg" alt=""></a>
         </div>
         <div class="rc__post__content">
          <h5 class="title"><a href="blog-details.html">TikTok influencer marketing:How to
            work with influencer</a></h5>
          <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
         </div>
        </li>
       </ul>
      </div>
      <div class="widget">
       <h4 class="widget-title">Categories</h4>
       <ul class="sidebar__cat">
        @foreach ($category as $cat)
         <li class="sidebar__cat__item"><a href="">{{ $cat->category }}( {{ $count }})</a></li>
        @endforeach

       </ul>
      </div>
      <div class="widget">
       <h4 class="widget-title">Recent Comment</h4>
       <ul class="sidebar__comment">
        <li class="sidebar__comment__item">
         <a href="blog-details.html">Rasalina Sponde</a>
         <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
        </li>
        <li class="sidebar__comment__item">
         <a href="blog-details.html">Rasalina Sponde</a>
         <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
        </li>
        <li class="sidebar__comment__item">
         <a href="blog-details.html">Rasalina Sponde</a>
         <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
        </li>
        <li class="sidebar__comment__item">
         <a href="blog-details.html">Rasalina Sponde</a>
         <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
        </li>
       </ul>
      </div>
      <div class="widget">
       <h4 class="widget-title">Popular Tags</h4>
       <ul class="sidebar__tags">
        <li><a href="blog.html">Business</a></li>
        <li><a href="blog.html">Design</a></li>
        <li><a href="blog.html">apps</a></li>
        <li><a href="blog.html">landing page</a></li>
        <li><a href="blog.html">data</a></li>
        <li><a href="blog.html">website</a></li>
        <li><a href="blog.html">book</a></li>
        <li><a href="blog.html">Design</a></li>
        <li><a href="blog.html">product design</a></li>
        <li><a href="blog.html">landing page</a></li>
        <li><a href="blog.html">data</a></li>
       </ul>
      </div>
     </aside>
    </div>
    {{-- Blog Sidebar End --}}
   </div>
  </div>
 </section>
 <!-- blog-details-area-end -->

 <!-- contact-area -->
 <section class="homeContact homeContact__style__two">
  <div class="container">
   <div class="homeContact__wrap">
    <div class="row">
     <div class="col-lg-6">
      <div class="section__title">
       <span class="sub-title">07 - Say hello</span>
       <h2 class="title">Any questions? Feel free <br> to contact</h2>
      </div>
      <div class="homeContact__content">
       <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in
        some form</p>
       <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
      </div>
     </div>
     <div class="col-lg-6">
      <div class="homeContact__form">
       <form action="#">
        <input type="text" placeholder="Enter name*">
        <input type="email" placeholder="Enter mail*">
        <input type="number" placeholder="Enter number*">
        <textarea name="message" placeholder="Enter Massage*"></textarea>
        <button type="submit">Send Message</button>
       </form>
      </div>
     </div>
    </div>
   </div>
  </div>
 </section>
 <!-- contact-area-end -->
@endsection
