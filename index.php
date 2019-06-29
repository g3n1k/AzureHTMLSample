<html>
 <head>
 <Title>Registration Form</Title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <style type="text/css">
 	
 </style>
 </head>
 <body>
 <h1>Data Warga</h1>
 <p>Isi form data berikut, then click <strong>Submit</strong> untuk menyimpan.</p>
 
 <form method="post" action="index.php" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" id="nama" nama="nama" aria-describedby="emailHelp" placeholder="Masukan Nama">    
    </div> 
    <div class="form-group">
        <label for="exampleInputEmail1">nik</label>
        <input type="text" class="form-control" id="nik" nama="nik" aria-describedby="emailHelp" placeholder="Masukan NIK">    
    </div> 
    <div class="form-group">
        <label for="exampleInputEmail1">alamat</label>
        <textarea id="alamat" nama="alamat" class="form-control" placeholder="Masukan Alamat"></textarea>
    </div>
    
    <div class="form-group">
        <label for="exampleInputEmail1">no prop</label>
        <input type="text" class="form-control" id="no_prop" nama="no_prop" aria-describedby="emailHelp" placeholder="No Prop">    
    </div> 
    <div class="form-group">
        <label for="exampleInputEmail1">no kab</label>
        <input type="text" class="form-control" id="no_kab" nama="no_kab" aria-describedby="emailHelp" placeholder="No Kab">    
    </div> 
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" class="form-control" id="email" nama="email" aria-describedby="emailHelp" placeholder="Email">    
    </div> 
    <div class="form-group">
        <label for="exampleInputEmail1">Phone</label>
        <input type="text" class="form-control" id="phone" nama="phone" aria-describedby="emailHelp" placeholder="phone">    
    </div> 

    <input type="submit" name="submit" value="Submit" />
    <input type="submit" name="load_data" value="Load Data" />
</form>
 <?php
    $host = "g3n1kdb.database.windows.net";
    $user = "g3n1k";
    $pass = "123654aaA.";
    $db = "azuredb";

    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }

    if (isset($_POST['submit'])) {
        try {
            $name = $_POST['name'];
            $nik = $_POST['nik'];
            $alamat = $_POST['alamat'];
            $no_prop = $_POST['no_prop'];
            $no_kab = $_POST['no_kab'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            // Insert data
            $sql_insert = "INSERT INTO warga (nama, nik, alamat, no_prop, no_kab, email, phone) 
                        VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $nik);
            $stmt->bindValue(3, $alamat);
            $stmt->bindValue(4, $no_prop);
            $stmt->bindValue(5, $no_kab);
            $stmt->bindValue(6, $email);
            $stmt->bindValue(7, $phone);
            $stmt->execute();
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }

        echo "<h3>Data Warga</h3>";
    } else if (isset($_POST['load_data'])) {
        try {
            $sql_select = "SELECT * FROM warga";
            $stmt = $conn->query($sql_select);
            $warga = $stmt->fetchAll(); 
            if(count($registrants) > 0) {
                echo "<h2>Daftar Warga:</h2>";
                echo "<table>";
                echo "<tr><th>Name</th>";
                echo "<th>Nik</th>";
                echo "<th>Alamat</th>";
                echo "<th>no_prop</th>";
                echo "<th>no_kab</th>";
                echo "<th>email</th>";
                echo "<th>phone</th>";
                echo "</tr>";
                foreach($warga as $w) {
                    echo "<tr>";
                    echo "<td>".$w['name']."</td>";
                    echo "<td>".$w['nik']."</td>";
                    echo "<td>".$w['alamat']."</td>";
                    echo "<td>".$w['no_prop']."</td>";
                    echo "<td>".$w['no_kab']."</td>";
                    echo "<td>".$w['email']."</td>";
                    echo "<td>".$w['phone']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<h3>Belum ada warga yg terdaftar.</h3>";
            }
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
    }
 ?>
 </body>
 </html>