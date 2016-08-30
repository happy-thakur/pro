<!-- facebook app id 297386513956591 -->
<script>
var roll_no = [];
var name = [];
var email = [];
var i = 0;
</script>
<?php
    $count = 0;
    if(isset($_COOKIE['roll_no']) || isset($_SESSION['roll_no']))
    {
        if(isset($_SESSION['roll_no']))
        {
            // means logged in and session variables
            $c = 1;
        }
        else
        {
            include('data_connect.php');
            $que = "select * from all_info where roll_no='".$_COOKIE['roll_no']."'";
            $res = mysqli_query($db, $que);
            $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

             foreach ($row as $key => $value)
            {
                if($key != "old_pass" && $key != "new_pass")
                {
                    $_SESSION[$key] = $value;
                }
            }
        }
    }

    // echo('<script>alert("time'.time_calc('2011-08-20 12:30:20.332').'");</script>');

    // function to calculate time of upload
    function time_calc($up_time)
    {
      // time is of the form YYYY-MM-DD HH:MM:SS.MILISEC
      $x = explode(' ', $up_time);
      $y = explode('-', $x[0]);
      $z = explode(':', $x[1]);

      // condition for year
      if(((int)date('Y') - (int)$y[0]) > 0)
      {
        $temp = ((int)date('Y') - (int)$y[0]);
        $temp = $temp." years ago";
        return($temp);
      }
      else if(((int)date('m') - (int)$y[1]) > 0)
      {
        $temp = ((int)date('m') - (int)$y[1]);
        $temp = $temp." months ago";
        return($temp);
      }
      else if(((int)date('d') - (int)$y[2]) > 0)
      {
        $temp = ((int)date('d') - (int)$y[2]);
        $temp = $temp." days ago";
        return($temp);
      }
      else if(((int)date('H') - (int)$z[0]) > 0)
      {
        $temp = ((int)date('H') - (int)$z[0]);
        $temp = $temp." hrs ago";
        return($temp);
      }
      else if(((int)date('i') - (int)$z[1]) > 0)
      {
        $temp = ((int)date('i') - (int)$z[1]);
        $temp = $temp." mins ago";
        return($temp);
      }
    }

?>

<!DOCTYPE html>
<html>
<head>

   <title>header</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

   <link rel="stylesheet" href="./css/header.css">
   <link rel="stylesheet" href="./css/upload.css">

   <link rel="shortcut icon" type="image/png" href="my_title.png" />

</head>

<body onresize="check_it()">

    <!-- main heading starts here -->
    <nav style="position: fixed; left: 0px; top: 0px; z-index: 5;">
	    <div class="nav-wrapper" style="background: cornflowerblue;">
	      <a class="brand-logo" href="#" onclick="show_more_less()">
          <img src="img.png"style="height: 55px; width: 160px; border-radius: 10px; margin-top: 4px; margin-left: 7px;"/></a>
	         <ul class="right hide-on-med-and-down">
             <?php
             if(isset($_COOKIE['roll_no']))
             {
             ?>
	            <li title="Home"><a href="home.php"><i class="material-icons">home</i></a></li>
              <li title="Edit"><a href="edit.php"><i class="material-icons">create</i></a></li>
              <li title="Publish"  onclick="show_upload_div()"><a><i class="material-icons" style="cursor: pointer;">publish</i></a></li>
	             <li title="Notifications" onclick="show_hide_notif()" style="cursor: pointer;"><a><i class="material-icons" id="notification">notifications</i></a></li>
               <?php
             }
             else
             {
                ?>
                <li><a href="#" title="Login" onclick="show_login_div()"><i class="material-icons">account_circle</i></a></li>
                <?php
              }
                 ?>
               <li>
                 <a>
                   <i class="material-icons" id="search" onclick="show_search(this)" title="Click to search" style="cursor: pointer;">search</i>
                   <input type="text" name="search" class="search" placeholder="Search" id="search" onblur="hide_search(this)"/>
                 </a>
               </li>
               <?php
               if(isset($_COOKIE['roll_no']))
               {
                 ?>
	        <li title="List"><a href="#" data-activates="slide-out" class="my-collapse"><i class="material-icons">view_headline</i></a></li>
            <?php
          }
             ?>
	      </ul>
	    </div>
	  </nav>
    <!-- main heading ends here -->

    <!-- custom nav bar when screen is less -->
    <nav class="custom_header">
	    <div class="custom_nav" style="background: cornflowerblue;">
        <ul class="center" style="margin: auto;margin-left: 35%;">
          <?php
          if(isset($_COOKIE['roll_no']))
          {
          ?>
          <li title="Home"><a href="home.php"><i class="material-icons">home</i></a></li>
            <li title="Edit"><a href="edit.php"><i class="material-icons">create</i></a></li>
            <li title="Publish" onclick="show_upload_div()" style="cursor: pointer;"><a><i class="material-icons">publish</i></a></li>
            <li title="Notifications" onclick="show_hide_notif()" style="cursor: pointer;"><a><i class="material-icons" id="notification">notifications</i></a></li>
            <?php
          }else
          {
             ?>
             <li><a href="#" title="Login" onclick="show_login_div()"><i class="material-icons">account_circle</i></a></li>
            <li>
              <a>
              <i class="material-icons" id="search" onclick="show_search(this)" title="Click to search"style="cursor: pointer;">search</i>
            </a>
              <input type="text" name="search" class="search" placeholder="Search" id="search" onblur="hide_search(this)"/>
            </li>
            <?php
          }
             ?>
             <?php
             if(isset($_COOKIE['roll_no']))
             {
             ?>
	        <li title="List"><a href="#" data-activates="slide-out" class="my-collapse"><i class="material-icons">view_headline</i></a></li>
          <?php
        }
           ?>
	      </ul>
      </div>
	  </nav>
    <!-- endss custom header -->

    <!-- side bar division starts here -->
    <div class="side_bar">
      <ul id="slide-out" class="side-nav">
		    <li>
          <div class="userView">
  		      <img class="background" src="<?php echo isset($_SESSION['image']) ? $_SESSION['image'] : 'default.jpg' ;?>" style="height: 100%; width: 100%;">
  		      <a href="#!user"><img class="circle" src="<?php echo isset($_SESSION['image_url']) ? $_SESSION['image_url'] : 'default_s.png'; ?>"></a>
  		      <a href="#!name"><span class="white-text name"><?php echo (isset($_SESSION['full_name'])) ? $_SESSION['full_name'] : 'Please enter..'; ?></span></a>
  		      <a href="#!email"><span class="white-text email"><?php echo (isset($_SESSION['email']) && $_SESSION['email'] != 'NULL') ? $_SESSION['email'] : '<a href="edit.php">Edit..</a>'; ?></span></a>
            <a href="logout.php"><span class="white-text email" id="log_out">Logout</span></a>
		      </div>
        </li>

    <?php
      if(isset($_COOKIE['roll_no']))
      {
          include('data_connect.php');
          $que2 = "select roll_no, full_name, image_url from all_info order by full_name";

          $res2 = mysqli_query($db, $que2);

      ?>
		    <li>
		    	<ul class="collection">
            <?php
              while($row2 = mysqli_fetch_array($res2, MYSQLI_ASSOC))
              {
                if($row2['roll_no'] != $_COOKIE['roll_no'])
                {
              ?>

              <li class="collection-item avatar">
	              <img src="<?php echo ($row2['image_url'] != "" && $row2['image_url'] != 'NULL') ? $row2['image_url'] : 'default_s.png'; ?>" alt="profile_pic" style="height: 50px; width: 50px; border-radius: 30px; position: absolute; left: 15px"></img>
		            <span class="title"><?php echo($row2['full_name']); ?></span>
    			      <p><?php echo($row2['roll_no']); ?> <br>
    			         <?php echo($row2['image_url']); ?>
    			      </p>
		            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
		          </li>
				    <?php
                    }
                }
            }
                    ?>
				  </ul>
			</li>
		</ul>
  </div>

  <!-- side bar division emds here -->

  <!-- coading for notification -->

    <div class="main_notification">
      <div class="inner_notification">
          <div class="collection">
          <?php
            // for($i = 0; $i<10; $i++)
            // {
            $notif = 0;
            include('data_connect.php');
            $que = "select * from upload_data order by date DESC";
            $res = mysqli_query($db, $que);
            // echo('<script>');
            if(isset($res))
            {
              while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
              {
              // echo('console.log("'.$row['full_name'].'-----'.$row['date'].'");');
              // echo('</script>');
              $notif_list = explode(',', $row['notification']);
              // $notif_like = count($liked_list);
              if(isset($_COOKIE['roll_no']))
              {
                // foreach ($notif_list as $key => $value) {
                //   if($value == $_COOKIE['roll_no'])
                //   {
                //     $notif++
                //   }
                // }
                if($row['roll_no'] != $_COOKIE['roll_no'])
                {
          ?>
          <span class="main_notification_outer" style="display: block;">
            <img src="default_s.png" alt="aaa" style="height: 50px;width: 50px;"/>
            <div class="notice" style="display: -webkit-inline-box; margin-top: 3px; margin-left: 3px; font-size: 14px; width: 80%"><?php echo('0000000000000000000'.$row['full_name'].' has uploaded a '.$row['type']); ?>
              <br>
              <span style="font-size: 11px; color: cornflowerblue;"><?php echo(time_calc($row['date'])); ?></span>
            </div>
            <!-- <span class="date"></span> -->
          </span>
            <?php
          }
          }
        }
      }
            ?>
          </div>
      </div>
    </div>

    <!-- coading for notification ends -->

    <!-- coading for upload starts here -->

    <div class="main_outer_upload_div">
      <div class="main_inner_upload_div">
        <i class="material-icons prefix" style="position: fixed; right: 30px; top: 30px; cursor: pointer; color: white;" onclick="hide_div_upload()">clear</i>
        <div class="main_upload">
      		<div class="card">
      			<form method="POST" action="upload2.php" enctype="multipart/form-data">

      				<div class="sub_div_upload">
      					<h5 class="upload_heading">Upload</h5>
      					<div class="row">
      					   <div class="input-field col s12">
      				   			<i class="material-icons prefix">mode_edit</i>
      			          <input id="last_name" type="text" class="validate" name="title">
      			          <label for="last_name">Title of your upload..</label>
      			        </div>
      			    </div>

          				<div class="row">
      				        <div class="input-field col s12">
      				          <i class="material-icons prefix">mode_edit</i>
      				          <textarea id="icon_prefix2" class="materialize-textarea" name="description"></textarea>
      				          <label for="icon_prefix2">Description</label>
      				        </div>
      			      </div>
      				</div>

      				<h6 class="sub_heading_upload">Categorize..</h6>

      				<div class="sub_div_upload">

      					<div class="row">
      						  <div class="input-field col s6">
      						  <i class="material-icons prefix">mode_edit</i>
      						    <select name="type" onchange="other_type(this)" id="add_type">
      						      <option value="" disabled selected>Choose your option</option>
      						      <option value="video">Photo</option>
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
      							    <select name="category" onchange="other_category(this)" id="add_category">
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
      </div>
    </div>

    <!-- coading for upload ends here -->

 	  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script type="text/javascript">

	   $('.my-collapse').sideNav({
	      menuWidth: 400, // Default is 240
	      edge: 'left', // Choose the horizontal origin
	      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
	    }
	  );

     // Initialize collapse button
	  $(".my-collapse").sideNav();

      // for(var x in roll_no)
      // {
      //     console.log(x);
      // }

    // function to show search option on click..
    function show_search(ele)
    {
      // var ele = document.querySelector('i#search');
      ele.style.color = "gray";
      // var inp_ele = document.querySelector('input#search');
      var inp_ele = ele.nextElementSibling;
      inp_ele.style.width = "200px";
      inp_ele.style.background = "white";
    }

    // function to hide search option on click..
    function hide_search(inp_ele)
    {
      // var ele = document.querySelector('i#search');
      // var inp_ele = document.querySelector('input#search');
      var ele = inp_ele.previousElementSibling;
      if(inp_ele.value == null || inp_ele.value == "")
      {
        inp_ele.style.width = "0px";
        inp_ele.style.background = "cornflowerblue";
        ele.style.color = "white";
      }
    }

      var count = 0;
      function show_hide_notif()
       {
         var notif_div = document.querySelector('div.main_notification');
         if(count%2 == 0)
         {
           notif_div.style.display = "block";
         }
         else
         {
           notif_div.style.display = "none ";
         }
         count++;
       }

       var count2 = 0;
       //function to show more option if screen is less..
       function show_more_less()
       {
         var width = window.innerWidth;
         var div = document.querySelector('nav.custom_header');
          if(width <= 995)
          {
            // alert('yess');
            if(count2%2 == 0)
            {
              div.style.top = "64px";
            }
            else {
              div.style.top = "0px";
            }
            count2++;
          }
       }

       //check if window size is greater then min size then remove it..
       function check_it()
       {
         var width = window.innerWidth;
         var div = document.querySelector('nav.custom_header');
          if(width >= 995)
          {
              div.style.top = "0px";
          }
       }
  </script>

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

    // document.querySelector('div.main_outer_upload_div').style.display = "none";


    //function to show upload div on click..
    function show_upload_div()
    {
      // alert('inside');
      var div = document.querySelector('div.main_outer_upload_div');
      div.style.display = 'block';
    }

    function hide_div_upload()
    {
      var div = document.querySelector('div.main_outer_upload_div');
      div.style.display = 'none';
    }
  </script>

</body>
</html>
