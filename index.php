<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"
    rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
    <title>CRUD NO LOADING</title>
<body>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquer/3.3.1/jquery.min.js"></script>
    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.data').load("data.php");
            $("simpan").click(function(){
                var data = $('.form-data').serialize();
                var jenkel1 = document.getElementById("jenkel1").value;
                var jenkel2 = document.getElementById("jenkel2").value;
                var nama_siswa = document.getElementById("nama_siswa").value;
                var tanggal_masuk = document.getElementById("tanggal_masuk").value;
                var alamat = document.getElementById("alamat").value;
                var jurusan = document.getElementById("jurusan").value;

                if(nama_siswa==""){
                    document.getElementById("err_nama_siswa").innerHTML = "Nama Siswa Harus Diisi";
                }else{
                    document.getElementById("err_nama_siswa").innerHTML = "";
                }
                if(alamat = ""){
                    document.getElementById("err_alamat").innerHTML = "Alamat Harus Diisi";
                }esle{
                    document.getElementById("err_alamat").innerHTML = "";
                }
                if(jurusan=""){
                    document.getElementById("err_jurusan").innerHTML = "Jurusan Harus Diisi";
                }else{
                    document.getElementById("err_jurusan").innerHTML = "";
                }
                if(tanggal_masuk=""){
                    document.getElementById("err_tanggal_masuk").innerHTML = "Tanggal Masuk Harus Diisi";
                }else{
                    document.getElementById("err_tanggal_masuk").innerHTML = "";
                }
                if(document.getElementById("jenkel1").checked==false && document.getElementById("jenkel2").checked=false){
                    document.getElementById("err_jenkel").innerHTML = "Jenis Harus Dipilih";
                }else{
                    document.getElementById("err_jankel").innerHTML = "";
                }

                if(nama_siswa!="" && tanggal_masuk!="" &&alamat="" &&jurusan!="" &&
                (document.getElementById("jenkel1").checked==true || document.getElementById("jenkel2").checked==true))
    {
        $.ajax({
            type : 'POST',
            url : "form_action.php",
            data : data,
            success : function(){
                $('.data').load("data.php");
                document.getElementById("id").value = "";
                document.getElementById("form-data").reset();
            }, error : function(response){
                console.log(response.responseText);
            }
        });
    }
});
});
    </script>

    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php" style="color : #fff;">
            Starbhak Soft
        </a>
    </nav>

    <div class="container">
        <h2 align="center" style="margin : 30px;">CRUD Ajax No Loading</h2>

        <form method="post" class="form-data" id="form-data">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" required="true">
                        <p class="text-danger" id="err_nama_siswa"></p>
                    </div>
                </div>
                
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Jenis Kelamin"></label><br>
                        <input type="radio" name="jenkel" id="jenkel1" value="Laki-Laki" required="true">Laki-Laki
                        <input type="radio" name="jenkel" id="jenkel2" value="Perempuan" required="true">Perempuan
                    </div>
                    <p class="text-danger" id="err_jenkel"></p>
                </div>
            </div>

            <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required="true"></textarea>
            <p class="text-danger" id="err_alamat"></p>
            </div>

            <div class="form-group">
                <button type="button" name="simpan" class="btn btn-primary">
                    <i class="fa fa-save"></i>Simpan
                </button>
            </div> 
        </form>
        <hr>
        <div class="data"></div>
    </div>
        <div class="text-center">&copy;<?php echo date('Y');?> Copyright:
            <a href="https://starbhak.com/">Starbhak Soft</a>
        </div>

</body>



</html>
