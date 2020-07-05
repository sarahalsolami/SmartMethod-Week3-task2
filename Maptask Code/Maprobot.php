<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Map.css">
</head>

<body>
<title> Robot map </title>
<h2>Robot map</h2>



  <div class="imgcontainer">
    <img src="robot.jpg" alt="Avatar" class="avatar">
  </div>

  <form action="button_action.php" method="post">
  <div class="container">

    <label for="right"><b>Right</b></label>
    <input type="text" id="eright" name="eright"  placeholder="Enter right number" >

    <label for="left"><b>Left</b></label>
    <input type="text"  id="eleft" placeholder="Enter left number" name="eleft">

    <label for="forward"><b>Forward</b></label>
    <input type="text" id="eforward"  placeholder="Enter forward number" name="eforward">


    <button  type="submit" name="bdelete">Delete</button>
    <button  type="submit" name="bsave">Save</button>
<br>
<br>

  </form>

  </div>

  <button type="submit" id="bright" onclick="myFunction()" name="bright"> Right </button>
  <button type="submit" id="bleft" onclick="myFunction2()" name="bleft"> Left </button>
  <button type="submit" id="bforward" onclick="myFunction1()" name="bforward"> Forward </button>
  <button type="submit" id="clear" onclick="Clear()" value="Clear"> Clear Map draw </button>

<canvas id="myCanvas"  width="500" height="300" style="border:1px solid #d3d3d3;"> </canvas>

  <div class="container" style="background-color:#f1f1f1">
<?php
include "dbConn.php"; // Using database connection file here
$sqlget = "SELECT * from map";
$query_run =     $query_run = mysqli_query($connection, $sqlget) or die ('error getting data');


  echo  "<table id='t'>";
  // first row
    echo  "  <tr>";
    echo  "    <th>Direction</th>";
    echo  "    <th>Number</th>";
    echo  "  </tr>";

    while($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)){


//Right number
  echo  "<tr><td>";
  echo  "Right </td><td>";
  echo  $row['bright'];
  echo  "</td></tr>";
//Left number
  echo  "<tr><td>";
  echo  "Left </td><td>";
  echo  $row['bleft'];
  echo  "</td></tr>";
//Forward number
  echo  "<tr><td>";
  echo  "Forward </td><td>";
  echo  $row['bforward'];
  echo  "</td></tr>";

}
  echo  "  </table>";

?>
  </div>
<!-- </form> -->

  <script>
    var x = 0;
      var num1 = 0;
      var y = 0;
      var num2 = 0;
      var z = 0;
      var num3 = 0;

   function myFunction(){
      x = document.getElementById("eright").value;
      num1 = parseInt(x);
      var c = document.getElementById("myCanvas");
      var ctx = c.getContext("2d");
      if (num2 != "") {

      ctx.moveTo(200,num2);
      ctx.lineTo((num1+200),num2);
      ctx.stroke();
     }else if (num3 != "" && num2 != ""){
      ctx.moveTo(num3, num2);
      ctx.lineTo(num1,num2);
      ctx.stroke();
   }
     else {
      ctx.moveTo(0,200);
      ctx.lineTo(num1,200);
      ctx.stroke();
   }
  }


   function myFunction1(){
       y = document.getElementById("eforward").value;
       num2 = parseInt(y);
      var c = document.getElementById("myCanvas");
      var ctx = c.getContext("2d");
      if (num1 != "") {
      ctx.moveTo(num1, 200);
      ctx.lineTo(num1, num2);
      ctx.stroke();
     } else if (num3 != "") {
      ctx.moveTo(num3, 300);
      ctx.lineTo(num3, num2);
      ctx.stroke();

      } else {
      ctx.moveTo(200, 300);
      ctx.lineTo(200, num2);
      ctx.stroke();
      }
   }

   function myFunction2(){
      z = document.getElementById("eleft").value;
      num3 = parseInt(z);
      var c = document.getElementById("myCanvas");
      var ctx = c.getContext("2d");
      if (num2&&num1 != "") {
      ctx.moveTo(num1,num2);
      ctx.lineTo((num3-num1), num2);
      ctx.stroke();
      } else if (num2 != ""){
      ctx.moveTo(200, num2);
      ctx.lineTo(num3, num2);
      ctx.stroke();
      } else if (num1 == "" && num2 =="") {
      ctx.moveTo(200, 300);
      ctx.lineTo(num3, 300);
      ctx.stroke();
      }

   }

   function Clear()
   {
       var canvas = document.getElementById("myCanvas"),
           ctx = canvas.getContext("2d");
       ctx.clearRect(0, 0, canvas.width, canvas.height);
   }


  </script>

</body>
</html>
