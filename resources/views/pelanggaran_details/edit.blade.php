@extends('layouts.app')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                Edit Pelanggaran Detail
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>

            </div>
        </div>
    </div>
    <!-- end:: Subheader -->
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                @include('adminlte-templates::common.errors')
                <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                    <div class="kt-portlet__head kt-portlet__head--lg" style="">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Pelanggaran</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
							<a href="{{ route('pelanggaran.index') }}" class="btn btn-clean kt-margin-r-10">
								<i class="la la-arrow-left"></i>
								<span class="kt-hidden-mobile">Back</span>
							</a>
						</div>
                    </div>
                    <div class="kt-portlet__body">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td>Nama Siswa</td>
                                <td>:</td>
                                <td>{!! $pelanggaranDetail->bio_siswa->nama_lengkap !!}</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td>{!! $pelanggaranDetail->keterangan !!}</td>
                            </tr>
                            <tr>
                                <td>Total Score</td>
                                <td>:</td>
                                <td><b>{{$pelanggaranDetail->skor}}</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                    <div class="kt-portlet__head kt-portlet__head--lg" style="">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Pelanggaran Detail</h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <table class="table table-striped">
                            <thead>
                                <th>Tindakan</th>
                                <th>Catatan</th>
                                <th>Tanggal Pelanggaran</th>
                                <th>Poin</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($pelanggaranDetail->pelanggaranDetail as $item)
                                    <tr>
                                        <td>{{$item->tindakan->nama_tindakan}}</td>
                                        <td>{{$item->catatan}}</td>
                                        <td>{{$item->tgl_pelanggaran}}</td>
                                        <td>{{$item->poin}}</td>
                                        <td>
                                            <a href="#!" data-toggle="modal" data-target="#modalEdit" class="btn btn-warning"><i class="la la-edit"></i></a>
                                            <a href="#!" class="btn btn-danger"><i class="la la-trash-o"></i></a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                            <div class="modal-header">
                                                                    <h5 class="modal-title">Edit pelanggaran detail</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <form action="">
                                                                    <div class="form-group">
                                                                        <label for="">Pilih tindakan</label>
                                                                        <select name="tindakan_id" class="form-control">
                                                                            @foreach ($tindakan as $data)
                                                                                <option value="{{$data->id}}" {{$item->tindakan_id == $data->id ? "selected" : ""}}>{{$data->nama_tindakan}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
    <!-- end:: Content -->
</div>
@endsection
