         <div class="container-fluid">

              <!-- Page Heading -->
              <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
              <div class="row">
                   <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card shadow mb-4" id="form-tambah-pertanyaan">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary" id="titleFormActionpertanyaan">Tambah pertanyaan</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <form action="<?= base_url('manajemen_data/tambah_pertanyaan'); ?>" method="post">
                                       <!-- <div class="form-row align-items-top"> -->
                                       <div class="form-group">
                                            <div class="col-auto mb-2">
                                                 <label for="nama_pertanyaan">Nama pertanyaan</label>
                                                 <input type="text" class="form-control" id="nama_pertanyaan" name="nama_pertanyaan" value="<?= set_value('nama_pertanyaan'); ?>">
                                                 <?= form_error('nama_pertanyaan', '<small class="text-danger pl-1">', '</small>'); ?>
                                            </div>
                                       </div>
                                       <div class="modal-footer mt-3">
                                            <button class="col-auto ml-auto btn btn-primary btn-sm" id="btnAddpertanyaan" type="submit"><i class="fas fa-save"></i>&nbsp Save</button>
                                       </div>
                                  </form>
                             </div>
                        </div>
                        <div class="card shadow mb-4" id="form-ubah-pertanyaan" style="display: none">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary" id="titleFormActionpertanyaan">Ubah pertanyaan</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <form action="<?= base_url('manajemen_data/update_pertanyaan'); ?>" method="post">
                                       <!-- <div class="form-row align-items-top"> -->
                                       <div class="form-group">
                                            <div class="col-auto mb-2">
                                                 <label for="nama_pertanyaan">Nama pertanyaan</label>
                                                 <input type="hidden" class="form-control" id="idUpdatepertanyaan" name="id_pertanyaan" value="<?= set_value('id_pertanyaan'); ?>">
                                                 <input type="text" class="form-control" id="namaUpdatepertanyaan" name="ubah_nama_pertanyaan" value="<?= set_value('ubah_nama_pertanyaan'); ?>">
                                                 <?= form_error('ubah_nama_pertanyaan', '<small class="text-danger pl-1" id="errorUbahpertanyaan" value="1">', '</small>'); ?>
                                            </div>
                                       </div>
                                       <div class="modal-footer mt-3">
                                            <div class="nav justify-content-end">
                                                 <a class="col-auto ml-auto btn btn-danger btn-sm closeUbahpertanyaan" id="btnCloseUpdatepertanyaan"><i class="fas fa-times"></i>&nbsp Close</a>
                                                 <button class="col-auto ml-2 btn btn-primary btn-sm" id="btnUpdatepertanyaan" type="submit"><i class="fas fa-save"></i>&nbsp Save</button>
                                            </div>
                                       </div>
                                  </form>
                             </div>
                        </div>
                        <div class="card shadow mb-4">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary">Data pertanyaan</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <div class="table-responsive">
                                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                 <tr>
                                                      <td>No</td>
                                                      <td>Nama pertanyaan</td>
                                                      <td>Aksi</td>
                                                 </tr>
                                            </thead>
                                            <tbody>
                                                 <?php $i = 1; ?>
                                                 <?php foreach ($data_pertanyaan as $dk) : ?>
                                                      <tr>
                                                           <td><?= $i++ ?></td>
                                                           <td><?= $dk['nama_pertanyaan']; ?></td>
                                                           <td>
                                                                <!-- <a href="#" class="btn btn-warning btn-sm mb-1 btnUbahpertanyaan" id="btnUbahpertanyaan" data-toggle="modal" data-target="#modalUbahpertanyaan" data-id-pertanyaan="<?= $dk['id_pertanyaan']; ?>" data-nama-pertanyaan="<?= $dk['nama_pertanyaan']; ?>" <i class="fas fa-trash"></i>&nbsp Ubah</a> -->
                                                                <a href="#" class="btn btn-warning btn-sm mb-1 btnUbahpertanyaan" id="btnUbahpertanyaan" data-toggle="modal" data-id-pertanyaan="<?= $dk['id_pertanyaan']; ?>" data-nama-pertanyaan="<?= $dk['nama_pertanyaan']; ?>" <i class="fas fa-trash"></i>&nbsp Ubah</a>
                                                                <a href="#" class="btn btn-danger btn-sm mb-1 btnHapuspertanyaan" id="btnHapuspertanyaan" data-toggle="modal" data-target="#modalHapuspertanyaan" data-id-pertanyaan="<?= $dk['id_pertanyaan']; ?>" data-name="<?= $dk['nama_pertanyaan']; ?>" <i class="fas fa-trash"></i>&nbsp Hapus</a>
                                                           </td>
                                                      </tr>
                                                 <?php endforeach; ?>
                                            </tbody>
                                  </div>
                             </div>
                        </div>

                        <!-- Modal Hapus Padukuha -->
                        <div class="modal fade" id="modalHapuspertanyaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                  <div class="modal-content">
                                       <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus pertanyaan</h5>
                                            <button type="button" class="close  closeHapuspertanyaan" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>
                                       <form action="<?= base_url('manajemen_data/hapus_pertanyaan'); ?>" method="POST">
                                            <div class="modal-body">
                                                 Apakah kamu yakin mau menghapus pertanyaan ini?
                                                 <input name="idpertanyaan" id="idpertanyaan" type="hidden" value="id">
                                            </div>
                                            <div class="modal-footer">
                                                 <button type="submit" class="btn btn-danger">Delete</button>
                                                 <button type="button" class="btn btn-secondary closeHapuspertanyaan" data-dismiss="modal">Close</button>
                                            </div>
                                       </form>
                                  </div>
                             </div>
                        </div>

                        <!-- Modal Ubah pertanyaan-->
                        <div id="modalUbahpertanyaan" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                  <div class="modal-content">
                                       <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data pertanyaan</h5>
                                            <button type="button" class="close closeUbahpertanyaan" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>
                                       <form action="<?= base_url('manajemen_data/update_pertanyaan'); ?>" method="POST">
                                            <div class="modal-body">
                                                 <input name="idUpdatepertanyaan" id="idUpdatepertanyaan" type="hidden" value="">
                                                 <div class="form-group">
                                                      <label for="ubahNamapertanyaan">Nama pertanyaan</label>
                                                      <input type="text" class="form-control" id="ubahNamapertanyaan" name="ubahNamapertanyaan" value="<?= set_value('ubahNamapertanyaan'); ?>">
                                                      <?= $this->session->flashdata('message-update-pertanyaan'); ?>
                                                      <div id="errorNamapertanyaan" class="invalid-feedback ml-1"></div>
                                                 </div>
                                            </div>
                                            <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary closeUbahpertanyaan" data-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary" id="btnUpdatepertanyaan">Update</button>
                                            </div>
                                       </form>
                                  </div>
                             </div>
                        </div>
                        <!-- /.container-fluid -->