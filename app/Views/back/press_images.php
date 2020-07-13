<div class="row"><?php
foreach ($images as $image) :
?>
    <div class="col-6 col-md-3 my-2">
        <img class="img-fluid img-thumbnail" src="/images/press/thumb/<?= $image['press_name'] ?>" alt="">
        <button onclick="deleteImage('<?= $image['press_id'] ?>')" class="btn btn-danger btn-sm btn-del-absolute"><i class="fa fa-trash"></i></button>
    </div>
<?php
endforeach
?></div>