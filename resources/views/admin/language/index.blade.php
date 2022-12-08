@extends('admin.layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                <h4 class="page-title">Dil Məlumatları</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{'/admin/home'}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dil Məlumatları</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-3">
                <div class="d-flex no-block justify-content-end">
                    <a class="btn btn-primary" href="{{url('admin/language/create')}}"> <i class="fa fa-plus-circle"></i><b>
                            Yeni dil əlavə et </b> </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>İdentifikasiya<br>nömrəsi</b></th>
                                        <th><b>Şəkil</b></th>
                                        <th><b>Dil</b></th>
                                        <th><b>Qısa ad</b></th>
                                        <th><b>Status</b></th>
                                        <th><b>Əməliyyatlar</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($languages)) {
                                $counter = 0;
                                foreach ($languages as $language) {
                                $counter++;
                                ?>
                                <tr>
                                    <td>{{$counter}}</td>
                                    <td>{{$language->id}}</td>
                                    <td>
                                        <img width="50" src="{{url('assets/uploads/'.$language->image)}}" alt="logo">
                                        <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{url('assets/uploads/'.$language->image)}}">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </td>
                                    <td>{{$language->name}} </td>
                                    <td>{{$language->shortname}} </td>
                                    <td>{{$language->status->name}} </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti-settings"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{url('admin/language/edit/'.$language->id)}}"><i
                                                        class="fa fa-edit"></i>Redaktə et</a>

                                                <?php
                                                if (count($languages)>1) {
                                                ?>
                                                    <div class="dropdown-divider"></div>
                                                    <form class="form" action="{{url('admin/language/'.$language->id)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit"
                                                                onclick="return confirm('Dili sistemdən silməyə əminsiniz?')"
                                                                class="dropdown-item"><i
                                                                class="fa fa-trash"></i> Sil
                                                        </button>
                                                    </form>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                <?php
                                }
                                }
                                ?>
                                <tfoot>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>İdentifikasiya<br>nömrəsi</b></th>
                                        <th><b>Şəkil</b></th>
                                        <th><b>Dil</b></th>
                                        <th><b>Qısa ad</b></th>
                                        <th><b>Status</b></th>
                                        <th><b>Əməliyyatlar</b></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
