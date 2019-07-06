
@extends('layouts.home')

@section('content')

<section class="companies-info">
        <div class="container">
            <div class="row">
                @include('errors.list')
                @include('partials.flash')
                
                    <div class="col-10 no-pd" style="padding-right: 0px; padding-left: 0px;">
                        <div class="group-title">
                            <h3>Vybbz Groups</h3>
                        </div><!--group-title end-->	
                    </div>
                    <div class="col-2 no-pd">
                        <a id="create_group" class="btn btn-primary" href="#">+ Create a new group</a>
                    </div>
            </div>
           <groups-component></groups-component>
                <div class="top-profiles">
                                            <div class="pf-hd">
                                                <h3>Recommended Groups</h3>
                                                <i class="la la-ellipsis-v"></i>
                                            </div>
                                            <div class="groups-list">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="group_profile_info">
                                                            <div class="group-up-info">
                                                                <img src="images/resources/pf-icon1.png" alt="">
                                                                <h3>Group Name</h3>
                                                                <h4>2500 Members</h4>
                                                                <ul>
                                                                    <li><a href="group-page-non-member.html" title="" class="follow">Join Group</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!--group_profile_info end-->
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="group_profile_info">
                                                            <div class="group-up-info">
                                                                <img src="images/resources/pf-icon2.png" alt="">
                                                                <h3>Group Name</h3>
                                                                <h4>2500 Members</h4>
                                                                <ul>
                                                                    <li><a href="group-page-non-member.html" title="" class="follow">Join Group</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!--group_profile_info end-->
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="group_profile_info">
                                                            <div class="group-up-info">
                                                                <img src="images/resources/pf-icon3.png" alt="">
                                                                <h3>Group Name</h3>
                                                                <h4>2500 Members</h4>
                                                                <ul>
                                                                    <li><a href="group-page-non-member.html" title="" class="follow">Join Group</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!--group_profile_info end-->
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="group_profile_info">
                                                            <div class="group-up-info">
                                                                <img src="images/resources/pf-icon4.png" alt="">
                                                                <h3>Group Name</h3>
                                                                <h4>2500 Members</h4>
                                                                <ul>
                                                                    <li><a href="group-page-non-member.html" title="" class="follow">Join Group</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!--group_profile_info end-->
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="group_profile_info">
                                                            <div class="group-up-info">
                                                                <img src="images/resources/pf-icon5.png" alt="">
                                                                <h3>Group Name</h3>
                                                                <h4>2500 Members</h4>
                                                                <ul>
                                                                    <li><a href="#" title="" class="follow">Join Group</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!--group_profile_info end-->
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="group_profile_info">
                                                            <div class="group-up-info">
                                                                <img src="images/resources/pf-icon6.png" alt="">
                                                                <h3>Group Name</h3>
                                                                <h4>2500 Members</h4>
                                                                <ul>
                                                                    <li><a href="group-page-non-member.html" title="" class="follow">Join Group</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!--group_profile_info end-->
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="group_profile_info">
                                                            <div class="group-up-info">
                                                                <img src="images/resources/pf-icon7.png" alt="">
                                                                <h3>Group Name</h3>
                                                                <h4>2500 Members</h4>
                                                                <ul>
                                                                    <li><a href="group-page-non-member.html" title="" class="follow">Join Group</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!--group_profile_info end-->
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="group_profile_info">
                                                            <div class="group-up-info">
                                                                <img src="images/resources/pf-icon8.png" alt="">
                                                                <h3>Group Name</h3>
                                                                <h4>2500 Members</h4>
                                                                <ul>
                                                                    <li><a href="group-page-non-member.html" title="" class="follow">Join Group</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!--group_profile_info end-->
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="group_profile_info">
                                                            <div class="group-up-info">
                                                                <img src="images/resources/pf-icon9.png" alt="">
                                                                <h3>Group Name</h3>
                                                                <h4>2500 Members</h4>
                                                                <ul>
                                                                    <li><a href="group-page-non-member.html" title="" class="follow">Join Group</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!--group_profile_info end-->
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="group_profile_info">
                                                            <div class="group-up-info">
                                                                <img src="images/resources/pf-icon10.png" alt="">
                                                                <h3>Group Name</h3>
                                                                <h4>2500 Members</h4>
                                                                <ul>
                                                                    <li><a href="group-page-non-member.html" title="" class="follow">Join Group</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!--group_profile_info end-->
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="group_profile_info">
                                                            <div class="group-up-info">
                                                                <img src="images/resources/pf-icon11.png" alt="">
                                                                <h3>Group Name</h3>
                                                                <h4>2500 Members</h4>
                                                                <ul>
                                                                    <li><a href="group-page-non-member.html" title="" class="follow">Join Group</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!--group_profile_info end-->
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="group_profile_info">
                                                            <div class="group-up-info">
                                                                <img src="images/resources/pf-icon12.png" alt="">
                                                                <h3>Group Name</h3>
                                                                <h4>2500 Members</h4>
                                                                <ul>
                                                                    <li><a href="group-page-non-member.html" title="" class="follow">Join Group</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!--group_profile_info end-->
                                                    </div>
                                                </div>
                                            </div><!--groups-list end-->
                </div>	
            
            <div class="process-comm">
                <a href="#" title=""><img src="images/process-icon.png" alt=""></a>
            </div>
        </div>
    </section><!--companies-info end-->

    <div class="post-popup group_post">
			<div class="post-project">
				<h3>Create group</h3>
				<div class="post-project-fields">
                <form method="POST" action="{{url('groups')}}" enctype="multipart/form-data">
                    @csrf
						<div class="row">
							<div class="col-sm-2 imgUp">
								<div class="imagePreview"></div>
								<label id="uploadbutton" class="btn btn-primary">
										Logo<input type="file" class="uploadFile img" name="group_logo" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
											</label>
							</div><!-- col-2 -->
							<div class="col-lg-12">
								<label for="group_name">Group name</label>
								<input type="text" name="group_name" placeholder="Inspiring Entrepreneurs in DC">
							</div>
							<div class="col-lg-12">
								<label for="group_description">About this group</label>
								<textarea name="group_description" class="groups-group-info-inputs__textarea artdeco-text-input--input" placeholder="What is the purpose of your group?"></textarea>
							</div>
							<div class="col-lg-12">
								<label for="group_rules">Group rules</label>
								<textarea name="group_rules" class="groups-group-info-inputs__textarea artdeco-text-input--input" placeholder="Set the tone and expectations of your group"></textarea>
							</div>
							<div class="col-lg-12">
								<label for="group_privacy">Privacy</label>
								<div class="form-check">
						          <input class="form-check-input" type="radio" name="group_privacy" id="group_privacy1" value="Standard">
						          <label class="form-check-label" for="group_privacy1">
						            Standard
						          </label>
						        </div>
						        <div class="form-check">
						          <input class="form-check-input" type="radio" name="group_privacy" id="group_privacy2" value="Unlisted">
						          <label class="form-check-label" for="group_privacy2">
						            Unlisted
						          </label>
						        </div>
							</div>
							<div class="col-lg-12">
								<ul>
									<li><button class="active" type="submit" value="post">Create</button></li>
									<li><a href="#" title="">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" title=""><i class="la la-times-circle-o"></i></a>
			</div><!--post-project end-->
		</div><!--post-project-popup end-->
    
    
@endsection
