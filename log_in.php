<?php
if(isset($_SESSION['roll_no']))
{
  header('Loacation : home.php');
}


// function to calculate time of upload
function time_calc($up_time)
{
  // time is of the form YYYY-MM-DD HH:MM:SS.MILISEC
  $x = explode(' ', $up_time);
  $y = explode('-', $x[0]);
  $z = explode(':', $x[1]);
  $temp = 0;
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
<html>
    <head>
        <title>Login Page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="one_div.css">

    </head>
    <body>

        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
        <li><a href="#!">one</a></li>
        <li><a href="#!">two</a></li>
        <li class="divider"></li>
        <li><a href="#!">three</a></li>
        </ul>

        <nav class="navigation">
            <div class="nav-wrapper">
            <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#"><i class="material-icons">search</i></a></li>
                <li><a href="#" title="Login" onclick="show_login_div()"><i class="material-icons">account_circle</i></a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons">more_vert</i></a></li>

            </ul>


            </div>
        </nav>

        <div class="main_log_in_back">
          <i class="Small material-icons prefix" id="close_icon" title="Close" onclick="close_login_div(this)">clear</i>
             <div class="row" id="main_login">
                <div class="col s12 m7">
                <div class="card">
                     <h1 class="heading_login">
                    Login:
                    </h1>
                <div class="row">
                <form class="col s12" name="login" action="login_sub.php" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate" name="roll_no">
                    <label for="icon_prefix">Roll No.</label>
                    </div>
                    <div class="input-field col s12">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="icon_telephone" type="password" class="validate" name="password">
                    <label for="icon_telephone">Password</label>
                    </div>
                </div>
                <!--<input type="submit" class="waves-effect waves-light btn" id="login_button" value="Login" name"login" />-->

                <button onclick="submit" class="waves-effect waves-light btn" id="login_button" style="opacity: 1" name="login" value="Login">Login</button>
                </form>
                </div>
                </div>
            </div>
        </div>
        </div>

        <?php
          $liked = false;
            // for($i=0; $i<6; $i++)
            // {
            // to make a sorting in decending order
            echo('console.log("starts");');
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
              $liked_list = explode(',', $row['liked_id']);
              $total_like = count($liked_list);
              if(isset($_COOKIE['roll_no']))
              {
                foreach ($liked_list as $key => $value) {
                  if($value == $_COOKIE['roll_no'])
                  {
                    $liked = true;
                  }
                }
              }
        ?>

        <div class="card" id="main_one_div">
            <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="default.jpg" id="image_one_div">
            </div>
            <div class="card-content">
            <span class="card-title activator grey-text text-darken-4" id="happ_name">
              <i class="material-icons prefix" style="color: cornflowerblue; margin: 5px 10px;" title="More">label</i>
              <a href="#"><?php echo($row['full_name']); ?></a><i class="material-icons right">more_vert</i>
              <span style="font-size: 12px; display: block; margin-left: 55px; margin-top: -16px;">Uploaded <?php echo($row['type'].'  '.time_calc($row['date'])) ; ?></span>
            </span>
              <div class="extra_content" style="margin-top: 10px; padding: 0px;">
                <span class="happ_content" style="width: 100px; cursor: pointer;">

                  <i class="material-icons"
                  <?php
                  if(isset($_COOKIE['roll_no']))
                   {
                     if($liked == true)
                     {
                       echo('style="color: cornflowerblue;" title="You have Liked"');
                     }
                     else {
                       echo('style="color: gray;" title="Like"');
                     }
                   }
                   else
                   {
                     echo('style="color: gray;" title="You must first login to Like"');
                   }
                   ?>>thumb_up</i> <span style="padding: 5px; position: relative; top: -5px; font-size: 15px"><?php echo($total_like); ?></span>
                </span>



                <span class="happ_content" style="width: 100px; cursor: pointer;">

                  <i class="material-icons">screen_share</i><span style="padding: 5px; position: relative; top: -5px; font-size: 15px" >000</span>
                </span>

                <span style="width: 100px; cursor: pointer;">Views 000</span>
                <!-- <span style="float: right;">other</span> -->

                <p><a href="#" style="float: right;margin-bottom: 0px; margin-top: -30px;">View More</a></p>
              </div>
            </div>
            <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Description :<i class="material-icons right">close</i></span>
            <p><?php echo($row['description']); ?></p>
            </div>
        </div>
        </div>

        <?php
            }
          }
          mysqli_close($db);
            include('footer.php');
        ?>


        <script type="text/javascript" src="login.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>


    </body>
</html>
