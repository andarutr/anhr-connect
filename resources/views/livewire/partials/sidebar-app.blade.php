<div>
    <aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
        <div class="side-content mr-t-30 mr-lr-15"><a class="btn btn-block btn-success ripple fw-600"
                href="#"><i class="fa fa-plus-square-o mr-1 mr-0-rtl ml-1-rtl"></i> ANHR CONNECT</a>
        </div>
        <nav class="sidebar-nav">
            <ul class="nav in side-menu">
                @if(Auth::user()->is_admin == 1)
                <li class="current-page menu-item">
                    <a href="/admin">
                        <i class="list-icon feather feather-command"></i> 
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="current-page menu-item">
                    <a href="/admin/manage-users">
                        <i class="list-icon feather feather-settings"></i> 
                        <span class="hide-menu">Manage Users</span>
                    </a>
                </li>
                <li class="current-page menu-item">
                    <a href="/admin/manage-company-mcu">
                        <i class="list-icon feather feather-save"></i> 
                        <span class="hide-menu">Manage MCU</span>
                    </a>
                </li>
                <li class="current-page menu-item">
                    <a href="/admin/manage-interview-user">
                        <i class="list-icon feather feather-users"></i> 
                        <span class="hide-menu">Manage User Int</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->is_admin == 2)
                <li class="current-page menu-item">
                    <a href="/hrd">
                        <i class="list-icon feather feather-command"></i> 
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="current-page menu-item">
                    <a href="/hrd/job-posting">
                        <i class="list-icon feather feather-file-plus"></i> 
                        <span class="hide-menu">Job Posting</span>
                    </a>
                </li>
                <li class="menu-item-has-children"><a href="javascript:void(0);"><i
                            class="list-icon feather feather-briefcase"></i> <span class="hide-menu">Candidate <span
                                class="badge bg-primary">6</span></span></a>
                    <ul class="list-unstyled sub-menu">
                        <li>
                            <a href="/hrd/candidate/apply">Apply</a>
                        </li>
                        <li>
                            <a href="/hrd/candidate/screening">Screening</a>
                        </li>
                        <li>
                            <a href="/hrd/candidate/hr">Interview HRD</a>
                        </li>
                        <li>
                            <a href="/hrd/candidate/user">Interview User</a>
                        </li>
                        <li>
                            <a href="/hrd/candidate/psikotest">Psikotest</a>
                        </li>
                        <li>
                            <a href="/hrd/candidate/technical-test">Technical Test</a>
                        </li>
                        <li>
                            <a href="/hrd/candidate/mcu">MCU</a>
                        </li>
                        <li>
                            <a href="/hrd/candidate/on-boarding">On Boarding</a>
                        </li>
                        <li>
                            <a href="/hrd/candidate/hired">Hired</a>
                        </li>
                        <li>
                            <a href="/hrd/candidate/rejected">Rejected</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
    </aside>
</div>
