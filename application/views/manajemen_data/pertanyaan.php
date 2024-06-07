         <div class="container-fluid">

              <!-- Page Heading -->
              <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
              <div class="row">
                   <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                        <!-- form tambah pertanyaan -->
                        <div class="card shadow mb-4" id="form-tambah-pertanyaan">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary" id="titleFormActionpertanyaan">Tambah Pertanyaan</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <form action="<?= base_url('manajemen_data/tambah_pertanyaan'); ?>" method="post">
                                       <div class="row">
                                            <div class="col-auto">
                                                 <div class="form-group">
                                                      <div class="form-group">
                                                           <label for="tanggal_pertanyaan">Tanggal Survey</label>
                                                           <input type="date" class="form-control" name="tanggal_pertanyaan" id="tanggal_pertanyaan" value="<?= set_value("tanggal_pertanyaan"); ?>">
                                                           <?= form_error('tanggal_pertanyaan', '<small class="text-danger pl-1">', '</small>'); ?>
                                                      </div>
                                                 </div>
                                            </div>
                                            <div class="col-auto">
                                                 <div class="form-group">
                                                      <label for="surveyor_pertanyaan">Surveyor</label>
                                                      <select class="form-control" id="surveyor_pertanyaan" name="surveyor_pertanyaan">
                                                           <option value="">Pilih surveyor</option>
                                                           <?php foreach ($surveyor as $s) : ?>
                                                                <option value="<?= $s['id']; ?>" <?= set_select("surveyor_pertanyaan", $s['id']); ?>><?= $s['name']; ?></option>
                                                           <?php endforeach; ?>
                                                      </select>
                                                      <?= form_error('surveyor_pertanyaan', '<small class="text-danger pl-1">', '</small>'); ?>
                                                 </div>
                                            </div>
                                            <div class="col-auto">
                                                 <div class="form-group">
                                                      <div class="form-group">
                                                           <label for="kategori_pertanyaan">Kategori</label>
                                                           <select class="form-control" id="kategori_pertanyaan" name="kategori_pertanyaan">
                                                                <option value="">Pilih Kategori</option>
                                                                <?php foreach ($kategori as $kat) : ?>
                                                                     <option value="<?= $kat['id_kategori']; ?>" <?= set_select("kategori_pertanyaan", $kat['id_kategori']); ?>><?= $kat['nama_kategori']; ?></option>
                                                                <?php endforeach; ?>
                                                           </select>
                                                           <?= form_error('kategori_pertanyaan', '<small class="text-danger pl-1">', '</small>'); ?>
                                                      </div>
                                                 </div>
                                            </div>
                                            <div class="col-auto">
                                                 <div class="form-group">
                                                      <div class="form-group">
                                                           <label for="indikator_pertanyaan">Indikator</label>
                                                           <select class="form-control" id="indikator_pertanyaan" name="indikator_pertanyaan">
                                                                <option value="">Pilih Indikator</option>
                                                                <?php foreach ($indikator as $i) : ?>
                                                                     <option value="<?= $i['id_indikator']; ?>" <?= set_select("indikator_pertanyaan", $i['id_indikator']); ?>><?= $i['nama_indikator']; ?></option>
                                                                <?php endforeach; ?>
                                                           </select>
                                                           <?= form_error('indikator_pertanyaan', '<small class="text-danger pl-1">', '</small>'); ?>
                                                      </div>
                                                 </div>
                                            </div>
                                            <div class="col-auto">
                                                 <div class="form-group">
                                                      <label for="padukuhan_pertanyaan">Padukuhan</label>
                                                      <select class="form-control" id="padukuhan_pertanyaan" name="padukuhan_pertanyaan">
                                                           <option value="">Pilih Padukuhan</option>
                                                           <?php foreach ($padukuhan as $pad) : ?>
                                                                <option value="<?= $pad['id_padukuhan']; ?>" <?= set_select("padukuhan_pertanyaan", $pad['id_padukuhan']); ?>><?= $pad['nama_padukuhan']; ?></option>
                                                           <?php endforeach; ?>
                                                      </select>
                                                      <?= form_error('padukuhan_pertanyaan', '<small class="text-danger pl-1">', '</small>'); ?>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="row">
                                            <div class="col">
                                                 <div class="form-group">
                                                      <label for="pertanyaan">Pertanyaan</label>
                                                      <textarea type="text" class="form-control" id="pertanyaan" name="pertanyaan"><?= set_value('pertanyaan'); ?></textarea>
                                                      <?= form_error('pertanyaan', '<small class="text-danger pl-1">', '</small>'); ?>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="row">
                                            <div class="col">
                                                 <div class="form-group">
                                                      <label for="skor_pertanyaan">Skor</label>
                                                      <input type="number" class="form-control" id="skor_pertanyaan" name="skor_pertanyaan" value="<?= set_value('skor_pertanyaan'); ?>">
                                                      <?= form_error('skor_pertanyaan', '<small class="text-danger pl-1">', '</small>'); ?>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="modal-footer mt-3">
                                            <button class="col-auto ml-auto btn btn-primary btn-sm" id="btnAddpertanyaan" type="submit"><i class="fas fa-save"></i>&nbsp Save</button>
                                       </div>
                                  </form>
                             </div>
                        </div>
                        <!-- end form tambah pertanyaan -->
                        <!-- form ubah pertanyaan -->
                        <div class="card shadow mb-4" id="form-ubah-pertanyaan" style="display: none">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary" id="titleFormActionpertanyaan">Ubah Pertanyaan</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <form action="<?= base_url('manajemen_data/update_pertanyaan'); ?>" method="post">
                                       <div class="row">
                                            <div class="col-auto">
                                                 <div class="form-group">
                                                      <div class="form-group">
                                                           <label for="ubah_tanggal_pertanyaan">Tanggal Survey</label>
                                                           <input type="date" class="form-control" name="ubah_tanggal_pertanyaan" id="ubah_tanggal_pertanyaan" value="<?= set_value("ubah_tanggal_pertanyaan"); ?>">
                                                           <?= form_error('ubah_tanggal_pertanyaan', '<small class="text-danger pl-1">', '</small>'); ?>
                                                      </div>
                                                 </div>
                                            </div>
                                            <div class="col-auto">
                                                 <div class="form-group">
                                                      <label for="ubah_surveyor_pertanyaan">Surveyor</label>
                                                      <select class="form-control" id="ubah_surveyor_pertanyaan" name="ubah_surveyor_pertanyaan">
                                                           <option value="">Pilih surveyor</option>
                                                           <?php foreach ($surveyor as $s) : ?>
                                                                <option value="<?= $s['id']; ?>" <?= set_select("ubah_surveyor_pertanyaan", $s['id']); ?>><?= $s['name']; ?></option>
                                                           <?php endforeach; ?>
                                                      </select>
                                                      <?= form_error('ubah_surveyor_pertanyaan', '<small class="text-danger pl-1">', '</small>'); ?>
                                                 </div>
                                            </div>
                                            <div class="col-auto">
                                                 <div class="form-group">
                                                      <input type="hidden" id="idUpdatePertanyaan" name="update_id_pertanyaan" value="">
                                                      <label for="kategori_pertanyaan">Kategori</label>
                                                      <select class="form-control" id="updateKategoriPertanyaan" name="update_kategori_pertanyaan">
                                                           <option value="">Pilih Kategori</option>
                                                           <?php foreach ($kategori as $kat) : ?>
                                                                <option value="<?= $kat['id_kategori']; ?>" <?= set_select("update_kategori_pertanyaan", $kat['nama_kategori']); ?>><?= $kat['nama_kategori']; ?></option>
                                                           <?php endforeach; ?>
                                                      </select>
                                                      <?= form_error('update_kategori_pertanyaan', '<small class="text-danger pl-1 error_update_pertanyaan" value="1">', '</small>'); ?>
                                                 </div>
                                            </div>
                                            <div class="col-auto">
                                                 <div class="form-group">
                                                      <label for="indikator_pertanyaan">Indikator</label>
                                                      <select class="form-control" id="updateIndikatorPertanyaan" name="update_indikator_pertanyaan">
                                                           <option value="">Pilih indikator</option>
                                                           <?php foreach ($indikator as $i) : ?>
                                                                <option value="<?= $i['id_indikator']; ?>" <?= set_select("update_indikator_pertanyaan", $i['id_indikator']); ?>><?= $i['nama_indikator']; ?></option>
                                                           <?php endforeach; ?>
                                                      </select>
                                                      <?= form_error('update_indikator_pertanyaan', '<small class="text-danger pl-1 error_update_pertanyaan" value="1">', '</small>'); ?>
                                                 </div>
                                            </div>
                                            <div class="col-auto">
                                                 <div class="form-group">
                                                      <label for="padukuhan_pertanyaan">Padukuhan</label>
                                                      <select class="form-control" id="updatePadukuhanPertanyaan" name="update_padukuhan_pertanyaan">
                                                           <option value="">Pilih Padukuhan</option>
                                                           <?php foreach ($padukuhan as $pad) : ?>
                                                                <option value="<?= $pad['id_padukuhan']; ?>" <?= set_select("update_padukuhan_pertanyaan", $pad['nama_padukuhan']); ?>><?= $pad['nama_padukuhan']; ?></option>
                                                           <?php endforeach; ?>
                                                      </select>
                                                      <?= form_error('update_padukuhan_pertanyaan', '<small class="text-danger pl-1 error_update_pertanyaan" value="1">', '</small>'); ?>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="row">
                                            <div class="col">
                                                 <div class="form-group">
                                                      <label for="ubah_pertanyaan">Pertanyaan</label>
                                                      <textarea type="text" class="form-control" id="updatePertannyaan" name="update_pertanyaan"><?= set_value('update_pertanyaan'); ?></textarea>
                                                      <?= form_error('update_pertanyaan', '<small class="text-danger pl-1 error_update_pertanyaan" value="1">', '</small>'); ?>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="row">
                                            <div class="col">
                                                 <div class="form-group">
                                                      <label for="ubah_skor_pertanyaan">Skor</label>
                                                      <input type="number" class="form-control" id="updateSkor" name="update_skor_pertanyaan" value="<?= set_value('update_skor_pertanyaan'); ?>">
                                                      <?= form_error('update_skor_pertanyaan', '<small class="text-danger pl-1 error_update_pertanyaan" value="1">', '</small>'); ?>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="modal-footer mt-3">
                                            <button class="col-auto ml-auto btn btn-primary btn-sm" id="btnUpdatePertanyaan" type="submit"><i class="fas fa-save"></i>&nbsp Save</button>
                                       </div>
                                  </form>
                             </div>
                        </div>
                        <!-- end form ubah pertanyaan -->
                        <div class="card shadow mb-4">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary">Data Pertanyaan</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <div class="table-responsive">
                                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                 <tr>
                                                      <td>No</td>
                                                      <td>Tanggal Survey</td>
                                                      <td>Surveyor</td>
                                                      <td>Pertanyaan</td>
                                                      <td>Kategori</td>
                                                      <td>Indikator</td>
                                                      <td>Padukuhan</td>
                                                      <td>Skor</td>
                                                      <td>Aksi</td>
                                                 </tr>
                                            </thead>
                                            <tbody>
                                                 <?php $i = 1; ?>
                                                 <?php foreach ($data_pertanyaan as $dp) : ?>
                                                      <tr>
                                                           <td><?= $i++ ?></td>
                                                           <td><?= date('d F Y', strtotime($dp['tanggal'])); ?></td>
                                                           <td><?= $dp['surveyor']; ?></td>
                                                           <td><?= $dp['pertanyaan']; ?></td>
                                                           <td><?= $dp['kategori']; ?></td>
                                                           <td><?= $dp['indikator']; ?></td>
                                                           <td><?= $dp['padukuhan']; ?></td>
                                                           <td><?= $dp['skor']; ?></td>
                                                           <td>
                                                                <a href="#" class="btn btn-warning btn-sm mb-1 btnUbahPertanyaan" id="btnUbahPertanyaan" data-toggle="modal" data-id-pertanyaan="<?= $dp['id_pertanyaan']; ?>" data-tanggal-pertanyaan="<?= $dp['tanggal']; ?>" data-surveyor="<?= $dp['id_surveyor']; ?>" data-pertanyaan="<?= $dp['pertanyaan']; ?>" data-id-kategori="<?= $dp['id_kategori']; ?>" data-id-indikator="<?= $dp['id_indikator']; ?>" data-id-padukuhan="<?= $dp['id_padukuhan']; ?>" data-skor="<?= $dp['skor']; ?>"> <i class="fas fa-edit"></i>&nbsp Ubah</a>
                                                                <a href="#" class="btn btn-danger btn-sm mb-1 btnHapusPertanyaan" id="btnHapusPertanyaan" data-toggle="modal" data-target="#modalHapuspertanyaan" data-id-pertanyaan="<?= $dp['id_pertanyaan']; ?>"> <i class="fas fa-trash"></i>&nbsp Hapus</a>
                                                           </td>
                                                      </tr>
                                                 <?php endforeach; ?>
                                            </tbody>
                                  </div>
                             </div>
                        </div>

                        <!-- Modal Hapus Pertanyaan -->
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
                                                 <input name="id_pertanyaan" id="id_pertanyaan" type="hidden" value="id">
                                            </div>
                                            <div class="modal-footer">
                                                 <button type="submit" class="btn btn-danger">Delete</button>
                                                 <button type="button" class="btn btn-secondary closeHapusPertanyaan" data-dismiss="modal">Close</button>
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