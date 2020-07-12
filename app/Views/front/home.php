<?php $db = db_connect();
$images = $db->table('slider')->orderBy('slider_id', 'desc')->get()->getResult('array');
$gallery = $db->table('gallery')->orderBy('gallery_id', 'desc')->limit(14)->get()->getResult('array'); ?><div id="page-content">
    <!-- Slider -->
    <div id="homepage-carousel">
        <div class="container">
            <div class="homepage-carousel-wrapper">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <div class="image-carousel">
                            <?php foreach ($images as $img) : ?>
                                <div class="image-carousel-slide"><img src="/images/slider/full/<?= $img['slider_name'] ?>" alt=""></div>
                            <?php endforeach ?>
                        </div><!-- /.slider-image -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-5">
                        <div class="slider-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>Join the comunity of modern thinking students</h1>
                                    <form class="ajax-form" role="form" action="/home/form/admission" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input class="form-control has-dark-background" name="name" id="slider-name" placeholder="Full Name" type="text" required="">
                                                </div>
                                            </div><!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input class="form-control has-dark-background" name="phone" id="slider-email" placeholder="Phone" type="tel" required="">
                                                </div>
                                            </div><!-- /.col-md-6 -->
                                        </div><!-- /.row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <select name="level" id="slider-study-level" class="has-dark-background">
                                                        <option value="- Not selected -">Study Level</option>
                                                        <option value="Beginner">Beginner</option>
                                                        <option value="Advanced">Advanced</option>
                                                        <option value="Intermediate">Intermediate</option>
                                                        <option value="Professional">Professional</option>
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div><!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <select name="course" id="slider-course" class="has-dark-background">
                                                        <option value="- Not selected -">Courses</option>
                                                        <option value="Art and Design">Art and Design</option>
                                                        <option value="Marketing">Marketing</option>
                                                        <option value="Science">Science</option>
                                                        <option value="History and Psychology"></option>
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div><!-- /.col-md-6 -->
                                        </div><!-- /.row -->
                                        <button type="submit" id="slider-submit" class="btn btn-framed pull-right">Submit</button>
                                        <div id="form-status"></div>
                                    </form>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.slider-content -->
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
                <div class="background"></div>
            </div><!-- /.slider-wrapper -->
            <div class="slider-inner"></div>
        </div><!-- /.container -->
    </div>
    <!-- end Slider -->

    <!-- News, Events, About -->
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <section class="news-small" id="news-small">
                        <header>
                            <h2>News</h2>
                        </header>
                        <div class="section-content">
                            <article>
                                <figure class="date"><i class="fa fa-file-o"></i>08-24-2014</figure>
                                <header><a href="#">U-M School of Public Health, Detroit partners aim to improve air quality in the city</a></header>
                            </article><!-- /article -->
                            <article>
                                <figure class="date"><i class="fa fa-file-o"></i>08-24-2014</figure>
                                <header><a href="#">At 50, Center for the Education of Women celebrates a wider mission</a></header>
                            </article><!-- /article -->
                            <article>
                                <figure class="date"><i class="fa fa-file-o"></i>08-24-2014</figure>
                                <header><a href="#">Three U-Michigan scientists receive Sloan fellowships</a></header>
                            </article><!-- /article -->
                        </div><!-- /.section-content -->
                        <a href="" class="read-more stick-to-bottom">All News</a>
                    </section><!-- /.news-small -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4 col-sm-6">
                    <section class="events small" id="events-small">
                        <header>
                            <h2>Events</h2>
                            <a href="" class="link-calendar">Calendar</a>
                        </header>
                        <div class="section-content">
                            <article class="event nearest">
                                <figure class="date">
                                    <div class="month">jan</div>
                                    <div class="day">18</div>
                                </figure>
                                <aside>
                                    <header>
                                        <a href="event-detail.html">Conservatory Exhibit: The garden of india a country and culture revealed</a>
                                    </header>
                                    <div class="additional-info">Matthaei Botanical Gardens</div>
                                </aside>
                            </article><!-- /article -->
                            <article class="event nearest-second">
                                <figure class="date">
                                    <div class="month">feb</div>
                                    <div class="day">01</div>
                                </figure>
                                <aside>
                                    <header>
                                        <a href="event-detail.html">February Half-Term Activities: Big Stars and Little Secrets </a>
                                    </header>
                                    <div class="additional-info clearfix">Pitt Rivers and Natural History Museums</div>
                                </aside>
                            </article><!-- /article -->
                            <article class="event">
                                <figure class="date">
                                    <div class="month">mar</div>
                                    <div class="day">23</div>
                                </figure>
                                <aside>
                                    <header>
                                        <a href="event-detail.html">The Orchestra of the Age of Enlightenment perform with Music</a>
                                    </header>
                                    <div class="additional-info">Faculty of Music</div>
                                </aside>
                            </article><!-- /article -->
                        </div><!-- /.section-content -->
                    </section><!-- /.events-small -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4 col-sm-12">
                    <section id="about">
                        <header>
                            <h2>About Universo</h2>
                        </header>
                        <div class="section-content">
                            <img src="assets/img/students.jpg" alt="" class="add-margin">
                            <p><strong>Welcome o Universo.</strong> Premium HTML Template for schools, universieties and other educational institutes.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet semper tincidunt.
                                Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
                            <a href="" class="read-more stick-to-bottom">Read More</a>
                        </div><!-- /.section-content -->
                    </section><!-- /.about -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end News, Events, About -->

    <!-- Testimonial -->
    <section id="testimonials">
        <div class="block">
            <div class="container">
                <div class="author-carousel">
                    <div class="author">
                        <blockquote>
                            <figure class="author-picture"><img src="assets/img/student-testimonial.jpg" alt=""></figure>
                            <article class="paragraph-wrapper">
                                <div class="inner">
                                    <header>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor.
                                        Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet.</header>
                                    <footer>Claire Doe</footer>
                                </div>
                            </article>
                        </blockquote>
                    </div><!-- /.author -->
                    <div class="author">
                        <blockquote>
                            <figure class="author-picture"><img src="assets/img/student-testimonial.jpg" alt=""></figure>
                            <article class="paragraph-wrapper">
                                <div class="inner">
                                    <header>Morbi nec nisi ante. Quisque lacus ligula, iaculis in elit et, interdum semper quam. Fusce in interdum tortor.
                                        Ut sollicitudin lectus dolor eget imperdiet libero pulvinar sit amet.</header>
                                    <footer>Claire Doe</footer>
                                </div>
                            </article>
                        </blockquote>
                    </div><!-- /.author -->
                </div><!-- /.author-carousel -->
            </div><!-- /.container -->
        </div><!-- /.block -->
    </section>
    <!-- end Testimonial -->

    <!-- Academic Life, Campus Life, Newsletter -->
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <section id="academic-life">
                        <header>
                            <h2>Academic Life & Research</h2>
                        </header>
                        <div class="section-content">
                            <ul class="list-links">
                                <li><a href="#">Programs and Areas</a></li>
                                <li><a href="#">Research</a></li>
                                <li><a href="#">Graduate & Postdoctoral Programs</a></li>
                                <li><a href="#">Continuing Studies</a></li>
                                <li><a href="#">International Activities</a></li>
                                <li><a href="#">Course Calendars & Listings</a></li>
                            </ul>
                        </div><!-- /.section-content -->
                    </section><!-- /.academic-life -->
                </div><!-- /.col-md-4 -->

                <div class="col-md-4 col-sm-4">
                    <section id="campus-life">
                        <header>
                            <h2>Campus Life</h2>
                        </header>
                        <div class="section-content">
                            <ul class="list-links">
                                <li><a href="#">Athletics & Recreation</a></li>
                                <li><a href="#">Clubs & Extra-curricular Activities</a></li>
                                <li><a href="#">Health & Wellness</a></li>
                                <li><a href="#">Housing & Residence</a></li>
                                <li><a href="#">Arts & Culture</a></li>
                                <li><a href="#">Student IT Services</a></li>
                            </ul>
                        </div><!-- /.section-content -->
                    </section><!-- /.campus-life -->
                </div><!-- /.col-md-4 -->

                <div class="col-md-4 col-sm-4">
                    <section id="newsletter">
                        <header>
                            <h2>Newsletter</h2>
                            <div class="section-content">
                                <div class="newsletter">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Your e-mail">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn"><i class="fa fa-angle-right"></i></button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div><!-- /.newsletter -->
                                <p class="opacity-50">Ut tincidunt, quam in tincidunt vestibulum, turpis ipsum porttitor nisi, et fermentum augue
                                    lit eu neque. In at tempor dolor, sit amet dictum lacus. Praesent porta orci eget laoreet ultrices.
                                </p>
                            </div><!-- /.section-content -->
                        </header>
                    </section><!-- /.newsletter -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Academic Life, Campus Life, Newsletter -->

    <!-- Divisions, Connect -->
    <div class="block">
        <div class="container">
            <div class="block-dark-background">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <section id="division" class="has-dark-background">
                            <header>
                                <h2>Divisions</h2>
                            </header>
                            <div class="section-content">
                                <ul class="list-links">
                                    <li><a href="#">Accounting & Finance</a></li>
                                    <li><a href="#">Advertising & Marketing</a></li>
                                    <li><a href="#">Architecture & Interior</a></li>
                                    <li><a href="#">Arts & Design</a></li>
                                    <li><a href="#">Broadcasting & Journalism</a></li>
                                    <li><a href="#">Business & Management</a></li>
                                    <li><a href="#">Computing & IT</a></li>
                                </ul>
                            </div><!-- /.section-content -->
                        </section><!-- #.divisions -->
                    </div>
                    <div class="col-md-9 col-sm-8">
                        <section id="connect" class="has-dark-background">
                            <header>
                                <h2>Connect</h2>
                            </header>
                            <div class="connect-block">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="active"><a href="#tab-twitter" data-toggle="pill"><i class="fa fa-twitter"></i>Twitter</a></li>
                                            <li><a href="#tab-facebook" data-toggle="pill"><i class="fa fa-facebook"></i>Facebook</a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab-twitter">
                                            <div class="col-md-3">
                                                <article class="social-post twitter-post">
                                                    <header>15 minutes ago</header>
                                                    <figure><a href="#">@universo</a></figure>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam odio augue, accumsan ut massa ut, faucibus gravida turpis.
                                                        <a href="http://bit.ly/1bMyz64">http://bit.ly/1bMyz64</a>
                                                    </p>
                                                </article><!-- /.twitter-post -->
                                            </div>
                                            <div class="col-md-3">
                                                <article class="social-post twitter-post">
                                                    <header>2 hours ago</header>
                                                    <figure><a href="#">@universo</a></figure>
                                                    <p>
                                                        Nullam odio augue, accumsan ut massa ut, faucibus gravida turpis. Nulla eleifend libero mi, at consequat tellus.
                                                        <a href="http://bit.ly/1bMyz64">http://bit.ly/1bMyz64</a>
                                                    </p>
                                                </article><!-- /.twitter-post -->
                                            </div>
                                            <div class="col-md-3">
                                                <article class="social-post twitter-post">
                                                    <header>February 02, 2014</header>
                                                    <figure><a href="#">@universo</a></figure>
                                                    <p>
                                                        Ut at arcu sed justo laoreet iaculis ut nec leo. Aliquam laoreet orci eu egestas fermentum.
                                                        <a href="http://bit.ly/1bMyz64">http://bit.ly/1bMyz64</a>
                                                    </p>
                                                </article><!-- /.twitter-post -->
                                            </div>
                                        </div><!-- /.tab-twitter -->
                                        <div class="tab-pane fade" id="tab-facebook">
                                            <div class="col-md-3">
                                                <article class="social-post facebook-post">
                                                    <header>30 minutes ago</header>
                                                    <figure><a href="#">@universo</a></figure>
                                                    <p>
                                                        Ut at arcu sed justo laoreet iaculis ut nec leo. Aliquam laoreet orci eu egestas fermentum.
                                                        <a href="http://bit.ly/1bMyz64">http://bit.ly/1bMyz64</a>
                                                    </p>
                                                </article><!-- /.twitter-post -->
                                            </div>
                                            <div class="col-md-3">
                                                <article class="social-post facebook-post">
                                                    <header>4 days ago</header>
                                                    <figure><a href="#">@universo</a></figure>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam odio augue, accumsan ut massa ut, faucibus gravida turpis.
                                                        <a href="http://bit.ly/1bMyz64">http://bit.ly/1bMyz64</a>
                                                    </p>
                                                </article><!-- /.twitter-post -->
                                            </div>
                                            <div class="col-md-3">
                                                <article class="social-post facebook-post">
                                                    <header>One week ago</header>
                                                    <figure><a href="#">@universo</a></figure>
                                                    <p>
                                                        Nullam odio augue, accumsan ut massa ut, faucibus gravida turpis. Nulla eleifend libero mi, at consequat tellus.
                                                        <a href="http://bit.ly/1bMyz64">http://bit.ly/1bMyz64</a>
                                                    </p>
                                                </article><!-- /.twitter-post -->
                                            </div>
                                        </div><!-- /.tab-twitter -->
                                    </div><!-- /.tab-content -->
                                </div><!-- /.row -->
                            </div><!-- /.section-content -->
                        </section><!-- #.divisions -->
                    </div><!-- /.col-md-9 -->
                </div><!-- /.row -->
            </div><!-- /.block-dark-background -->
        </div><!-- /.container -->
    </div>
    <!-- end Divisions, Connect -->

    <!-- Our Professors, Gallery -->
    <div class="block">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <section id="gallery">
                        <header>
                            <h2>Gallery</h2>
                        </header>
                        <div class="section-content">
                            <ul class="gallery-list">
                                <?php foreach ($gallery as $img) : ?>
                                    <li><a href="/images/gallery/full/<?= $img['gallery_name'] ?>" class="image-popup"><img src="/images/gallery/thumb/<?= $img['gallery_name'] ?>" alt=""></a></li>
                                <?php endforeach ?>
                            </ul>
                            <a href="/gallery" class="read-more">Go to Gallery</a>
                        </div><!-- /.section-content -->
                    </section><!-- /.gallery -->
                </div><!-- /.col-md-4 -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Our Professors, Gallery -->

    <?php /* ?><!-- Partners, Make a Donation -->
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9">
                    <section id="partners">
                        <header>
                            <h2>Partners & Donors</h2>
                        </header>
                        <div class="section-content">
                            <div class="logos">
                                <div class="logo"><a href=""><img src="assets/img/logo-partner-01.png" alt=""></a></div>
                                <div class="logo"><a href=""><img src="assets/img/logo-partner-02.png" alt=""></a></div>
                                <div class="logo"><a href=""><img src="assets/img/logo-partner-03.png" alt=""></a></div>
                                <div class="logo"><a href=""><img src="assets/img/logo-partner-04.png" alt=""></a></div>
                                <div class="logo"><a href=""><img src="assets/img/logo-partner-05.png" alt=""></a></div>
                            </div>
                        </div>
                    </section>
                </div><!-- /.col-md-9 -->
                <div class="col-md-3 col-sm-3">
                    <section id="donation">
                        <header>
                            <h2>Make a Donation</h2>
                        </header>
                        <div class="section-content">
                            <a href="" class="universal-button">
                                <h3>Support the University of Universo!</h3>
                                <figure class="date"><i class="fa fa-arrow-right"></i></figure>
                            </a>
                        </div><!-- /.section-content -->
                    </section>
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Partners, Make a Donation --><?php */ ?>
</div>