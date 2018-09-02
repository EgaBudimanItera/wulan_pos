<!-- Rooms -->
<section class="parallax-effect" tabindex="5000" style="overflow: hidden; outline: none;">
  <div id="parallax-pagetitle" style="background-image: url(); background-position: 50% -67px;">
    <div class="color-overlay"> 
      <!-- Page title -->
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb">
              <li>&nbsp;</li>
              <li>&nbsp;</li>
            </ol>
            <h1><i class="fa fa-user"></i> Form Login Pelanggan</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
<section class="rooms mt100">
  <div class="container">
    <div class="row room-list fadeIn appear"> 
      <div class="col-md-6">
        <form class="clearfix" role="form" method="post" action="<?=base_url()?>front/authpelanggan">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="form-group">
                  <label for="subject" accesskey="S">Nama User Pelanggan</label>
                  <input name="namauser" type="text" value="" class="form-control" style="color:black" />
                </div>
                <div class="form-group">
                  <label for="subject" accesskey="S">Password User Pelanggan</label>
                  <input name="password" type="password" value="" class="form-control" style="color:black" />
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn  btn-lg btn-primary">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>