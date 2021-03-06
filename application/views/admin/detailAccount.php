<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <form method="post">

          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" value="<?php echo "@".$content['account']->username; ?>" disabled>
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" value="<?php echo $content['account']->fullname; ?>" disabled>
              </div>
            </div>

          </div>


        <div class="button-container">
          <a href="<?php echo base_url('account'); ?>"><button type="button" class="btn btn-grey">Kembali</button></a>
          <button type="submit" class="btn btn-info" name="resetPassword" value="resetPassword">Reset password</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Hapus Akun</button>
        </div>
      </form>
    </div>
  </div>

  </div>
  <div class="col-md-4">
      <div class="card card-user">
        <div class="image">
          <img src="<?php echo base_url('./assets/upload/'.$content['account']->display_picture); ?>"  style="width: auto !important;height: auto !important;max-width: 100%;">
        </div>
        <div class="card-body">
          <center>
          <h5 ><?php echo $content['account']->fullname; ?></h5>
          <h6><?php echo "@".$content['account']->username ?></h6>
        </center>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form  method="post">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Akun ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apabila anda sudah yakin menghapus akun ini? silahkan lanjutkan dengan memasukan password akun anda</p>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Masukan password akun anda" value=""  required>
          </div>
        </div>

        <div class="modal-footer modal-danger">
          <button type="submit" class="btn btn-danger" name="deleteAccount" value="deleteAccount">Hapus Akun</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
  </div>
</div>
