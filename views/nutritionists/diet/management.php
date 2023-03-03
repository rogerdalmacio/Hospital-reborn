<?php 

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/nutritionist.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/NutritionistController.php';
    
    $query = new NutritionistQuery;

    $listOfPatients = $query->all('core_patients');
    $listOfpatientsWithDiet = $query->patientsWithDiet('Balanced Diet');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
		    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="icon" type="image/x-icon" href="../../../assets/img/logoo1.ico">

      <!-- Google Fonts -->
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
      <!-- Vendor CSS Files -->
      <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="../../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
      <link href="../../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
      <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="../../../assets/vendor/simple-datatables/style.css" rel="stylesheet">
      
    
      <!-- Template Main CSS File -->
      <link href="../../../assets/css/style.css" rel="stylesheet">


      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

      <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    
</head>
 <body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logoo d-flex align-items-center">
          <img src="../../../assets/img/logoo.png" alt="">
          <span class="d-none d-lg-block" style="color:#2098d1";><b>&nbsp;Alegario Cure</b><br><b style="color:#66cc33";>&nbsp;Hospital</b></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->
  
      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
          <input type="text" name="query" placeholder="Search" title="Enter search keyword">
          <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
      </div><!-- End Search Bar -->
  
      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
  
          <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
              <i class="bi bi-search"></i>
            </a>
          </li><!-- End Search Icon-->
  
  
          <li class="nav-item dropdown pe-3">
      
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['user_info']['first_name'] . ' ' . $_SESSION['user_info']['last_name'] ?></span>
            </a><!-- End Profile Iamge Icon -->
  
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>AlegarioCure Hospital</h6>
                <span>We Commit to Care</span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
  
              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
  
              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-gear"></i>
                  <span>Account Settings</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
  
              <li>
                <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                  <i class="bi bi-question-circle"></i>
                  <span>Need Help?</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
  
              <li>
                  <a href="../../../environment/session/logout.php" class="dropdown-item d-flex align-items-cente">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Log Out</span>
                  </a>
              </li>
              
            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->
  
        </ul>
      </nav><!-- End Icons Navigation -->
  
    </header><!-- End Header -->
  
    <aside id="sidebar" class="sidebar">
  
      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link collapsed" href="../index.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
      </ul>

      <ul class="sidebar-nav" id="sidebar-nav">
          <a class="nav-link" href="management.php">
            <i class="bi bi-grid"></i>
            <span>Diet Management</span>
          </a>
        </li><!-- End Dashboard Nav -->
      </ul>

    </aside><!-- End Sidebar-->

     <main id="main" class="main">
  
      <div class="pagetitle">
        <h1>Diet Management</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Diet Management</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

<body>

  

    <table class="table table-striped" id="diets_table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Patient ID</th>
          <th scope="col">Firstname</th>
          <th scope="col">Lastname</th>
          <th scope="col">Classification</th>
          <th scope="col">Breakfast</th>
          <th scope="col">Lunch</th>
          <th scope="col">Dinner</th>
          <th scope="col">Nutritionist</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
  </table>

    <hr>

    <div class="modal fade" id="view_diet" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">View Diet</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">ID</label>
              <div class="col-sm-9">
                <input id="modal_view_diet_id" type="text" class="form-control" disabled name>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">First name</label>
              <div class="col-sm-9">
                <input id="modal_view_first_name" type="text" class="form-control" disabled>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">Last name</label>
              <div class="col-sm-9">
                <input id="modal_view_last_name" type="text" class="form-control" disabled>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">Classification</label>
              <div class="col-sm-9">
                <input id="modal_view_classification" type="text" class="form-control" disabled>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-3 col-form-label">Breakfast</label>
              <div class="col-sm-9">
                <textarea id="modal_view_breakfast" class="form-control" style="height: 100px" disabled></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-3 col-form-label">Lunch</label>
              <div class="col-sm-9">
                <textarea id="modal_view_lunch" class="form-control" style="height: 100px" disabled></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-3 col-form-label">Dinner</label>
              <div class="col-sm-9">
                <textarea id="modal_view_dinner" class="form-control" style="height: 100px" disabled></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">Nutritionist</label>
              <div class="col-sm-9">
                <input id="modal_view_nutritionist" type="text" class="form-control" disabled>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button  type="submit" class="btn btn-primary">Print</button>
          </div>
          </form>
        </div>
      </div>
    </div><!-- End Vertic -->

    <div class="modal fade" id="edit_diet" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Diet</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="edit-diet-form" action="submit_or_edit_diet.php" method="post">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">ID</label>
              <div class="col-sm-9">
                <input id="modal_edit_diet_id_disabled" type="text" class="form-control" disabled>
                <input id="modal_edit_diet_id" type="hidden" class="form-control" name="id">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">Patient ID</label>
              <div class="col-sm-9">
                <input id="modal_edit_diet_patient_id_disabled" type="text" class="form-control" disabled>
                <input id="modal_edit_diet_patient_id" type="hidden" class="form-control" name="patient_id">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">First name</label>
              <div class="col-sm-9">
                <input id="modal_edit_first_name" type="text" class="form-control" disabled name="first_name">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">Last name</label>
              <div class="col-sm-9">
                <input id="modal_edit_last_name" type="text" class="form-control" disabled name="last_name">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">Classification</label>
              <div class="col-sm-9">
              <select class="form-select" id="modal_edit_classification" name="classification" required>
                <option selected="true" disabled="disabled" value="">Classification</option>   
                <option value="Balanced">Balanced Diet</option>
                <option value="Pre-surgery">Pre-surgery</option>
                <option value="Post-surgery">Post-surgery</option>
              </select>
              <input id="modal_edit_classification_old" type="hidden" class="form-control" name="old_classification">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-3 col-form-label">Breakfast</label>
              <div class="col-sm-9">
                <textarea id="modal_edit_breakfast" class="form-control" style="height: 100px" name="breakfast"></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-3 col-form-label">Lunch</label>
              <div class="col-sm-9">
                <textarea id="modal_edit_lunch" class="form-control" style="height: 100px" name="lunch"></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-3 col-form-label">Dinner</label>
              <div class="col-sm-9">
                <textarea id="modal_edit_dinner" class="form-control" style="height: 100px" name="dinner"></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">Nutritionist</label>
              <div class="col-sm-9">
                <input id="modal_edit_nutritionist" type="text" class="form-control" disabled name="nutritionist">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="save">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div><!-- End Vertic -->

    <!-- ======= Footer ======= -->
     <footer>
      <div class="container">
        <p align="center"><br>©2023 AlegarioCure Hospital | All Rights Reserved</p>
      </div>
    </footer>

  <script>

  $(document).ready(function() {
    const jsonData = <?php echo $listOfpatientsWithDiet?>;
    console.log(jsonData);
    const table = $('#diets_table').DataTable({
        data: jsonData,
        'columnDefs': [
          {'width': '15%', 'targets': 5},
          {'width': '15%', 'targets': 6},
          {'width': '15%', 'targets': 7}
        ],
        columns: [
            { data: 'patient_diets_id' },
            { data: 'patient_id' },
            { data: 'first_name' },
            { data: 'last_name' },
            { data: 'classification' },
            { data: 'breakfast' },
            { data: 'lunch' },
            { data: 'dinner' },
            { data: 'nutritionist' },
            {
              data: null,
              render: function(data, type, row) {
                    return  '<button type="button" class="btn btn-outline-secondary btn-sm m-1" data-bs-toggle="modal" data-bs-target="#view_diet" data-id="' + row.patient_diets_id +'">View</button>' + 
                            '<button type="button" class="btn btn-outline-secondary btn-sm m-1" data-bs-toggle="modal" data-bs-target="#edit_diet" data-id="' + row.patient_diets_id +'">Edit</button>' +
                            '<button class="delete-btn btn btn-outline-danger btn-sm m-1" data-id="' + row.patient_diets_id +'">Delete</button>';
            }
          }
        ]
    })

    $('#diets_table tbody').on('click', 'tr', function () {

      // // Get the DataTable row data
      const data = $('#diets_table').DataTable().row($(this)).data();
      
      // // Populate the modal with the row data
      modal_edit_diet_id_disabled
      $('#modal_edit_diet_id').val(data.patient_diets_id)
      $('#modal_edit_diet_id_disabled').val(data.patient_diets_id)
      $('#modal_edit_diet_patient_id_disabled').val(data.patient_id)
      $('#modal_edit_diet_patient_id').val(data.patient_id)
      $('#modal_edit_first_name').val(data.first_name)
      $('#modal_edit_last_name').val(data.last_name)
      $('#modal_edit_classification').val(data.classification)
      $('#modal_edit_classification_old').val(data.classification)
      $('#modal_edit_breakfast').val(data.breakfast)
      $('#modal_edit_lunch').val(data.lunch)
      $('#modal_edit_dinner').val(data.dinner)
      $('#modal_edit_nutritionist').val(data.nutritionist)

      $('#modal_view_diet_id').val(data.patient_diets_id)
      $('#modal_view_first_name').val(data.first_name)
      $('#modal_view_last_name').val(data.last_name)
      $('#modal_view_classification').val(data.classification)
      $('#modal_view_breakfast').val(data.breakfast)
      $('#modal_view_lunch').val(data.lunch)
      $('#modal_view_dinner').val(data.dinner)
      $('#modal_view_nutritionist').val(data.nutritionist)
        
    });

    


  });
      
  </script>
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
    <!-- Vendor JS Files -->
    <script src="../../../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../../../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../../../assets/vendor/quill/quill.min.js"></script>
    <script src="../../../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../../../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../../../assets/vendor/php-email-form/validate.js"></script>
  
    <!-- Template Main JS File -->
    <script src="../../../assets/js/main.js"></script>
</body>
</html>