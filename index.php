<?php
require_once("includes/config.php");
require(ROOT_PATH . 'models/database.php');
require(ROOT_PATH . 'models/studentdb.php');
require(ROOT_PATH . 'models/coursedb.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_students';
    }
}

if ($action == 'list_students') {
    $course_id = filter_input(INPUT_GET, 'course_id');
    if ($course_id == NULL || $course_id == FALSE) {
       
        $course_id = get_firstcourse();
    }
    $course_name = get_course_name($course_id);
    $courses = get_courses();
    $students = get_students_by_course($course_id);
    include('students/student_list.php');
} else if ($action == 'delete_student') {
    $student_id = filter_input(INPUT_POST, 'student_id', 
            FILTER_VALIDATE_INT);
    $course_id = filter_input(INPUT_POST, 'course_id');
    if ($course_id == NULL || $course_id == FALSE ||
            $student_id == NULL || $student_id == FALSE) {
        $error = "Missing or incorrect student id or course id.";
        include(ROOT_PATH . 'models/error.php');
    } else { 
        delete_student($student_id);
        header("Location: .?course_id=$course_id");
    }
} else if ($action == 'add_student_form') {
    $courses = get_courses();
    include('students/student_add.php');    
} else if ($action == 'add_student') {
    $course_id = filter_input(INPUT_POST, 'course_id');
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($course_id == NULL || $course_id == FALSE || $firstName == NULL || 
            $lastName == NULL || $email == NULL || $email == FALSE) {
        $error = "Invalid student data. Check all fields and try again.";
        include('C:/xampp/htdocs/CS602_HW5_Faraz/models/error.php');
    } else { 
        add_student($course_id, $firstName, $lastName, $email);
        header("Location: .?course_id=$course_id");
    }
}    
?>