<html>
   <body>
<h3><a href='uploadTxt.php' >Upload Text Files</a></h3>    
      <form action="#" method="POST" enctype="multipart/form-data">
         <input type="file" name="text" />
         <input type="submit"/>
      </form>
<hr>
<?php
   if(isset($_FILES['text'])){
      $errors= array();
      $file_name = $_FILES['text']['name'];
      $file_size =$_FILES['text']['size'];
      $file_tmp =$_FILES['text']['tmp_name'];
      $file_type=$_FILES['text']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['text']['name'])));
      
      $expensions= array("txt","css","js", "html", "php");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="Extension not allowed, only txt, css, js, html, php.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"texts/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
      
   </body>
</html>
