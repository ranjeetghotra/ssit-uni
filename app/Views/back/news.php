<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">News</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/manage"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">news</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <button class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#newsModal">New</button>
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
                <div class="table-responsive my-2">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">No</th>
                                <th scope="col" class="sort" data-sort="budget">News</th>
                                <th scope="col" class="sort" data-sort="status">Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include('partial/footer.php') ?>
</div>
<form action="/manage/news/new" class="ajax-form" data-type="table">
    <div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Enter News or Notification</small>
                            </div>
                                <div class="form-group mb-3">
                                        <textarea class="form-control form-control-alternative" placeholder="Notification" name="news"></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4 modal-dismiss">Submit</button>
                                    <button type="button" class="btn btn-secondary my-4" data-dismiss="modal">Cancel</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<script>
    var table;

    function compile_datatable() {
        table = $('#dataTable').DataTable({
            "order": [],
            "processing": true,
            "searching": false,
            "serverSide": true,
            "ajax": {
                url: '/manage/news/list_data',
                type: 'POST'
            },
            "language": {
                paginate: {
                    next: '<i class="fas fa-angle-right"></i>',
                    previous: '<i class="fas fa-angle-left"></i>',
                }
            }
        });
    }
    $(document).ready(function() {
        compile_datatable();
    })
    $(document).on('click', '.item-delete', function() {
        if (confirm('Are you sure to delete?')) {
            $.get('/manage/news/delete/' + $(this).data('id'), function() {
                table.ajax.reload();
            });
        }
    })
</script>