<style>
    .navigation-wrapper .primary-navigation-wrapper header nav .navbar-nav .open-subchild{
        position: relative;
    }
    .navigation-wrapper .primary-navigation-wrapper header nav .navbar-nav .open-subchild .subchild-navigation {
        visibility: hidden !important;
        opacity: 0 !important;
    }

    .navigation-wrapper .primary-navigation-wrapper header nav .navbar-nav .open-subchild:hover .subchild-navigation {
        visibility: visible !important;
        opacity: 1 !important;
    }

    .navigation-wrapper .primary-navigation-wrapper header nav .navbar-nav li .subchild-navigation {
        left: 100%;
        top: 0;
        position: absolute;
    }
    .navigation-wrapper .primary-navigation-wrapper header nav .navbar-nav li .subchild-navigation li:first-child a:after  {
        content: none;
    }
</style>
<div class="navigation-wrapper">
    <div class="secondary-navigation-wrapper">
        <div class="container">
            <div class="navigation-contact pull-left">Call Us: @<span class="opacity-70"> +91 8449470500</span></div>
            <ul class="secondary-navigation list-unstyled">
                <li><a href="/#admission">Admission Form</a></li>
                <li><a href="www.facebook.com/ssitjaspur"><i class="fa fa-facebook fa-lg"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter fa-lg"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble fa-lg"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin fa-lg"></i></a></li>
                <li><a href="#"><i class="fa fa-vimeo-square fa-lg"></i></a></li>
            </ul>
        </div>
    </div><!-- /.secondary-navigation -->
    <div class="primary-navigation-wrapper">
        <header class="navbar" id="top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <a href="/"><img src="/images/logo/logo-ssit.png" alt="brand"></a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="">
                            <a href="/">Home</a>
                        </li>
                        <!--<li>
                            <a href="#" class=" has-child no-link">Courses</a>
                            <ul class="list-unstyled child-navigation">
                                <li><a href="course-landing-page.html">Course Landing Page</a></li>
                                <li><a href="course-listing.html">Course Listing</a></li>
                                <li><a href="course-listing-images.html">Course Listing with Images</a></li>
                                <li><a href="course-detail-v1.html">Course Detail v1</a></li>
                                <li><a href="course-detail-v2.html">Course Detail v2</a></li>
                                <li><a href="course-detail-v3.html">Course Detail v3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="has-child no-link">Events</a>
                            <ul class="list-unstyled child-navigation">
                                <li><a href="event-listing-images.html">Events Listing with images</a></li>
                                <li><a href="event-listing.html">Events Listing</a></li>
                                <li><a href="event-grid.html">Events Grid</a></li>
                                <li><a href="event-detail.html">Event Detail</a></li>
                                <li><a href="event-calendar.html">Events Calendar</a></li>
                            </ul>
                        </li>-->
                        <li>
                            <a class="has-child no-link">About Us</a>
                            <ul class="list-unstyled child-navigation">
                                <li><a href="/about-us">About SSIT</a></li>
                                <li><a href="/vision-mission">Vision & Mission</a></li>
                                <li><a href="/chairman-message">Chairman's Message</a></li>
                                <li><a href="/principal-message">Principal's Message</a></li>
                                <li><a href="/assets/pdf/AICTE_APPROVAL_2020-21.pdf">AICTE APPROVAL 2020-2021</a></li>
                                <li><a href="/assets/pdf/AICTE_APPROVAL_2019-20.pdf">AICTE APPROVAL 2019-2020</a></li>
                                <li><a href="/assets/pdf/AICTE_APPROVAL_2018-19.pdf">AICTE APPROVAL 2018-2019</a></li>
                                <li><a href="/assets/pdf/AICTE_APPROVAL_2017-18.pdf">AICTE APPROVAL 2017-2018</a></li>
                                <li><a href="/assets/pdf/AICTE_APPROVAL_2016-17.pdf">AICTE APPROVAL 2016-2017</a></li>
                                <li><a href="/assets/pdf/AICTE_APPROVAL_2015-16.pdf">AICTE APPROVAL 2015-2016</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/why-ssit">Why SSIT</a>
                        </li>
                        <li>
                            <a class="has-child no-link">Academics</a>
                            <ul class="list-unstyled child-navigation">
                                <li class="open-subchild"><a class="has-child" href="/course/applied-science">Department Of Applied Science</a>
                                    <ul class="list-unstyled child-navigation subchild-navigation">
                                        <li><a href="/aboutapplieddept">About The Dept.</a></li>
                                        <li><a href="/AppliedScienceHODMessage">HOD Message</a></li>
                                    </ul>
                                <li class="open-subchild"><a class="has-child" href="/course/civil-engineering">Department Of Civil Engineering</a>
                                    <ul class="list-unstyled child-navigation subchild-navigation">
                                        <li><a href="/course/applied-science">About The Dept.</a></li>
                                        <li><a href="/AppliedScienceHODMessage">HOD Message</a></li>
                                    </ul>
                                </li>
                                <li class="open-subchild"><a class="has-child" href="/course/electrical-engineering">Department Of Electrical Engineering</a>
                                    <ul class="list-unstyled child-navigation subchild-navigation">
                                        <li><a href="">About The Dept.</a></li>
                                        <li><a href="">HOD Message</a></li>
                                    </ul>
                                <li class="open-subchild"><a class="has-child" href="/course/mechanical-engineering">Department Of Mechinal Engineering</a>
                                    <ul class="list-unstyled child-navigation subchild-navigation">
                                        <li><a href="">About The Dept.</a></li>
                                        <li><a href="">HOD Message</a></li>
                                    </ul>
                            </ul>
                        </li>
                        <li>
                            <a class="has-child no-link">Admission</a>
                            <ul class="list-unstyled child-navigation">
                                <li><a href="/admission">Admission Process</a></li>
                                <li><a href="/assets/pdf/Registration_form 2020.pdf">Registration Form</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="/press-release">Press Release</a>
                        </li>
                        <li>
                            <a href="/gallery">Gallery</a>
                        </li>
                        <li>
                            <a href="/contact-us">Contact Us</a>
                        </li>
                    </ul>
                </nav><!-- /.navbar collapse-->
            </div><!-- /.container -->
        </header><!-- /.navbar -->
    </div><!-- /.primary-navigation -->
    <div class="background">
        <img src="/assets/img/background-city.png" alt="background">
    </div>
</div>