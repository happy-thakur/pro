<?php
    include('data_connect.php');
    $value_str = "";
    $key_str = "(s_no, roll_no, full_name, email, old_pass, new_pass, skills, interest, achivements, from, image_url, ip_address, date)";
    $roll_no = array(167, 168, 169, 170, 172, 173, 175, 178, 179, 182, 183, 184, 185, 186, 191, 208);
    $name = array("Rupal Raturi", "Sachin Gupta", "Sagar Saini", "Sajjan Kumar Singh", "Salman Mushtaque", "Sambhav Mishra", "Sanchit Gupta", "Sanjeet Singh", "Satyam Sharma", "Saurabh Verma", "Shadil Khan", "Shalvika Shrotriya", "Shashank Nath Yadav", "Shivam Gupta", "Shivam Sharma", "Sourav Pratap Singh");
    foreach ($roll_no as $key => $value) {
        $value_str = "";
        $value_str = "('".($key+1)."', '1514310".$roll_no[$key]."', '".$name[$key]."', 'NULL', '1514310".$roll_no[$key]."', '1514310".$roll_no[$key]."', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL' , '".date('d-m-Y')."')";
        //echo('1514310'.$roll_no[$key].'=='.$name[$key].'<br/>');
        // echo('key = '.$key_str.'<br/>');
        // echo('val = '.$value_str.'<br/>');
        $que = "insert into all_info ".$key_str." values ".$value_str;

        $res = mysqli_query($db, $que);
        echo($que.'<br>');
    }
    //$value_str = $value_str+');';


?>
