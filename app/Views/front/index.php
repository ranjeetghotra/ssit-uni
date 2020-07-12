<!DOCTYPE html>

<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Theme Starz">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/selectize.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/vanillabox/vanillabox.css" type="text/css">
    <link rel="stylesheet" href="assets/css/vanillabox/vanillabox.css" type="text/css">

    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" />

    <title>Universo - Educational, Course and University Template</title>
    <style>
        .breadcrumb {
            margin-bottom: 2rem;
        }
    </style>

</head>

<body class="<?= $page == 'home' ? "page-homepage-carousel" : "page-sub-page page-contact" ?>">
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Header -->
        <?php include('include/header.php') ?>
        <!-- end Header -->

        <!-- Page Content -->
        <?php include($page . '.php') ?>
        <!-- end Page Content -->

        <!-- Footer -->
        <?php include('include/footer.php') ?>
        <!-- end Footer -->

    </div>
    <!-- end Wrapper -->

    <script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/selectize.min.js"></script>
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="assets/js/jQuery.equalHeights.js"></script>
    <script type="text/javascript" src="assets/js/icheck.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.vanillabox-0.1.5.min.js"></script>
    <script type="text/javascript" src="assetss/js/retina-1.1.0.min.js"></script>

    <script type="text/javascript" src="assets/js/custom.js"></script>
    <script src="/assets/js/ajax.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

</body>

</html>