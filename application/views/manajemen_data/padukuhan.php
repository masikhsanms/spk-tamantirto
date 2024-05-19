         <div class="container-fluid">

              <!-- Page Heading -->
              <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
              <div class="row">
                   <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card shadow mb-4">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary" id="titleFormActionPadukuhan">Tambah Padukuhan</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <form action="<?= base_url('manajemen_data/tambah_padukuhan'); ?>" method="post">
                                       <!-- <div class="form-row align-items-top"> -->
                                       <div class="form-group">
                                            <div class="col-auto mb-2">
                                                 <label for="nama_padukuhan">Nama Padukuhan</label>
                                                 <input type="text" class="form-control" id="nama_padukuhan" name="nama_padukuhan" value="<?= set_value('nama_padukuhan'); ?>">
                                                 <?= form_error('nama_padukuhan', '<small class="text-danger pl-1">', '</small>'); ?>
                                            </div>
                                       </div>
                                       <div class="modal-footer mt-3">
                                            <button class="col-auto ml-auto btn btn-primary btn-sm" id="btnAddPadukuhan" type="submit"><i class="fas fa-save"></i>&nbsp Save</button>
                                       </div>
                                  </form>
                             </div>
                        </div>
                        <div class="card shadow mb-4">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary">Data Padukuhan</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <div class="table-responsive">
                                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                 <tr>
                                                      <td>No</td>
                                                      <td>Nama Padukuhan</td>
                                                      <td>Aksi</td>
                                                 </tr>
                                            </thead>
                                            <tbody>
                                                 <?php $i = 1; ?>
                                                 <?php foreach ($data_padukuhan as $lp) : ?>
                                                      <tr>
                                                           <td><?= $i++ ?></td>
                                                           <td><?= $lp['nama_padukuhan']; ?></td>
                                                           <td>
                                                                <a href="#" class="btn btn-warning btn-sm mb-1 btnUbahPadukuhan" id="btnUbahPadukuhan" data-toggle="modal" data-target="#modalUbahPadukuhan" data-id-padukuhan="<?= $lp['id_padukuhan']; ?>" data-nama-padukuhan="<?= $lp['nama_padukuhan']; ?>"><i class="fas fa-edit"> </i>&nbsp Ubah</a>
                                                                <a href="#" class="btn btn-danger btn-sm mb-1 btnHapusPadukuhan" id="btnHapusPadukuhan" data-toggle="modal" data-target="#modalHapusPadukuhan" data-idpadukuhan="<?= $lp['id_padukuhan']; ?>" data-name="<?= $lp['nama_padukuhan']; ?>"><i class="fas fa-trash"> </i>&nbsp Hapus</a>
                                                           </td>
                                                      </tr>
                                                 <?php endforeach; ?>
                                            </tbody>
                                  </div>
                             </div>
                        </div>

                        <!-- Modal Hapus Padukuha -->
                        <div class="modal fade" id="modalHapusPadukuhan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                  <div class="modal-content">
                                       <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Padukuhan</h5>
                                            <button type="button" class="close  closeHapusPadukuhan" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>
                                       <form action="<?= base_url('manajemen_data/hapus_padukuhan'); ?>" method="POST">
                                            <div class="modal-body">
                                                 Apakah kamu yakin mau menghapus padukuhan ini?
                                                 <input name="idPadukuhan" id="idPadukuhan" type="hidden" value="id">
                                            </div>
                                            <div class="modal-footer">
                                                 <button type="submit" class="btn btn-danger">Delete</button>
                                                 <button type="button" class="btn btn-secondary closeHapusPadukuhan" data-dismiss="modal">Close</button>
                                            </div>
                                       </form>
                                  </div>
                             </div>
                        </div>

                        <!-- Modal Ubah Padukuhan-->
                        <div id="modalUbahPadukuhan" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                  <div class="modal-content">
                                       <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Padukuhan</h5>
                                            <button type="button" class="close closeUbahPadukuhan" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>
                                       <form action="<?= base_url('manajemen_data/update_padukuhan'); ?>" method="POST">
                                            <div class="modal-body">
                                                 <input name="idUpdatePadukuhan" id="idUpdatePadukuhan" type="hidden" value="">
                                                 <div class="form-group">
                                                      <label for="ubahNamaPadukuhan">Nama Padukuhan</label>
                                                      <input type="text" class="form-control" id="ubahNamaPadukuhan" name="ubahNamaPadukuhan" value="<?= set_value('ubahNamaPadukuhan'); ?>">
                                                      <?= $this->session->flashdata('message-update-padukuhan'); ?>
                                                      <div id="errorNamaPadukuhan" class="invalid-feedback ml-1"></div>
                                                 </div>
                                            </div>
                                            <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary closeUbahPadukuhan" data-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary" id="btnUpdatePadukuhan">Update</button>
                                            </div>
                                       </form>
                                  </div>
                             </div>
                        </div>
                        <!-- /.container-fluid -->