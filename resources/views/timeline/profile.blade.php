
@extends('layouts.home')

@section('content')

<section class="cover-sec image-background cover" style="background-image:url(../images/resources/cover-img1.jpg);">
			
</section>


<main class="profile-page">
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="main-left-sidebar">
                            <div class="user_profile">
                                <div class="user-pro-img">
                                <img src="{{$user->pic}}" alt="">
                                </div><!--user-pro-img end-->
                                <div class="user_pro_status">
                            <connect-component :profile_user_id = "{{$user->id}}"></connect-component>
                                    <!-- <div class="message-btn">
                                <a href="#" title=""><i class="fa fa-envelope"></i> Message</a>
                            </div> -->
                                    <ul class="flw-status">
                                        <li class="u-status">
                                            <span>Connections</span>
                                            <b>{{$connectionCount1}}</b>
                                        </li>
                                        <li class="u-status">
                                            <span>View</span>
                                            <b>{{$countView}}</b>
                                        </li>
                                    </ul>
                                </div><!--user_pro_status end-->
                                <ul class="social_links">
                                    <li><a href="#" title=""><i class="la la-link"></i> www.vybbz.com/susan</a></li>
                                    <li><a href="#" title=""><i class="fa fa-phone"></i> 070 686 283 837</a></li>
                                    <li><a href="#" title=""><i class="fa fa-envelope"></i> susan@gmail.com</a></li>
                                </ul>
                            </div><!--user_profile end-->
                            <div class="suggestions full-width">
                                <div class="sd-title">
                                <h3>{{$user->name}}'s Interest</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div><!--sd-title end-->
                                <div class="interest-list">
                                    <ul>
                                        @if (count($interest) !== 0)
                                            @foreach ($interest as $item)
                                    <li><a href="#" title="">{{$item->interest}}</a></li>
                                            @endforeach
                                        @endif
                                        
                                    </ul>
                                </div><!--suggestions-list end-->
                            </div><!--suggestions end-->
                        </div><!--main-left-sidebar end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="main-ws-sec">
                            
                            <div class="user-tab-sec">
                                <h3>{{$user->name}}  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="verified-color feather feather-check-circle" title="" data-toggle="tooltip" data-original-title="Verified User"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"></path></svg></h3>
                                <div class="star-descp">
                                <span>{{$user->job_role}} at {{$user->employer}}</span>
                                </div><!--star-descp end-->
                                <div class="tab-feed">
                                    <ul>
                                        <li data-tab="info-dd" class="active">
                                            <a href="#" title="">
                                                <img src="images/ic2.png" alt="">
                                                <span>Info</span>
                                            </a>
                                        </li>
                                        <li data-tab="feed-dd">
                                            <a href="#" title="">
                                                <img src="images/ic1.png" alt="">
                                                <span>Activities</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- tab-feed end-->
                            </div><!--user-tab-sec end-->
                            <div class="product-feed-tab current" id="info-dd">
                                <div class="user-profile-ov">
                                    <ul class="pro-status">
                                    <li class="u-status">
                                        <h4>Industry</h4>
                                    <span>{{$user->industry}}</span>
                                    </li>
                                    <li class="u-status">
                                        <h4>Corporate Title</h4>
                                    <span>{{$user->level}}</span>
                                    </li>
                                    <li class="u-status">
                                        <h4>Job Role</h4>
                                    <span>{{$user->job_role}}</span>
                                    </li>
                                </ul>
                                </div><!--user-profile-ov end-->
                                <div class="user-profile-ov">
                                    <h3>Overview</h3>
                                    @if ($location != NULL)
                                    <p>{{$overview->overview}}.</p>
                                    @endif
                                </div><!--user-profile-ov end-->
                                <div class="user-profile-ov st2">
                                    <h3>Experience</h3>
                                    @if(count($experience) !== 0)
                                    @foreach ($experience as $item)
                                <h4>{{$item->job_role}}</h4>
                                <h5>{{$item->company}}</h5>
                                <p>{{$item->date_from}} – {{$item->date_from}}<br>{{$item->location}}</p>
                                    @endforeach
                                    @endif
                                   
                                    
                                    
                                </div><!--user-profile-ov end-->
                                <div class="user-profile-ov">

                                    <h3>Education</h3>
                                    @if(count($education) !== 0)
                                    @foreach ($education as $item)
                                <h4>{{$item->school}}</h4>
                                <h5>{{$item->degree}}</h5>
                                <span>{{$item->date_from}} - {{$item->date_to}}</span>
                                    @endforeach
                                    @endif
                                    
                                </div><!--user-profile-ov end-->
                                <div class="user-profile-ov">
                                    <h3>Location</h3>
                                    @if ($location != NULL)
                                <h4>{{$location->country}}</h4>
                                    <p>{{$location->city}} </p>
                                    @endif
                                    
                                </div><!--user-profile-ov end-->
                                <div class="user-profile-ov">
                                    <h3>Skills</h3>
                                    <ul>
                                            @if(count($skill) !== 0)
                                            @foreach ($skill as $item)
                                    <li><a href="#" title="">{{$item->skill}}</a></li>
                                            @endforeach
                                        @endif
                                        
                                    </ul>
                                </div><!--user-profile-ov end-->
                            </div><!--product-feed-tab end-->
                            <div class="product-feed-tab" id="feed-dd">
                                <div class="posts-section">
                            <user-activities :profile_user_id = "{{$user->id}}"></user-activities>
                                                
                                   
                                   
                                        <div class="process-comm">
                                            <a href="#" title=""><img src="../images/process-icon.png" alt=""></a>
                                        </div><!--process-comm end-->
                                </div><!--posts-section end-->
                            </div><!--product-feed-tab end-->
                        </div><!--main-ws-sec end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="widget widget-groups">
                                <div class="sd-title">
                                    <h3>Groups Susan Follows</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div><!--sd-title end-->
                                <div class="suggestions-list">
                                    <div class="row suggestion-usd">
                                        <div class="col-md-3">
                                            <img src="images/resources/pf-img8.jpg" alt="">
                                        </div>												
                                        <div class="col-md-9 sgt-text">
                                            <h4><a href="#" title="">Premiere League Lovers</a></h4>
                                            <span>2500 Members</span>
                                        </div>
                                        
                                    </div>
                                    <div class="row suggestion-usd">
                                        <div class="col-md-3">
                                            <img src="images/resources/pf-gallery3.png" alt="">
                                        </div>												
                                        <div class="col-md-9 sgt-text">
                                            <h4><a href="#" title="">London Foodie Association</a></h4>
                                            <span>2500 Members</span>
                                        </div>
                                        
                                    </div>
                                    <div class="view-more">
                                        <a href="groups.html" title="">View More</a>
                                    </div>
                                </div><!--suggestions-list end-->
                        </div><!--suggestions end-->
                        <div class="suggestions full-width">
                                <div class="sd-title">
                                    <h3>People Also Viewed</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div><!--sd-title end-->
                                <div class="suggestions-list">
                                        @foreach ($viewedProfiles as $item)
                                        <div class="suggestion-usd">
                                        <img src="{{$item->avatar}}" alt="">
                                                <div class="sgt-text">
                                                <h4>{{$item->name}}</h4>
                                                <span>{{$item->jobtitle}}</span>
                                                </div>
                                                <span>
                                                <a href="/profile/{{$item->username}}">
                                                    <i class="la la-eye" title="View Profile">

                                                    </i></a>
                                                </span>
                                            </div>
                                        @endforeach  
                                  
                                    <div class="view-more">
                                        <a href="#" title="">View More</a>
                                    </div>
                                </div><!--suggestions-list end-->
                        </div><!--suggestions end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div> 
    </div>
</main>




<footer>
    <div class="footy-sec mn no-margin">
        <div class="container">
            <ul>
                <li><a href="about.html" title="About" target="_blank">About</a></li>
                <li><a href="contact.html" title="Contact" target="_blank">Contact</a></li>
                <li><a href="terms.html" title="Privacy and Terms" target="_blank">Privacy and Terms</a></li>
                <li><a href="faqs.html" title="Help Center" target="_blank">Help Center</a></li>
                <li><a href="blog.html" title="Blog" target="_blank">Blog</a></li>
            </ul>
            <p><img src="images/copy-icon2.png" alt=""> 2019 VYBZZ Incorporated. All Rights Reserved </p>
        </div>
    </div>
</footer><!--footer end-->
@endsection
