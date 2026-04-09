<?php
// File edit buku menggunakan API
require_once('./orm/config.php');
?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
	<div class="pcoded-wrapper">
		<div class="pcoded-content">
			<div class="pcoded-inner-content">
				<div class="main-body">
					<div class="page-wrapper">
						<!-- [ breadcrumb ] start -->
						<div class="page-header">
							<div class="page-block">
								<div class="row align-items-center">
									<div class="col-md-12">
										<div class="page-header-title">
											<h5>Edit Buku</h5>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item"><a href="index.php"><i
														class="feather icon-home"></i></a></li>
													<li class="breadcrumb-item"><a href="?page=buku">Modul Buku</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- [ breadcrumb ] end -->
						<!-- [ Main Content ] start -->
						<div class="row">
                            <!-- [ basic-form ] start -->
                            <div class="col-md-12">
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Form Edit Buku</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form id="bukuForm" onsubmit="return submitForm(event)">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="judul_buku">Judul Buku</label>
                                                        <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Enter judul buku" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="id_kategori">Kategori</label>
                                                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                                                            <option value="">-- Pilih Kategori --</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="id_penerbit">Penerbit</label>
                                                        <select class="form-control" id="id_penerbit" name="id_penerbit" required>
                                                            <option value="">-- Pilih Penerbit --</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="stok">Stok</label>
                                                        <input type="number" class="form-control" id="stok" name="stok" placeholder="Enter stok" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="tahun_terbit">Tahun Terbit</label>
                                                        <input type="date" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Enter tahun terbit" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mb-4">Update</button>
                                                    <a href="?page=buku" class="btn btn-secondary mb-4">Kembali</a>
                                                </form>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- [ basic-form] end -->
                      
                            
                            <!-- [ Background-Utilities ] start -->

                            <!-- [ Background-Utilities ] end -->
                        </div>

						<!-- [ Main Content ] end -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ Main Content ] end -->

<script>
const baseUrl = window.location.protocol + '//' + window.location.host;
const bukuId = new URLSearchParams(window.location.search).get('id');

// Load data buku, kategori, dan penerbit saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    if(bukuId) {
        loadBuku();
        loadKategori();
        loadPenerbit();
    } else {
        alert('ID Buku tidak ditemukan');
        window.location.href = '?page=buku';
    }
});

function loadBuku() {
    fetch(baseUrl + '/Perpustakaan/api/buku.php?id=' + bukuId)
        .then(response => response.json())
        .then(data => {
            if(data.status === 'success' && data.data) {
                const buku = data.data;
                document.getElementById('judul_buku').value = buku.judul_buku;
                document.getElementById('id_kategori').value = buku.id_kategori;
                document.getElementById('id_penerbit').value = buku.id_penerbit;
                document.getElementById('stok').value = buku.stok;
                document.getElementById('tahun_terbit').value = buku.tahun_terbit;
            } else {
                alert('Buku tidak ditemukan');
                window.location.href = '?page=buku';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal memuat data buku');
        });
}

function loadKategori() {
    fetch(baseUrl + '/Perpustakaan/api/kategori.php')
        .then(response => response.json())
        .then(data => {
            const select = document.getElementById('id_kategori');
            if(data.data && data.data.length > 0) {
                data.data.forEach(kategori => {
                    const option = document.createElement('option');
                    option.value = kategori.id_kategori;
                    option.text = kategori.nama_kategori;
                    select.appendChild(option);
                });
            }
        })
        .catch(error => console.error('Error loading kategori:', error));
}

function loadPenerbit() {
    fetch(baseUrl + '/Perpustakaan/api/penerbit.php')
        .then(response => response.json())
        .then(data => {
            const select = document.getElementById('id_penerbit');
            if(data.data && data.data.length > 0) {
                data.data.forEach(penerbit => {
                    const option = document.createElement('option');
                    option.value = penerbit.id_penerbit;
                    option.text = penerbit.nama_penerbit;
                    select.appendChild(option);
                });
            }
        })
        .catch(error => console.error('Error loading penerbit:', error));
}

function submitForm(event) {
    event.preventDefault();
    
    const formData = new FormData(document.getElementById('bukuForm'));
    formData.append('id_buku', bukuId);
    
    fetch(baseUrl + '/Perpustakaan/api/buku.php?id=' + bukuId, {
        method: 'PUT',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.status === 'success') {
            alert('Buku berhasil diupdate');
            window.location.href = '?page=buku';
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Gagal mengupdate data');
    });
    
    return false;
}
</script>