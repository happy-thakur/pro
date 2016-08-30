<!DOCTYPE html>
<html>
<head>
	<title>Footer</title>

	<!-- Compiled and minified CSS -->
	  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->

	  <!-- Compiled and minified JavaScript -->
	  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script> -->
	  <style type="text/css">
	  	body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
  span.link_footer{
  	/*background: rgba(0,0,0,0.8);*/
  	/*border: 1px solid gray;
  	*/border-radius: 5px;
  	margin: 5px;
  	padding: 5px;
  	color: white;
  	cursor: pointer;
  	font-size: 25px;

  }
  	span.link_footer a{

  	}

  	span.link_footer:hover{
  		/*background: gray;*/
  	}
  	span.link_footer:hover a{
  		text-decoration: underline;
  	}
  	div.menu_footer{
  		margin-top: 10px;
  		width: 100%
  		border: 1px solid gray;
  		float: right;
  		margin-right: 30px;
  	}
  	div#footer{
  		margin-top: 14.2%;
  		background: transparent;
  	}

  	div.container{
  		color: white;
	    font-size: 22px;
	    font-weight: 600;
	    width: 100%;
	    text-align: center;
  	}

	  </style>

</head>
<body>

	       <footer class="page-footer" style="background-image: url('footer_img.jpg'); border: 2px solid black; height: 280px">
	         <!--  <div class="container">
	            <div class="row">
	              <div class="col l6 s12">
	                <h5 class="white-text">Footer Content</h5>
	                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
	              </div>
	              <div class="col l4 offset-l2 s12">

	                <div class="menu_footer">
	                	<span class="link_footer"><a href="#!">Home</a></span>
	                	<span class="link_footer"><a href="#!">About</a></span>
	                	<span class="link_footer"><a href="#!">Search</a></span>
	                	<span class="link_footer"><a href="#!">Upload</a></span>
	                </div>
	              </div>
	            </div>
	          </div>
	          <div class="footer-copyright">
	            <div class="container">
	            © 2014 Copyright Text
	            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
	            </div>
	          </div> -->
	          <div class="menu_footer">
	            	<span class="link_footer"><a href="home.php">Home</a></span>
	            	<span class="link_footer"><a href="#!">About</a></span>
	            	<span class="link_footer"><a href="#!">Search</a></span>
	            	<span class="link_footer"><a href="#!">Upload</a></span>
                    <span class="link_footer"><a href="log_out.php">Logout</a></span>
	            </div>

	             <div class="footer-copyright" id="footer">
	            <div class="container">
	            © 2014 Copyright Text
	            </div>
	          </div>


	        </footer>


 	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script> -->


</body>
</html>
