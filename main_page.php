<?php

    session_start();

    include('data_connect.php');
    //checking whether the user is authenticated or not..

    if(!isset($_COOKIE['roll_no']))
    {
        //header('Location: log_in.php');
        echo('<div style="margin-top: 100px;">');
        echo('You are not logged in ..<br />');
        echo('Please Login ..<br />');
        echo('<a href="log_in.php">Click Here..</a>');
        echo('</div>');
    }
    else
    {
        $roll_no = $_COOKIE['roll_no'];
        $que = "select * from all_info where roll_no = '".$roll_no."'";
        $res = mysqli_query($db, $que);
        $row = mysqli_fetch_array($res);

        //$_SESSION['name'] = $row['name'];
        

    }
    mysqli_close($db);
?>


<html>  
    <head>
        <title><?php echo($_SESSION['name']); ?></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
        <link rel="stylesheet" href="login.css">
       
    </head>
    <body>
        <?php include('header.php'); ?>
        <!-- Dropdown Structure -->
       

        
       <?php include('footer.php'); ?>
        <script type="text/javascript" src="login.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        

    </body>
</html>