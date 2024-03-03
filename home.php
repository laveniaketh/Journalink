<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inkNote | Home</title>
    <link rel="icon" href="images/logo-light.png" type="image/x-icon"/>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Line Icons -->
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <!-- CSS Style -->
    <link rel="stylesheet" href="home.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Ubuntu&display=swap" rel="stylesheet">
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    

</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <img src="images/logo-light.png" class="logo-img">
                <div class="sidebar-logo">
                    <a href="?page=text-editor-page">inkNote</a>
                </div>

            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" id="tl-sidebar">
                        <img src="images/home-img/light/timeline.svg" width="16" height="16">
                        <span>Timeline</span>
                    </a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link" id="cl-sidebar">
                    <img src="images/home-img/light/calendar.svg" width="16" height="16">
                      <span>Calendar</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link" id="md-sidebar">
                      <img src="images/home-img/light/media.svg" width="16" height="16">
                      <span>Media</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">
                      <img src="images/home-img/light/search.svg" width="16" height="16">
                      <span>Search</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">
                    <img src="images/home-img/light/setting.svg" width="16" height="16">
                      <span>Setting</span>
                  </a>
                </li>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form action="#" class="d-none d-sm-inline-block">
                    <div class="input-group input-group-navbar">
                        <input type="text" class="form-control border-0 rounded-0" placeholder="Search...">
                        <button class="btn border-0 rounded-3 " type="button">
                          <img src="images/home-img/light/search.svg" width="20px" height="20px">
                        </button>
                    </div>
                </form>
            </nav>
            <main class="">
                <div class="container-fluid" >
                    <section id="timeline">
                    <?php 
                        include ('content-containers/timeline.php');
                    ?>
                    </section>

                    <section id="text-editor">
                    <?php 
                        // include ('content-containers/text-editor.php');
                    ?>
                    </section>


                    
                    

                </div>
            </main>
            <a href="text-editor.php">
            <button type="button"  class="btn btn-dark btn-md rounded-5 new-button"><i class="lni lni-circle-plus"></i> New</button>
            </a>
            
        </div>


    </div>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="home.js"></script>
</body>
</html>