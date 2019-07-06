
@extends('layouts.home')

@section('content')

<main>
        <div class="main-section">
            <div class="container">
                @include('partials.flash')
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                            <div class="main-left-sidebar no-margin">
                                <div class="user-data full-width">
                                    <div class="user-profile">
                                        <div class="username-dt image-background cover" style="background-image:url(images/d-cover.jpg);">
                                            <div class="usr-pic">
                                                    @if (Auth::user()->imageUrl !==NULL)
                                                    <img src="{{Auth::user()->pic}}" alt="">
                                                    @endif
                                            </div>
                                           
                                        </div><!--username-dt end-->
                                        <div class="user-specs">
                                            <h3>{{Auth::user()->name}} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="verified-color feather feather-check-circle" title="" data-toggle="tooltip" data-original-title="Verified User"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"></path></svg></h3>
                                        <span>{{Auth::user()->jobtitle}} at {{Auth::user()->employer}}</span>
                                        </div>
                                    </div><!--user-profile end-->
                                    <ul class="user-fw-status">
                                        <li class="u-status">
                                            <h4>Connections</h4>
                                        <span>{{$connectionCount}}</span>
                                        </li>
                                        <li class="u-status">
                                            <h4>Post</h4>
                                        <span>{{$postCount}}</span>
                                        </li>
                                        <li>
                                        <a href="/profile/{{Auth::user()->username}}" title="">View Profile</a>
                                        </li>
                                    </ul>
                                </div><!--user-data end-->
                               <suggestion-component></suggestion-component>

                                <div class="widget widget-groups">
                                    <div class="sd-title">
                                        <h3>Groups You May Like</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div><!--sd-title end-->
                                    <div class="suggestions-list">
                                        <div class="row suggestion-usd">
                                            <div class="col-md-3">
                                                <img src="images/resources/pf-img8.jpg" alt="">
                                            </div>												
                                            <div class="col-md-9 sgt-text">
                                                <h4><a href="group-page-non-member.html" title="">Premiere League Lovers</a></h4>
                                                <span>2500 Members</span>
                                            </div>
                                            <div class="col-md-12 sgt-button">
                                            <span><a href="#" class="btn btn-primary btn-sm" role="button" aria-pressed="true" title="Join Group"><i class="la la-plus"></i> Join</a></span>
                                                <span><a href="#" class="btn btn-primary btn-sm" role="button" aria-pressed="true" title="Remove"><i class="la la-trash"></i></a></span>

                                            </div>
                                            
                                        </div>
                                        <div class="row suggestion-usd">
                                            <div class="col-md-3">
                                                <img src="images/resources/pf-gallery3.png" alt="">
                                            </div>												
                                            <div class="col-md-9 sgt-text">
                                                <h4><a href="group-page.html" title="">London Foodie Association</a></h4>
                                                <span>2500 Members</span>
                                            </div>
                                            <div class="col-md-12 sgt-button">
                                            <span><a href="#" class="btn btn-primary btn-sm" role="button" aria-pressed="true" title="Join Group"><i class="la la-plus"></i> Join</a></span>
                                                <span><a href="#" class="btn btn-primary btn-sm" role="button" aria-pressed="true" title="Remove"><i class="la la-trash"></i></a></span>

                                            </div>
                                            
                                        </div>
                                        <div class="row suggestion-usd">
                                            <div class="col-md-3">
                                                <img src="images/resources/pf-img9.jpg" alt="">
                                            </div>												
                                            <div class="col-md-9 sgt-text">
                                                <h4><a href="group-page-non-member.html" title="">Tasty Food Recipes</a></h4>
                                                <span>2500 Members</span>
                                            </div>
                                            <div class="col-md-12 sgt-button">
                                            <span><a href="#" class="btn btn-primary btn-sm" role="button" aria-pressed="true" title="Join Group"><i class="la la-plus"></i> Join</a></span>
                                                <span><a href="#" class="btn btn-primary btn-sm" role="button" aria-pressed="true" title="Remove"><i class="la la-trash"></i></a></span>

                                            </div>
                                            
                                        </div>
                                        <div class="view-more">
                                            <a href="groups.html" title="">View More</a>
                                        </div>
                                    </div><!--suggestions-list end-->
                                </div><!--suggestions end-->
                                <div class="widget suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Most Viewed People</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div><!--sd-title end-->
                                    <div class="popular-list">
                                        <div class="popular_img">
                                                    <a href="user-profile.html" title=""><img src="images/resources/bg-img1.png" alt=""></a>
                                                </div>
                                                <div class="popular_img">
                                                    <a href="user-profile.html" title=""><img src="images/resources/bg-img2.png" alt=""></a>
                                                </div>
                                                <div class="popular_img">
                                                    <a href="user-profile.html" title=""><img src="images/resources/bg-img3.png" alt=""></a>
                                                </div>
                                                <div class="popular_img">
                                                    <a href="user-profile.html" title=""><img src="images/resources/bg-img4.png" alt=""></a>
                                                </div>
                                                <div class="popular_img">
                                                    <a href="user-profile.html" title=""><img src="images/resources/bg-img1.png" alt=""></a>
                                                </div>
                                                <div class="popular_img">
                                                    <a href="user-profile.html" title=""><img src="images/resources/bg-img2.png" alt=""></a>
                                                </div>
                                                <div class="popular_img">
                                                    <a href="user-profile.html" title=""><img src="images/resources/bg-img3.png" alt=""></a>
                                                </div>
                                                <div class="popular_img">
                                                    <a href="user-profile.html" title=""><img src="images/resources/bg-img4.png" alt=""></a>
                                                </div>
                                                <div class="popular_img">
                                                    <a href="user-profile.html" title=""><img src="images/resources/bg-img1.png" alt=""></a>
                                                </div>
                                                <div class="popular_img">
                                                    <a href="user-profile.html" title=""><img src="images/resources/bg-img2.png" alt=""></a>
                                                </div>
                                        
                                    </div><!--suggestions-list end-->
                                </div>
                                
                            </div><!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6 col-md-8 no-pd">
                            <div class="main-ws-sec">
                               

                            <post-component></post-component>



                                <div class="posts-section">

                                    <premium-component></premium-component>
                                    
                                   <feed-component></feed-component>
                                   
                                   
                                    
                                   
                                   
                                    {{-- <div class="posty">
                                        <div class="post-bar no-margin">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <div class="usy-name">
                                                        <h3>CNN  <span class="badge badge-danger"><i class="pe pe-7s-news-paper"></i> News Feed</span></h3>
                                                        <span><img src="images/clock.png" alt="">Published 3 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
                                                        <li><a href="#" title=""><i class="la la-link"></i> Copy Link</a></li>
                                                        <li><a href="#" title=""><i class="la la-flag"></i> Report this post</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="images/icon8.png" alt=""><span>Entertainment</span></li>
                                            </ul>
                                        </div>
                                            <div class="job_descp">
                                                <h3>Spice Girls concert's 'awful' sound disappoints fans</h3>
                                                <p>(CNN) — The Spice Girls kicked off their highly anticipated reunion tour in Dublin on Friday night, however some fans were left disappointed after complaining of "awful" sound problems during the <a href="#" title="">view more</a></p>
                                                
                                            </div>
                                            <div class="media-wrapper">
                                                <img src="https://cdn.cnn.com/cnnnext/dam/assets/181108155015-spice-girls-reunion-tour-super-169.jpg" alt="post-image" class="img-responsive post-image">
                                              </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com">
                                                    <li>
                                                        <a href="#"><i class="pe pe-7s-like"></i> Like</a>
                                                        <div class="_4b0w">
                                                            <img class="_s0 _4ooo _oqb _4b0x _ry img" src="images/avatar/4.jpg" alt="" aria-label="Desola Blazin Wushishi" role="img">
                                                            <img class="_s0 _4ooo _oqb _4b0x _ry img" src="images/avatar/5.jpg" alt="" aria-label="Anyanwu Samuel Chinazor" role="img">
                                                            <img class="_s0 _4ooo _oqb _4b0x _ry img" src="images/avatar/6.jpg" alt="" aria-label="Lusu P Kolo" role="img">
                                                        <span>25</span>
                                                        </div>
                                                    </li> 
                                                    <li><a href="#" title="" class="com"><i class="pe pe-7s-comment"></i> Comment 15</a></li>
                                                    <li><a href="#" title="" class="com"><i class="pe pe-7s-share"></i> Share</a></li>
                                                </ul>
                                                <a><i class="la la-eye"></i>Views 50</a>
                                            </div>
                                        </div><!--post-bar end-->
                                        <div class="comment-section">
                                            <div class="post-comment">
                                                <div class="cm_img">
                                                    <img src="images/resources/bg-img4.png" alt="">
                                                </div>
                                                <div class="comment_box">
                                                    <form>
                                                        <input type="text" placeholder="Write a comment">
                                                        <button type="submit">Send</button>
                                                    </form>
                                                </div>
                                            </div><!--post-comment end-->
                                        </div><!--comment-section end-->
                                    </div><!--posty end--> --}}



                                </div><!--posts-section end-->

                                <!-- status elements -->
                                    <div class="scroller-status">
                                      <div class="infinite-scroll-request loader-ellips">
                                        ...
                                      </div>
                                      <p class="infinite-scroll-last">End of content</p>
                                      <p class="infinite-scroll-error">No more pages to load</p>
                                    </div>

                                    <!-- pagination has path -->
                                    <p class="pagination">
                                      <a class="pagination__next" href="page2.html">Next page</a>
                                    </p>

                            </div><!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3 pd-right-none no-pd">
                            <div class="right-sidebar">
                                <div class="widget widget-about">
                                    <img src="images/Premium_grande.png" alt="">
                                    <h3>Vybbz Premium</h3>
                                    <span>Access exclusive tools and features</span>
                                    <div class="sign_link">
                                        <h3><a href="#" title="">Upgrade to Premium</a></h3>
                                        <a href="#" title="">Learn More</a>
                                    </div>
                                </div><!--widget-about end-->

                                <div class="widget widget-events">
                                    <div class="sd-title mb-2">
                                        <h3>Upcoming Events</h3>
                                        <i class="la la-calendar"></i>
                                    </div>
                                    <figure class="eventwidget image-background cover" style="background-image:url(images/resources/event-1.jpg)">
                                            
                                            <div class="date"><span class="day">12</span><span class="month">Jun</span></div>
                                            <figcaption class="">
                                            <h3>This Thing Called Life: A Celebration of Prince and His Legacy at MEZZANINE SF</h3>
                                            <p><i class="la la-map-marker"></i> Mezzanine, San Francisco, CA</p>
                                            <p><i class="la la-money"></i> $25 &ndash; $80</p>
                                            </figcaption>
                                            <div class="hover"><i class="la la-ticket"></i> <span>Get Tickets</span></div>
                                            <a href="event-detail.html"></a>
                                    </figure>
                                    <figure class="eventwidget image-background cover" style="background-image:url(images/resources/event-2.jpg)">
                                            
                                            <div class="date"><span class="day">28</span><span class="month">Aug</span></div>
                                            <figcaption>
                                            <h3>Brunch and Games @ the Dorchester</h3>
                                            <p><i class="la la-map-marker"></i> Alain Ducasse at the Dorchester, London, UK</p>
                                            <p><i class="la la-money"></i> $220</p>
                                            </figcaption>
                                            <div class="hover"><i class="la la-ticket"></i> <span>Get Tickets</span></div>
                                            <a href="event-detail.html"></a>
                                    </figure>
                                    
                                </div><!--widget-events end-->


                                <div class="widget widget-about">
                                    <div class="sd-title">
                                        <h3><i class="la la-envelope"></i> Invite Your Friends</h3>
                                    </div>
                                    <div class="invite_form">
                                        <form>
                                            <input type="text" name="search" placeholder="Email">
                                            <button type="submit">Ok</button>
                                        </form>
                                    </div>
                                </div><!--widget-invite end-->

                                <!--footer start-->
                                <div class="tags-sec full-width">
                                    <ul>
                                    <li><a href="{{url('about')}}" title="About" target="_blank">About</a></li>
                                    <li><a href="{{url('contact')}}" title="Contact" target="_blank">Contact</a></li>
                                    <li><a href="{{url('terms')}}" title="Privacy and Terms" target="_blank">Privacy and Terms</a></li>
                                    <li><a href="{{url('faqs')}}" title="Help Center" target="_blank">Help Center</a></li>
                                    <li><a href="{{url('blog')}}" title="Blog" target="_blank">Blog</a></li>
                                    </ul>
                                    <div class="cp-sec">
                                        <p><img src="images/copy-icon2.png" alt=""> 2019 VYBZZ Incorporated. All Rights Reserved </p>
                                    </div>
                                </div><!--footer end-->

                            </div><!--right-sidebar end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div> 
        </div>
    </main>
    
    <div class="chatbox-list">
			<div class="chatbox">
				<div class="chat-mg">
					<a href="#" title=""><img src="images/resources/usr-img1.png" alt=""></a>
					<span>2</span>
				</div>
				<div class="conversation-box">
					<div class="con-title mg-3">
						<div class="chat-user-info">
							<img src="images/resources/us-img1.png" alt="">
							<h3>John Doe <span class="status-info"></span></h3>
						</div>
						<div class="st-icons">
							<a href="#" title=""><i class="la la-cog"></i></a>
							<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
							<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
						</div>
					</div>
					<div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
						<div class="chat-msg">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
							<span>Sat, Aug 23, 1:10 PM</span>
						</div>
						<div class="date-nd">
							<span>Sunday, August 24</span>
						</div>
						<div class="chat-msg st2">
							<p>Cras ultricies ligula.</p>
							<span>5 minutes ago</span>
						</div>
						<div class="chat-msg">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
							<span>Sat, Aug 23, 1:10 PM</span>
						</div>
					</div><!--chat-list end-->
					<div class="typing-msg">
						<form>
							<textarea placeholder="Type a message here"></textarea>
							<button type="submit"><i class="fa fa-send"></i></button>
						</form>
						<ul class="ft-options">
							<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
							<li><a href="#" title=""><i class="la la-camera"></i></a></li>
							<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
						</ul>
					</div><!--typing-msg end-->
				</div><!--chat-history end-->
			</div>
			<div class="chatbox">
				<div class="chat-mg">
					<a href="#" title=""><img src="images/resources/usr-img2.png" alt=""></a>
				</div>
				<div class="conversation-box">
					<div class="con-title mg-3">
						<div class="chat-user-info">
							<img src="images/resources/us-img1.png" alt="">
							<h3>John Doe <span class="status-info"></span></h3>
						</div>
						<div class="st-icons">
							<a href="#" title=""><i class="la la-cog"></i></a>
							<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
							<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
						</div>
					</div>
					<div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
						<div class="chat-msg">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
							<span>Sat, Aug 23, 1:10 PM</span>
						</div>
						<div class="date-nd">
							<span>Sunday, August 24</span>
						</div>
						<div class="chat-msg st2">
							<p>Cras ultricies ligula.</p>
							<span>5 minutes ago</span>
						</div>
						<div class="chat-msg">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
							<span>Sat, Aug 23, 1:10 PM</span>
						</div>
					</div><!--chat-list end-->
					<div class="typing-msg">
						<form>
							<textarea placeholder="Type a message here"></textarea>
							<button type="submit"><i class="fa fa-send"></i></button>
						</form>
						<ul class="ft-options">
							<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
							<li><a href="#" title=""><i class="la la-camera"></i></a></li>
							<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
						</ul>
					</div><!--typing-msg end-->
				</div><!--chat-history end-->
			</div>
			<div class="chatbox">
				<div class="chat-mg bx">
					<a href="#" title=""><img src="images/chat.png" alt=""></a>
					<span>2</span>
				</div>
				<div class="conversation-box">
					<div class="con-title">
						<h3>Messages</h3>
						<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
					</div>
					<div class="chat-list">
						<div class="conv-list active">
							<div class="usrr-pic">
								<img src="images/resources/usy1.png" alt="">
								<span class="active-status activee"></span>
							</div>
							<div class="usy-info">
								<h3>John Doe</h3>
								<span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
							</div>
							<div class="ct-time">
								<span>1:55 PM</span>
							</div>
							<span class="msg-numbers">2</span>
						</div>
						<div class="conv-list">
							<div class="usrr-pic">
								<img src="images/resources/usy2.png" alt="">
							</div>
							<div class="usy-info">
								<h3>John Doe</h3>
								<span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
							</div>
							<div class="ct-time">
								<span>11:39 PM</span>
							</div>
						</div>
						<div class="conv-list">
							<div class="usrr-pic">
								<img src="images/resources/usy3.png" alt="">
							</div>
							<div class="usy-info">
								<h3>John Doe</h3>
								<span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
							</div>
							<div class="ct-time">
								<span>0.28 AM</span>
							</div>
						</div>
					</div><!--chat-list end-->
				</div><!--conversation-box end-->
			</div>
		</div><!--chatbox-list end-->
@endsection
