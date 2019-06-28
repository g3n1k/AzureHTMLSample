<html>
<head>
<Title>Registration Form</Title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<a href="form.php" class="btn btn-info">Add New</a>
    <div class="container">
    <table id='table-data' class="table">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Kota</th>
          <th>Propinsi</th>
          <th>Kodepos</th>
          <th>Email</th>
          <th>Phone</th>
        </tr>
      </thead>
      <tbody>
<?php
	$sql_select = "SELECT * FROM Konsumen";
	$stmt = $conn->query($sql_select);
	$_k = $stmt->fetchAll(); 
	$jml = 0;
	foreach($_k as $_) {
		echo "<tr>";
		echo "<td>".$_['Nama']."</td>";
		echo "<td>".$_['Alamat']."</td>";
		echo "<td>".$_['Kota']."</td>";
		echo "<td>".$_['Propinsi']."</td>";
		echo "<td>".$_['Kodepos']."</td>";
		echo "<td>".$_['Email']."</td>";
		echo "<td>".$_['Phone']."</td>";
		echo "</tr>";
		$jml++;
	}
?>
      </tbody>
	</table>
	
	Jumlah Konsumen = <?php echo $jml;?><br />
	<a href="form.php" class="btn btn-info">Add New</a>
    
  </div>
</body>
</html>