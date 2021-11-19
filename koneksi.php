<?php 
// koneksi data base
$conn = mysqli_connect("localhost","root","","mambon");

// cara munculkan data base ke tabel dengan cara meluping

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

//cara buat tambah data
function tambah($data){
    global $conn;
    $nama = htmlspecialchars($data ["nama"]);
    $jenisk = htmlspecialchars($data ["jenisk"]);
    $tajaran = htmlspecialchars($data ["tajaran"]);
    $asekolah = htmlspecialchars($data ["asekolah"]);
    $tlahir = htmlspecialchars($data ["tlahir"]);
    $tglahir = htmlspecialchars($data ["tglahir"]);
    $agama = htmlspecialchars($data ["agama"]);
    $alengkap = htmlspecialchars($data ["alengkap"]);
    // $upakte = htmlspecialchars($data ["upakte"]);
    // $upkk = htmlspecialchars($data ["upkk"]);

    //UPLOAD GAMBAR
    $upakte = upload();
    if(!$upakte){
        return false;
    }
    $upkk = upload1();
    if (!$upkk) {
        return false;
    }

    // query buat tambah data
    $query = "INSERT INTO tb_pendaftaran
                VALUES
                    ('','$nama','$jenisk','$tajaran','$asekolah','$tlahir','$tglahir','$agama','$alengkap','$upakte','$upkk') 
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}
// uplode pertama
function upload(){
    $namafile = $_FILES ['upakte']['name'];
    $ukuranfile = $_FILES['upakte']['size'];
    $error = $_FILES ['upakte']['error'];
    $tmpName = $_FILES['upakte']['tmp_name'];

    //cek apakah tidak ada gambar yg di upload
    if ( $error === 4 ){
        echo"
        <script>
            alert ('pilih gambar terlebih dahulu!');
        </script>
        ";
        return false;
    }


    //cek apakah yang diuplode adlah gambar
    //strtolower artinya memaksa semua extensi jadi huruf kecil contohnya dari JPG -> jpg
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo"
        <script>
            alert ('yang anda upload buakn gambar!');
        </script>
        ";
    }
    //cek jika ukuran terlalu besar 
    if ($ukuranfile > 1000000 ) {
        echo"
        <script>
            alert ('ukuran gambar terlalu besar!');
        </script>
        ";
    }

    //lolos pengecekan, gambar siap diupload
    //gunakan skrip { move_uploaded_file($tmpName,'img/'.$namafile);}
    //buat nama yg baru pada saat di uplode

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;



    move_uploaded_file($tmpName,'img/'.$namaFileBaru);
    return $namaFileBaru;
}

// uplode kedua
function upload1(){
    $namafile = $_FILES ['upkk']['name'];
    $ukuranfile = $_FILES['upkk']['size'];
    $error = $_FILES ['upkk']['error'];
    $tmpName = $_FILES['upkk']['tmp_name'];

    //cek apakah tidak ada gambar yg di upload
    if ( $error === 4 ){
        echo"
        <script>
            alert ('pilih gambar terlebih dahulu!');
        </script>
        ";
        return false;
    }


    //cek apakah yang diuplode adlah gambar
    //strtolower artinya memaksa semua extensi jadi huruf kecil contohnya dari JPG -> jpg
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo"
        <script>
            alert ('yang anda upload buakn gambar!');
        </script>
        ";
    }
    //cek jika ukuran terlalu besar 
    if ($ukuranfile > 1000000 ) {
        echo"
        <script>
            alert ('ukuran gambar terlalu besar!');
        </script>
        ";
    }

    //lolos pengecekan, gambar siap diupload
    //gunakan skrip { move_uploaded_file($tmpName,'img/'.$namafile);}
    //buat nama yg baru pada saat di uplode

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName,'img/'.$namaFileBaru);
    return $namaFileBaru;
}

function hapus ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_pendaftaran WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah ($data){
    global $conn;
$id = $data["id"];
$nama = htmlspecialchars($data ["nama"]);
$jenisk = htmlspecialchars($data ["jenisk"]);
$tajaran = htmlspecialchars($data ["tajaran"]);
$asekolah = htmlspecialchars($data ["asekolah"]);
$tlahir = htmlspecialchars($data ["tlahir"]);
$tglahir = htmlspecialchars($data ["tglahir"]);
$agama = htmlspecialchars($data ["agama"]);
$alengkap = htmlspecialchars($data ["alengkap"]);
$upakte = htmlspecialchars($data ["upakte"]);
$upkk = htmlspecialchars($data ["upkk"]);

// query buat tambah data
$query = "UPDATE tb_pendaftaran SET
            nama = '$nama',
            jenisk ='$jenisk',
            tajaran = '$tajaran',
            asekolah ='$asekolah',
            tlahir = '$tlahir',
            tglahir = '$tglahir',
            tglahir = '$tglahir',
            agama = '$agama',
            alengkap = '$alengkap',
            upakte = '$upakte',
            upkk = '$upkk'
            WHERE id = $id
            ";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);


}
// function cari yang di maksud dengan nama LIKE '$keyword%'
//LIKE artinya mencari nama biarpun itu setengah atau diak tau nama balakangnya dan jangan lupa tambahakan % di akiran variabel yang dibuat minaya mau cari nama yang dengan singakat tambahkan juga % di muka persen di muka balakang yang maksuya untuk mencari nama muka dan nama belakang ini adlah mencari dengan fleksibel
//OR disini bermaksud untuk mencari dengan nama lain seminsalnya bukan cuamn nama mau cari dengan nim atau tanggal lahir atau yang lainya contohnya : [nama LIKE '%$keyword%' OR tajaran LIKE '%$keyword%']
function cari($keyword){
    $query = "SELECT * FROM tb_pendaftaran
                WHERE
                nama LIKE '%$keyword%' OR
                tajaran LIKE '%$keyword%'
    ";
    return query($query);
}



?>