<?php 
require_once("includes/config.php");
include(ROOT_PATH . "includes/header.php");?>
<main class="container center">
    <h3>STUDENT LIST</h3>
<div class="row center">
    <aside class=".col-md-6 left">
        <!-- display a list of Courses -->
        <p>COURSES</p>
        <nav>
        <ul class="list-unstyled">
        <?php foreach ($courses as $course) : ?>
            <li>
            <a href="?course_id=<?php echo $course['courseID']; ?>">
                <?php echo strtoupper($course['courseID']); ?>
            </a>
            </li>
        <?php endforeach; ?>
        </ul>
        </nav>
    </aside>

    <section class=".col-md-6 right">
        <!-- display a table of students -->
        <p class="left text-info"><?php echo strtoupper($course_id). " - ". strtoupper($course_name); ?></p>
        <table class="table table-bordered">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($students as $student) : ?>
            <tr>
                <td><?php echo $student['firstName']; ?></td>
                <td><?php echo $student['lastName']; ?></td>
                <td class="right"><?php echo $student['email']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_student">
                    <input type="hidden" name="student_id"
                           value="<?php echo $student['studentID']; ?>">
                    <input type="hidden" name="course_id"
                           value="<?php echo $student['courseID']; ?>">
                    <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="row button-padding" >
            <a href="?action=add_student_form" class="btn btn-success btn-sm left">Add student</a><br>
            <a href="courses/course_list.php" class="btn btn-success btn-sm right">List Courses</a>
<br><p>
        </div>
    </section>

    </div>
</main>
<?php include(ROOT_PATH . "includes/footer.php"); ?>