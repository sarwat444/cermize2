
<!-- Page Header Start-->
 <div class="page-header">
     <div class="header-wrapper row m-0">
         <form class="form-inline search-full col" action="#" method="get">
             <div class="form-group w-100">
                 <div class="Typeahead Typeahead--twitterUsers">
                     <div class="u-posRelative">
                         <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                             placeholder="Search Cuba .." name="q" title="" autofocus="">
                         <div class="spinner-border Typeahead-spinner" role="status"><span
                                 class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                     </div>
                     <div class="Typeahead-menu"></div>
                 </div>
             </div>
           </form>
         <div class="header-logo-wrapper col-auto p-0">
             <div class="logo-wrapper"><a href="#"><img class="img-fluid for-light"
                         src="{{asset(config('constants.asset_path').'assets/panel/images/logo/logo.png')}}" alt=""><img class="img-fluid for-dark"
                         src="{{asset(config('constants.asset_path').'assets/panel/images/logo/logo_dark.png')}}" alt=""></a></div>
         </div>
         <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
             <ul class="nav-menus">
                 @include('panel.layouts.notifications')
                 <li class="profile-nav onhover-dropdown pe-0 py-0">
                     <div class="media profile-media"><img class="b-r-10"
                             src="{{asset(config('constants.asset_path').'assets/panel/images/dashboard/profile.png')}}" alt="">

                         <div class="media-body"><span></span>
                             <p class="mb-0">{{Auth::guard('admin')->user()->name}} <i class="middle fa fa-angle-down"></i></p>
                         </div>
                     </div>
                     <ul class="profile-dropdown onhover-show-div">
                         <li><a href="{{route('panel.admin.logout')}}"><i data-feather="log-in"> </i><span>Abmelden</span></a></li>
                     </ul>
                 </li>
             </ul>
         </div>
         <script class="result-template" type="text/x-handlebars-template">
        <div class="ProfileCard u-cf">
        <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
        <div class="ProfileCard-details">
        <div class="ProfileCard-realName"> Test Name </div>
        </div>
        </div>
      </script>
         <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
     </div>
 </div>
 <!-- Page Header Ends -->
