<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="center-div-image">
        <img src="usm-banner.png">
    </div>
    <div id="center-div">
    <?php

        if(($_FILES["filename"]["size"] > 0) || ($_FILES["filename"]["size"] < 30000000)){    

            $fileName = $_FILES['filename']['name'];
            $fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

        if($fileType == "pdf" ){
            $fileName = str_replace(" ","",$_FILES['filename']['name']);
            $uploadDir = $fileName;
            move_uploaded_file($_FILES['filename']['tmp_name'], $uploadDir);
    
            shell_exec("java -jar pdfReader.jar $uploadDir");
            echo "<div id=\"download-div\"><a id=\"download-link\" href=\"$uploadDir.txt\" download>&dArr; Download your text file &dArr;<a></div>";
            echo "<br><a href=\"..\" class=\"back-link\">&#8592 Go Back</a>";
        }
        else{
            echo "<h2 class=\"error\">You tried to upload a $fileType file</h2>";
            echo "<h3  class=\"error\">Please upload a PDF file less than 20 MB</h3>";
            echo "<br><a href=\"..\" class=\"back-link\">&#8592 Go Back</a>";
        }

        }

        else{
             echo "<h1 class=\"error\">Please upload a PDF file</h1>";
             echo "<br><a href=\"..\" class=\"back-link\">&#8592 Go Back</a>";
        }

    ?>

    </div>
</body>
</html>








