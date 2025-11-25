  <div class="container" style="padding-left:1.4%;padding-right:1.4%;">
         <div class="align-items-center py-0 px-xl-1 d-lg-flex" style="border:1px solid rgba(0,0,0,.9);background:#a6a876;">
              <div class="col-lg-3 col-md-4">
                <a href="" class="text-decoration-none">
                    <span class="h4 text-uppercase text-primary bg-dark px-1">Rhonds</span>
                    <span class="h4 text-uppercase text-dark bg-primary px-1 ml-n1">COMPANY</span>
                </a>

            </div>

              <div class="col-lg-4 col-md-7">
                 <div class="email-address_no">
                    <a href="mailto:info@rhonds.co.tz">
                      <i class="fa fa-envelope" style="color:#f90678;"></i><b style="color:#6C5603;">  info@palatialtours.com</b></a>
                       <a href="https://wa.me/+255655633302" style="padding-left:10px">
                            <img src="../../../images/whatsapp.png" alt="" style="width:20px; height:20px;">
                               <b style="color:#6C5603;">(+255)753 216 263 k</b>
                            </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-8 text-left">
                      <form  method="post"  action="#" enctype="multipart/form-data">
                                  @csrf
                    <div class="input-group">
                        <input type="text" class="form-control form--control" name="search" placeholder="search any keyword" required="">
                        <div class="input-group-append">
                            <button class="input-group-text bg-transparent" style="color:#048023 !important">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-2 col-6 text-right">
              <div class="d-flex align-items-center justify-content-end float-right">
          @forelse($social_icons as $item)
                      <a href="{{ $item->data_values->url }}" class="btn btn-primary btn-square mr-2">
                          @php echo @$item->data_values->social_icon @endphp
                      </a>
              @empty
              @endforelse
            </div>
        </div>
        </div>
    </div>
