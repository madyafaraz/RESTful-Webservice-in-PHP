<?php
require_once("includes/config.php");
require(ROOT_PATH . 'models/coursedb.php');


if($_GET['format'] == 'json' and $_GET['action'] == 'courses') {
    header('Content-Type: text/plain');
    echo json_encode(getAllCourses(), JSON_PRETTY_PRINT);

}elseif ($_GET['format'] == 'json' and $_GET['action'] == 'students'){
    header('Content-Type: text/plain');
    $course_id=$_GET['course'];
    echo json_encode( getCourse_by_ID($course_id),JSON_PRETTY_PRINT);


}elseif ($_GET['format'] == 'xml' and $_GET['action'] == 'courses'){
     header('Content-Type: text/xml');
     $data = getAllCourses();
     $xml = new SimpleXMLElement('<courses/>');
    // function callback to create xml tags for file
     array2XML($xml, $data);
    // save as xml file
     $xml->asXML('xml/studentData.xml');
     $file = file_get_contents('xml/studentData.xml');
     echo $file;
    

}elseif ($_GET['format'] == 'xml' and $_GET['action'] == 'students'){
    header('Content-Type: text/xml');
    $course_id=$_GET['course'];
    $data = getCourse_by_ID($course_id);
    $xml = new SimpleXMLElement('<courses/>');
    array2XML($xml, $data);
    $xml->asXML('xml/courseData.xml');
    $file = file_get_contents('xml/courseData.xml');
    echo $file;
    

}else {
    die("Wrong parameter on url !");
}



