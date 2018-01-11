@extends('admin.layouts.template')


@section('content')


<div class="x_panel">
    <div class="x_title">
        <h2>Data Perusahaan</h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">

            <div class="col-md-12">
                

                <br/>

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Perusahaan Lama</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Perusahaan <small>Baru</small> <span class="label label-success"> 0 </span></a>
                        </li>
                    </ul>

                    <div id="myTabContent" class="tab-content">
                      



                        <div role="tabpanel" class="tab-pane active fade in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                                <div class="table-responsive">
                                   

                                     <table id="datatable-checkbox listcompanyold" class="table table-striped table-bordered bulk_action listcompanyold">
          <thead>
            <tr>
              
              <th>Nama Perusahaan </th>
              <th>Kebutuhan </th>
              <th>Jenis Pekerjaan </th>
              <th>Detail Request</th>    
              <th>Add Karyawan </th>        
              <th>List Pekerjaan</th>
            </tr>
          </thead>
        </table>



                                </div>
                            </ul>
                            <!-- end recent activity -->

                        </div>




                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                      
                            <ul class="messages">
                                <div class="table-responsive">

                                                <table id="datatable-checkbox listcompanynew" class="table table-striped table-bordered bulk_action listcompanynew">
          <thead>
            <tr>
              
              <th>Nama Perusahaan </th>
              <th>Cp </th>
              <th>Handphone </th>
              <th>Email</th>    
              <th>Kebutuhan </th>        
              <th>Jenis Pekerjaan</th>
              <th>Bergabung Sejak</th>
              <th>Action</th>
              
            </tr>
          </thead>
        </table>


                                </div>
                            </ul>
                                

                            <!-- end user projects -->

                        </div>
                       

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>





@endsection