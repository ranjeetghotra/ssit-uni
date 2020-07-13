<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= $page == "home" ? "active" : "" ?>" href="/manage">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == "gallery" ? "active" : "" ?>" href="/manage/gallery">
                            <i class="ni ni-image text-orange"></i>
                            <span class="nav-link-text">Gallery</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == "press" ? "active" : "" ?>" href="/manage/press">
                            <i class="ni ni-image text-orange"></i>
                            <span class="nav-link-text">Press Release</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == "news" ? "active" : "" ?>" href="/manage/news">
                            <i class="ni ni-single-copy-04 text-info"></i>
                            <span class="nav-link-text">News</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == "event" ? "active" : "" ?>" href="/manage/event">
                            <i class="ni ni-single-copy-04 text-black"></i>
                            <span class="nav-link-text">Events</span>
                        </a>
                    </li>
                    <li class="nav-item <?= $page == "slider" ? "active" : "" ?>">
                        <a class="nav-link" href="/manage/slider">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Slider</span>
                        </a>
                    </li>
                    <li class="nav-item <?= $page == "contact" ? "active" : "" ?>">
                        <a class="nav-link" href="/manage/contact">
                            <i class="ni ni-pin-3 text-primary"></i>
                            <span class="nav-link-text">Contact</span>
                        </a>
                    </li>
                    <li class="nav-item <?= $page == "admission" ? "active" : "" ?>">
                        <a class="nav-link" href="/manage/admission">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text">Admission</span>
                        </a>
                    </li>
                </ul>
                <?php /*<!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Documentation</span>
                </h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                            <i class="ni ni-spaceship"></i>
                            <span class="nav-link-text">Getting started</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                            <i class="ni ni-palette"></i>
                            <span class="nav-link-text">Foundation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                            <i class="ni ni-ui-04"></i>
                            <span class="nav-link-text">Components</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                            <i class="ni ni-chart-pie-35"></i>
                            <span class="nav-link-text">Plugins</span>
                        </a>
                    </li>
                </ul>*/ ?>
            </div>
        </div>
    </div>
</nav>