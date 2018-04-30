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
    	<li>Customer Information</li>
    	<li><a href="./staff_information.php">Staff Information</a></li>
    	<li><a href="./inventory.php">Inventory</a></li>
      <?php if(isset($_SESSION['admin'])){ ?> <li><a href="./sign_up.php">Create account</a></li> <?php }else{} ?>
      <?php if(isset($_SESSION['admin'])){ ?> <li><a href="./delete_view.php">Delete account</a></li> <?php }else{} ?>
      <li><a href="./documents_view.php">Documents</a></li>
    	<li><a href="../controllers/logout_controller.php">Log Out</a></li>
    </ul>
  </div>
</nav>

<div class="row">
  <div class="col-sm-8">
    <table id="search_table" style="display:none">
      <tbody>
        <thead id="table_header">
          <tr>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
          </tr>
        </thead>
      </tbody>
    </table>
  </div>
  <div class="col-sm-4">
    <form name="search_form" class="navbar-form navbar-left" onsubmit="return search_query()">
      <div class="form-group">
        <input type="text" id="search" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>


</body>

</div>

<script type="text/javascript">
  function search_query() {
    var value = document.getElementById('search').value;
    $("#search_table").show();
    var url = 'http://localhost/src/controllers/search_customers.php?q=' + value;
    var table = $('#search_table').DataTable( {
    "destroy": true,
    "processing": true,
    "searching": false,
    "bserverside": true,
    "bPaginate": false,
    "bInfo": false,
    "sAjaxDataProp": "",
    "sAjaxSource": url,
    columns: [
      {data: "first_name"},
      {data: "last_name"},
      {data: "email"}
    ]
  });

    return false;
}
</script>

</html>