
<!--Left Sidebar-->
<div class="fixed-width md-margin-bottom-40 profile">
    <div class="avatar-box">
        <div class="initials-circle collapsable-item" style='display: none'>
            @if($user->name)
                <span class="single">
                    {{ $user->name[0] }}
                </span>
            @elseif($user->firstname && $user->lastname)
                <span class="double">
                    {{ $user->firstname[0]." ".$user->lastname[0] }}
                </span>
            @endif
        </div>
        <div class="collapsable-item">
            <div class="avatar-image-box">
                <img class="img-responsive profile-img" src="{{ $user->avatar ? url($user->avatar) : url('/assets/images/user.jpg') }}" alt="user's image">
            </div>
            <div class="avatar-info-box">
                @if($user->name)
                    {{$user->name}}
                @elseif($user->firstname && $user->lastname)
                    {{ $user->firstname." ".$user->lastname }}
                @elseif($user->nickname)
                    {{ $user->nickname }}
                @else
                    {{ $user->username }}
                @endif
                <br/>
                @if($user->roles)
                    @foreach($user->roles as $role)
                        {{ $role->name }}<br/>
                    @endforeach
                @endif
                @if($user->actions)
                    Action Items: {{count($user->actions)}}<br/>
                @endif
                Points: {{ $user->points() ?: '0' }}<br/>

            </div>
        </div>
    </div>

    <ul class="list-group sidebar-nav-v1" id="sidebar-nav-1">
        <li class="list-group-item">
            <a href="{{ url('user/dashboard')}}" id='user-dashboard'><i class="fa fa-bar-chart-o"></i><span class="collapsable-item"> Dashboard</span></a>
        </li>
        <li class="list-group-item">
            <a href="page_profile_me.html"><i class="fa fa-user"></i><span class="collapsable-item"> Profile</span></a>
        </li>
        <li class="list-group-item">
            <a href="page_profile_users.html"><i class="fa fa-group"></i><span class="collapsable-item"> Users</span></a>
        </li>
        <li class="list-group-item">
            <a href="page_profile_projects.html"><i class="fa fa-cubes"></i><span class="collapsable-item"> My Projects</span></a>
        </li>
        <li class="list-group-item">
            <a href="page_profile_comments.html"><i class="fa fa-comments"></i><span class="collapsable-item"> Comments</span></a>
        </li>
        <li class="list-group-item">
            <a href="page_profile_history.html"><i class="fa fa-history"></i><span class="collapsable-item"> History</span></a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/admin/fireteam')}}" id='admin-fireteam'><i class="fa fa-fire"></i><span class="collapsable-item"> Fireteam</span></a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/document')}}" id='document'><i class="fa fa-file"></i><span class="collapsable-item"> Documents</span></a>
        </li>
        <li class="list-group-item">
            <a href="page_profile_settings.html"><i class="fa fa-cog"></i><span class="collapsable-item"> Settings</span></a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/admin/roles')}}" id='admin-roles'><i class="fa fa-black-tie"></i><span class="collapsable-item"> Roles</span></a>
        </li>
    </ul>

    <div class="nav-side-padding collapsable-item">
        <!-- <div class="panel-heading-v2 overflow-h ">
            <h2 class="heading-xs pull-left collapsable-item"><i class="fa fa-bar-chart-o"></i> Task Progress</h2>
            <a href="#"><i class="fa fa-cog pull-right"></i></a>
        </div>
        <h3 class="heading-xs"><span class="">Web Design </span><span class="pull-right">92%</span></h3>
        <div class="progress progress-u progress-xxs ">
            <div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
            </div>
        </div>
        <h3 class="heading-xs"><span class="">Unify Project </span><span class="pull-right">85%</span></h3>
        <div class="progress progress-u progress-xxs ">
            <div style="width: 85%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="85" role="progressbar" class="progress-bar progress-bar-blue">
            </div>
        </div>
        <h3 class="heading-xs"><span class="">Sony Corporation </span><span class="pull-right">64%</span></h3>
        <div class="progress progress-u progress-xxs margin-bottom-40 ">
            <div style="width: 64%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="64" role="progressbar" class="progress-bar progress-bar-dark">
            </div>
        </div>

        <hr> -->

        <!--Notification-->
         <!-- <div class="panel-heading-v2 overflow-h">
            <h2 class="heading-xs pull-left"><i class="fa fa-bell-o"></i><span class=""> Notification</span></h2>
            <a href="#"><i class="fa fa-cog pull-right "></i></a>
        </div>
        <ul class="list-unstyled mCustomScrollbar margin-bottom-20" data-mcs-theme="minimal-dark">
            <li class="notification">
                <i class="icon-custom icon-sm rounded-x icon-bg-red icon-line icon-envelope"></i>
                <div class="overflow-h ">
                    <span><strong>Albert Heller</strong> has sent you email.</span>
                    <small>Two minutes ago</small>
                </div>
            </li>
            <li class="notification">
                <img class="rounded-x" src="{{ url('assets/images/testimonials/img6.jpg') }}" alt="">
                <div class="overflow-h ">
                    <span><strong>Taylor Lee</strong> started following you.</span>
                    <small>Today 18:25 pm</small>
                </div>
            </li>
            <li class="notification">
                <i class="icon-custom icon-sm rounded-x icon-bg-yellow icon-line fa fa-bolt"></i>
                <div class="overflow-h ">
                    <span><strong>Natasha Kolnikova</strong> accepted your invitation.</span>
                    <small>Yesterday 1:07 pm</small>
                </div>
            </li>
            <li class="notification">
                <img class="rounded-x" src="{{ url('assets/images/testimonials/img1.jpg') }}" alt="">
                <div class="overflow-h ">
                    <span><strong>Mikel Andrews</strong> commented on your Timeline.</span>
                    <small>23/12 11:01 am</small>
                </div>
            </li>
            <li class="notification">
                <i class="icon-custom icon-sm rounded-x icon-bg-blue icon-line fa fa-comments"></i>
                <div class="overflow-h ">
                    <span><strong>Bruno Js.</strong> added you to group chating.</span>
                    <small>Yesterday 1:07 pm</small>
                </div>
            </li>
            <li class="notification">
                <img class="rounded-x" src="{{ url('assets/images/testimonials/img6.jpg') }}" alt="">
                <div class="overflow-h ">
                    <span><strong>Taylor Lee</strong> changed profile picture.</span>
                    <small>23/12 15:15 pm</small>
                </div>
            </li>
        </ul>
        <button type="button" class="btn-u btn-u-default btn-u-sm btn-block ">Load More</button> -->
        <!-- End Notification -->

        <!-- <div class="margin-bottom-50"></div> -->

        <!--Datepicker -->
        <!-- <form action="#" id="sky-form2" class="sky-form">
            <div id="inline-start"></div>
        </form> -->
        <!--End Datepicker-->
    </div>
    <!--End of nav-side-padding-->
</div>
<!--End Left Sidebar-->

@section('userSidebarJs')
    <script>

        document.getElementById("sidenav").style.width = "300px";
        document.getElementById("main").style.marginLeft = "300px";

        function closeNav() {
            if(!$('.sidenav').hasClass('sidebar-collapsed')){
                document.getElementById("sidenav").style.width = "50px";
                document.getElementById("main").style.marginLeft= "50px";
                $('.sidenav').addClass('sidebar-collapsed');
                $('.collapsable-item').slideToggle();
                $('a.logo').toggle();
            }

        }

        function openNav() {
            if($('.sidenav').hasClass('sidebar-collapsed')){
                $('.sidenav').removeClass('sidebar-collapsed');
                $('.collapsable-item').toggle();
                document.getElementById("sidenav").style.width = "300px";
                document.getElementById("main").style.marginLeft = "300px";
                $('a.logo').slideToggle();
            }

        }


        $(function(){
            manageSideBarWidths();
            // manageMaxWindowHeights();

            $('.li.list-group-item').removeClass('active');
            $('#{{ str_replace('/', '-', \Request::path()) }}').parent().addClass('active');

            function findSideBarWidths(){
                var wrapper = $('.wrapper').width();

                var widths = new Object;
                widths['wrapper'] = wrapper;

                return widths;
            }

            // function findWindowHeights(){
            //     var windowHeights = $('#main').height();

            //     var heights = new Object;
            //     heights['windowHeights'] = windowHeights;

            //     return heights;
            // }

            function manageSideBarWidths(){
                var widths = findSideBarWidths();
                if( widths.wrapper <= 991 ){
                    closeNav();
                } else {
                    openNav();
                }
            }

            function manageMaxWindowHeights(){
                var windowHeights = findWindowHeights();

                $('div#sidenav.sidenav').height(windowHeights.windowHeights);
                // $('#main').css({'min-height': windowHeights.windowHeights});
            }

            $( window ).resize(function() {
                manageSideBarWidths();
                // manageMaxWindowHeights();
            });
        });
    </script>
@endsection
