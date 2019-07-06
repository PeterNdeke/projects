@extends('layouts.admin')

@section('content')
<!-- Page content -->
<div class="page-content">

    
    @include('layouts.nav')

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">{{$title}}</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                           
                            <a href="{{url($link)}}/create"  class="btn bg-blue ml-3">Add Event</a>
						</div>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
                        <a href="{{url('admin')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <a href="{{url('admin/events')}}" class="breadcrumb-item">{{$title}}</a>

						</div>

					
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
							<a href="#" class="breadcrumb-elements-item">
								<i class="icon-comment-discussion mr-2"></i>
								Support
							</a>

							<div class="breadcrumb-elements-item dropdown p-0">
								<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear mr-2"></i>
									Settings
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
									<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
									<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page header -->

    <!-- Card text options -->
    <div class="content">
  

    <div class="row">
       
        <div class="col-md-12">
                @include('partials.flash')
            <!-- Custom header and footer colors -->
            @if(count($events) !== 0)
            @foreach($events as $item)
            <div class="card">
                <div class="card-header bg-dark d-flex justify-content-between">
                    <span class="font-size-sm text-uppercase font-weight-semibold">Invoice <a href="#" class="text-white">#2490</a></span>
                    <span class="font-size-sm text-uppercase font-weight-semibold">Creation Date: {{$item->created_at->toFormattedDateString()}}</span>
                </div>

                <div class="card-body">
                    {!!$item->content!!}
                   
                </div>

                <div class="card-footer bg-dark d-flex justify-content-between">
                    <span class="opacity-75">Issued 26.12.2017</span>

                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="{{ url($link."/".$item->id."/edit") }}" class="text-white">Edit</a></li>
                        <li
                        
                         class="list-inline-item">
                         <form onsubmit="return confirm('Do you really want to delete?');"  action="{{ url($link."/".$item->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE')}}

                            <button type="submit" class="btn text-white">
                               Delete </button>
                           
                        </form>
                        
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /custom header and footer colors -->
            @endforeach
            @else
              
            <div class="card">
                <div class="card-header bg-dark d-flex justify-content-between">
                    <span class="font-size-sm text-uppercase font-weight-semibold text-white">No Events Addedd Yet</span>
                    
                </div>

                

                
            </div>
                  
           @endif
           


        </div>
    </div>
    <!-- /card text options -->
      

          



          

                    

        </div>
        <!-- /content area -->


      

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

@endsection