<?php
$db = db_connect();
$sideNews = $db->table('news')->orderBy('news_id', 'desc')->limit(3)->get()->getResult('array');

?>
<div class="col-md-4">
    <div id="page-sidebar" class="sidebar">
        <aside class="news-small" id="news-small">
            <header>
                <h2>Related News</h2>
            </header>
            <div class="section-content">
                <?php foreach ($sideNews as $n) : ?>
                    <article>
                        <figure class="date"><i class="fa fa-file-o"></i><?= date('j-M-Y', strtotime($n['news_created_at'])) ?></figure>
                        <header><a href="/news/<?= $n['news_id'] ?>"><?= $n['news_title'] ?></a></header>
                    </article><!-- /article -->
                <?php endforeach ?>
            </div><!-- /.section-content -->
            <!--<a href="" class="read-more">All News</a>-->
        </aside><!-- /.news-small -->
        <aside id="newsletter">
            <header>
                <h2>Newsletter</h2>
                <div class="section-content">
                    <div class="newsletter">
                        <form action="/home/form/newsletter" class="ajax-form">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="Your e-mail">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn"><i class="fa fa-angle-right"></i></button>
                                </span>
                            </div><!-- /input-group -->
                        </form>
                    </div><!-- /.newsletter -->
                    <p class="opacity-50">
                    </p>
                </div><!-- /.section-content -->
            </header>
        </aside><!-- /.newsletter -->
    </div><!-- /#sidebar -->
</div><!-- /.col-md-4 -->