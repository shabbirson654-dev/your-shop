<?php

require("db.php");
$fullname=$_POST['fullname'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$address=$_POST['address'];
$password=md5($_POST['password']);
$cd=date('Y-m-d');
$check=$db->query("SELECT * FROM register");
if($check)
    {
         
           $check_user=$db->query("SELECT * FROM register WHERE email='$email'");
                if($check_user->num_rows !=0)
                    {
                        echo "user already exist";
                    }
                    else{
                        $store=$db->query("INSERT INTO register(fullname,mobile,email,address,password,date) VALUES(
                        
                        '$fullname','$mobile','$email','$address','$password','$cd'
                        )");
                        
                        if($store){
                            echo "success";
                        }
                        else{
                            echo "failed";
                        }
                    }

    }
    else
        {
            $create_table=$db->query("CREATE TABLE register(
            
            id INT(11) NOT NULL AUTO_INCREMENT,
            fullname VARCHAR(200),
            mobile VARCHAR(200),
            email VARCHAR(200),
            address MEDIUMTEXT,
            password VARCHAR(250),
            date DATE,
            PRIMARY KEY(id)

            )");
            if($create_table){
                $check_user=$db->query("SELECT * FROM regiter WHERE email='$email'");
                if($check_user->num_rows !=0)
                    {
                        echo "user already exist";
                    }
                    else{
                        $store=$db->query("INSERT INTO register(fullname,mobile,email,addess,password,date) VALUES(
                        
                        '$fullname','$mobile','$email','$address''$password','$cd'
                        )");
                        
                        if($store){
                            echo "success";
                        }
                        else{
                            echo "failed";
                        }
                    }
            }
            else{
                echo "failed not created a table";
            }
        }











?>
