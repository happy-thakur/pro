
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
                //echo('<script>alert("'.$value.'");</script>');

            }

        }



    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>header</title>

	<!-- Compiled and minified CSS -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	  <!-- Compiled and minified JavaScript -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
          <style type="text/css">
          *{
            margin: 0px;
            padding: 0px;
          }
          span#log_out{
                float: right;
                background: black;
                border: 1px white solid;
                padding: 5px;
                border-radius: 5px;
                margin-bottom: 5px;
                transform: scale(1);
          }
          span#log_out:hover{
              transform: scale(1.1);
          }
          </style>

          <style type="text/css">

            input.search{
              width: 0px;
              height: 40px;
              padding-left: 40px;
              border-radius: 10px;
              background: cornflowerblue;
              line-height: 30px;
              margin-top: 10px;
              border: 0px;
            }
              i#search{
                position: absolute;
                /*top: 14px;*/
                /*color: blue;*/
                color: white;
                z-index: 15;
                top: 0px;

              }
              i#search:active input.search{
                width: 200px;
                background: white;
                color: black  ;
              }
              input.search:active i#search{
                                color: black  ;

              }
              input.search:focus{
                width: 200px;
                background: white;
                padding-left: 30px;
              }
              div.main_notification{
                height: 500px;
                width: 350px;
                position: fixed;
                right: 30px;
                border: 1px solid;
                top: 80px;
                overflow: auto;
                display: none;
              }
              span.main_notification_outer{
                cursor: pointer;
                border: 0.5px solid rgba(200,200,200,0.2);
              }
              span.main_notification_outer:hover{
                background: rgba(200,200,200,0.7);
                box-shadow: rgba(0,0,0,0.2) 0px 0px 1px 1px;
              }
              span.notification{
                position: absolute;
                top: 57px;
                left: 60px;

              }
              span.notification span{
                display: block;
              }
              span.date{
                position: relative;
                left: -45px;
                top: -7px;
              }

              div.main_notification::-webkit-scrollbar {
                  width: 8px;
              }


              div.main_notification::-webkit-scrollbar-track {
                  /*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);*/
                  -webkit-border-radius: 10px;
                  border-radius: 10px;
                  background: rgba(200,200,200,0.5);
              }


              div.main_notification::-webkit-scrollbar-thumb {
                  -webkit-border-radius: 10px;
                  border-radius: 10px;
                  background: rgba(0,0,0,0.4);
                  /*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);*/
              }
              div.main_notification::-webkit-scrollbar-thumb:window-inactive {
                  background: rgba(255,0,0);
              }
              span.main_notification_outer img{

                margin: 5px;
                margin-bottom: 1px;
              }
                          </style>


</head>
<body>

	  <nav style="position: fixed; left: 0px; top: 0px; z-index: 5;">
	    <div class="nav-wrapper" style="background: cornflowerblue;">
	      <a href="#!" class="brand-logo"><img src="img.png" style="height: 55px; width: 160px; border-radius: 10px; margin-top: 4px; margin-left: 7px;"/></a>
	      <ul class="right hide-on-med-and-down">
	        <li><a href="home.php"><i class="material-icons">home</i></a></li>
            <li><a href="edit.php"><i class="material-icons">create</i></a></li>
	        <li><a href="#" onclick="show_hide_notif()"><i class="material-icons" id="notification">notifications</i></a></li>


	        <li><a href="#">

        <input type="text" name="search" class="search" placeholder="Search"/>
        <i class="material-icons" id="search">search</i>
        </a></li>
	        <li><a href="#" data-activates="slide-out" class="my-collapse"><i class="material-icons">view_headline</i></a></li>
	      </ul>
	    </div>
	  </nav>

	   <ul id="slide-out" class="side-nav">
		    <li><div class="userView">
		      <img class="background" src="<?php echo isset($_SESSION['image']) ? $_SESSION['image'] : 'default.jpg' ;?>" style="height: 100%; width: 100%;">
		      <a href="#!user"><img class="circle" src="<?php echo isset($_SESSION['image_url']) ? $_SESSION['image_url'] : 'default_s.png'; ?>"></a>
		      <a href="#!name"><span class="white-text name"><?php echo (isset($_SESSION['full_name'])) ? $_SESSION['full_name'] : 'Please enter..'; ?></span></a>
		      <a href="#!email"><span class="white-text email"><?php echo (isset($_SESSION['email']) && $_SESSION['email'] != 'NULL') ? $_SESSION['email'] : '<a href="edit.php">Edit..</a>'; ?></span></a>
              <a href="logout.php"><span class="white-text email" id="log_out">Logout</span></a>
		    </div></li>

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
				      <!--<i class="material-icons circle"></i>-->
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
		<!-- <a href="#" data-activates="slide-out" class="my-collapse"><i class="material-icons">menu</i></a> -->

        <div class="main_notification">
          <div class="inner_notification">
              <div class="collection">
              <?php
                for($i = 0; $i<10; $i++)
                {

              ?>
              <span class="main_notification_outer" style="display: block;">
                <img src="default_s.png" alt="aaa" style="height: 50px;width: 50px;"/>
                <span class="notice" style="position: relative; top: -30px;">notice</span>
                <span class="date">date</span>
              </span>

                <?php
              }
                ?>
              </div>
          </div>
        </div>


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

          for(var x in roll_no)
          {
              console.log(x);
          }


  </script>
  <script type="text/javascript">
   var count = 0;
      function show_hide_notif()
      {
        var notif_div = document.querySelector('div.main_notification');

        if(count%2 == 0)
        {
          notif_div.style.display = "block";
          // alert(count);
        }
        else
        {
          notif_div.style.display = "none ";
          alert(count);
        }
        // count++;

      }

  </script>



</body>
</html>
