<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	if (isset($_POST['submit'])) {
    try {
        $id     = $_POST['id']
        $nama   = $_POST['name'];
        $alamat = $_POST['alamat'];
        $kota	= $_POST['kota'];
        $propinsi= $_POST['propinsi'];
        $kodepos= $_POST['kodepos'];
        $email  = $_POST['email'];
        $phone  = $_POST['phone'];
		
		// Insert data
		if($id) $sql = "INSERT INTO Konsumen (Name, Alamat, Kota, Propinsi, Kodepos, Email) VALUES (?,?,?,?,?,?)";

		else $sql = "UPDATE Konsumen SET Name = ?, Alamat = ?, Kota=?, Propinsi=?, Kodepos=?, Email=?, Phone=? WHERE ID=? ";
		
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $name);
		$stmt->bindValue(2, $alamat);
		$stmt->bindValue(3, $kota);
		$stmt->bindValue(4, $propinsi);
		$stmt->bindValue(5, $kodepos);
		$stmt->bindValue(6, $email);
		$stmt->bindValue(7, $phone);
		if($id) $stmt->bindValue(8, $id);
		$stmt->execute();
	
	} catch(Exception $e) {
        echo "Failed: " . $e;
    }
}

header('Location: index.php');