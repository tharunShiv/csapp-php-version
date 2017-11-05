<?php
  session_start();
  //the config file
  //establish connection
    require_once('dbconfig/config.php');
    //phpinfo();
    if($_SESSION['user_login_status']){

  if(isset($_POST['submit'])){
    //getting info of file
    //here $_FILES is a super global variable , and the 'file' inside it
    //is the name of the file
    $file = $_FILES['file'];
     //storing the info of file in variable
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt)); //end gets the last piece of data in an array

    $allowed = array('pdf', 'docx', 'txt');

    if(in_array($fileActualExt, $allowed)){
      if ($fileError === 0) {
         if($fileSize < 10000000){ //100mb
            //Uploading
            //dealing with duplicates
            $fileNameNew = uniqid('', true).".".$fileActualExt; //microseconds

            $fileDestination = 'uploads/'.$fileNameNew;
            //moving from temp loc to actual
            move_uploaded_file($fileTmpName, $fileDestination);
             
            //db
             $pname= $_POST['pname'];
             $pdate= $_POST['pyear'];
             $comments= $_POST['comments'];
             $username = $_SESSION['username'];

            $q = mysqli_query($con, "INSERT INTO userspd (username,pname,pdate,ploc,pcomment) values('$username','$pname','$pdate','$fileDestination','$comments')");
            if($q){
                header("Location: home.php?msg=Publication+Upload+Successfull");
            }else{
              header("Location: home.php?msg=DB+err+123");
            }
            //echo "<script type='application/javascript'>alert('Uploaded successfully')</script>";
            //header("Location: home.php?msg=Upload+Of+File+Successfull");

         } else {
           echo "<script type='application/javascript'>alert('FileSize must be below 100mb')</script>";
           header("Location: home.php?msg=File+Size+Exceeded");
         }
      } else {
        echo "<script type='application/javascript'>alert('Error Uploading file')</script>";
          header("Location: home.php?msg=Error+Uploading");
      }
    } else {
      echo "<script type='application/javascript'>alert('Only .pdf, .docx, .txt are allowed')</script>";
        header("Location: home.php?msg=Format+Unsupported");
    }
  }
}
 ?>
