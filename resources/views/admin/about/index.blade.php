@extends('admin.layouts.template')
@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                <h4 class="page-title">Haqqımızda</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page">Haqqımızda
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-3">
                <div class="d-flex no-block justify-content-end">
                    <a class="btn btn-primary" href="{{url('admin/about/create')}}"> <i
                            class="fa fa-plus-circle"></i><b>
                            Mətn əlavə et </b> </a>
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
                                    <th><b>Şəkil</b></th>
                                    <th><b>Mətn</b></th>
                                    <th><b>Əməliyyatlar</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if (isset($abouts)) {
                                    $counter = 0;
                                    foreach ($abouts as $about) {
                                    $text = $about->text->where('language_id', $default_language->id);
                                    $counter++;
                                ?>
                                <tr>
                                    <td><img width="100" src="{{url('assets/uploads/'.$about->image)}}" alt="image">
                                    </td>
                                    <td><?php echo (count($text)>0 ? $text->first()->text : '') ?></td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti-settings"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                   href="{{url('/admin/about/'.$about->id.'/edit')}}"><i
                                                        class="ti-pencil"></i> Düzəliş et</a>
                                                <a class="dropdown-item"
                                                   href="{{url('/admin/about/'.$about->id.'/delete')}}"><i
                                                        class="ti-trash"></i> Sil</a>
                                                <div class="dropdown-divider"></div>
                                                @foreach ($languages as $language)
                                                    <a style="margin: 0 15px;"
                                                       href="{{url('admin/about/'.$about->id.'/edit/'.$language->id)}}"><input
                                                            type="image"
                                                            src="{{url('assets/uploads/'.$language->image)}}"
                                                            alt="Submit" width="20" height="20"></a>
                                                @endforeach
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
                                    <th><b>Şəkil</b></th>
                                    <th><b>Metn</b></th>
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
