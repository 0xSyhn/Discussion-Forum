<?php
include('includes/connect.php');
session_start();
$student_name=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask the Question!</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 10px;
            font-family: 'Poppins', sans-serif;
            background-image: url('images/school.jpg');
        }

        .container {
            width:40%; /* Increase the max-width */
            margin: 90px auto;
            background: #fff;
            padding: 30px; /* Increase the padding */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px; /* Increase the padding */
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #000;
            color: #fff;
            padding: 12px; /* Increase the padding */
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .container img{
            width: 4%;
            height: 4%;
            float:right;
            margin-right: 2%;
            margin-top: 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
    <img src="images\x.png" onclick="window.location.href = 'teacher.php';">
        <h2>Solution</h2>
        <form action="#" method="post">
            <label for="teacher_name">Teacher Name:</label>
            <input type="text" name="teacher_name"  required>

            <label for="subject">Subject:</label>
            <select id="subject" name="subject" >
            <?php
                   $select_query="Select * from `all_subjects`";
                   $result_query=mysqli_query($con,$select_query);
                   while($row=mysqli_fetch_assoc($result_query))
                   {
                     $subject_name=$row['subject_name'];
                     $subject_id=$row['subject_id'];
                     echo "<option value='$subject_id'>$subject_name</option>";
                   }
                ?>
            </select>

            <label for="message">Answer:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit" name="sub_sol">Submit</button>
        </form>
    </div>
    <script href=scipt.js></script>
</body>
</html>
<?php
if(isset($_POST['sub_sol'])){
    $sub_id=$_POST['subject'];
    $teacher_name=$_POST['teacher_name'];
    $solution=$_POST['message'];
    $insert_query="INSERT INTO `solution` (teacher_name,subject_id,solution) 
    VALUES ('$teacher_name',$sub_id ,'$solution')";
    $result_query=mysqli_query($con,$insert_query);
    if($result_query){
        echo "<script>alert('Submitted Successfully!')</script>";
        echo "<script>window.open('teacher.php','_self')</script>"; 
    }
    }
   
?>
