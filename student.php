<?php

class Student {

    public $id;
    public $student_id;
    public $name;
    public $email;
    public $course;

    public function __construct($id, $student_id, $name, $email, $course) {
        $this->id = $id;
        $this->student_id = $student_id;
        $this->name = $name;
        $this->email = $email;
        $this->course = $course;
    }

    public function getFormattedName() {
        return ucwords(strtolower($this->name));
    }

    public function getCourse() {
        return strtoupper($this->course);
    }

    public function getNameLength() {
        return strlen($this->name);
    }

}

?>