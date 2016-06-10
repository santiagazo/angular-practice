<!--Status Updates-->
<div class="profile-status">
    <ul class="list-inline pull-right">
        <li>
            <div class="col-xs-1">
                <a href="{{ URL::to('user/account/action') }}" data-toggle="tooltip" data-placement="bottom" title="Action Items"><i class="fa fa-check-square fa-2x"></i>
                <span class="badge badge-red rounded-x">1</span></a>
            </div>
        </li>
        <li>
            <div class="col-xs-1">
                <a href="{{ URL::to('user/account/milestones') }}" data-toggle="tooltip" data-placement="bottom" title="Milestones"><i class="fa fa-trophy fa-2x"></i>
                <span class="badge rounded-x">0</span></a>
            </div>
        </li>
        <li>
            <div class="col-xs-1">
                <a href="{{ URL::to('user/account/notifications') }}" data-toggle="tooltip" data-placement="bottom" title="Notifications"><i class="fa fa-bell fa-2x"></i>
                <span class="badge rounded-x">0</span></a>
            </div>
        </li>
        <li>
            <div class="col-xs-1">
                <a href="{{ URL::to('user/account/log') }}" data-toggle="tooltip" data-placement="bottom" title="Log Progress"><i class="fa fa-pencil fa-2x"></i>
                <span class="badge rounded-x">0</span></a>
            </div>
        </li>
    </ul>
</div>
<!--/End Status Updates-->
