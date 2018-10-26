<?php 
require_once("includes/config.php");
include(ROOT_PATH . "includes/header.php"); 
?>
<main class="container">
    <h3>ADD STUDENT</h3>
    <form action="index.php" method="post" id="add_student_form">
        <input type="hidden" name="action" value="add_student">

        <label>Courses:</label>
        <select name="course_id">
        <?php foreach ( $courses as $course ) : ?>
            <option value="<?php echo $course['courseID']; ?>">
                <?php echo $course['courseName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label class="left">First Name:</label>
        <input type="text" name="firstName"/>
        <br>

        <label>Last Name:</label>
        <input type="text" name="lastName" />
        <br>

        <label>Email:</label>
        <input type="text" name="email" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" class="btn btn-success btn-sm left" value="Add student" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_students" class="btn btn-success btn-sm left">View student List</a>
    </p>

</main>
<?php include(ROOT_PATH . "includes/footer.php"); ?>