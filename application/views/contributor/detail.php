    <div class="card">
      <div class="card-body">
        <form method="post">
          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <label>Nama Dokumen</label>
                <input type="text" class="form-control" name="document_name" value="<?php echo $content['detail']->document_name; ?>" >
              </div>
            </div>
            <div class="col-md-8 pl-1">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="document_info" value="<?php echo $content['detail']->document_info; ?>" >
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label>Tanggal Update</label>
                <input type="text" class="form-control" value="<?php echo $content['detail']->upload_date; ?>" >
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label>Kontributor</label>
                <input type="text" class="form-control" value="<?php echo $content['detail']->fullname; ?>" >
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label>Revisi</label>
                <input type="text" class="form-control" value="<?php echo '1'; ?>" >
              </div>
            </div>
          </div>
        <div class="button-container">
          <button type="submit" class="btn btn-info" name="updateDocument" value="updateDocument">Update Dokumen</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Hapus Dokumen</button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal1">Upload Revisi</button>
          <a href="<?php echo base_url('download/'.$content['detail']->id); ?>"><button type="button" class="btn btn-info">Download</button></a>
          <a href="<?php echo base_url('document'); ?>"><button type="button" class="btn btn-grey">Kembali</button></a>
        </div>
      </form>
    </div>
  </div>

  </div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form  method="post">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Dokumen ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apabila anda sudah yakin menghapus dokumen ini? silahkan lanjutkan dengan memasukan password akun anda</p>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Masukan password akun anda" value=""  required>
          </div>
        </div>

        <div class="modal-footer modal-danger">
          <button type="submit" class="btn btn-danger" name="deleteDocument" value="deleteDocument">Hapus Akun</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form  method="post" enctype="multipart/form-data">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Revisi Dokumen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="md-form">
            <div class="file-field">
              <div class="btn btn-primary btn-sm float-left">
                <span>Choose file</span>
                <input type="file" name="fileUpload">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer modal-danger">
          <button type="submit" class="btn btn-warning" name="uploadDocument" value="uploadDocument">Upload Dokumen</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
  </div>
</div>
