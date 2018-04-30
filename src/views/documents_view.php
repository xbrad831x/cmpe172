<?php
session_start();
if( !isset($_SESSION['user']) ) {
  header("Location: http://localhost");
 }

$conn = mysqli_connect("localhost","root","","workhub");
$userid = $_SESSION['user'];

$sql = mysqli_query($conn, "SELECT * FROM users WHERE UserId='$userid'");
$row = mysqli_fetch_array($sql);

?>

<html>

<head>

<title>Welcome - <?php echo $row['Username']; ?></title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</head>

<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="navbar-brand"><a href="../../index.php">Hello <?php echo $row['Username']; ?></a></div>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="./customer_information.php">Customer Information</a></li>
      <li><a href="./staff_information.php">Staff Information</a></li>
      <li><a href="./inventory.php">Inventory</a></li>
      <?php if(isset($_SESSION['admin'])){ ?> <li><a href="./sign_up.php">Create account</a></li> <?php }else{} ?>
      <?php if(isset($_SESSION['admin'])){ ?> <li><a href="./delete_view.php">Delete account</a></li> <?php }else{} ?>
      <li>Documents</li>
      <li><a href="../controllers/logout_controller.php">Log Out</a></li>
    </ul>
  </div>
</nav>

<div class="row">
  <div class="col-sm-9">
    <table id="search_table">
      <tbody>
        <thead id="table_header">
          <tr>
            <th>Name</th>
            <th></th>
          </tr>
        </thead>
      </tbody>
    </table>
  </div>
  <div class="col-sm-3">
  	<form action="../controllers/upload.php" method="post" enctype="multipart/form-data">
	    Select file to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload File" name="submit">
	</form>
  </div>
</div>

</body>

<script type="text/javascript">
  
  window.onload = function() {
    var url = 'http://localhost/src/controllers/get_files.php';
    var table = $('#search_table').DataTable( {
    "destroy": true,
    "processing": true,
    "bserverside": true,
    "bPaginate": false,
    "bInfo": false,
    "sAjaxDataProp": "",
    "sAjaxSource": url,
    columns: [
      {data: "Name"}
    ],
		"columnDefs": [ {
	    "targets": 1,
	    "data": $.getJSON(url),
	    "render": function ( data, type, row, meta ) {
	      return '<a style=\"cursor: pointer\" onclick=\"view_file(\''+data.Name+'\')\">View</a>';
	    	}
  		} ]
  });
  }

  function view_file(name) {
  	window.open("../controllers/uploads/" + name, 'file', 'resizable,height=260,width=370');
  }

</script>
</html>