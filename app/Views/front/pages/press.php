<?php $db = db_connect();
$images = $db->table('press')->orderBy('press_id', 'desc')->get()->getResult('array'); ?>
<style>
    .gallery-list li {
        width: 200px;
        height: 200px;
        margin-bottom: 15px;
        margin-right: 15px;
    }
</style>
<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Press Release</li>
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
                    <section id="right-sidebar">
                        <header>
                            <h2>Press Release</h2>
                        </header>
                        <div class="row">
                            <div class="col-12" style="text-align: center;">
                                <?php foreach ($images as $image) : ?><div style="margin-top: 15px ;padding: 15px; border: 1px solid #dee2e6!important;"><img class="img-responsive" src="/images/press/full/<?= $image['press_name'] ?>" alt=""></div><?php endforeach ?>
                            </div>
                        </div>
                    </section>
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

            <!--SIDEBAR Content-->
            <?php include('sidebar.php') ?>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->