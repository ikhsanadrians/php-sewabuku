<?php
session_start();
ob_start();
include 'config.php';
$db = new database();
$username = $_SESSION['username'];
if (!isset($username)) header("Location: ../login.php");

foreach ($db->login($username) as $x) {
  $akses_id = $x['akses_id'];
  if ($akses_id == '1') {
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Add Books - Rent Books</title>
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="../assets/extra-libs/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/extra-libs/select2-bootstrap4.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="../admin_menu.php">
                            <b class="logo-icon">
                                <!-- Logo icon -->
                                <svg id="Icons_Media_ic-media-collection"
                                    data-name="Icons / Media / ic-media-collection" xmlns="http://www.w3.org/2000/svg"
                                    width="36" height="36" viewBox="0 0 24 24">
                                    <rect id="Rectangle_295" data-name="Rectangle 295" width="24" height="24"
                                        fill="none" />
                                    <g id="ic-media-collection">
                                        <path id="Path_231" data-name="Path 231"
                                            d="M9.44,2.67,3.13,5A.2.2,0,0,0,3,5.19V18.91a.18.18,0,0,0,.13.18l6.39,2.24a.2.2,0,0,0,.27-.19L9.71,2.86a.2.2,0,0,0-.27-.19Z"
                                            fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" fill-rule="evenodd" />
                                        <line id="Line_289" data-name="Line 289" y2="14" transform="translate(13 5.05)"
                                            fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" />
                                        <line id="Line_290" data-name="Line 290" y2="14" transform="translate(17 5.05)"
                                            fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" />
                                        <line id="Line_291" data-name="Line 291" y2="14" transform="translate(21 5.05)"
                                            fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" />
                                    </g>
                                </svg>
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <span class="font-weight-bold"
                                    style="background: linear-gradient(to right, rgb(95, 118, 232) 0%, rgb(95, 118, 232) 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;font-size: 1.2rem;">RAFDI
                                    BOOK</span>
                            </span>
                            <!--End Logo icon -->
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- create new -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">Admin</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <nav class="navbar top-navbar navbar-expand-md">
            <div class="navbar-header" data-logobg="skin6">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-brand">
                    <!-- Logo icon -->
                    <a href="admin_menu.php">
                        <b class="logo-icon">
                            <!-- Logo icon -->
                            <svg id="Icons_Media_ic-media-collection" data-name="Icons / Media / ic-media-collection"
                                xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                                <rect id="Rectangle_295" data-name="Rectangle 295" width="24" height="24" fill="none" />
                                <g id="ic-media-collection">
                                    <path id="Path_231" data-name="Path 231"
                                        d="M9.44,2.67,3.13,5A.2.2,0,0,0,3,5.19V18.91a.18.18,0,0,0,.13.18l6.39,2.24a.2.2,0,0,0,.27-.19L9.71,2.86a.2.2,0,0,0-.27-.19Z"
                                        fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5" fill-rule="evenodd" />
                                    <line id="Line_289" data-name="Line 289" y2="14" transform="translate(13 5.05)"
                                        fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5" />
                                    <line id="Line_290" data-name="Line 290" y2="14" transform="translate(17 5.05)"
                                        fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5" />
                                    <line id="Line_291" data-name="Line 291" y2="14" transform="translate(21 5.05)"
                                        fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5" />
                                </g>
                            </svg>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <span class="font-weight-bold"
                                style="background: linear-gradient(to right, rgb(95, 118, 232) 0%, rgb(95, 118, 232) 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;font-size: 1.2rem;">Book
                                Rent</span>
                        </span>
                        <!--End Logo icon -->
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                    data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                    <!-- create new -->
                    <!-- ============================================================== -->
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="../assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle"
                                width="40">
                            <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                    class="text-dark">Jason Doe</span> <i data-feather="chevron-down"
                                    class="svg-icon"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                                    class="svg-icon mr-2 ml-1"></i>
                                Account Setting</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="pages/logout.php"><i data-feather="power"
                                    class="svg-icon mr-2 ml-1"></i>
                                Logout</a>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="../admin_menu.php"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>
                        <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="browse_data.php"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Browse Data</span></a></li>
                        <li class="sidebar-item"><a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="plus" class="feather-icon"></i><span
                                    class="hide-menu">Insert Data</span></a>
                            <ul aria-expanded="true" class="collapse first-level base-level-line">
                                <li class="sidebar-item"> <a class="sidebar-link" href="insert_rent_data.php"
                                        aria-expanded="false"><i data-feather="send" class="feather-icon"></i><span
                                            class="hide-menu">Rental
                                        </span></a>
                                </li>
                                <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                        href="insert_book_data.php" aria-expanded="false"><i data-feather="book"
                                            class="feather-icon"></i><span class="hide-menu">Books</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                        href="add_account_data.php" aria-expanded="false"><i data-feather="user"
                                            class="feather-icon"></i><span class="hide-menu">User Account</span></a>
                                </li>
                                <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                        href="insert_genre_data.php" aria-expanded="false"><i
                                            class="icon-layers"></i><span class="hide-menu">Genre</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                        href="insert_publisher_data.php" aria-expanded="false"><i
                                            class="icon-people"></i><span class="hide-menu">Publisher</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                        href="insert_author_data.php" aria-expanded="false"><i
                                            class="icon-emotsmile"></i><span class="hide-menu">Authors</span></a></li>
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                        <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="logout.php"
                                aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                                    class="hide-menu">Logout</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Add New Book</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="../admin_menu.php" class="text-muted">Home</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Insert</li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Book</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <div class="col-sm-12 col-md-12 col-lg-12 px-0">
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" action="simpan_data_buku.php" method="post">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kode_buku" class="form-label">Book ID</label>
                                        <input type="text" class="form-control" id="kode_buku" name="kode_buku"
                                            maxlength="8" placeholder="Unique Book ID" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="isbn" class="form-label">ISBN</label>
                                        <input type="text" class="form-control" id="isbn" name="isbn"
                                            placeholder="Unique Registered Number" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="year" class="form-label">Year</label>
                                        <select class="custom-select mr-sm-2" id="year" name="tahun">
                                            <script>
                                            var myDate = new Date();
                                            var year = myDate.getFullYear();
                                            for (var i = 2010; i < year + 6; i++) {
                                                document.write('<option value"' + i + '">' + i + '</option>');
                                            }
                                            </script>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="judul_buku"
                                            placeholder="ex. Insecurity is my middle name" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="kode_pengarang">Pengarang</label>
                                        <select class="form-control select2" style="width: 100%" id="kode_pengarang"
                                            name="kode_pengarang">
                                            <option selected="selected">ex. Hajime Isayama</option>
                                            <?php
                          $no = 1;
                          foreach ($db->ambil_data_pengarang() as $x) {
                            echo '<option value="' . $x['kode_pengarang'] . '">' . $x['nama_pengarang'] . '</option>';
                          }
                          ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="kode_penerbit">Penerbit</label>
                                        <select class="form-control select2" style="width: 100%;" id="kode_penerbit"
                                            name="kode_penerbit">
                                            <option selected="selected">ex. Erlangga</option>
                                            <?php
                          $no = 1;
                          foreach ($db->ambil_data_penerbit() as $x) {
                            echo '<option value="' . $x['kode_penerbit'] . '">' . $x['nama_penerbit'] . '</option>';
                          }
                          ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="deskripsi">Description</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                            placeholder="Text Here..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="kode_jenis_buku">Genre</label>
                                        <select class="form-control select2" style="width: 100%;" id="kode_jenis_buku"
                                            name="kode_jenis_buku">
                                            <option selected="selected">ex. Horror</option>
                                            <?php
                          $no = 1;
                          foreach ($db->ambil_data_jenis_buku() as $x) {
                            echo '<option value="' . $x['kode_jenis_buku'] . '">' . $x['nama_jenis_buku'] . '</option>';
                          }
                          ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jumlah">Amount</label>
                                        <input type="number" class="form-control" placeholder="ex. 8" name="jumlah">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- End Container fluid  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- End footer -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Page wrapper  -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->
            <!-- All Jquery -->
            <!-- ============================================================== -->
            <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
            <!-- Bootstrap tether Core JavaScript -->
            <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
            <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
            <!-- apps -->
            <script src="../dist/js/app.min.js "></script>
            <script src="../dist/js/app.init-menusidebar.js"></script>
            <script src="../dist/js/app-style-switcher.js "></script>
            <script src="../dist/js/feather.min.js"></script>
            <!-- slimscrollbar scrollbar JavaScript -->
            <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js "></script>
            <script src="../assets/extra-libs/sparkline/sparkline.js "></script>
            <!-- Select2 -->
            <script src="../assets/extra-libs/select2/js/select2.min.js"></script>
            <!-- theme js -->
            <!--Menu sidebar -->
            <script src="../dist/js/sidebarmenu.js "></script>
            <!--Custom JavaScript -->
            <script src="../dist/js/custom.js "></script>
</body>

</html>
<?php
  } else {
    header("Location: ../login.php");
  }
}
ob_flush();
?>