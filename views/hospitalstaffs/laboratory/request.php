<?php 

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/hospital_staff.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/HospitalStaffController.php';

    $query = new HospitalStaffQuery;
    $listOfLaboratoryResults = $query->listOfLaboratoryResults('processing');
    
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
    <link rel="icon" type="image/x-icon" href="img/logoo1.ico">

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
          <img src="../../assets/img/logoo.png" alt="">
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
  
    <!-- ======= Sidebar ======= -->
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
  
      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link collapsed" href="../index.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-menu-button-wide"></i><span>HMO & Insurance</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
              <li>
                <a href="../insurance/list.php">
                  <i class="bi bi-circle"></i><span>HMO & Insurance list</span>
                </a>
              </li>
              <li>
                <a href="../insurance/application.php">
                  <i class="bi bi-circle"></i><span>HMO & Insurance Application</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#lab-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-menu-button-wide"></i><span>Laboratory</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="lab-nav" class="nav-content" data-bs-parent="#sidebar-nav">
              <li>
                <a href="request.php" class="active">
                  <i class="bi bi-circle"></i><span>Laboratory Request</span>
                </a>
              </li>
              <li>
                <a class="" href="resultlist.php">
                  <i class="bi bi-grid"></i>
                  <span>Laboratory Result List</span>
                </a>
              </li>
            </ul>
          </li><!-- End Dashboard Nav -->

      </ul>

  </aside><!-- End Sidebar-->
  
    <main id="main" class="main">
  
      <div class="pagetitle">
        <h1>Laboratory Request</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Laboratory Request</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->




<body>
  <div class="card d-flex flex-row justify-content-center align-items-center p-5">
    <form action="submit_request.php" class="row g-3" method="post">
        <div class="col-sm-2">
          <label class="col-sm-10 col-form-label">Patient ID</label>
          <input type="number" class="form-control" name="patient_id" >
        </div>
        <div class="col-sm-2">
          <label class="col-sm-10 col-form-label">Referred By</label>
          <input type="text" class="form-control" name="referred_by">
        </div>
        <div class="col-sm-4">
          <label class="col-sm-4 col-form-label">Test Name</label>
          <input type="text" class="form-control" name="test_name">
        </div>
        <div class="col-sm-2">
          <label class="col-sm-10 col-form-label">Amount</label>
          <input type="number" class="form-control" name="amount">
        </div>
        <div class="col-sm-2">
          <label class="col-sm-10 col-form-label">.</label>
          <button type="submit" name="submit" class="btn btn-outline-info">Submit</button>
        </div>
    </form><!-- End General Form Elements -->
  </div>

  <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Select</label>
      <div class="col-sm-10">
        <select class="form-select" aria-label="Default select example" id="outpatient_type">
          <option selected disabled value="">Select patient type</option>
          <option value="1">With records</option>
          <option value="2">Without records</option>
        </select>
      </div>
    </div>

    <br>
    <br>

    <form id="outpatient_form" action="submit_outpatient_treatment.php" method="post">
      <div id="outpatient_with_records" style="display:none">
        <h1>Laboratory for patients with records</h1>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Patient ID</label>
            <div class="col-sm-10">
              <input type="hidden" value="1" name="outpatient_type">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Reffered by</label>
            <div class="col-sm-10">
              <input type="hidden" value="1" name="outpatient_type">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Test name</label>
            <div class="col-sm-10">
              <input type="hidden" value="1" name="outpatient_type">
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-10">
              <input type="date" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Submit Button</label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      </div>

      <div id="outpatient_without_records" style="display: none;">
        <h1>Outpatient Without Records</h1>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">First name</label>
            <div class="col-sm-10">
              <input type="hidden" value="2" name="outpatient_type">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Last name</label>
            <div class="col-sm-10">
              <input type="hidden" value="2" name="outpatient_type">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-10">
              <input type="hidden" value="2" name="outpatient_type">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Birth date</label>
            <div class="col-sm-10">
              <input type="hidden" value="2" name="outpatient_type">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
              <input type="hidden" value="2" name="outpatient_type">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Civil status</label>
            <div class="col-sm-10">
              <input type="hidden" value="2" name="outpatient_type">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Contact number</label>
            <div class="col-sm-10">
              <input type="hidden" value="2" name="outpatient_type">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <input type="hidden" value="2" name="outpatient_type">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Outpatient Treatment Type</label>
            <div class="col-sm-10">
              <select class="form-select" name="doctor_type" aria-label="Default select example" required>
                <option disabled selected value="">Select Treatment</option>
                <option value="Cognitive-behavioral therapy (CBT)">Cognitive-behavioral therapy (CBT)</option>
                <option value="Psychoanalysis">Psychoanalysis</option>
                <option value="Peer support groups">Peer support groups</option>
                <option value="Family therapy">Family therapy</option>
                <option value="Family therapy">Music therapy</option>
                <option value="Family therapy">Art therapy</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Scheduled Visit</label>
            <div class="col-sm-10">
              <input type="date" class="form-control">
            </div>
          </div>
        
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Submit Button</label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit Form</button>
            </div>
          </div>
      </div>
    </form>

  <hr>

  <table id="laboratory_request_list" class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Laboratory ID</th>
        <th scope="col">Patient ID</th>
        <th scope="col">Test name</th>
        <th scope="col">Amount</th>
        <th scope="col">Status</th>
        <th scope="col">Processed by</th>
        <th scope="col">Examine date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

    <!-- ======= Footer ======= -->
     <footer>
      <div class="container">
        <p align="center"><br>??2023 AlegarioCure Hospital | All Rights Reserved</p>
      </div>
    </footer>
    
    <!-- <div class="modal fade" id="view-modal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Laboratory Request</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="modal_lab_id"></p>
            <p id="modal_patient_id"></p>
            <p id="modal_test_name"></p>
            <p id="modal_lab_result"></p>
            <p id="modal_lab_comments"></p>
            <p id="modal_release_date"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div> -->

    <div class="modal fade" id="edit-modal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Laboratory Request</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="">
            <div class="modal-body">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-9">
                  <input id="edit_modal_laboratory_id_disabled" type="text" class="form-control" disabled>
                  <input id="edit_modal_laboratory_id" type="hidden" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Patient ID</label>
                <div class="col-sm-9">
                  <input id="edit_modal_patient_id" type="text" class="form-control" disabled>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Test name</label>
                <div class="col-sm-9">
                  <input id="edit_modal_test_name" type="text" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Amount</label>
                <div class="col-sm-9">
                  <input id="edit_modal_amount" type="text" class="form-control">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- End Vertic
    
    
  
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

    <script>
    $(document).ready(function() {
        const jsonData = <?php echo $listOfLaboratoryResults ?>;
        console.log(jsonData)
        const table = $('#laboratory_request_list').DataTable({
            data: jsonData,
            columns: [
                { data: 'id' },
                { data: 'patient_id' },
                { data: 'test_name' },
                { data: 'amount' },
                { data: 'status' },
                { data: 'processed_by' },
                { data: 'examine_date' },
                {
                  data: null,
                  render: function(data, type, row) {
                        return '<button type="submit" class="edit-btn btn btn-outline-secondary btn-sm m-1" data-bs-toggle="modal" data-bs-target="#edit-modal" data-id="' + row.id +'">Edit</button>'+
                        '<button type="button" class="delete-btn btn btn-outline-danger btn-sm m-1" data-id="' + row.id +'">Delete</button>'
                }
              }
            ]
        });

        $('#laboratory_request_list tbody').on('click', 'tr', function () {
            // // Get the DataTable row data
            const data = $('#laboratory_request_list').DataTable().row($(this)).data();
            
            // // Populate the modal with the row data
            $('#modal_lab_id').text('Laboratory ID: ' + data.id)
            $('#modal_patient_id').text('Patient ID: ' + data.patient_id)
            $('#modal_test_name').text('Test name:' + data.test_name)
            $('#modal_lab_result').text('Test result: ' + data.test_result)
            $('#modal_lab_comments').text('Comments: ' + data.comments)
            $('#modal_release_date').text('Release date: ' + data.laboratory_result_date)

            // // Populate the modal with the row data
            $('#edit_modal_laboratory_id_disabled').val(data.id)
            $('#edit_modal_laboratory_id').val(data.id)
            $('#edit_modal_patient_id').val(data.patient_id)
            $('#edit_modal_test_name').val(data.test_name)
            $('#edit_modal_amount').val(data.amount)
            
        });

        


    });

    </script>
    
    <script>
      const selectOption = document.getElementById('outpatient_type');
      const withRecords = document.getElementById('outpatient_with_records');
      const withoutRecords = document.getElementById('outpatient_without_records');
      const outpatientForm = document.getElementById('outpatient_form');

      selectOption.addEventListener('change', (e) => {
        
        if(selectOption.value == 1) {
          withoutRecords.style.display = "none";
          withRecords.style.display = "block";
        }

        if(selectOption.value == 2) {
          withRecords.style.display = "none";
          withoutRecords.style.display = "block";
        }

      })
    </script>
</body>
</html>