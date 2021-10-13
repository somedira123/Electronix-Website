<?php
session_start();
include 'partials/_dbconnect.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
  header("location: sign in.php");
  exit;
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="settings.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 


<script type="text/javascript">
$(document).ready(function($)
{
	var ajax_data =
	[
    
		{fname:"username", emailid:"emailid", mobilenumber:"mobilenumber"}, 
		
	]
	var random_id = function  () 
	{
		var id_num = Math.random().toString(9).substr(2,3);
		var id_str = Math.random().toString(36).substr(2);
		
		return id_num + id_str;
	}
	var tbl = '';
	tbl +='<table class="table table-hover">'

		tbl +='<tbody>';

			$.each(ajax_data, function(index, val) 
			{
				var row_id = random_id();

				tbl +='<tr row_id="'+row_id+'">';
					tbl +='<td>Name</td>';
					tbl +='<td><div class="row_data" edit_type="click" col_name="fname"><?php 
				echo $_SESSION['username'];	
    // $sql = "Select * from users ";
    // $result = mysqli_query($conn, $sql);

    // while($row = mysqli_fetch_assoc($result))
    // {
    //   echo $row['username'];
    // }
?></div></td>';
				
					tbl +='<td>';
					 
						tbl +='<span class="btn_edit" > <a href="#" class="btn btn-link " row_id="'+row_id+'" > Edit</a> </span>';
						tbl +='<span class="btn_save"> <a href="#" class="btn btn-link"  row_id="'+row_id+'"> Save</a> | </span>';
						tbl +='<span class="btn_cancel"> <a href="#" class="btn btn-link" row_id="'+row_id+'"> Cancel</a> | </span>';

					tbl +='</td>';
					
				tbl +='</tr>';

				tbl +='<tr row_id="'+row_id+'">';
					tbl +='<td>Mobile</td>';
					tbl +='<td ><div class="row_data" edit_type="click" col_name="fname"><?php 
	// 				// echo $_SESSION['emailid'];
    // $sql = "Select * from `users` ";
    // $result = mysqli_query($conn, $sql);

    // while($row = mysqli_fetch_assoc($result))
    // {
    //   echo $row['mobilenumber'];
    // }
?> </div></td>';
					

					tbl +='<td>';
						tbl +='<span class="btn_edit" > <a href="#" class="btn btn-link " row_id="'+row_id+'" > Edit</a> </span>';
						<?php
						
						if($_SERVER["REQUEST_METHOD"] == "POST"){
							include 'partials/_dbconnect.php';
							$username = $_POST["username"];
							$password = $_POST["password"];
							$emailid = $_POST["emailid"];
							$mobilenumber = $_POST["mobilenumber"];
						if(isset($_POST['update']))
						{
							$id = $_POST['id'];

							$query = "UPDATE `users` SET username='$_POST[username]'";
							$query_run = mysqli_query();
						}
					}
						?>
						tbl +='<span class="btn_save"> <a href="#" class="btn btn-link"  row_id="'+row_id+'"> Save</a> | </span>';
						tbl +='<span class="btn_cancel"> <a href="#" class="btn btn-link" row_id="'+row_id+'"> Cancel</a> | </span>';
						tbl +='</td>'
						tbl +='</tr>'

						tbl +='<tr row_id="'+row_id+'">';
					tbl +='<td>Email</td>';
					tbl +='<td><div class="row_data" edit_type="click" col_name="fname"><?php 
					echo $_SESSION['emailid'];
    // $sql = "Select * from users ";
    // $result = mysqli_query($conn, $sql);

    // while($row = mysqli_fetch_assoc($result))
    // {
    //   echo $row['emailid'];
    // }
?></div></td>';
				
					tbl +='<td>';
					 
						tbl +='<span class="btn_edit" > <a href="#" class="btn btn-link " row_id="'+row_id+'" > Edit</a> </span>';
						tbl +='<span class="btn_save"> <a href="#" class="btn btn-link"  row_id="'+row_id+'"> Save</a> | </span>';
						tbl +='<span class="btn_cancel"> <a href="#" class="btn btn-link" row_id="'+row_id+'"> Cancel</a> | </span>';

					tbl +='</td>';
					
				tbl +='</tr>';
			});


		tbl +='</tbody>';


	tbl +='</table>'	

	$(document).find('.tbl_user_data').html(tbl);

	$(document).find('.btn_save').hide();
	$(document).find('.btn_cancel').hide(); 


	//--->make div editable > start
	$(document).on('click', '.row_data', function(event) 
	{
		event.preventDefault(); 

		if($(this).attr('edit_type') == 'button')
		{
			return false; 
		}

		//make div editable
		$(this).closest('div').attr('contenteditable', 'true');
		//add bg css
		$(this).addClass('bg-warning').css('padding','5px');

		$(this).focus();
	})	

	$(document).on('focusout', '.row_data', function(event) 
	{
		event.preventDefault();

		if($(this).attr('edit_type') == 'button')
		{
			return false; 
		}

		var row_id = $(this).closest('tr').attr('row_id'); 
		
		var row_div = $(this)				
		.removeClass('bg-warning') 
		.css('padding','')

		var col_name = row_div.attr('col_name'); 
		var col_val = row_div.html(); 

		var arr = {};
		arr[col_name] = col_val;

		$.extend(arr, {row_id:row_id});

		$('.post_msg').html( '<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>');
		
	})	
		
	$(document).on('click', '.btn_edit', function(event) 
	{
		event.preventDefault();
		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		tbl_row.find('.btn_save').show();
		tbl_row.find('.btn_cancel').show();

		tbl_row.find('.btn_edit').hide(); 

		tbl_row.find('.row_data')
		.attr('contenteditable', 'true')
		.attr('edit_type', 'button')
		.addClass('bg-warning')
		.css('padding','3px')

		tbl_row.find('.row_data').each(function(index, val) 
		{  
			$(this).attr('original_entry', $(this).html());
		}); 		

	});

	$(document).on('click', '.btn_cancel', function(event) 
	{
		event.preventDefault();

		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		tbl_row.find('.btn_save').hide();
		tbl_row.find('.btn_cancel').hide();

		tbl_row.find('.btn_edit').show();

		tbl_row.find('.row_data')
		.attr('edit_type', 'click')
		.removeClass('bg-warning')
		.css('padding','') 

		tbl_row.find('.row_data').each(function(index, val) 
		{   
			$(this).html( $(this).attr('original_entry') ); 
		});  
	});
	
	$(document).on('click', '.btn_save', function(event) 
	{
		event.preventDefault();
		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		tbl_row.find('.btn_save').hide();
		tbl_row.find('.btn_cancel').hide();

		tbl_row.find('.btn_edit').show();

		tbl_row.find('.row_data')
		.attr('edit_type', 'click')
		.removeClass('bg-warning')
		.css('padding','') 

		var arr = {}; 
		tbl_row.find('.row_data').each(function(index, val) 
		{   
			var col_name = $(this).attr('col_name');  
			var col_val  =  $(this).html();
			arr[col_name] = col_val;
		});

		$.extend(arr, {row_id:row_id});

		$('.post_msg').html( '<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>')
		 

	});

}); 
</script>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <style>
   * {
    box-sizing: border-box;
  }

  body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #A1D8F7;
  }



  .mycard {
    border: 1px solid gray;
    border-radius: 4px;
    /* border-color: black; */
    /* color: black; */
    background-color: white;
    margin-right: 50%;
    padding: 21px 60px 20px 60px;
    width: 100vw;
  }

  .done {
    font-size: 20px;
    border-radius: 20px;
    width: 15%;
    color: black;
    background-color: #FC1704;
    margin-top: 10px;
    margin-left: 221px;
    font-weight: bold;
  }

  h1 {
    color: #ffffff;
  }

  label {
    font-weight: bold;
    text-align: left;;
    margin-left: -45px;
  }
  header {
    background: rgb(0, 0, 0);
    display: flex;
    color: rgb(255, 255, 255);
    justify-content: space-around;
    align-items: center;
  }
  
  .main_header a {
    float: right;
    display: block;
    color: rgb(255, 255, 255);
    text-align: center;
    padding: 14px 12px;
    text-decoration: none;
    font-size: 17px;
  }
  
  .main_header .search-container {
    float: right;
  }
  
  .main_header input[type=text] {
    padding: 6px;
    width: 500px;
    font-size: 17px;
    border: none;
  }
  
  .main_header .search-container button {
    float: right;
    padding: 6px 10px;
    margin-right: 16px;
    background: #ccc;
    font-size: 24px;
    border: none;
    cursor: pointer;
  }
  
  .main_header .search-container button:hover {
    background: rgb(160, 159, 159);
  }
  
  .main_header .logo:hover {
    cursor: pointer;
  }
  
  .logo {
    margin-top: 4px;
  }
  
  .signup i {
    margin-top: 15px;
  }
  
  .signup-box {
    padding: 0 15px 0 15px;
  }
  
  .signup-box:hover {
    background-color: rgb(126, 127, 133);
    cursor: pointer;
  }
  
  .cart i {
    margin-top: 15px;
  }
  
  .cart-box {
    padding: 0 15px 0 15px;
  }
  
  .cart-box:hover {
    background-color: rgb(126, 127, 133);
    cursor: pointer;
  }
  
  .dropbtn {
    background: rgb(0, 0, 0);
    ;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }
  
  .dropdown {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 150px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }
  .dropdown-content a {
    color: black;
    padding: 12px 50px;
    text-decoration: none;
  }
  .dropdown-content a:hover {
    color: rgb(126, 127, 133);
  }
  .dropdown:hover .dropdown-content {
    display: block;
  }
  .dropdown:hover .dropbtn {
    background-color: rgb(126, 127, 133);
  }
 </style>
</head>
<body>
<header class="main_header">
    <div class="logo">
        <a href="/Electronix-Website/HTML/homepage.html"><b>ELECTRONIX</b></a>
        <img src="/Electronix-Website/Images/logo.jpg" alt="" height="45px" width="50px">
    </div>
    <div class="search-container">
        <form action="/action_page.php">
            <input type="text" placeholder="Search for products" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div> 
<div class="dropdown">
        <button class="dropbtn">
            <i class="fa fa-caret-down" aria-hidden="true"></i> MORE
        </button>
        <div class="dropdown-content">
            <a href="#">My Order</a>
            <a href="/Electronix-Website/PHP/settings.php">My Account</a>
            <a href="FAQ.html">FAQ</a>
            <a href="#">About Us</a>
            <a href="#">Services</a>
        </div>
    </div>
    <div class="signup-box">
        <div class="signup">
            <a href="/Electronix-Website/PHP/sign up.php">SIGNUP</a>
            <i class="fa fa-user"></i>
        </div>
    </div>
    <div class="cart-box">
        <div class="cart">
            <a href="/Electronix-Website/HTML/cart.html">CART</a>
            <i class="fa fa-shopping-cart"></i>
        </div>
    </div>
</header>

<div class="panel panel-default">
  <div class="panel-heading"><b> Account settings </b> </div>

  <div class="panel-body">
	
	<div class="tbl_user_data"></div>

  </div>

</div>


 
</body>
