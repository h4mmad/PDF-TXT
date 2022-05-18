<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF to TXT</title>
    <link rel="stylesheet" href="style.css">
</head>



<body>

    <div id="center-div-image">
    <img src="usm-banner.png">
    </div>
    
    <div id="center-div">
       
        
        <h1 id="heading">Convert<br> PDF to TEXT</h1>
        <form method="post" action="upload.php" enctype="multipart/form-data">


                <input type='file' id="choose-file" name='filename' accept="application/pdf" hidden="hidden">
                <!--<input type="submit" id="upload-button" name="submit">-->
                <button type="button" id="upload-button" name="submit">CHOOSE A FILE</button>
                <span id="custom-text">No file chosen</span>
                <button type="submit" id="submit-button">CONVERT</button>

        </form>    

    </div>


    <script>
        const chooseFile = document.getElementById("choose-file");
        const uploadButton = document.getElementById("upload-button");
        const customText = document.getElementById("custom-text");

        uploadButton.addEventListener("click", function() {
            chooseFile.click(); 
        });
        chooseFile.addEventListener("change", function(){
            if(chooseFile.value){
                customText.innerHTML = chooseFile.value.split("\\").pop();
            } 
            else{
                customText.innerHTML = "No file chosen";
            }
        });
    </script>

</body>


</html>





