<?php
require 'functions.php';

$id = $_GET["id"];

if( hapus_hotel($id) > 0){
    echo "
        <script>
            alert('Data Berhasil DiHapus');
            document.location.href = 'admin_hotel.php';
        </script>
    ";
}else{
    echo "
        <script>
            alert('Data gagal DiHapus');
            document.location.href = 'admin_hotel.php';
        </script>
    ";
}

?>