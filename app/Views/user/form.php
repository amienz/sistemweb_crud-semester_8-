    <!-- mdb -->
    <script type="text/javascript" src="<?= base_url('bootstrap-5/js/admin.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('bootstrap-5/js/mdb.min.js'); ?>"></script>
    <!-- sweet alert -->
    <script type="text/javascript" src="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.js'); ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Modal -->
<div class="modal fade" id="anggotamodal" tabindex="-1" aria-labelledby="anggotamodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
        <form id="form" action="/user/insertAjax" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row mb-4">
                                <div class="col">                                   
                                    <label class="form-label" for="nd">Nama depan</label>
                                    <input type="text" id="nd" name="namadepan" class="form-control" />
                                    <div class="invalid-feedback" id="errornd"></div>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="nb">Nama belakang</label>
                                    <input type="text" id="nb" name="namabelakang" class="form-control" />
                                    <div class="invalid-feedback" id="errornb"></div>                                    
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="al">Alamat Rumah</label>
                                <textarea class="form-control" name="alamat" id="al" rows="4"></textarea>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <label class="form-label" for="tempatlahir">Tempat Lahir</label>
                                    <input type="text" id="tempatlahir" name="tempatlahir" class="form-control" />
                            </div>
                        <div class="col">
                            <label class="form-label" for="tanggallahir">Tanggal Lahir</label>
                            <input type="date" id="tanggallahir" name="tanggallahir" class="form-control" />
                        </div>
                        </div>
                        Jenis Kelamin : <div class="form-check form-check-inline mb-4 mx-3">
                            <input class="form-check-input" type="radio" name="jeniskelamin" id="flexRadioDefault1" value="laki-laki" checked />
                            <label class="form-check-label" for="flexRadioDefault1"> Laki-laki </label>
                        </div>
                        <div class="form-check form-check-inline mb-4 mx-3">
                            <input class="form-check-input" type="radio" name="jeniskelamin" id="flexRadioDefault2" value="perempuan" />
                            <label class="form-check-label" for="flexRadioDefault2"> Perempuan </label>
                        </div>
                        <div class=" mb-4">
                            <label class="form-label" for="tel">Telepon</label>
                            <input type="text" id="tel" name="telepon" class="form-control" />
                        </div>
                        <div class=" mb-4">
                            <label class="form-label" for="em">Email</label>
                            <input type="email" id="em" name="email" class="form-control" />
                            <div class="invalid-feedback" id="errorem"></div>
                        </div>
                        <div class=" mb-4">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" />
                        </div>
                        <div class=" mb-4">
                            <label class="form-label" for="pass">Password</label>
                            <input type="password" id="pass" name="password" class="form-control" />
                        </div>
                        Avatar : <div class="form-outline mb-4">
                            <input type="file" id="avatar" name="avatar" class="form-control" />
                        </div>

                    <button type="submit" id="submit" class="btn btn-primary mb-4">Tambah Data</button>

                        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.error) {
                        if (response.error.namadepan) {
                            $('#nd').addClass('is-invalid');
                            $('#errornd').html(response.error.namadepan);
                        } else {
                            $('#nd').removeClass('is-invalid');
                            $('#errornd').html('');
                        }

                        if (response.error.namabelakang) {
                            $('#nb').addClass('is-invalid');
                            $('#errornb').html(response.error.namabelakang);
                        } else {
                            $('#nb').removeClass('is-invalid');
                            $('#errornb').html('');
                        }
                    } else {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })

                        $('#anggotamodal').modal('hide');
                        tampilData();
                    }
                }
            });
        });
    });
</script>