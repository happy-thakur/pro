<?php
if(isset($_COOKIE['roll_no']))
{
  include('data_connect.php');

  $que = "select * from all_info where roll_no = '".$_COOKIE['roll_no']."'";
  $res = mysqli_query($db, $que);

  $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

    //setting session variable..
    foreach ($row as $key => $value) {
      if($key != 'old_pass' && $key != 'ip_address' && $key != 'date')
      {
        $_SESSION[$key] = $value;
        // echo('<script>alert("'.$value.'");</script>');
      }

    }

  mysqli_close($db);

} ?>

<html>
    <head>
        <title>Login Page</title>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Compiled and minified CSS -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified JavaScript -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script> -->
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="one_div.css">

    </head>
    <body>

       <?php include('header.php'); ?>

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
           <img class="activator" src="<?php echo('./'.$row['file_url']); ?>" id="image_one_div">
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
           <span class="card-title grey-text text-darken-4"><?php echo($row['title']); ?> :<i class="material-icons right">close</i></span>
           <br><br>
           <p><?php echo('<span style="color: cornflowerblue; font-size: 20px">Description: </span> '.$row['description']); ?></p>
           <br>

           <?php
           if(isset($row['subcategory']))
           {
              ?>
           <p><?php echo('<span style="color: cornflowerblue; font-size: 20px">Type : </span> '.$row['description']); ?></p>
           <?php
         }
            ?>
            <span style="position: absolute; bottom: 30px; right: 30px; color: cornflowerblue; cursor: pointer;">Download</span>
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
