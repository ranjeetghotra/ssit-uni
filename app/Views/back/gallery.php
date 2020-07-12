<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Gallery</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/manage"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">gallery</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <form action="/manage/gallery/upload" id="formGallery">
                        <a class="btn btn-sm btn-neutral" style="overflow: hidden;"><input type="file" onchange="uploadImages(this)" name="images[]" multiple style="position: absolute; opacity: 0;">Upload</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Gallery</h3>
                </div>
                <div class="container text-center py-3" id="gallery-data"></div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include('partial/footer.php') ?>
</div>
<script>
    function loadImages() {
        $('#gallery-data').load('/manage/gallery/images');
    }

    function uploadImages(input) {
        if (input.files && input.files[0]) {
            var form = $('#formGallery')
            if (window.FormData) {
                formdata = new FormData(form[0]);
            };
            $.ajax({
                url: form.attr('action'),
                data: formdata ? formdata : form.serialize(),
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                beforeSend: function() {

                },
                success: function(data) {
                    loadImages();
                }
            });
        }
    }

    function deleteImage(id) {
        if (confirm("Are you sure to delete?")) {
            $.get('/manage/gallery/delete/' + id, function() {
                loadImages();
            });
        }
    }
    loadImages();
</script>