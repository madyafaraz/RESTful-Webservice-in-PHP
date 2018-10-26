<?php
require_once("../includes/config.php");
require(ROOT_PATH . "models/database.php");

// Get all courses
$query = 'SELECT * FROM sk_courses
                       ORDER BY courseID ASC';
$statement = $db->prepare($query);
$statement->execute();
$courses = $statement->fetchAll();
$statement->closeCursor();
?>
<?php 
include(ROOT_PATH . "includes/header.php");?>
<main class="container">
    <h1>COURSE LIST</h1>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        
        <?php foreach ($courses as $course) : ?>
            <tr><td><?php echo $course['courseID']; ?></td>
                <td><?php echo $course['courseName']; ?></td>
            </tr>
        <?php endforeach; ?>
    
    </table>
    <p>
    <h2>ADD COURSE</h2>
    
    <!-- add code for the form here -->
    <form action="add_course.php" method="post"
              id="add_course_form">

       <label>ID:</label>
        <input type="text" name="course_id"><br>
        <label>Name:</label>
        <input type="text" name="course_name"><br>
         <p>
        
        <label>&nbsp;</label>
        <input type="submit" class="btn btn-success btn-sm " value="Add course"><br>

    </form>
    
    <p><a href="../index.php" class="btn btn-success btn-sm ">List Students</a></p>

    </main>
    <?php include(ROOT_PATH . "includes/footer.php"); ?>