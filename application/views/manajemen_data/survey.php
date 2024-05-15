         <div class="container-fluid">

              <!-- Page Heading -->
              <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
              <div class="row">
                   <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card shadow mb-4" id="form-tambah-survey">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary" id="titleFormActionsurvey">Tambah survey</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <form action="<?= base_url('manajemen_data/tambah_survey'); ?>" method="post">
                                       <!-- <div class="form-row align-items-top"> -->
                                       <div class="form-group">
                                            <div class="col-auto mb-2">
                                                 <label for="nama_survey">Nama survey</label>
                                                 <input type="text" class="form-control" id="nama_survey" name="nama_survey" value="<?= set_value('nama_survey'); ?>">
                                                 <?= form_error('nama_survey', '<small class="text-danger pl-1">', '</small>'); ?>
                                            </div>
                                       </div>
                                       <div class="modal-footer mt-3">
                                            <button class="col-auto ml-auto btn btn-primary btn-sm" id="btnAddsurvey" type="submit"><i class="fas fa-save"></i>&nbsp Save</button>
                                       </div>
                                  </form>
                             </div>
                        </div>
                        <div class="card shadow mb-4" id="form-ubah-survey" style="display: none">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary" id="titleFormActionsurvey">Ubah survey</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <form action="<?= base_url('manajemen_data/update_survey'); ?>" method="post">
                                       <!-- <div class="form-row align-items-top"> -->
                                       <div class="form-group">
                                            <div class="col-auto mb-2">
                                                 <label for="nama_survey">Nama survey</label>
                                                 <input type="hidden" class="form-control" id="idUpdatesurvey" name="id_survey" value="<?= set_value('id_survey'); ?>">
                                                 <input type="text" class="form-control" id="namaUpdatesurvey" name="ubah_nama_survey" value="<?= set_value('ubah_nama_survey'); ?>">
                                                 <?= form_error('ubah_nama_survey', '<small class="text-danger pl-1" id="errorUbahsurvey" value="1">', '</small>'); ?>
                                            </div>
                                       </div>
                                       <div class="modal-footer mt-3">
                                            <div class="nav justify-content-end">
                                                 <a class="col-auto ml-auto btn btn-danger btn-sm closeUbahsurvey" id="btnCloseUpdatesurvey"><i class="fas fa-times"></i>&nbsp Close</a>
                                                 <button class="col-auto ml-2 btn btn-primary btn-sm" id="btnUpdatesurvey" type="submit"><i class="fas fa-save"></i>&nbsp Save</button>
                                            </div>
                                       </div>
                                  </form>
                             </div>
                        </div>
                        <div class="card shadow mb-4">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary">Data survey</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <div class="table-responsive">
                                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                 <tr>
                                                      <td>No</td>
                                                      <td>Nama survey</td>
                                                      <td>Aksi</td>
                                                 </tr>
                                            </thead>
                                            <tbody>
                                                 <?php $i = 1; ?>
                                                 <?php foreach ($data_survey as $dk) : ?>
                                                      <tr>
                                                           <td><?= $i++ ?></td>
                                                           <td><?= $dk['nama_survey']; ?></td>
                                                           <td>
                                                                <!-- <a href="#" class="btn btn-warning btn-sm mb-1 btnUbahsurvey" id="btnUbahsurvey" data-toggle="modal" data-target="#modalUbahsurvey" data-id-survey="<?= $dk['id_survey']; ?>" data-nama-survey="<?= $dk['nama_survey']; ?>" <i class="fas fa-trash"></i>&nbsp Ubah</a> -->
                                                                <a href="#" class="btn btn-warning btn-sm mb-1 btnUbahsurvey" id="btnUbahsurvey" data-toggle="modal" data-id-survey="<?= $dk['id_survey']; ?>" data-nama-survey="<?= $dk['nama_survey']; ?>" <i class="fas fa-trash"></i>&nbsp Ubah</a>
                                                                <a href="#" class="btn btn-danger btn-sm mb-1 btnHapussurvey" id="btnHapussurvey" data-toggle="modal" data-target="#modalHapussurvey" data-id-survey="<?= $dk['id_survey']; ?>" data-name="<?= $dk['nama_survey']; ?>" <i class="fas fa-trash"></i>&nbsp Hapus</a>
                                                           </td>
                                                      </tr>
                                                 <?php endforeach; ?>
                                            </tbody>
                                  </div>
                             </div>
                        </div>

                        <!-- Modal Hapus Padukuha -->
                        <div class="modal fade" id="modalHapussurvey" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                  <div class="modal-content">
                                       <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus survey</h5>
                                            <button type="button" class="close  closeHapussurvey" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>
                                       <form action="<?= base_url('manajemen_data/hapus_survey'); ?>" method="POST">
                                            <div class="modal-body">
                                                 Apakah kamu yakin mau menghapus survey ini?
                                                 <input name="idsurvey" id="idsurvey" type="hidden" value="id">
                                            </div>
                                            <div class="modal-footer">
                                                 <button type="submit" class="btn btn-danger">Delete</button>
                                                 <button type="button" class="btn btn-secondary closeHapussurvey" data-dismiss="modal">Close</button>
                                            </div>
                                       </form>
                                  </div>
                             </div>
                        </div>

                        <!-- Modal Ubah survey-->
                        <div id="modalUbahsurvey" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                  <div class="modal-content">
                                       <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data survey</h5>
                                            <button type="button" class="close closeUbahsurvey" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>
                                       <form action="<?= base_url('manajemen_data/update_survey'); ?>" method="POST">
                                            <div class="modal-body">
                                                 <input name="idUpdatesurvey" id="idUpdatesurvey" type="hidden" value="">
                                                 <div class="form-group">
                                                      <label for="ubahNamasurvey">Nama survey</label>
                                                      <input type="text" class="form-control" id="ubahNamasurvey" name="ubahNamasurvey" value="<?= set_value('ubahNamasurvey'); ?>">
                                                      <?= $this->session->flashdata('message-update-survey'); ?>
                                                      <div id="errorNamasurvey" class="invalid-feedback ml-1"></div>
                                                 </div>
                                            </div>
                                            <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary closeUbahsurvey" data-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary" id="btnUpdatesurvey">Update</button>
                                            </div>
                                       </form>
                                  </div>
                             </div>
                        </div>
                        <!-- /.container-fluid -->