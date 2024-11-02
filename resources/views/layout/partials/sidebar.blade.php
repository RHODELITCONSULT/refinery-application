<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Main</h6>
                    <ul>
                        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}"><i
                                    data-feather="grid"></i><span>Dashboard</span></a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">People</h6>
                    <ul>
                        <li class="{{ Request::is('customers') ? 'active' : '' }}"><a href="{{ url('customers') }}"><i
                                    data-feather="user"></i><span>Customers</span></a>
                        </li>
                        <li class="{{ Request::is('consignor-list') ? 'active' : '' }}"><a
                                href="{{ url('consignor-list') }}"><i
                                    data-feather="codesandbox"></i><span>Consignors</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Provisionals</h6>
                    <ul>
                        <li class="{{ Request::is('product-list', 'product-details') ? 'active' : '' }}"><a
                                href="{{ url('product-list') }}"><i data-feather="box"></i><span>Products</span></a>
                        </li>
                        <li class="{{ Request::is('category-list') ? 'active' : '' }}"><a
                                href="{{ url('category-list') }}"><i
                                    data-feather="codepen"></i><span>Category</span></a></li>
                        <li class="{{ Request::is('meters') ? 'active' : '' }}"><a href="{{ url('meters') }}"><i
                                    data-feather="tag"></i><span>Meters</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Operations</h6>
                    <ul>
                        <li class="{{ Request::is('waybills') ? 'active' : '' }}"><a href="{{ url('waybills') }}"><i
                                    data-feather="package"></i><span>Manage Waybills</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Reporting and Analytics</h6>
                    <ul>
                        <li class="{{ Request::is('product-reporting') ? 'active' : '' }}"><a href="{{ url('product-reporting') }}"><i
                                    data-feather="activity"></i><span>Products Report</span></a>
                        </li>
                        <li class="{{ Request::is('customer-reporting') ? 'active' : '' }}"><a href="{{ url('customer-reporting') }}"><i
                                    data-feather="airplay"></i><span>Customer Report</span></a>
                        </li>
                        <li class="{{ Request::is('custom-filter-reporting') ? 'active' : '' }}"><a href="{{ url('custom-filter-reporting') }}"><i
                                    data-feather="bar-chart"></i><span>Waybill Report</span></a>
                        </li>
                    </ul>
                </li>

                <li class="submenu-open">
                    <h6 class="submenu-hdr">Settings</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('general-settings', 'security-settings', 'notification', 'connected-apps') ? 'active subdrop' : '' }}"><i
                                    data-feather="settings"></i><span>General
                                    Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('profile') }}"
                                        class="{{ Request::is('profile') ? 'active' : '' }}">Profile</a>
                                </li>
                                <li class="{{ Request::is('users') ? 'active' : '' }}"><a href="{{ url('users') }}"><i
                                    data-feather="user-check"></i><span>Users</span></a>
                        </li>

                            </ul>
                        </li>
                        <li class="{{ Request::is('signin') ? 'active' : '' }}">
                            <form action="{{route("logout")}}" id="logout-form" method="POST">@csrf</form>
                            <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit()"><i data-feather="log-out"></i><span>Logout</span> </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
