         <div class="container-fluid">

              <!-- Page Heading -->
              <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
              <div class="row">
                   <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card shadow mb-4" id="form-tambah-kategori">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary" id="titleFormActionkategori">Tambah Kategori</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <form action="<?= base_url('manajemen_data/tambah_kategori'); ?>" method="post">
                                       <!-- <div class="form-row align-items-top"> -->
                                       <div class="form-group">
                                            <div class="col-auto mb-2">
                                                 <label for="nama_kategori">Nama Kategori</label>
                                                 <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= set_value('nama_kategori'); ?>">
                                                 <?= form_error('nama_kategori', '<small class="text-danger pl-1">', '</small>'); ?>
                                            </div>
                                       </div>
                                       <div class="modal-footer mt-3">
                                            <button class="col-auto ml-auto btn btn-primary btn-sm" id="btnAddkategori" type="submit"><i class="fas fa-save"></i>&nbsp Save</button>
                                       </div>
                                  </form>
                             </div>
                        </div>
                        <div class="card shadow mb-4" id="form-ubah-kategori" style="display: none">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary" id="titleFormActionkategori">Ubah Kategori</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <form action="<?= base_url('manajemen_data/update_kategori'); ?>" method="post">
                                       <!-- <div class="form-row align-items-top"> -->
                                       <div class="form-group">
                                            <div class="col-auto mb-2">
                                                 <label for="nama_kategori">Nama Kategori</label>
                                                 <input type="hidden" class="form-control" id="idUpdateKategori" name="id_kategori" value="<?= set_value('id_kategori'); ?>">
                                                 <input type="text" class="form-control" id="namaUpdateKategori" name="ubah_nama_kategori" value="<?= set_value('ubah_nama_kategori'); ?>">
                                                 <?= form_error('ubah_nama_kategori', '<small class="text-danger pl-1" id="errorUbahKategori" value="1">', '</small>'); ?>
                                            </div>
                                       </div>
                                       <div class="modal-footer mt-3">
                                            <div class="nav justify-content-end">
                                                 <a class="col-auto ml-auto btn btn-danger btn-sm closeUbahKategori" id="btnCloseUpdateKategori"><i class="fas fa-times"></i>&nbsp Close</a>
                                                 <button class="col-auto ml-2 btn btn-primary btn-sm" id="btnUpdateKategori" type="submit"><i class="fas fa-save"></i>&nbsp Save</button>
                                            </div>
                                       </div>
                                  </form>
                             </div>
                        </div>
                        <div class="card shadow mb-4">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary">Data kategori</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <div class="table-responsive">
                                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                 <tr>
                                                      <td>No</td>
                                                      <td>Nama kategori</td>
                                                      <td>Aksi</td>
                                                 </tr>
                                            </thead>
                                            <tbody>
                                                 <?php $i = 1; ?>
                                                 <?php foreach ($data_kategori as $dk) : ?>
                                                      <tr>
                                                           <td><?= $i++ ?></td>
                                                           <td><?= $dk['nama_kategori']; ?></td>
                                                           <td>
                                                                <a href="#" class="btn btn-warning btn-sm mb-1 btnUbahKategori" id="btnUbahKategori" data-toggle="modal" data-id-kategori="<?= $dk['id_kategori']; ?>" data-nama-kategori="<?= $dk['nama_kategori']; ?>"><i class="fas fa-edit"> </i>&nbsp Ubah</a>
                                                                <a href="#" class="btn btn-danger btn-sm mb-1 btnHapusKategori" id="btnHapusKategori" data-toggle="modal" data-target="#modalHapusKategori" data-id-kategori="<?= $dk['id_kategori']; ?>" data-name="<?= $dk['nama_kategori']; ?>"><i class="fas fa-trash"> </i>&nbsp Hapus</a>
                                                           </td>
                                                      </tr>
                                                 <?php endforeach; ?>
                                            </tbody>
                                  </div>
                             </div>
                        </div>

                        <!-- Modal Hapus Padukuha -->
                        <div class="modal fade" id="modalHapusKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                  <div class="modal-content">
                                       <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus kategori</h5>
                                            <button type="button" class="close  closeHapuskategori" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>
                                       <form action="<?= base_url('manajemen_data/hapus_kategori'); ?>" method="POST">
                                            <div class="modal-body">
                                                 Apakah kamu yakin mau menghapus kategori ini?
                                                 <input name="idKategori" id="idKategori" type="hidden" value="id">
                                            </div>
                                            <div class="modal-footer">
                                                 <button type="submit" class="btn btn-danger">Delete</button>
                                                 <button type="button" class="btn btn-secondary closeHapuskategori" data-dismiss="modal">Close</button>
                                            </div>
                                       </form>
                                  </div>
                             </div>
                        </div>

                        <!-- Modal Ubah kategori-->
                        <div id="modalUbahkategori" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                  <div class="modal-content">
                                       <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data kategori</h5>
                                            <button type="button" class="close closeUbahkategori" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>
                                       <form action="<?= base_url('manajemen_data/update_kategori'); ?>" method="POST">
                                            <div class="modal-body">
                                                 <input name="idUpdatekategori" id="idUpdatekategori" type="hidden" value="">
                                                 <div class="form-group">
                                                      <label for="ubahNamakategori">Nama kategori</label>
                                                      <input type="text" class="form-control" id="ubahNamakategori" name="ubahNamakategori" value="<?= set_value('ubahNamakategori'); ?>">
                                                      <?= $this->session->flashdata('message-update-kategori'); ?>
                                                      <div id="errorNamakategori" class="invalid-feedback ml-1"></div>
                                                 </div>
                                            </div>
                                            <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary closeUbahkategori" data-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary" id="btnUpdatekategori">Update</button>
                                            </div>
                                       </form>
                                  </div>
                             </div>
                        </div>
                        <!-- /.container-fluid -->