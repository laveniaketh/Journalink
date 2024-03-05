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
<main class="content ">
    <?php
    // Assuming you have retrieved the encodedDate and encodedContent from the URL parameters
    $encodedDate = $_GET['date'];
    $encodedContent = $_GET['content'];
    $pageId = $_GET['pageId'];

    // Decode the URL parameters
    $decodedDate = urldecode($encodedDate);
    $decodedContent = urldecode($encodedContent);
    ?>
    <h4 class="date" contenteditable="false">
    <!-- date -->
    </h4>
    <div class="toolbar">
    <h4 class="date"><input type="text" id="dateInput" value="<?php echo $decodedDate; ?>"readonly></h4>
            <div class="head">
                <a href="home.php" class="back-button"><img src="images/text-editor-img/back.svg" ></a>
          
                
                <div class="btn-toolbar">
                    <button class="tb-button" onclick="formatDoc('undo')"><i class='bx bx-undo' style='color:#eeeeee' ></i></button>
                    <button onclick="formatDoc('redo')"><i class='bx bx-redo' style='color:#eeeeee' ></i></button>
                    <button class="tb-button" onclick="formatDoc('bold')"><i class='bx bx-bold' style='color:#eeeeee' ></i></button>
                    <button onclick="formatDoc('underline')"><i class='bx bx-underline' style='color:#eeeeee'  ></i></button>
                    <button onclick="formatDoc('italic')"><i class='bx bx-italic' style='color:#eeeeee' ></i></button>
                    <button onclick="formatDoc('strikeThrough')"><i class='bx bx-strikethrough'style='color:#eeeeee'  ></i></button>
                    <button onclick="formatDoc('justifyLeft')"><i class='bx bx-align-left'style='color:#eeeeee'  ></i></button>
                    <button onclick="formatDoc('justifyCenter')"><i class='bx bx-align-middle'style='color:#eeeeee'  ></i></button>
                    <button onclick="formatDoc('justifyRight')"><i class='bx bx-align-right'style='color:#eeeeee'  ></i></button>
                    <button onclick="formatDoc('justifyFull')"><i class='bx bx-align-justify'style='color:#eeeeee'  ></i></button>
                    <button onclick="formatDoc('insertOrderedList')"><i class='bx bx-list-ol'style='color:#eeeeee'  ></i></button>
                    <button onclick="formatDoc('insertUnorderedList')"><i class='bx bx-list-ul'style='color:#eeeeee'  ></i></button>
                    <!-- <button id="show-code" data-active="false">code</button> -->
                    <!-- <button id="store-html">Store HTML</button> -->
                </div>
                  <a href="#" class="edit-button" onclick="editContent()"><img src="images/entry-view-img/edit.svg"></a>
                  <a href="delete.php?pageId=<?php echo $pageId; ?>" class="delete-button";><img src="images/entry-view-img/delete.svg"></a>
                  <a href="#" class="update-button"id="update" style="display: none;"><img src="images/text-editor-img/save.svg"onclick="redirectToHome()"></a>
			      </div>
		</div>
    
      <div id="content" contenteditable="false" spellcheck="false">
        <?php echo $decodedContent; ?>
      </div>
      <p id="pageId" style="display: none;"> <?php echo $pageId;?></p>
        
    
    <footer>
        <div class="sticker-tab">
            <div class="dropup">
                <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="images/text-editor-img/media.svg" height="25px">
                </a>
              
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>

                <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="images/text-editor-img/sentiment.svg" height="25px">
                  </a>
                
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>

                  <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="images/text-editor-img/tag.svg" height="25px">
                  </a>
                
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
            </div>

    </div>
</div>

</main>

<script>
function editContent() {
  // Get the content div
  var content = document.getElementById('content');
    // Make the content editable
    content.contentEditable = content.contentEditable === 'true' ? 'false' : 'true';

    // Get the delete and update buttons
    var deleteButton = document.querySelector('.delete-button');
    var updateButton = document.querySelector('.update-button');

        // If the delete button is visible, hide it and show the update button
        if (deleteButton.style.display !== 'none') {
        deleteButton.style.display = 'none';
        updateButton.style.display = 'block';
    } 
    // If the update button is visible, hide it and show the delete button
    else if (updateButton.style.display !== 'none') {
        updateButton.style.display = 'none';
        deleteButton.style.display = 'block';
    }
}
</script>
<script>
function redirectToHome() {
    var content = encodeURIComponent(document.getElementById('content').innerHTML);
    var dateInput = encodeURIComponent(document.getElementById('dateInput').value);
    window.location.href = 'update.php?content=' + content + '&dateInput=' + dateInput + '&pageId=' + <?php echo $pageId; ?>;
}
</script>

      
    
  
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script?>
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