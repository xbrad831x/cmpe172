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

<div class="container">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="navbar-brand"><a href="../../index.php">Hello <?php echo $row['Username']; ?></a></div>
    </div>
    <ul class="nav navbar-nav">
    	<li><a href="./customer_information.php">Customer Information</a></li>
    	<li><a href="./staff_information.php">Staff Information</a></li>
    	<li>Inventory</li>
      <?php if(isset($_SESSION['admin'])){ ?> <li><a href="./sign_up.php">Create account</a></li> <?php }else{} ?>
      <?php if(isset($_SESSION['admin'])){ ?> <li><a href="./delete_view.php">Delete account</a></li> <?php }else{} ?>
      <li><a href="./documents_view.php">Documents</a></li>
    	<li><a href="../controllers/logout_controller.php">Log Out</a></li>
    </ul>
  </div>
</nav>

<div class="row">
  <div class="col-sm-12">
    <table id="search_table">
      <tbody>
        <thead id="table_header">
          <tr>
            <th>title</th>
            <th>num_of_items</th>
          </tr>
        </thead>
      </tbody>
    </table>
  </div>
</div>

</body>

</div>

<script type="text/javascript">
  
  window.onload = function() {
    var url = 'http://localhost/src/controllers/search_inventory.php';
    var table = $('#search_table').DataTable( {
    "destroy": true,
    "processing": true,
    "bserverside": true,
    "bPaginate": false,
    "bInfo": false,
    "sAjaxDataProp": "",
    "sAjaxSource": url,
    columns: [
      {data: "title"},
      {data: "num_of_items"}
    ]
  });
  }

</script>

</html>