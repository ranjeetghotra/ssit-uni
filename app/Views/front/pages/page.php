<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">
            <?=$prow['page_title']?>
        </li>
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
                    <section id="about">
                        <header>
                            <h1>
                                <?=$prow['page_title']?>
                            </h1>
                        </header>
                        <div class="page-slick-carousel">
                                <?php
                        $images = json_decode($prow['page_image']);
                        foreach ($images as $img) {
                        ?>
                            <div>
                            <img class="img-thumbnail" src="/images/page/full/<?=$img?>">
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                        <?=$prow['page_content']?>
                    </section>
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

            <!--SIDEBAR Content-->
            <?php include('sidebar.php') ?>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>