<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Mobil</h1>
        <a href="<?= base_url() ?>mobil/tambah"  class="btn btn-sm btn-primary btn-icon-split">
            <span class="text text-white">Tambah Data</span>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        </a>


    </div>

    <div class="col-lg-12 mb-4" id="container">

        <!-- Illustrations -->
        <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Jenis Mobil</th>
                                <th>Reg</th>
                                <th>Merk Mobil</th>
                                <th>Ukuran</th>
                                <th>Bahan</th>
                                <th>Tahun Pembelian</th>
                                <th>Rangka</th>
                                <th>Mesin</th>
                                <th>No Pol</th>
                                <th>BPKB</th>
                                <th>Asal</th>
                                <th>Harga</th>
                                <th>Foto</th>
                                
                                
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="cursor:pointer;">
                            <?php $no=1; foreach ($mobil as $b) { ?>
                            <tr>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><?= $no++ ?>.</td>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><?= $b->kategori ?></td>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><?= $b->reg ?></td>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><?= $b->merk ?></td>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><?= $b->ukuran ?></td>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><?= $b->bahan ?></td>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><?= $b->tahun ?></td>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><?= $b->rangka ?></td>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><?= $b->mesin ?></td>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><?= $b->nopol ?></td>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><?= $b->bpkb ?></td>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><?= $b->asal ?></td>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><?= $b->harga ?></td>
                                <td onclick="detail('<?= $b->id_mobil ?>')"><img style="border-radius: 5px;"
                                        src="assets/upload/buku/<?= $b->foto ?>" alt="" width="75px"></td>
                                
                                
                                
                                <td>
                                    <center>
                                        <a href="<?= base_url() ?>mobil/ubah/<?= $b->id_mobil ?>"
                                            class="btn btn-circle btn-success btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="<?= base_url('mobil/hapus/' . $b->id_mobil) ?>" onclick="konfirmasi('<?= $b->id_mobil ?>')"
   class="btn btn-circle btn-danger btn-sm">
   <i class="fas fa-trash"></i>
</a>

                                    </center>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/buku.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<?php if($this->session->flashdata('Pesan')): ?>
<?= $this->session->flashdata('Pesan'); ?>
<?php else: ?>
    <script>
$(document).ready(function() {

    let timerInterval;

    Swal.fire({
        title: 'Memuat...',
        timer: 1000,
        onBeforeOpen: () => {
            Swal.showLoading();
        },
        onClose: () => {
            clearInterval(timerInterval);
        }
    }).then((result) => {
        // Menambahkan penundaan (delay) sebelum mengarahkan atau menutup notifikasi
        setTimeout(function() {
            Swal.close(); // Menutup notifikasi setelah penundaan
        }, 2000); // Sesuaikan dengan durasi penundaan yang diinginkan (dalam milidetik)
    });
});
</script>

<?php endif; ?>