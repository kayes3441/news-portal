<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{route('admin.dashboard')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.message')}}" class="waves-effect">
                        <i class="bx bx-message"></i>
                        <span key="t-dashboards">Message</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.subscriber')}}" class="waves-effect">
                        <i class="bx bx-wrench"></i>
                        <span key="t-dashboards">Subscriber</span>
                    </a>
                </li>
                <li class="menu-title" key="t-apps">News Management</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-add-to-queue"></i>
                        <span key="t-dashboards">Category Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.category.index')}}" key="t-tui-calendar">Categories</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-news"></i>
                        <span key="t-dashboards">News Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.news.index')}}" key="t-tui-calendar">All News</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-newspaper-variant-multiple-outline"></i>
                        <span key="t-dashboards">News Type</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.news.trending-news')}}" key="t-tui-calendar">Trending News</a></li>
                        <li><a href="{{route('admin.news.feature-news')}}" key="t-tui-calendar">Feature News</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-check-shield"></i>
                        <span key="t-dashboards">News Verification</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.news.pending-news')}}" key="t-tui-calendar">Pending News</a></li>
                        <li><a href="{{route('admin.news.verified-news')}}" key="t-tui-calendar">Verified News</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-male"></i>
                        <span key="t-dashboards">Employee</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.employee.index')}}" key="t-tui-calendar">Employee</a></li>
                        {{-- <li><a href="{{route('admin.news.verified-news')}}" key="t-tui-calendar">Verified News</a></li> --}}
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
