<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
<main class="content px-3 py-4 timeline">
    <div class="container-fluid">
        <div class="mb-3">
        <div class="d-flex justify-content-between">
                <h3>Entries</h3>
                <div class="btn-group dropdown mb-2">
                    <button type="button" class="btn btn-dark dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                    Sort By
                    </button>
                    <ul class="dropdown-menu">
                    <?php
                    echo '
                    <a class="dropdown-item" href="?order_by=entry_date&order_dir=asc">entry date asc</a>
                    <a class="dropdown-item" href="?order_by=entry_date&order_dir=desc">entry date desc</a>
                    <a class="dropdown-item" href="?order_by=PageID&order_dir=asc">oldest</a>
                    <a class="dropdown-item" href="?order_by=PageID&order_dir=desc">newest</a>
                    ';
                    ?>
                    </ul>
                </div>
            </div>

            <div class="row">   
            <?php
            include('database.php');

            function displayEntries() {
                global $conn;

                $order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'PageID';
                $order_dir = isset($_GET['order_dir']) ? $_GET['order_dir'] : 'DESC';
                
                // Include PageID in the SQL query
                $sql = "SELECT PageID, entry_date, content FROM journal_entries ORDER BY $order_by $order_dir";
                $result = mysqli_query($conn, $sql);
                
                if($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $date = new DateTime($row['entry_date']);
                        $formattedDate = $date->format('F d, Y');
                        $content = base64_decode($row['content']);
                
                        // Get the PageID
                        $pageId = $row['PageID'];
                
                        // Remove HTML tags
                        $plainTextContent = strip_tags($content);
                
                        // Get a substring of the content
                        $shortContent = substr($plainTextContent, 0, 100).'...';
                
                        // URL encode the parameters
                        $encodedDate = urlencode($formattedDate);
                        $encodedContent = urlencode($content);
                                                        
                        echo '
                        <a id="myLink" href="home.php?entry=true&date='.$encodedDate.'&content='.$encodedContent.'&pageId='.$pageId.'&hideNavbar=true"  style="text-decoration: none; color: inherit;">
                            <div class="card border-0`">
                                <div class="card-body py-4" style="padding-bottom:5px;">
                                    <h4 class="mb-2">' . $formattedDate . '</h4>
                                    <p class="mb-2">' . $shortContent .'</p>
                                </div>
                            </div>
                        </a>
                        ';
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
            displayEntries();

            ?>

            </div> 
        </div>
    </div>
</div>
</main>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="home.js"></script>
</body>
</html>