<html>
<head>
<Title>Registration Form</Title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <form class="well form-horizontal" action="save.php" method="POST">
<?php

require_once "func.php";

if(isset($_GET['id'])){

    require_once "config.php";
    try {
        $id = $_GET['id'];
        $sql_select_1 = "select * from Konsumen where ID = ?";
        $stmt = $conn->query($sql_select);
        $konsumen = $stmt->fetch();
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }
}
?>
            <fieldset>
                <input type="hidden" name="id" value="<?php echo @if_empty($konsumen['ID'],'');?>" />
                <div class="form-group">
                <label class="col-md-4 control-label">Nama Lengkap</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input name="nama" placeholder="Full Name" class="form-control" required="true" value="<?php echo @if_empty($konsumen['Nama'],'');?>" type="text"></div>
                </div>
                </div>
                <div class="form-group">
                <label class="col-md-4 control-label">Alamat</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input  name="alamat" placeholder="Address Line 1" class="form-control" required="true" value="<?php echo @if_empty($konsumen['Alamat'],'');?>" type="text"></div>
                </div>
                </div>
                <div class="form-group">
                <label class="col-md-4 control-label">Kota / Kabupaten</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input name="kota" placeholder="City" class="form-control" required="true" value="<?php echo @if_empty($konsumen['Kota'],'');?>" type="text"></div>
                </div>
                </div>
                <div class="form-group">
                <label class="col-md-4 control-label">Propinsi</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input name="propinsi" placeholder="State/Province/Region" class="form-control" required="true" value="<?php echo @if_empty($konsumen['Propinsi'],0);?>" type="text"></div>
                </div>
                </div>
                <div class="form-group">
                <label class="col-md-4 control-label">Kodepos</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input name="kodepos" placeholder="Postal Code/ZIP" class="form-control" required="true" value="<?php echo @if_empty($konsumen['Kodepos'],'');?>" type="text"></div>
                </div>
                </div>
                <div class="form-group">
                <label class="col-md-4 control-label">Email</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input name="email" placeholder="Email" class="form-control" required="true" value="<?php echo @if_empty($konsumen['Email'],'');?>" type="text"></div>
                </div>
                </div>
                <div class="form-group">
                <label class="col-md-4 control-label">Mobile Number</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input name="phone" placeholder="Phone Number" class="form-control" required="true" value="<?php echo @if_empty($konsumen['Phone'],'');?>" type="text"></div>
                </div>
                </div>
                <div class="form-group">
                <label class="col-md-4 control-label"><input type='submit' value='Simpan' name='submit' class='btn btn-success btn-sm' /></label>
                <div class="col-md-8 inputGroupContainer">
                
                </div>
                </div>
            </fieldset>
            
        </form>
    </div>
</body>
</html>