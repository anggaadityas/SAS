@extends('admin.layouts.template')


@section('content')


    @if(empty($datajob[0]->kode_detail_job))


     <div class="col-md-4 col-lg-offset-4">
            <button class="btn btn-block generateKode" data-id ="{{ $datajob[0]->nomor_kontrak }}">Generate code</button>
        </div>

    @else

        <div class="row">
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 style="text-transform: uppercase;">input data list pekerjaan</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"></a>
                            <li><a class="collapse-link"></a>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form class="form-horizontal" method="post" action = "{{ url('addlistjobproses') }}">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name ="txt_title" class="form-control" id="inputEmail3" placeholder="nama list pekerjaan" required>
                                    <input type="hidden" name ="txt_kode" class="form-control" id="inputEmail3" value="{{ $datajob[0]->kode_detail_job }}">
                                    <input type="hidden" name ="_token" class="form-control" id="inputEmail3" value="{{ csrf_token() }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Tugas</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name = "txt_tugas" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Tanggung Jawab</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name = "txt_tanggungJawab" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name = "addJob" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="add list job"><span class="fa fa-fw fa-plus"></span></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 style="text-transform: uppercase;">list job </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"></a>
                            <li><a class="collapse-link"></a>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <table class="table table-striped">
                            <thead>
                            <th>title</th>
                            <th>tugas</th>
                            <th>tanggung jawab</th>
                            <th>#</th>
                            </thead>
                            <tbody>

                        @foreach($listjob as $ljob)

                                <tr>
                                    <td>{{ $ljob->nama_job }}</td>
                                    <td>{{ $ljob->deskripsi_job }}</td>
                                    <td>{{ $ljob->keterangan }}</td>
                                    <td><a href="/SAS/destroylistjob/{{ $ljob->id }}" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="delete a job"><span class="fa fa-fw fa-trash"></span></button></a></td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".modal-psikolog">finish
                        </button>
                    </div>
                </div>

            </div>
        </div>

    @endif

@endsection