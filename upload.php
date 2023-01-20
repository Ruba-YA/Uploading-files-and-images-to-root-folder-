<?php

if (isset($_POST['submit'])){

    $files = $_FILES['file'];
    // print_r ($files);
  
    $filesName = $_FILES['file']['name'];
    $filesTmpName = $_FILES['file']['tmp_name'];
    $filesSize = $_FILES['file']['size'];
    $filesError = $_FILES['file']['error'];
    $filesType = $_FILES['file']['type'];

    $fileExt = explode('.',$filesName);
    $fileActualExt = strtolower((end($fileExt)));
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','pdf');
 
    if (in_array($fileActualExt, $allowedfileExtensions))
    {
      if($filesError===0)
      {
        if($filesSize<1000000)
        {
            $fileNewName= uniqid().".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileNewName;
            move_uploaded_file($filesTmpName, $fileDestination);{
            echo $_FILES['file']['name'] . ' was uploaded and saved as '. $fileNewName . '</br>';
            // header("Location:index.php?uploadsuccess");

          }

        }else {
            echo "Your file is too big ";
        }
      }
      else
      { 
        echo "There was am error uploading file !";
      }

    }else{
        echo "You cannot upload file of this type ";
    }
}

?>
