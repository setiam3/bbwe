<aside class="main-sidebar" style="background-color: #212121">
    <section class="sidebar">
        <div class="togle"><i class="fa"></i></div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form" >
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." style="background-color: #131313; color: white"/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <div class="" style="padding: 10px">
            
            </div>
        <!-- /.search form -->
        <ul class="sidebar-menu" role="tablist" id="v-pills-tab">
            <li class="">
                <a href="#" role="tab" data-toggle="pill">
                <span style="font-size: x-large;">Group</span>
                    <span style="background: none;" class="badge" data-toggle="modal" data-target=".bs-example-modal" href="#">
                        <i class="fas fa-plus-circle" style="font-size: 18px"></i>
                    </span>

                </a>
            </li>
            <li class="">
                <a href="#v-pills-home" role="tab" id="v-pills-home-tab" data-toggle="pill" class="">
                    <i class="fas fa-list-ul"></i>
                    <span>Group Title Name</span>
                    <span class="badge badge-light">2</span>
                </a>
            </li>
            <li>
                <a id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab">
                    <i class="fas fa-list-ul"></i>
                    <span>Group Title Name 1</span>
                    <span class="badge badge-light">4</span>
                </a>
            </li>
            <li>
                <a href="#v-pills-messages" id="v-pills-messages-tab" data-toggle="pill" role="tab">
                    <i class="fas fa-list-ul"></i>
                    <span>Group Title Name 2</span>
                    <span class="badge badge-light">8</span>
                </a>
            </li>
        </ul>
        <div class="">
            <ul class="sidebar-menu" style="position: absolute;bottom: 0;">
                <li>
                    <a href="#" style="width: 230px">
                        <i class="fas fa-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>
</aside>

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: #222222;color: white;padding:15px;border-radius: 5px">
      <div class="row">
          <div class="col-md-2">
             <i class="fas fa-users img-circle"></i>
             <div class="" style="width: 10px;position: absolute;bottom: 0;right: 0;font-size: 10px">
                 <i class="fas fa-camera"></i>
             </div>
          </div>
          <div class="col-md-10">
            <form action="#" method="post" class="sidebar-form" >
            <div class="input-group col-md-10">
                <input type="text" name="group-name" class="form-control" placeholder="New Group" style="background-color: #131313; color: white"/>
            </div>
            </form>
        </div>
      </div>
      <div>
          Member <a href="#" ><i class="fas fa-plus-circle"></i></a>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
    .img-circle{
      padding: 14px;
        font-size: 40px !important;
        background: #fff;
        color: black;
        border-radius: 100px;
    }
    .skin-black .sidebar-form{
        border: none;
    }
    aside .badge{
        position: absolute;right: 10px;
    }
</style>