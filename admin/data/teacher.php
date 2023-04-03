<?php  

function getTeacherById($teacher_id, $conn){
  $sql = "SELECT * FROM teachers
          WHERE teacher_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$teacher_id]);

  if ($stmt->rowCount() == 1) {
    $teacher = $stmt->fetch();
    return $teacher;
  }else {
    return 0;
  }
}

// All Teachers 
function getAllTeachers($conn){
    $sql = "SELECT * FROM teachers";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
      $teachers = $stmt->fetchAll();
      return $teachers;
    }else {
      return 0;
    }
}

// Check if the username Unique
function unameIsUnique($uname, $conn){
    $sql = "SELECT username FROM teachers
            WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);

    if ($stmt->rowCount() >= 1) {
      return 0;
    }else {
      return 1;
    }
}


function removeTeacher($id, $conn){
  $sql  = "DELETE FROM teachers
          WHERE teacher_id=?";
  $stmt = $conn->prepare($sql);
  $re   = $stmt->execute([$id]);
  if ($re) {
    return 1;
  }else {
    return 0;
  }
}