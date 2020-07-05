<?php

include "dbConn.php"; // Using database connection file here
header( "refresh:5;url=Maprobot.php" );


//[name]
if(isset($_POST['bsave']))

{

     $rightnum = $_POST["eright"];
     $leftnum = $_POST["eleft"];
     $forwardnum = $_POST["eforward"];

     if ($rightnum == "") {
         $rightnum = "NULL";
     }

     if ($leftnum == "") {
         $leftnum = "NULL";
     }

     if ($forwardnum == "") {
         $forwardnum = "NULL";
     }

     $query = "INSERT INTO map (bright , bleft , bforward)
      VALUES (".$rightnum.", ".$leftnum.", ".$forwardnum.")";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo  "Data Saved";
    }
    else
    {
      echo "Data not Saved";
    }




}

   if(isset($_POST['bdelete'])){

  $query = "DELETE FROM map ORDER BY id DESC LIMIT 1";

  $query_run = mysqli_query($connection, $query);

  if($query_run)
  {
      echo  "Data Deleted";
  }
  else
  {
    echo "Data not Deleted";
  }
}


// if(isset($_POST['bstart'])){
//   echo '<canvas id="myCanvas" width="500" height="300" style="border:1px solid #d3d3d3;">' ;
//
//
// echo '<script>
// var r = $_POST["eright"];
// var c = document.getElementById("myCanvas");
//    var ctx = c.getContext("2d");
//    ctx.moveTo(0,100);
//    ctx.lineTo("r",100);
//    ctx.stroke();
//
//
// </script>';
//
// }




?>
