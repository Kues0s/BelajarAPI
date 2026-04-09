<?php
// File ini menggunakan API untuk mengambil data buku secara real-time
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
											<h5>Data Buku</h5>
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
                            <!-- [ basic-table ] start -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div style="flex: auto; justify-content: space-between; display: flex; align-items: center;">
<h5>Data Buku</h5>
<a href="?page=buku/tambah" class="btn btn-primary">Tambah Buku</a>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="card-body table-border-style">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Judul Buku</th>
                                                        <th>Kategori</th>
                                                        <th>Penerbit</th>
                                                        <th>Tahun Terbit</th>
                                                        <th>Stok</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="color: white;" id="bukuTableBody">
                                                    <tr>
                                                        <td colspan="7" class="text-center">Memuat data...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ basic-table ] end -->
                        </div>

                        <!-- Script untuk fetch data buku dari API -->
                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const baseUrl = window.location.protocol + '//' + window.location.host;
                            
                            fetch(baseUrl + '/Perpustakaan/api/buku.php')
                                .then(response => response.json())
                                .then(data => {
                                    const tbody = document.getElementById('bukuTableBody');
                                    tbody.innerHTML = '';
                                    
                                    if(data.data && data.data.length > 0) {
                                        data.data.forEach((buku, index) => {
                                            const row = tbody.insertRow();
                                            row.innerHTML = `
                                                <td>${index + 1}</td>
                                                <td>${buku.judul_buku}</td>
                                                <td>${buku.nama_kategori}</td>
                                                <td>${buku.nama_penerbit}</td>
                                                <td>${buku.tahun_terbit}</td>
                                                <td>${buku.stok}</td>
                                                <td>
                                                    <a href="?page=buku/edit&id=${buku.id_buku}" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="?page=buku/delete&id=${buku.id_buku}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                                </td>
                                            `;
                                        });
                                    } else {
                                        const row = tbody.insertRow();
                                        row.innerHTML = '<td colspan="7" class="text-center">Tidak ada data buku</td>';
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    const tbody = document.getElementById('bukuTableBody');
                                    tbody.innerHTML = '<tr><td colspan="7" class="text-center text-danger">Gagal memuat data</td></tr>';
                                });
                        });
                        </script>
                      
                            
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