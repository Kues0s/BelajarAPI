<?php
require_once('./orm/config.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

if($id) {
    // Menggunakan JavaScript untuk DELETE ke API
    ?>
    <script>
    const baseUrl = window.location.protocol + '//' + window.location.host;
    const bukuId = '<?php echo $id; ?>';
    
    if(confirm('Yakin ingin menghapus buku ini?')) {
        fetch(baseUrl + '/Perpustakaan/api/buku.php?id=' + bukuId, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if(data.status === 'success') {
                alert('Buku berhasil dihapus');
                window.location.href = '?page=buku';
            } else {
                alert('Error: ' + data.message);
                window.location.href = '?page=buku';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal menghapus data');
            window.location.href = '?page=buku';
        });
    } else {
        window.location.href = '?page=buku';
    }
    </script>
    <?php
} else {
    echo "<script>alert('ID Buku tidak ditemukan'); window.location.href='?page=buku';</script>";
}

?>