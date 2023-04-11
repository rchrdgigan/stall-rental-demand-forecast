<div class="nav-header">
    <a href="index.html" class="brand-logo">
        <img src="{{asset('images/Logo.jpg')}}" alt="" height="70">
    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        @yield('title')
                    </div>
                </div>
                <ul class="navbar-nav header-right">
                    <li class="nav-item">
                        <div class="input-group search-area">
                            <input type="text" class="form-control" placeholder="Search here...">
                            <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('demand.forecast')}}" class="btn btn-primary d-sm-inline-block d-none">Generate Demand<i class="las la-signal ms-3 scale5"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>