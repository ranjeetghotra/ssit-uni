<style>
    .events.images .event .event-thumbnail .event-image .image-wrapper img {
        height: 165px;
    }
    .author-picture img{
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>
<div id="page-content">
    <!-- Slider -->
    <div id="homepage-carousel">
        <div class="container">
            <div class="homepage-carousel-wrapper">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <div class="image-carousel">
                            <?php foreach ($images as $img) : ?>
                                <div class="image-carousel-slide"><img style="height: 320px; width: 100%; object-fit: cover;" src="/images/slider/full/<?= $img['slider_name'] ?>" alt=""></div>
                            <?php endforeach ?>
                        </div><!-- /.slider-image -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-5" id="admission">
                        <div class="slider-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>Admission Form - Join the comunity of modern thinking students</h1>
                                    <form class="ajax-form" role="form" action="/home/form/admission" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input class="form-control has-dark-background" name="name" id="slider-name" placeholder="Full Name" type="text" required="">
                                                </div>
                                            </div><!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input class="form-control has-dark-background" name="phone" id="slider-email" placeholder="Contact No." type="tel" required="">
                                                </div>
                                            </div><!-- /.col-md-6 -->
                                        </div><!-- /.row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input class="form-control has-dark-background" name="email" id="slider-name" placeholder="E-mail ID" type="text">
                                                </div>
                                            </div><!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input class="form-control has-dark-background" name="city" id="slider-email" placeholder="City" type="text" required="">
                                                </div>
                                            </div><!-- /.col-md-6 -->
                                        </div><!-- /.row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <select name="course" id="slider-course" class="has-dark-background">
                                                        <option value="- Not selected -">Courses</option>
                                                        <option value="Diploma In Engineering – Regular (Mechanical Engineering)">Diploma In Engineering – Regular (Mechanical Engineering)</option>
                                                        <option value="Diploma In Engineering – Regular (Civil Engineering)">Diploma In Engineering – Regular (Civil Engineering)</option>
                                                        <option value="Diploma In Engineering – Regular (Electrical Engineering)">Diploma In Engineering – Regular (Electrical Engineering)</option>
                                                        <option value="Diploma In Engineering – Lateral (Mechanical Engineering)">Diploma In Engineering – Lateral (Mechanical Engineering)</option>
                                                        <option value="Diploma In Engineering – Lateral (Civil Engineering)">Diploma In Engineering – Lateral (Civil Engineering)</option>
                                                        <option value="Diploma In Engineering – Lateral (Electrical Engineering)">Diploma In Engineering – Lateral (Electrical Engineering)</option>
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div><!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <button type="submit" id="slider-submit" class="btn btn-framed pull-right">Submit</button>
                                                <div id="form-status"></div>
                                            </div>
                                        </div><!-- /.row -->
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
                            <?php foreach ($news as $n) : ?>
                                <article>
                                    <figure class="date"><i class="fa fa-file-o"></i><?= date('j-M-Y', strtotime($n['news_created_at'])) ?></figure>
                                    <header><a href="/news/<?= $n['news_id'] ?>"><?= $n['news_title'] ?></a></header>
                                </article><!-- /article -->
                            <?php endforeach ?>
                        </div><!-- /.section-content -->
                        <!--<a href="" class="read-more stick-to-bottom">All News</a>-->
                    </section><!-- /.news-small -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4 col-sm-6">
                    <section class="events small" id="events-small">
                        <header>
                            <h2>Events</h2>
                        </header>
                        <div class="section-content">
                            <?php $i = 0;
                            foreach ($event as $e) : $i++; ?>
                                <article class="event <?= $i == 1 ? 'nearest' : ($i == 2 ? 'nearest-second' : '') ?>">
                                    <figure class="date">
                                        <div class="month"><?= date("M", strtotime($e['event_date'])) ?></div>
                                        <div class="day"><?= date("d", strtotime($e['event_date'])) ?></div>
                                    </figure>
                                    <aside>
                                        <header>
                                            <a href="/event/<?= $e['event_id'] ?>"><?= $e['event_title'] ?></a>
                                        </header>
                                        <div class="additional-info" style="min-height: 15px;"><?= $e['event_location'] ?></div>
                                    </aside>
                                </article><!-- /article -->
                            <?php endforeach ?>
                        </div><!-- /.section-content -->
                    </section><!-- /.events-small -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4 col-sm-12">
                    <section id="about">
                        <header>
                            <h2>About Sri Sai Institute Of Technology</h2>
                        </header>
                        <div class="section-content">
                            <img src="/assets/img/campus/college.png" alt="" class="add-margin img-responsive">
                            <p>The <strong>Sri Sai Institute of Technology</strong> is setup to impart quality education in the field of Diploma in Engineering like Mechanical Civil, Electrical Enginerring and to groom young people with knowledge and skills.
                                <br> SSIT is the congregation of knowledge and vision that provides a unique opportunity for students to gain insights into tomorrow’s technology.</p>
                            <br><a href="/about-us" class="read-more stick-to-bottom">Read More</a>
                        </div><!-- /.section-content -->
                    </section><!-- /.about -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end News, Events, About -->
    <div class="container">
        <section class="events images row">
            <article class="event col-md-6">
                <div class="event-thumbnail">
                    <figure class="event-image">
                        <div class="image-wrapper"><img src="/assets/img/course/Civil.jpg"></div>
                    </figure>
                </div>
                <aside>
                    <header>
                        <a href="">Diploma in Civil Engineering</a>
                    </header>
                    <div class="additional-info">
                        <a></a>
                    </div>
                    <div class="description">
                    </div>
                    <a href="" class="btn btn-framed btn-color-grey btn-small">View Details</a>
                </aside>
            </article>
            <article class="event col-md-6">
                <div class="event-thumbnail">
                    <figure class="event-image">
                        <div class="image-wrapper"><img src="/assets/img/course/Electrical.jpg"></div>
                    </figure>
                </div>
                <aside>
                    <header>
                        <a href="">Diploma in Electrical Engineering</a>
                    </header>
                    <div class="additional-info">
                        <a></a>
                    </div>
                    <div class="description">
                    </div>
                    <a href="" class="btn btn-framed btn-color-grey btn-small">View Details</a>
                </aside>
            </article>
            <article class="event col-md-6">
                <div class="event-thumbnail">
                    <figure class="event-image">
                        <div class="image-wrapper"><img src="/assets/img/course/Mechanical.jpg"></div>
                    </figure>
                </div>
                <aside>
                    <header>
                        <a href="">Diploma in Mechanical Engineering</a>
                    </header>
                    <div class="additional-info">
                        <a></a>
                    </div>
                    <div class="description">
                    </div>
                    <a href="" class="btn btn-framed btn-color-grey btn-small">View Details</a>
                </aside>
            </article>
        </section>
    </div>
    <!-- Testimonial -->
    <section id="testimonials">
        <div class="block">
            <div class="container">
                <div class="author-carousel">
                    <div class="author">
                        <blockquote>
                            <figure class="author-picture"><img src="/images/testimonial/Usmaan.PNG" alt=""></figure>
                            <article class="paragraph-wrapper">
                                <div class="inner">
                                    <header>I feel proud to have a alumni of Sri Sai Polytechnic.</header>
                                    <footer>Usmaan Saifi - Lohaar Enginerring and Construction Private Ltd.</footer>
                                </div>
                            </article>
                        </blockquote>
                    </div><!-- /.author -->
                    <div class="author">
                        <blockquote>
                            <figure class="author-picture"><img src="/images/testimonial/Prateek.jpg" alt=""></figure>
                            <article class="paragraph-wrapper">
                                <div class="inner">
                                    <header> I am highly obliged to Hon'ble Chairman Sir, Respected Director Sir and departmental Head and faculty members for their Continuous Support and Guidance. </header>
                                    <footer>Prateek Kumar - Bajaj Motors Haridwar</footer>
                                </div>
                            </article>
                        </blockquote>
                    </div><!-- /.author -->
                </div><!-- /.author-carousel -->
            </div><!-- /.container -->
        </div><!-- /.block -->
    </section>
    <!-- end Testimonial -->
    <?php /*
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
    <!-- end Academic Life, Campus Life, Newsletter -->*/ ?>

    <?php /* ?>  <!-- Divisions, Connect -->
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
    <!-- end Divisions, Connect --><?php */ ?>

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