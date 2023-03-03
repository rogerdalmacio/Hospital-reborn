<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/surgery_scheduler.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/SurgerySchedulerController.php';

    $surgerylist = [];

    $query = new SurgerySchedulerQuery;

    $listOfDoctors = $query->all('core_doctors');

    $listOfSurgery = $query->all('core_surgery_list');

    $listOfSurgerySchedules = $query->listOfSortedSurgerySchedules();
    
    if($listOfSurgerySchedules->num_rows > 0) {

      while($data = $listOfSurgerySchedules->fetch_assoc()){
        $surgerylist[] = $data;
      }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surgery Scheduler</title>
	   <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="icon" type="image/x-icon" href="../../../assets/img/logoo1.ico">

      <!-- Google Fonts -->
      <link href="https://fonts.gstatic.com" rel="preconnect">
    
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

      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

      <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
		
</head>
 <body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="../index.php" class="logoo d-flex align-items-center">
          <img src="../../../assets/img/logoo.png" alt="">
          <span class="d-none d-lg-block" style="color:#2098d1";><b>&nbsp;Alegario Cure</b><br><b style="color:#66cc33";>&nbsp;Hospital</b></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->
  
      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
  
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
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="../index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link" href="scheduler.php">
          <i class="bi bi-grid"></i>
          <span>Surgery Scheduler</span>
        </a>
      </li><!-- End Dashboard Nav -->

    </ul>

  </aside><!-- End Sidebar-->
  
    <main id="main" class="main">
  
      <div class="pagetitle">
        <h1>Surgery Scheduler</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Surgery Scheduler</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

<body>

  <form class="row g-3" action="submit_schedule.php" method="post">
    <div class="col-md-1">
      <input type="number" class="form-control" placeholder="patient id" name="patient_id" required>
    </div>
    <div class="col-md-2">
      <select class="form-select" name="doctor_type" aria-label="Default select example" required>
        <option disabled selected>Doctor Type</option>
        <option value="GENERAL SURGEON">GENERAL SURGEON</option>
        <option value="Obstetrician and gynecologist">Obstetrician and gynecologist</option>
        <option value="Orthopaedic surgeon">Orthopaedic surgeon</option>
        <option value="Trauma surgeon">Trauma surgeon</option>
      </select>
    </div>
    <div class="col-md-2">
      <select class="form-select" name="surgery_type" aria-label="Default select example" required>
        <option disabled selected>Surgery Type</option>
        <?php while($surgery = mysqli_fetch_assoc($listOfSurgery)) {?>
          <option value=" <?php echo $surgery['surgery'] ?> "><?php echo $surgery['surgery'] ?></option>
        <?php }?>
      </select>
    </div>
    <div class="col-md-2">
      <input type="date" name="date" class="form-control" min="<?php echo date('Y-m-d', strtotime('+2 day')); ?>"">
    </div>
    <div class="col-md-2">
      <select class="form-select" name="time" aria-label="Default select example" required>
        <option disabled selected>Time</option>
        <option value="8:00 am">8:00 am</option>
        <option value="9:00 am">9:00 am</option>
        <option value="10:00 am">10:00 am</option>
        <option value="11:00 am">11:00 am</option>
        <option value="12:00 pm">12:00 pm</option>
        <option value="1:00 pm">1:00 pm</option>
        <option value="2:00 pm">2:00 pm</option>
        <option value="3:00 pm">3:00 pm</option>
        <option value="4:00 pm">4:00 pm</option>
        <option value="5:00 pm">5:00 pm</option>
      </select>
    </div>
    <div class="col-md-2">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

  <div class="mt-4 overflow-scroll">
    <table class="table table-striped" id="surgery_schedule">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Firstname</th>
          <th scope="col">Lastname</th>
          <th scope="col">Status</th>
          <th scope="col">Type of Doctor</th>
          <th scope="col">Type of Surgery</th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

	  
  <hr>
  <p style="color: grey;">About: Schedules refer to the planned timetables for various activities and operations within the hospital. For patients, schedules typically involve booking appointments with physicians or other healthcare professionals, arranging diagnostic tests and procedures, and coordinating hospital admissions and discharges. These schedules are typically managed by the hospital's administrative staff or through online appointment booking systems.</p>
	</div>
	
  <div class="modal fade" id="ExtralargeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Surgery Schedule</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="edit-form">
          <div class="modal-body">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">ID</label>
              <div class="col-sm-9">
                <input id="modal_surgery_id" type="text" class="form-control" disabled>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">First name</label>
              <div class="col-sm-9">
                <input id="modal_first_name" type="text" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">Last name</label>
              <div class="col-sm-9">
                <input id="modal_last_name" type="text" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">Doctor type</label>
              <div class="col-sm-9">
              <select class="form-select" name="modal_surgery_type" aria-label="Default select example" required>
                <option disabled selected>Doctor type</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Surgery Type</label>
              <div class="col-sm-8">
              <select class="form-select" name="modal_surgery_time" aria-label="Default select example" required>
                <option disabled selected>Surgery Type</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="3">Three</option>
              </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Appointment date</label>
              <div class="col-sm-8">
                <input id="modal_date" type="date" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Appointment time</label>
              <div class="col-sm-8">
              <select class="form-select" name="modal_surgery_time" aria-label="Default select example" required>
                <option disabled selected>Appointment time</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="3">Three</option>
              </select>
              </div>
            </div>
          <div class="modal-footer">
            <button id="edit-btn-modal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
      </div>
    </div>
  </div><!-- End Extra Large Modal-->

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
        const jsonData = <?php echo json_encode($surgerylist)?>;
        console.log(jsonData)
        const table = $('#surgery_schedule').DataTable({
            data: jsonData,
            columns: [
                { data: 'id' },
                { data: 'patient_first_name' },
                { data: 'patient_last_name' },
                { data: 'status' },
                { data: 'doctor_type' },
                { data: 'surgery_type' },
                { data: 'appointment_date' },
                { data: 'appointment_time' },
                {
                  data: null,
                  render: function(data, type, row) {
                        return '<button type="submit" class="edit-btn btn btn-outline-secondary btn-sm m-1" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" data-id="' + row.id +'">Edit</button>' +
                               '<button class="delete-btn btn btn-outline-danger btn-sm m-1" data-id="' + row.id +'">Delete</button>';
                }
              }
            ]
        });

        $('.delete-btn').click(function(e){
          $.post("delete_schedule.php",
            {
              id: $(e.target).data('id')
            },
            function(data, status){
              alert(data);
              window.location.reload()
            });
        })

        $('#edit-form').submit(function(e) {

          e.preventDefault()

          $('#ExtralargeModal').modal('hide');

        })

        $('#surgery_schedule tbody').on('click', 'tr', function () {
            // // Get the DataTable row data
            const data = $('#surgery_schedule').DataTable().row($(this)).data();
            
            // // Populate the modal with the row data
            $('#modal_surgery_id').val(data.id)
            $('#modal_surgery_type').val(data.surgery_type)
            $('#modal_first_name').val(data.patient_first_name)
            $('#modal_last_name').val(data.patient_last_name)
            
        });


    });
    
    </script>
</body>
</html>