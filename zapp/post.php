<?php 
    include_once('connect.php'); 
    // data yang ditambahkan

    $foodstmt = $db->prepare("SELECT * FROM makanan");
    $foodstmt->execute();
    $makanan = $foodstmt->fetchAll();
    foreach($makanan as $food) {
        return $data = array(
            'nama', $_POST['Nama'],
            'kelas', $_POST['kelas'],
            'makanan', $food['id']
        );
    }
    try {
       $sql = 'INSERT INTO `orang`(`nama`, `kelas`, `makanan`) VALUES (:nama, :kelas, :makanan)';
       $stmt = $db->prepare($sql);
       $hasil = $stmt->execute($data);

       echo 'Berhasil tambah data', $hasil;
    } catch (PDOException $e){
        echo $e->getMessage();
        echo $e->getTraceAsString();
    }
 
?>