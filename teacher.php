<?php
session_start();
include('includes/connect.php');
$username=$_SESSION['username'];
$password=$_SESSION['password'];
//echo " HELLO $username";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            background-image: url('images/school.jpg');
        }

        .container {
            background: #fff;
            margin: auto;
            width: 70%;
            height: 70vh;
            border-radius: 10px;
            box-sizing: border-box;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top:2%;
            overflow-y: auto;
           
        }

        .sub-container {
            margin: 20px;
           
        }

        .button-container {
            display: flex;
            justify-content: space-around;
            margin-right: 2%;
            padding: 10px;
        }

        .navbtn{
            margin-right: 15%;
        }

        .btn2 {
            background: #fff;
            font-weight: 600;
            font-size: 16px;
            height: 50px;
            width: 150px;
            border: 2px solid #a17630;
            border-radius: 50px;
            cursor: pointer;
            text-align:center;
        }

        .btn2:hover {
            background: #a17630;
            color: #fff;
        }

        .btn2 a {
            text-decoration: none;
            color: inherit;
           
            height: 100%;
            width: 100%;
        }

     

.container2{
            font-weight: 600;
            font-size: 16px;
            height: 50px;
            width: 150px;
            border: 2px solid #a17630;
            border-radius: 50px;
            cursor: pointer;
            text-align:center;
            margin:auto;
            margin-top:2%;
}
.questions {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px;
    width: 90%; /* Adjust the width as needed */
    overflow-y: auto; /* Add this to enable vertical scrolling */
    max-height: 400px;
}

.questions ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.questions li {
    margin-bottom: 10px;
    font-weight: bold;
}

/* Add additional styles as needed for each list item */

    </style>
</head>
<body>
<div class="container2">
    <form action="" method="post">
    <div class="button-container">
        <input type="submit" class="btn2 navbtn" name="stu_question" value="   QUESTIONS   ">
        <input type="submit" class="btn2 navbtn" name="stu_solution" value="   SOLUTIONS   ">
        <input type="submit" class="btn2 navbtn" name="stu_sol" value="GIVE SOLUTION">
    </div>
        </form>
</div>
   <div class="container" style="">
    <!-- first child -->
    <div class="sub-container">
        
    <?php
    if(isset($_POST['stu_sol'])){
        echo "<script>window.open('insert_solution.php','_self')</script>"; 
    }
    elseif(isset($_POST['stu_question'])){
        ?>
        <?php
        echo "<span style='font-weight: bold; font-size: 25px;'>QUESTIONS</span>";
        $display_query="select * from `questions`";
        $run=mysqli_query($con,$display_query);
        while($row_data=mysqli_fetch_assoc($run)){
            $ques=$row_data['question'];
            $st_name=$row_data['student_name'];
            $sub_id=$row_data['subject_id'];
            $ques_no=$row_data['question_id'];
            $sub_query="select * from `all_subjects` where subject_id=$sub_id";
            $run_sub=mysqli_query($con,$sub_query);
            $row_sub=mysqli_fetch_assoc($run_sub);
            $sub_name=$row_sub['subject_name'];
            echo"<div class='questions'>
            <ul> 
            <li>QUESTION NO : $ques_no</li>
            <li>STUDENT NAME : $st_name</li>
            <li>SUBJECT : $sub_name</li>
            <li>QUESTION : $ques</li> 
            </ul>
            </div>";
        }
    }
    elseif(isset($_POST['stu_solution'])){
        ?>
        <?php
       echo "<span style='font-weight: bold; font-size: 25px;'>SOLUTIONS</span>";
       $display_query="select * from `solution`";
       $run=mysqli_query($con,$display_query);
       while($row_data=mysqli_fetch_assoc($run)){
           $sol=$row_data['solution'];
           $teacher_name=$row_data['teacher_name'];
           $sub_id=$row_data['subject_id'];
           $sol_no=$row_data['solution_id'];
           $sub_query="select * from `all_subjects` where subject_id=$sub_id";
           $run_sub=mysqli_query($con,$sub_query);
           $row_sub=mysqli_fetch_assoc($run_sub);
           $sub_name=$row_sub['subject_name'];
            echo"<div class='questions'>
            <ul> 
               <li>TEACHER NAME : $teacher_name</li>
               <li>SUBJECT : $sub_name</li>
               <li>SOLUTION FOR QUESTION: $sol_no</li>
               <li>SOLUTION : $sol</li> 
               </ul> 
               </div> ";
        }
    }
      else{
        ?> 
        <!-- second child -->
        
            <?php
        echo "<span style='font-weight: bold; font-size: 25px;'>SOLUTIONS</span>";
        $display_query="select * from `solution`";
        $run=mysqli_query($con,$display_query);
        while($row_data=mysqli_fetch_assoc($run)){
            $sol=$row_data['solution'];
            $teacher_name=$row_data['teacher_name'];
            $sub_id=$row_data['subject_id'];
            $sol_no=$row_data['solution_id'];
            $sub_query="select * from `all_subjects` where subject_id=$sub_id";
            $run_sub=mysqli_query($con,$sub_query);
            $row_sub=mysqli_fetch_assoc($run_sub);
            $sub_name=$row_sub['subject_name'];
             echo"<div class='questions'>
             <ul> 
                <li>TEACHER NAME : $teacher_name</li>
                <li>SUBJECT : $sub_name</li>
                <li>SOLUTION FOR QUESTION: $sol_no</li>
                <li>SOLUTION : $sol</li> 
                </ul> 
                </div> ";
        }
      }
      ?> 
      
    </div>

   </div>

    <!-- button for logout  -->
  <div class="container2">
  <button class="btn2" onclick="window.location.href='logout.php'"><a href="logout.php" class="nav-link mt-2 my-1">LOGOUT</a></button>
  </div>
</body>
</html>
