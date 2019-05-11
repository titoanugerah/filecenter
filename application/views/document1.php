<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Upload Dokumen Baru</button>
        <button class="btn btn-info" data-toggle="modal" data-target="#myModal1">Pencarian</button>
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Nama Dokumen</th>
              <th class="text-center">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; foreach ($content['list'] as $item):  ?>
              <tr>
                <td class="text-center"><?php echo $i ?></td>
                <td class="text-center"><?php echo $item->document_name; ?></td>
                <td class="td-actions text-center">
                  <center>
                    <a href="<?php echo base_url('download/'.$item->id); ?>">
                      <button type="button" rel="tooltip" class="btn btn-success">
                        <i class="material-icons">archive</i>Download
                      </button>
                    </a>
                    <a href="<?php echo base_url('detail'.$this->session->userdata['role']).'/'.$item->id; ?>">
                      <button type="button" rel="tooltip" class="btn btn-info">
                        <i class="material-icons">import_contacts</i>Detail
                      </button>

                    </a>

                  </center>
                </td>
                <?php $i++; endforeach; ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form  method="post" enctype="multipart/form-data">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Dokumen Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Dokumen</label>
              <input type="text" name="document_name" class="form-control" placeholder="Masukan nama file" value="">
            </div>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Informasi</label>
              <input type="text" name="document_info" class="form-control" placeholder="Masukan Informasi" value="">
            </div>
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
            <button type="submit" class="btn btn-warning" name="uploadFile" value="uploadFile">Upload</button>
            <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form  method="post" >
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pencarian Dokumen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Dokumen</label>
              <input type="text" name="document_name" class="form-control" placeholder="Masukan nama file" value="">
            </div>
          </div>

          <div class="modal-footer modal-danger">
            <button type="submit" class="btn btn-warning" name="findFile" value="findFile">Cari</button>
            <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </form>
    </div>
  </div>
