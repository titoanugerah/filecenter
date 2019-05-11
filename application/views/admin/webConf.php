<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card card-nav-tabs card-plain">
        <div class="card-header card-header-success">
          <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#email" data-toggle="tab">
                    <i class="material-icons">web</i>
                    Identitas Website
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#wallpaper" data-toggle="tab">
                    <i class="material-icons">image</i>
                    Wallpaper Halaman Utama
                  </a>
                </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body ">
            <div class="tab-content text-justify">
              <div class="tab-pane active" id="email">
                <div class="alert alert-warning alert-with-icon" data-notify="container">
                  Pada tab ini, digunakan untuk mengkonfigurasi identtitas website
                </div>

                <div class="card-body">
                  <form method="post">
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>Nama Website</label>
                          <input type="text" name="web_name" class="form-control" placeholder="Masukan nama project" value="<?php echo $content['config']->web_name; ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6 pl-1">
                        <div class="form-group">
                          <label>Nama Client</label>
                          <input type="text" name="client_name" class="form-control" placeholder="Masukan nama klien" value="<?php echo $content['config']->client_name?>" required>
                        </div>
                      </div>
                    </div>

                    
                    <div class="button-container">
                      <button type="submit" name="updateEmail" value="updateEmail" class="btn btn-primary">Simpan Data</button>
                      <button type="submit" name="testMail" value="testMail" class="btn btn-purple" onclick="demo.showNotification('top','center')">Test Email</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="tab-pane" id="wallpaper">
                <div class="alert alert-warning alert-with-icon" data-notify="container">
                  Pada tab ini, digunakan untuk mengubah wallpaper login SISTA
                </div>
                <div class="card-body">
                  <img src="<?php echo base_url('assets/upload/'.$content['config']->login_image); ?>" style="width: auto !important;height: auto !important;max-width: 100%;">
                </div>
                <form class=""  method="post">
                  <button type="submit" name="resetWallpaper" value="resetWallpaper" class="btn btn-warning">Pasang Foto Default</button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Foto</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form  method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Silahkan upload foto dengan format jpg</p>
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
          <button type="submit" class="btn btn-warning" name="updateWallpaper" value="updateWallpaper">Upload</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
  </div>
</div>
