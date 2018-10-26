<?php
function get_courses() {
    global $db;
    $query = 'SELECT * FROM sk_courses
              ORDER BY courseID ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_firstcourse() {
    global $db;
    $query = 'SELECT courseID FROM sk_courses ORDER BY courseID ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $courselist = $statement->fetch();
    $statement->closeCursor();    
    $course_id = $courselist['courseID'];
    return $course_id;
     
}


function get_course_name($course_id) {
    global $db;
    $query = 'SELECT * FROM sk_courses
              WHERE courseID = :course_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();    
    $course = $statement->fetch();
    $statement->closeCursor();    
    $course_name = $course['courseName'];
    return $course_name;
}

function getAllCourses(){
    $connect = mysqli_connect("localhost", "root", "","cs602");
    $sql = "SELECT * from sk_courses";
    $result = mysqli_query($connect,$sql);
    $json_array = array();
    while ($row = mysqli_fetch_assoc($result)){
        $json_array[] = $row;
    }
    return $json_array;

}


function getCourse_by_ID($course_id){
    $connect = mysqli_connect("localhost", "root", "","cs602");
    $sql = "SELECT * from sk_students WHERE courseID ='".$course_id."'";
    $result = mysqli_query($connect,$sql);
    $json_array = array();
    while ($row = mysqli_fetch_assoc($result)){
        $json_array[] = $row;
    }
    return $json_array;

}

function array2XML($obj, $array)
{
    foreach ($array as $key => $value)
    {
        if(is_numeric($key))
            $key = 'course';

        if (is_array($value))
        {
            $node = $obj->addChild($key);
            array2XML($node, $value);
        }
        else
        {
            $obj->addChild($key, htmlspecialchars($value));
        }
    }
}

?>