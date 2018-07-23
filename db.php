<?php
function create_data($dbname) {
    $servename = "127.0.0.1";
    $username = "root";
    $password = "lisongwei";
    try{
        $conn = new PDO("mysql:host=$servename",$username,$password);

        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "create database $dbname";
        $conn->exec($sql);
        echo $dbname . "数据库创建成功";
    }
    catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}

function create_table($table_name) {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "lisongwei";
    $dbname = "myTest";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "create table $table_name (
            id int(6) unsigned auto_increment primary key,
            username varchar(30) not null ,
            password varchar(30) not null 
        )";
        $conn->exec($sql);
        echo $table_name . "数据表创建成功！";
    }catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
    $conn = null;
}

function insert_data($uname,$pwd) {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "lisongwei";
    $dbname = "myTest";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "insert into users (username,password)
        values ('$uname','$pwd')";
        $conn->exec($sql);
        echo "插入成功";
    }catch (PDOException $e) {
        echo "error  " . $e->getMessage();
    }
}

function check_name($uname) {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "lisongwei";
    $dbname = "myTest";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "select * from users where username = '$uname'";
        $res = $conn->query($sql);
        foreach ($res as $row) {
            if ($row['username'] == $uname  &&  $row['password'] == $_POST['password']) {
                echo "登录成功";
            }else echo "登录失败";
        }
    }
    catch (PDOException $e) {
        $e->getMessage();
    }
}
//insert_data($_POST["username"],$_POST["password"]);
check_name("lisongwei");
?>