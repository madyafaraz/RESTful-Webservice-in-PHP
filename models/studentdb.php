<?php
function get_students_by_course($course_id) {
    global $db;
    $query = 'SELECT * FROM sk_students WHERE courseID = :course_id ORDER BY studentID';
    $statement = $db->prepare($query);
    $statement->bindValue(":course_id", $course_id);
    $statement->execute();
    $students = $statement->fetchAll();
    $statement->closeCursor();
    return $students;
}

function get_student($student_id) {
    global $db;
    $query = 'SELECT * FROM sk_students
              WHERE studentID = :student_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":student_id", $student_id);
    $statement->execute();
    $student = $statement->fetch();
    $statement->closeCursor();
    return $student;
}

function delete_student($student_id) {
    global $db;
    $query = 'DELETE FROM sk_students
              WHERE studentID = :student_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':student_id', $student_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_student($course_id, $firstName, $lastName, $email) {
    global $db;
    $query = 'INSERT INTO sk_students
                 (courseID, firstName, lastName, email)
              VALUES
                 (:course_id, :firstName, :lastName, :email)';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
}
?>