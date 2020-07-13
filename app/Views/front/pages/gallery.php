<?php $db = db_connect();
$images = $db->table('gallery')->orderBy('gallery_id', 'desc')->get()->getResult('array'); ?>
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
        <li class="active">Gallery</li>
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
                            <h2>Gallery</h2>
                        </header>
                        <ul class="gallery-list">
                            <?php foreach ($images as $image) : ?>
                                <li style=""><a href="/images/gallery/full/<?= $image['gallery_name'] ?>" class="image-popup"><img src="/images/gallery/thumb/<?= $image['gallery_name'] ?>" alt=""></a></li>
                            <?php endforeach ?>
                        </ul>
                    </section>
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

            <!--SIDEBAR Content-->
            <?php include('sidebar.php') ?>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->