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
                        <header><a><?= $n['news_title'] ?></a></header>
                    </article><!-- /article -->
                <?php endforeach ?>
            </div><!-- /.section-content -->
            <a href="" class="read-more">All News</a>
        </aside><!-- /.news-small -->
        <aside id="newsletter">
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
        </aside><!-- /.newsletter -->
    </div><!-- /#sidebar -->
</div><!-- /.col-md-4 -->