<?php

class Test extends Dbh{

//Access first_name from database becode table student
    public function getStudents(){
        $sql="SELECT * FROM student";
        $stmt = $this->connect()->query($sql);
        while($row = $stmt ->fetch()){
            echo $row['first_name'].'<br>';
        }
    }

//Access Specific student, echo specific information about this student
    public function getStudentsStmt($first_name, $last_name){
        $sql = "SELECT * FROM student WHERE first_name = ? AND last_name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$first_name, $last_name]);
        $students = $stmt -> fetchAll();

        foreach($students as $student){
            echo $student['email'] . '<br>';
        }
    }

//Insert or Update new data in database becode
    public function setStudentsStmt($first_name, $last_name, $username, $email){
        $sql = "INSERT INTO student(first_name, last_name, username, email)
        VALUES (?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$first_name, $last_name,$username, $email]);
        }

//delete data
    /*public function setStudentsDel($id){
        $sql = "DELETE FROM student WHERE id=6";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute($id);
    }*/
}