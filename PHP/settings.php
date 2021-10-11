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

 <style>
   * {
    box-sizing: border-box;
  }

  body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #A1D8F7;
  }

   button {
    font-size: 15px;
    font-weight: bold;
    color: black;
    background-color: #FC1704;
    border-radius: 20px ;
    width: 6%;
    float: right;
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
 </style>

<div class="panel panel-default">
  <div class="panel-heading"><b> Account settings </b> </div>

  <div class="panel-body">
	
	<div class="tbl_user_data"></div>

  </div>

</div>


 

