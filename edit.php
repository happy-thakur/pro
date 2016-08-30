<?php
    session_start();

    if(!isset($_COOKIE['roll_no']))
    {
        header('Location: log_in.php');
    }
    else
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //..connecting to database
            include('data_connect.php');

            if($_POST['submit_but'] == 'Save')
            {
                $update_str  = "";
                //querying..
                $que = "select * from all_info where roll_no='".$_COOKIE['roll_no']."'";

                $res = mysqli_query($db, $que);
                $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
                foreach ($row as $key => $value) 
                {
                    echo('<script>console.log("'.$key.'==='.$value.'");</script>');
                   if($key != 's_no' && $key != 'old_pass' && $key != 'image_url' && $key != 'ip_address' && $key != 'date')
                   {
                        //creating session variables..
                        if(!isset($_SESSION['roll_no']))
                        {
                            if(!isset($_POST[$key]))
                            {
                                $_SESSION[$key] = $_POST[$key];
                            }
                        }

                        if(!isset($_POST[$key]))
                        {
                            if($key != 'form')
                            echo('<script>alert("Please fill '.$key.' field");</script>');
                        }
                        //..checking which field has been change to update th database
                        if($value != $_POST[$key])
                        {
                            echo('<script>alert("'.$key.'*********'.$_POST[$key].'");</script>');
                            $_SESSION[$key] = trim($_POST[$key]);
                            $que2 = "update all_info set ".$key."='".trim($_POST[$key])."' where roll_no='".$_COOKIE['roll_no']."'";
                            mysqli_query($db, $que2);
                            $update_str = $update_str + " || " + $key;
                        }
                   }
                   else if($key == 'image_url')
                   {
                   		if ($_FILES["image"]["error"] > 0)
                   		{
                   			echo('<script>alert("error : '.$_FILES["image"]["error"].'");</script>');
                   		}
                   		else
                   		{
                       		//..getting the extension of photo.
	                        $name = $_FILES['image']['name'];
	                        $x = explode('.', $name);
	                        $z = isset($x[sizeof($x) - 1]) ? $x[sizeof($x) - 1] : 'jpg';
	                        $url = './profile_pics/'.$_COOKIE['roll_no'].'.'.$z;
	                        if($value != $url)
	                        {
	                            if($_FILES['image']['size'] > 50000)
	                            {
	                                echo('<script>alert("File larger then max limit.. [50.0 KB]");</script>');
	                            }
	                            else
	                            {
	                                move_uploaded_file($_FILES['image']['tmp_name'],$url);
	                                $que2 = "update all_info set ".$key."='".$url."' where roll_no='".$_COOKIE['roll_no']."'";
	                                mysqli_query($db, $que2);
	                            }
	                            $_SESSION['image_url'] = $url;
	                        }
	                    }
                   }
                   else if($key == 'date')
                   {
                        $que2 = "update all_info set ".$key."='".date('d-m-Y')."' where roll_no='".$_COOKIE['roll_no']."'";
                        mysqli_query($db, $que2);
                   }
                   else if($key == 'ip_address')
                   {
                        $ip = get_client_ip();
                        $que2 = "update all_info set ".$key."='".$ip."' where roll_no='".$_COOKIE['roll_no']."'";
                        mysqli_query($db,  $que2);
                   }
                   else if($key == 'old_pass')
                   {
                       if($row['new_pass'] != $_POST['new_pass'])
                       {
                            $que2 = "update all_info set old_pass='".$row['new_pass']."', new_pass='".$_POST['new_pass']."' where roll_no='".$_COOKIE['roll_no']."'";
                            mysqli_query($db, $que2); 
                           
                       }
                   }

                }

                //showing message of uploaded field..
                if($update_str == "")
                {
                    echo('<script>alert("Nothing updated..");</script>');
                }
                else
                {
                    echo('<script>alert("'.$update_str.' has been updated");</script>');
                }
            }
            mysqli_close($db);
        }
        else
        {
            //echo('<script>alert("else");</script>');
            include('data_connect.php');
            //this will execute when submit is not done..
            if((!isset($_SESSION['roll_no'])) || (!isset($_SESSION['full_name'])))
            {
                //<querying class=""></querying>
                $que = "select * from all_info where roll_no='".$_COOKIE['roll_no']."'";

                $res = mysqli_query($db, $que);
                $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
                foreach ($row as $key => $value) 
                {
                    //echo('<script>alert("'.$value.'");</script>');
                    $_SESSION[$key] = $value;
                }
                
            } 
            mysqli_close($db);
        }

    }


    // Function to get the client IP address
    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Detail</title>

	<!-- Compiled and minified CSS -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	  <!-- Compiled and minified JavaScript -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
	  <style type="text/css">
	  	h4.edit_heading{
  		    margin-left: 20px;
		    margin-bottom: 50px;
		    color: #26a69a;
		    border-bottom: 3px solid;
		    display: inline-block;
		    padding-right: 7px;
		    padding-bottom: 5px;
	  	}
	  	div#information_card{
	  		width: 65%;
	  		padding: 20px;
	  		display: inline-block;
	  	}
	  	div#row{
	  		margin-left: 10%;
	  	}
          input#disabled{
              font-weight: 600;
              color: #26a69a;
              opacity: 0.8;
          }
          button#login_button{
            float: right;
            margin: 20px 20px;
            margin-top: 40px;
          }
          img.circle{
          	border: 3px solid gray;
          	height: 90px;
          	width: 90px;
          }
	  </style>
          
</head>
<body>

    <?php include('header.php'); ?>

	<div class="edit_main_outer" style="margin-left: 26%; margin-top: 6%;">
		<div class="edit_main_inner">
					
		 <div class="row">
		    <form class="col s12" name="edit_info" action="edit.php" method="POST" enctype="multipart/form-data">
		    <div class="card" id="information_card">
		    	<h4 style="margin-bottom: 35px;" class="edit_heading">General Info:</h4>
		    	
                <div class="row" id="row">
                    <div class="input-field col s10">
                    <i class="material-icons prefix">account_circle</i>
                    <input disabled value="<?php echo isset($_SESSION['roll_no']) ? $_SESSION['roll_no'] : ''; ?>" id="disabled" type="text" class="validate">
                    <input id="icon_prefix" hidden="true" type="text" name="roll_no" class="validate" value="<?php echo isset($_SESSION['roll_no']) ? $_SESSION['roll_no'] : ''; ?>">
                    <label for="disabled">Roll No.</label>
                    </div>
                </div>

			      <div class="row" id="row">
			        <div class="input-field col s10">
			        <i class="material-icons prefix">email</i>
			          <input id="email" type="email" class="validate" name="email" required="true" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ""; ?>">
			          <label for="email" data-error="wrong" data-success="right">Email</label>
			        </div>
			      </div>

			       <div class="row" id="row">
                    <div class="input-field col s10">
                    <i class="material-icons prefix">account_circle</i>
                    <input disabled value="<?php echo isset($_SESSION['full_name']) ? $_SESSION['full_name'] : ""; ?>" id="disabled" type="text" class="validate">
                    <input id="icon_prefix" hidden="true" type="text" name="full_name" class="validate" value="<?php echo isset($_SESSION['full_name']) ? $_SESSION['full_name'] : ""; ?>">
                    <label for="disabled">Full Name</label>
                    </div>
                </div>

			      <div class="row" id="row">
			        <div class="input-field col s10">
			          <i class="material-icons prefix">vpn_key</i>
			          <input id="icon_prefix" type="password" class="validate" name="new_pass" required="true" value="<?php echo isset($_SESSION['new_pass']) ? $_SESSION['new_pass'] : ""; ?>">
			          <label for="icon_prefix">Password</label>
			        </div>
			      </div>

                   <div class="row" id="row">
                    <div class="input-field col s10">
                    <i class="material-icons prefix">home</i>
                    <input value="<?php echo (isset($_SESSION['from']) && $_SESSION['from'] != 'NULL') ? $_SESSION['from'] : ""; ?>" required="true" type="text" name="from" class="validate">
                    <label for="disabled">From (District)</label>
                    </div>
                </div>
		      
		      	 <div class="row" id="row">
			        <div class="input-field col s10">
			          <i class="material-icons prefix">mode_edit</i>
			          <textarea id="icon_prefix2" class="materialize-textarea" required="required"  name="skills" required><?php echo isset($_SESSION['skills']) ? $_SESSION['skills'] : ""; ?></textarea>
			          <label for="icon_prefix2">Skills...</label>
			        </div>
			      </div>

			      <div class="row" id="row">
			        <div class="input-field col s10">
			          <i class="material-icons prefix">mode_edit</i>
			          <textarea id="icon_prefix2" class="materialize-textarea" required="required" name="interest" required><?php echo isset($_SESSION['interest']) ? $_SESSION['interest'] : ""; ?></textarea>
			          <label for="icon_prefix2">Interest...</label>
			        </div>
			      </div>

			      <div class="row" id="row">
			        <div class="input-field col s10">
			          <i class="material-icons prefix">mode_edit</i>
			          <textarea id="icon_prefix2" class="materialize-textarea" required="required" name="achivements" required><?php echo isset($_SESSION['achivements']) ? $_SESSION['achivements'] : ""; ?></textarea>
			          <label for="icon_prefix2">Achivements...</label>
			        </div>
			      </div>
			     
                 <div class="file-field input-field" id="row">
                <div class="btn">
                    <span>File</span>
                    <input type="file" name="image" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload your photo as profile picture">
                </div>
                </div>

                <button onclick="submit" class="waves-effect waves-light btn" id="login_button" style="opacity: 1" name="submit_but" value="Save">Save</button>
		      </form>
	      </div>
        </div>
                 

		      

		</div>	
	</div>

    <?php include('footer.php'); ?>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>

<!-- Name**
email**
Roll no.**
Pass**
profile
skill.. == what know
intrest.
achivements...
upload..
 -->
