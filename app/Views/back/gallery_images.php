<div class="row"><?php
foreach ($images as $image) :
?>
    <div class="col-6 col-md-3 my-2">
        <img class="img-fluid img-thumbnail" src="/images/gallery/thumb/<?= $image['gallery_name'] ?>" alt="">
    </div>
<?php
endforeach
?></div>