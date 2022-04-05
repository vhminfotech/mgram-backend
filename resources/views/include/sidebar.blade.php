@php
$currRoute = Route::current()->getName();
@endphp

<!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">Menu</li>
                    
                    <li >
                        <a href="{{ url('/') }}" class="waves-effect {{ $currRoute == 'dashboard' ? 'mm-active' : '' }}">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-dashboards">Dashboard</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect {{ $currRoute == 'users' ? 'mm-active' : '' }}">
                            <i class="bx bx-user"></i>
                            <span key="t-tables">Subscribers</span>
                        </a>
                        <ul class="sub-menu mm-collapse" aria-expanded="false">
                            <li><a href="{{ url('subscribers') }}" key="t-editable-table">Subscriber's List</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect {{ $currRoute == 'addOperator' || $currRoute == 'operatorlist' || $currRoute == 'editOperator' || $currRoute == 'operatorTrash'  ? 'mm-active' : '' }}">
                            <i class="bx bx-user"></i>
                            <span key="t-tables">Operator</span>
                        </a>
                        <ul class="sub-menu mm-collapse {{ $currRoute == 'addOperator' || $currRoute == 'operatorlist' || $currRoute == 'editOperator' || $currRoute == 'operatorTrash'   ? 'mm-show' : '' }}" aria-expanded="false">
                            <li><a href="{{ url('operatorlist') }}" key="t-editable-table">Operator List</a></li>
                            <li><a href="{{ url('addOperator') }}" key="t-editable-table">Add Operator</a></li>
                            <li><a href="{{ url('operatorTrash') }}" key="t-editable-table">Trash</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect {{ $currRoute == 'apnlist' || $currRoute == 'addApn' || $currRoute == 'editapn' || $currRoute == 'apnTrash' ? 'mm-active' : '' }}">
                            <i class="bx bx-user"></i>
                            <span key="t-tables">APN</span>
                        </a>
                        <ul class="sub-menu mm-collapse {{ $currRoute == 'apnlist' || $currRoute == 'addApn' || $currRoute == 'editapn' || $currRoute == 'apnTrash' ? 'mm-show' : '' }}" aria-expanded="false">
                            <li><a href="{{ url('apnlist') }}" key="t-editable-table">APN List</a></li>
                            <li><a href="{{ url('addApn') }}" key="t-editable-table">Add APN</a></li>
                             <li><a href="{{ url('apnTrash') }}" key="t-editable-table">Trash</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect {{ $currRoute == 'settings' || $currRoute == 'configIndex' || $currRoute == 'editSetting'  ? 'mm-active' : '' }}">
                           <i class="dripicons-gear"></i>
                            <span key="t-tables">Settings</span>
                        </a>
                        <ul class="sub-menu mm-collapse {{ $currRoute == 'settings' || $currRoute == 'configIndex' || $currRoute == 'editSetting'  ? 'mm-show' : '' }}" aria-expanded="false">
                            <li><a href="{{ url('settings') }}" key="t-editable-table">App Settings</a></li>
                        </ul>
                    </li>
                    
                    
<!--                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user"></i>
                            <span key="t-tables">Profile</span>
                        </a>
                        <ul class="sub-menu mm-collapse" aria-expanded="false">
                            <li><a href="{{ route('profile.show') }}" key="t-editable-table">Profile</a></li>
                            <li> <form method="POST" action="{{ route('logout') }}" x-data>  @csrf
                                <a href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form></li>
                        </ul>
                    </li>-->
                    
                </ul>
            </div>
        </div>
    </div>
