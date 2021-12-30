@extends('frontend.template.frontend')

@section('content')
    <!-- bradcam_area  -->
  <div class="bradcam_area bradcam_bg_1">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text">
                      <h3>single blog</h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/ bradcam_area  -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="/backend/images/artikel/{{ $artikel->foto_video }}" alt="" width="100%">
                  </div>
                  <div class="blog_details">
                     <h2>{{ $artikel->subject }}
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i>Kategori</a></li>
                        <li><a href="#"><i class="fa fa-comments"></i>0 Comment</a></li>
                     </ul>
                     <div class="excert">
                        {!! $artikel->description !!}
                     </div>
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                     </ul>
                  </div>
                  <div class="navigation-area">
                     <div class="row">
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           @if($artikel_sebelumnya != null)
                           <div class="thumb">
                              <a href="/articel/{{ $artikel_sebelumnya->id }}">
                                 <img class="img-fluid" src="/backend/images/artikel/{{ $artikel_sebelumnya->foto_video }}" alt="" style="width: 60px; height:60px; object-fit:cover;">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="/articel/{{ $artikel_sebelumnya->id }}">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           </div>
                           <div class="detials">
                              <p>Prev Post</p>
                              <a href="/articel/{{ $artikel_sebelumnya->id }}">
                                 <h4>{{ $artikel_sebelumnya->subject }}</h4>
                              </a>
                           </div>
                           @endif
                        </div>
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           @if($artikel_setelahnya != null)
                           <div class="detials">
                              <p>Next Post</p>
                              <a href="/articel/{{ $artikel_setelahnya->id }}">
                                 <h4>{{ $artikel_setelahnya->subject }}</h4>
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="/articel/{{ $artikel_setelahnya->id }}">
                                 <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="/articel/{{ $artikel_setelahnya->id }}">
                                 <img class="img-fluid" src="/backend/images/artikel/{{ $artikel_setelahnya->foto_video }}" alt="" style="width: 60px; height:60px; object-fit:cover;">
                              </a>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               <div class="blog-author">
                  <div class="media align-items-center">
                     <img src="/backend/images/faces/{{ $artikel->user->jobseekerDetail->profile_picture }}" alt="" style="object-fit: cover">
                     <div class="media-body">
                        <a href="#">
                           <h4>{{ $artikel->user->name }}</h4>
                        </a>
                        <p>{{ $artikel->user->jobseekerDetail->bio }}</p>
                     </div>
                  </div>
               </div>
               <div class="comments-area">
                  <h4>0 Comments</h4>
                  @foreach ($komentars as $komentar)
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="/backend/images/faces/{{ $komentar->user->jobseekerDetail->profile_picture }}" alt="" style="width:70px; height:70px; object-fit:cover;">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 {{ $komentar->comment }}
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#">{{ $komentar->user->name }}</a>
                                    </h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                 </div>
                                 <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               <div class="comment-form">
                  <h4>Leave a Reply</h4>
                  <form class="form-contact comment_form" action="#" id="commentForm">
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                 placeholder="Write Comment"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget post_category_widget">
                     <h4 class="widget_title">Category</h4>
                     <ul class="list cat-list">
                        <li>
                           <a href="#" class="d-flex">
                              <p>Resaurant food (37)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Travel news (10)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Modern technology (03)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Product</p>
                              <p>(11)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Inspiration (21)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Health Care (21)</p>
                           </a>
                        </li>
                     </ul>
                  </aside>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->
@endsection
