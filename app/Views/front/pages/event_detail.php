<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Events</a></li>
        <li class="active"><?=$event['event_title']?></li>
    </ol>
</div>
<!-- end Breadcrumb -->
<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-8">

                <div id="page-main">
                    <section id="event-detail">
                        <article class="event-detail">
                            <section id="event-header">
                                <header>
                                    <h1><?=$event['event_title']?></h1>
                                </header>
                                <header>
                                    <h2 class="event-date"><?= date("l F d, Y", strtotime($event['event_date'])) ?></h2>
                                </header>
                                <hr>
                            </section><!-- /#course-header -->

                            <section id="course-info">
                                <header>
                                    <h2>Event Info</h2>
                                </header>
                                <?=$event['event_detail']?>
                            </section><!-- /#course-info -->
                        </article><!-- /.course-detail -->
                    </section><!-- /.course-detail -->
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

            <!--SIDEBAR Content-->
            <?php include('sidebar.php') ?>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- Page Content -->