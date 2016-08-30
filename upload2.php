<?php
	session_start();
	$do_it = false;
    if(!isset($_COOKIE['roll_no']))
    {
        header('Location: log_in.php');
    }
    else
    {
	    if($_SERVER['REQUEST_METHOD'] == 'POST')
	    {
	    	if($_POST['upload'] == 'upload')
	    	{
				foreach ($_POST as $key => $value)
				{
					// echo ('<script>console.log("'.$key.'----'.$value.'");</script>');
					if(!isset($value))
					{
						die('<h2>Please enter '.$key.'</h2><a href="upload2.php"><h4>Go back.. </h4></a>');
					}
				}
				$type = $_POST['type'];
				$size = $_FILES['uploaded_file']['size'];
				$url = "";
				$temp = explode('.', $_FILES['uploaded_file']['name']);
				$ext = $temp[count($temp) - 1];

				echo('<script>alert("'.$type.'");</script>');
				if($type == 'video')
				{
					if($ext == 'mp4' || $ext == '3gp' || $ext == 'avi' || $ext == 'mov' || $ext == 'mpeg')
					{
						//checking size of video.. 5000000 = 5mb
						if($size > 20000000)
						{
							die('<h3>File larger than max size ..</h3>');
						}
						else
						{
							$do_it = true;
						}
					}
					else
					{
						die('<h3>This type of file cannot be uploaded ..</h3>');
					}
				}
				else if($type == 'audio')
				{
					if($ext == 'mp3')
					{
						//checking size of audio.. 5000000 = 5mb
						if($size > 10000000)
						{
							die('<h3>File larger than max size ..</h3>');
						}
						else
						{
							$do_it = true;
						}
					}
					else
					{
						die('<h3>This type of file cannot be uploaded ..</h3>');
					}
				}
				else if($type == 'photo')
				{

					if($ext == 'png' || $ext == 'jpg' || $ext == 'gif' || $ext == 'jpeg')
					{
						//checking size of image.. 5000000 = 5mb
						if($size > 5000000)
						{
							die('<h3>File larger than max size ..</h3>');
						}
						else
						{
							$do_it = true;
						}
					}
					else
					{
						die('<h3>"'.$ext.'" This type of file cannot be uploaded ..</h3>');
					}
				}
				if($do_it == true)
				{
					include('data_connect.php');

					$all_roll_no = '';
					$temp_que = 'select roll_no from all_info';
					$temp_res = mysqli_query($db, $temp_que);
					while($row = mysqli_fetch_array($temp_res, MYSQLI_ASSOC))
					{
						$all_roll_no = $all_roll_no.', '.$row['roll_no'];
					}
					//to remove a comma from the end
					$all_roll_no = substr($all_roll_no, 0, strlen($all_roll_no) - 2);

					$url = './'.$type.'/'.$_COOKIE['roll_no'].'_'.date('d-m-y').'.'.$ext;
					if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $url))
					{
						$date = date('Y-m-d H:i:s');
							$que = "insert into upload_data (s_no, roll_no, full_name, date, title, description, type, category, subcategory,contributers, file_url, ip, update_date) values
							('',
								'".$_SESSION['roll_no']."',
								'".$_SESSION['full_name']."',
								'".$date."',
								'".$_POST['title']."',
								'".$_POST['description']."',
								'".$_POST['type']."',
								'".$_POST['category']."',
								'".$_POST['subcategory']."',
								'".$_POST['contributers']."',
								'".$url."',
								'".$_FILES['uploaded_file']['size']."',
								'ip',
								'update_date',
								'',
								'',
								'',
								'".$all_roll_no."'
							 )";

							echo($que);
							$res = mysqli_query($db, $que);
							if(isset($res))
							{
								echo('<script>alert("Data Uploaded");</script>');
								header('Location: home.php');
							}
							else
								echo('<script>alert("Data has not been Uploaded due to some error..");</script>');
							}
					else {
						echo('<script>Unable to Upload file..</script>');
					}
				}
				else
				{
					die('<h3>File cannot be uploaded ..</h3>');
				}
				// $date = date('Y-m-d H:i:s');
				// 	$que = "insert into upload_data (s_no, roll_no, full_name, date, title, description, type, category, subcategory,contributers, file_url, ip, update_date) values
				// 	('',
				// 	'".$_SESSION['roll_no']."',
				// 	 '".$_SESSION['full_name']."',
				// 	  '".$date."',
				// 	   '".$_POST['title']."',
				// 	    '".$_POST['description']."',
				// 	     '".$_POST['type']."',
				// 	      '".$_POST['category']."',
				// 	       '".$_POST['subcategory']."',
				// 	        '".$_POST['contributers']."',
				// 	         '".$_FILES['uploaded_file']['name']."',
				// 	          '".$_FILES['uploaded_file']['size']."',
				// 	           'bb')";
				//
		    //         include('data_connect.php');
				// 	echo($que);
				// 	$res = mysqli_query($db, $que);
				// 	if(isset($res))
				// 	{
				// 		echo('<script>alert("Data Uploaded");</script>');
				// 		header('Location: home.php');
				// 	}
				// 	else
				// 		echo('<script>alert("Data has not been Uploaded due to some error..");</script>');


	    	}
	    }
			else
			{
				echo('<script>alert("not posted");</script>');
			}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>upload</title>

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <style type="text/css">
    	div.main_upload{
    		width: 700px;
    		margin: auto;
    		margin-top: 7 0px;
    	}
    	h5.upload_heading{
		    font-size: 30px;
		    padding: 4px;
		    color: #4cafa7;
		    margin-left: 10px;
		    padding-top: 16px;
		    border-bottom: 1px solid;
		    display: inline-block;
		    font-weight: 500;
		    margin-bottom: 45px;
    	}
    	h6.sub_heading_upload{
    		color: #4cafa7;
		    font-size: 20px;
		    margin-left: 15px;
		    border-bottom: 1px solid;
		    display: inline-block;
		    margin-bottom: 35px;
    	}
    	div.sub_div_upload{
    		margin-left: 25px;
    	}
    	 button#login_button{
            /* float: right; */
		    margin: 35px 20px;
		    margin-top: 40px;
		    margin-left: 75%;
          }
					div.add_other_type{
						height: 100%;
						width: 100%;
						margin: 0px;
						padding: 0px;
						background: rgba(0,0,0,0.7);
						position: fixed;
						top: 0px;
						left: 0px;
						z-index: 25;
					}
					div.inner_add_other_type{
						margin: auto;
						width: 50%;
						background: white;
						height: 290px;
						border-radius: 5px;
						margin-top: 13%;
						z-index: 26;
					}
					h4.add_heading{
						padding: 5px;
						font-size: 22px;
						margin: 25px;
						padding-top: 20px;
						border-bottom: 1px solid;
						display: inline-block;
					}
					span.add_done{
						background: cornflowerblue;
						height: 60px;
						width: 60px;
						border-radius: 46px;
						color: white;
						/*border: 1px solid black;*/
						/*position: absolute;
						top: 20px;
						left: 10px;*/
						float: right;
						padding: 0px;
						cursor: pointer;
						margin-right: 20px;
						margin-top: 00px;
						border: 1px solid white;

					}
					span.add_done:hover{
						background: white;
						color: cornflowerblue;
						border: 1px solid cornflowerblue;
					}
					div.add_other_type{
						display: none;
					}
					select{
						border: 1px solid;
						padding: 10px;
						border-radius: 5px;
					}
    </style>


</head>
<body>
	<div class="main_upload">
		<div class="card">
			<form method="POST" action="upload2.php" enctype="multipart/form-data">

				<div class="sub_div_upload">
					<h5 class="upload_heading">Upload</h5>
					<div class="row">
					   <div class="input-field col s12">
				   			<i class="material-icons prefix">mode_edit</i>
			          <input id="last_name" type="text" class="validate" name="title" required="true", maxlength="25">
			          <label for="last_name">Title of your upload..</label>
			        </div>
			    </div>

    				<div class="row">
				        <div class="input-field col s12">
				          <i class="material-icons prefix">mode_edit</i>
				          <textarea id="icon_prefix2" class="materialize-textarea" name="description" required="true" min="20"></textarea>
				          <label for="icon_prefix2">Description</label>
				        </div>
			      </div>
				</div>

				<h6 class="sub_heading_upload">Categorize..</h6>

				<div class="sub_div_upload">

					<div class="row">
						  <div class="input-field col s6">
						  <i class="material-icons prefix">mode_edit</i>
						    <select name="type" onchange="other_type(this)" id="add_type" required="true">
						      <option value="" disabled selected>Choose your option</option>
						      <option value="photo">Photo</option>
						      <option value="video">Video</option>
						      <option value="audio">Audio</option>
						      <option value="other">Other</option>
						    </select>
						    <label>Select Type</label>
							</div>

							<!-- div element to add extra things -->
							<div class="add_other_type" id="add_type">
								<div class="inner_add_other_type">
									<i class="material-icons prefix" style="float: right; padding:15px; cursor: pointer;" onclick="hide_div_add(this)" id="add_type">clear</i>
									<h4 class="add_heading">Add Type of Upload</h4>
									<div class="row">
									   <div class="input-field col s12">
								   			<i class="material-icons prefix">mode_edit</i>
							          <input id="last_name" type="text" class="validate" name="add_other_type">
							          <label for="last_name">Title of your upload..</label>
							        </div>
						    	</div>
									<span class="add_done"><i class="medium material-icons prefix" style="float: right; margin-right: 0px;margin-top: 2px;" onclick="hide_div_add(this)" id="add_type">done</i></span>
								</div>
							</div>

							<div class="input-field col s6">
					  		<i class="material-icons prefix">mode_edit</i>
							    <select name="category" onchange="other_category(this)" id="add_category" reuired="true">
							      <option value="" disabled selected>Choose Category of upload</option>
							      <option value="tech">Technical</option>
							      <option value="song">Song</option>
							      <option value="dance">Dance</option>
							      <option value="other">Other</option>
							    </select>
					    <label>Select Type</label>
						   </div>
			    	</div>

						<!-- div element to add extra things -->
						<div class="add_other_type" id="add_category">
							<div class="inner_add_other_type">
								<i class="material-icons prefix" style="float: right; padding:15px; cursor: pointer;" onclick="hide_div_add(this)" id="add_category">clear</i>
								<h4 class="add_heading">Add Type of Upload</h4>
								<div class="row">
									 <div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="last_name" type="text" class="validate" name="add_other_type">
											<label for="last_name">Title of your upload..</label>
										</div>
								</div>
								<span class="add_done"><i class="medium material-icons prefix" style="float: right; margin-right: 0px;margin-top: 2px;" onclick="hide_div_add(this)" id="add_category">done</i></span>
							</div>
						</div>

				    <div class="row">
					    <div class="input-field col s6">
					    <i class="material-icons prefix">mode_edit</i>
				          <input id="last_name" type="text" class="validate" name="subcategory">
				          <label for="last_name">Subcatory(Eg. Dance Type)</label>
				        </div>
				    </div>

				    <div class="row">
					   <div class="input-field col s12">
					   <i class="material-icons prefix">mode_edit</i>
				          <input id="last_name" type="text" class="validate" name="contributers">
				          <label for="last_name">Contributers.. (if any)</label>
				        </div>
				    </div>

				    <div class="file-field input-field" style="width: 70%;">
				      <div class="btn">
				        <span>File</span>
				        <input type="file" name="uploaded_file">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text">
				      </div>
				    </div>

				    <button onclick="submit" class="waves-effect waves-light btn" id="login_button" style="opacity: 1" name="upload" value="upload">Upload</button>

			    </div>

	    	</form>

 		</div>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script type="text/javascript">

		  $(document).ready(function() {
		    $('select').material_select();
		  });

			function other_category(ele)
			{
				var selected_item = ele.selectedOptions[0].value;
				if(selected_item == 'other')
				{
					// alert(document.querySelector('div#'+ele.id));
					document.querySelector('div#'+ele.id).style.display = "block";
				}
			}

			function other_type(ele)
			{
				var selected_item = ele.selectedOptions[0].value;
				if(selected_item == 'other')
				{
					// alert(document.querySelector('div#'+ele.id));
					document.querySelector('div#'+ele.id).style.display = "block";
				}

			}
			function hide_div_add(ele)
			{

				var x = ele.id;
				var str = "KIWI";
				var count = 0;
				var select_ele = document.querySelector('select#'+x);
				var div = (ele.parentElement).parentElement;
				if(ele.innerHTML == 'done')
				{

					// alert('done');
					div.parentElement.style.display = "none";
					for(var i=0; i<select_ele.options.length; i++){
						if(str == select_ele[i])
						{
							count = 1;
							alert(str+' already exists in options');
						}
					}
					if(count != 1)
					{
						var c = document.createElement("option");
					 	c.text = "Kiwi";
					 	select_ele.options.add(c, select_ele.options.length - 1);
					}
				}
				else
				{
					div.style.display = "none";
					var x = ele.id;
					var select_ele = document.querySelector('select#'+x);
					// console.log(select_ele.selectedIndex);
					select_ele.selectedIndex = "0";
					// console.log(select_ele);
					// console.log(select_ele.selectedIndex);
					// alert('closed');
				}
			}

    </script>


</body>
</html>
