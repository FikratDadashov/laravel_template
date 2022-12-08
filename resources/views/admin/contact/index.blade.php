@extends('admin.layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                <h4 class="page-title">Əlaqə məlumatları</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{'/admin/home'}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Əlaqə məlumatları</li>
                        </ol>
                    </nav>
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
                                        <th><b>Mobil nömrə</b></th>
                                        <th><b>Facebook</b></th>
                                        <th><b>Instagram</b></th>
                                        <th><b>Email</b></th>
                                        <th><b>Əməliyyatlar</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($contact)) {
                                $counter = 0;
                                $counter++;
                                ?>
                                <tr>
                                    <td>{{$counter}}</td>
                                    <td>{{$contact->id}}</td>
                                    <td>{{$contact->mobile}} </td>
                                    <td>{{$contact->facebook}} </td>
                                    <td>{{$contact->instagram}} </td>
                                    <td>{{$contact->email}} </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti-settings"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{url('admin/contact/edit/'.$contact->id)}}"><i
                                                        class="fa fa-pencil-alt"></i>Redaktə et</a>
                                                <div class="dropdown-divider"></div>
                                                @foreach ($languages as $language)
                                                    <a class="dropdown-item"
                                                       href="{{url('/admin/contact/'.$contact->id.'/edit/'.$language->id)}}"><i
                                                            class="fa fa-flag"></i> {{$language->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                <tfoot>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>İdentifikasiya<br>nömrəsi</b></th>
                                        <th><b>Mobil nömrə</b></th>
                                        <th><b>Facebook</b></th>
                                        <th><b>Instagram</b></th>
                                        <th><b>Email</b></th>
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
