<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/manage"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Pages</li>
                            <li class="breadcrumb-item active" aria-current="page">Add</li>
                        </ol>
                    </nav>
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
                <form id="form-page" action="/manage/page/insert">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Add Page</h3>
                    </div>
                    <div class="container">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title"  required>
                        </div>
                        <div class="form-group">
                            <label for="basic-url">Your vanity URL</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">page/</span>
                                </div>
                                <input type="text" name="url" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="custom-file">
                                <input type="file"  name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <textarea name="content" id="quill-content" style="display:none" cols="0" rows="0"></textarea>
                        <div class="quill-editor"></div>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <button type="submit" onclick="submitForm()" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include('partial/footer.php') ?>
</div>
<script>
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike', 'link'], // toggled buttons
        ['blockquote'],

        [{
            'list': 'ordered'
        }, {
            'list': 'bullet'
        }],
        [{
            'script': 'sub'
        }, {
            'script': 'super'
        }], // superscript/subscript
        [{
            'indent': '-1'
        }, {
            'indent': '+1'
        }], // outdent/indent

        [{
            'size': ['small', false, 'large', 'huge']
        }], // custom dropdown
        [{
            'header': [1, 2, 3, 4, 5, 6, false]
        }],

        [{
            'color': []
        }, {
            'background': []
        }], // dropdown with defaults from theme
        [{
            'align': []
        }],

        ['clean'] // remove formatting button
    ];
    var quill;
    $(document).ready(function() {
        quill = new Quill('.quill-editor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
    })
    function submitForm() {
        $('#quill-content').html(quill.root.innerHTML)
        quill.setText('');
        ajax_form($('#form-page'));
    }
</script>