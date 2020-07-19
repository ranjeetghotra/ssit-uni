<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Admission</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/manage"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">admission</li>
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
                <div class="table-responsive my-2">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">No</th>
                                <th scope="col" class="sort" data-sort="budget">Name</th>
                                <th scope="col" class="sort" data-sort="status">Phone</th>
                                <th scope="col">City</th>
                                <th scope="col">Course</th>
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
<script>
    var table;
    function compile_datatable() {
        table = $('#dataTable').DataTable({
            "order": [],
            "processing": true,
            "searching": false,
            "serverSide": true,
            "ajax": {
                url: '/manage/admission/list_data',
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
            $.get('/manage/admission/delete/' + $(this).data('id'), function() {
                table.ajax.reload();
            });
        }
    })
</script>