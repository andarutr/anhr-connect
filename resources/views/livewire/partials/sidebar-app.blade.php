<div>
    <aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
        <div class="side-content mr-t-30 mr-lr-15"><a class="btn btn-block btn-success ripple fw-600"
                href="#"><i class="fa fa-plus-square-o mr-1 mr-0-rtl ml-1-rtl"></i> ANHR CONNECT</a>
        </div>
        <nav class="sidebar-nav">
            <ul class="nav in side-menu">
                @if(Auth::user()->is_admin == 2)
                <li class="current-page menu-item">
                    <a href="/hrd">
                        <i class="list-icon feather feather-command"></i> 
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item-has-children"><a href="javascript:void(0);"><i
                            class="list-icon feather feather-briefcase"></i> <span class="hide-menu">Candidate <span
                                class="badge bg-primary">6</span></span></a>
                    <ul class="list-unstyled sub-menu">
                        <li>
                            <a href="#">Apply</a>
                        </li>
                        <li>
                            <a href="#">Screening</a>
                        </li>
                        <li>
                            <a href="#">Interview</a>
                        </li>
                        <li>
                            <a href="#">Offered</a>
                        </li>
                        <li>
                            <a href="#">Hired</a>
                        </li>
                        <li>
                            <a href="#">Rejected</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
    </aside>
</div>
