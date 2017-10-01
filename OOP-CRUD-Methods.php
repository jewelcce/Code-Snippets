<?php

namespace App\admin\Student;

use App\Connection;
use PDOException;
use PDO;



class Student extends Connection {

        private $name;
        private $password;
        private $id;
        private $oop_course_id;
        private $oop_student_id;
        private $image;
        private $course_name;

        public function set($data){

            if(array_key_exists('name', $data)){
                $this->name=$data['name'];
            }

            if(array_key_exists('password', $data)){
                $this->password=$data['password'];
            }

            if(array_key_exists('id', $data)){
                $this->id=$data['id'];
            }

            if(array_key_exists('oop_course_id', $data)){
                $this->oop_course_id=$data['oop_course_id'];
            }

            if(array_key_exists('oop_student_id', $data)){
                $this->oop_student_id=$data['oop_student_id'];
            }

            if(array_key_exists('image', $data)){
                $this->image=$data['image'];
            }

            if(array_key_exists('course_name', $data)){
                $this->course_name=$data['course_name'];
            }

            return $this;

        }

//          Simple formating


        public function store(){
            try{

                $stm = $this->conn->prepare("INSERT INTO `oop_students` (`name`,`password`, `image`) VALUES(:n,:p,:i)");
                $result = $stm->execute(array(

                    ':n' => $this->name,
                    ':p' => md5($this->password),
                    ':i' => $this->image,

                ));

                if($result){
                    $_SESSION['msg']="Data Successfully Inserted";
                    header("location:index.php");
                }

            } catch(PDOException $e){
                print "Error!: ". $e->getMessage(). "<br>";
                die();

            }
        }
//          Insert Data into Database

/* --------------------------------    
Execution :

include_once '../../../vendor/autoload.php';

use \App\admin\Student\Student as Student;
use \App\lib\Helper as Helper;

session_start();

$student = new Student();
$helper = new Helper();

$_POST['image'] = $helper->upload_img();
$student->set($_POST)->store();
        
--------------------------------- */   

    public function index(){
        try{

            $stm = $this->conn->prepare("SELECT * FROM `oop_students`");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e){
            print "Error!: ". $e->getMessage(). "<br>";
            die();

        }
    }
//          Display all Data 

/* --------------------------------
Execution:

include_once '../../../vendor/autoload.php';

session_start();

$student = new App\admin\Student\Student();

$students = $student->index();

if (isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    session_unset();
}
if (isset($_SESSION['update'])){
    echo $_SESSION['update'];
    session_unset();
}
if (isset($_SESSION['delete'])){
    echo $_SESSION['delete'];
    session_unset();
}
---------------------------------*/

    public function view($id){
        try{

            $stm = $this->conn->prepare("SELECT * FROM `oop_students` WHERE id = $id");
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);

        } catch(PDOException $e){

            print "Error!: ". $e->getMessage(). "<br>";
            die();

        }
    }
//          Display Single Data 

/* -----------------------------
Execution

include_once '../../../vendor/autoload.php';

$student = new App\admin\Student\Student();

$student = $student->view($_GET['id']);
------------------------------*/
        

    public function update(){
        try{

            $id = $this->id;
            $name = $this->name;
            $pass = md5($this->password);
            $image = $this->image;

            $stm = $this->conn->prepare("UPDATE `oop_students` SET `name` = ?, `password` = ?, `image` = ? WHERE `oop_students`.`id` = $id");
            $stm->execute(array($name, $pass, $image));


            if($stm){
                $_SESSION['update']="Data Successfully Updated";
                header("location:view.php?id=$id");
            }

        } catch(PDOException $e){

            print "Error!: ". $e->getMessage(). "<br>";
            die();

        }
    }
//          Edit Single Data

/* -----------------------------
Execution
include_once '../../../vendor/autoload.php';

use \App\admin\Student\Student as Student;
use \App\lib\Helper as Helper;

session_start();

$student = new Student();

$data = $student->set($_POST)->update();

if(!empty($_FILES['image']['name'])){
    if(isset($_POST['image'])){
        unlink('../../../assets/uploads/students/'.$_POST['image']);
    }
}

$helper = new Helper();
$_POST['image'] = $helper->upload_img();
$data = $student->set($_POST)->update();

------------------------------*/

    public function delete($id){
        try{

            $stm = $this->conn->prepare("DELETE FROM `oop_students` WHERE id = $id");
            $stm->execute();
            $stm->fetch(PDO::FETCH_ASSOC);

            if($stm){
                $_SESSION['delete']="Data Successfully Deleted";
                header("location:index.php");
            }

        } catch(PDOException $e){

            print "Error!: ". $e->getMessage(). "<br>";
            die();

        }
    }
//          Delete Single Data 
        
 /*------------------
Execution

include_once '../../../vendor/autoload.php';

$student = new \App\admin\Student\Student();

$data = $student->delete_img($_GET['id']);

if(isset($data['image'])){
    unlink('../../../assets/uploads/students/'.$data['image']);

}

$data = $student->delete($_GET['id']);
 ------------------*/       
        

}
