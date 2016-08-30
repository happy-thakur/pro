<?php

session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // if($_POST['login'] == 'Login')
        // {
            if(isset($_POST['roll_no']))
            {
                $roll_no = $_POST['roll_no'];

                include('data_connect.php');
                $que = "select roll_no from all_info";
                $res = mysqli_query($db, $que);
                if(isset($res))
                {
                    $count = 0;
                    while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
                    {
                        if($row['roll_no'] == $roll_no)
                        {
                            $que = "select * from all_info where roll_no = '".$roll_no."'";
                            $res = mysqli_query($db, $que);

                            $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

                            if($row['new_pass'] == $_POST['password'])
                            {
                                //setting cookie..
                                setcookie('roll_no', $roll_no, mktime() + 256000, '/');

                                //setting session variable..
                                foreach ($row as $key => $value) {
                                  if($key != 'old_pass' && $key != 'ip_address' && $key != 'date')
                                  {
                                    $_SESSION[$key] = $value;
                                  }

                                }

                                header('Location: home.php');
                            }
                            else
                            {
                                // header('Location: log_in.php');
                                die('Wrong Password for '.$row['full_name']);
                                echo('<a href = "log_in.php">Back..</a>');
                            }
                            $count = 1;
                            break;

                        }

                    }
                    if($count == 0)
                    {
                        die($roll_no.'This roll no was not in database'.$row['roll_no']);
                    }
                }
                else
                {
                    die('Failed to connect. Try after some time..');
                }
                mysqli_close($db);
            }
            else
            {
                die('Please enter Roll no..');
            }
        // }
    }


?>
