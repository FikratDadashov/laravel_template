@extends('admin.layouts.template')
@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                <h4 class="page-title">Kontent</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page">Kontent
                            </li>
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
                                    <th><b>Mətn</b></th>
                                    <th><b>Əməliyyatlar</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($contents)) {
                                $counter = 0;
                                foreach ($contents as $content) {
                                $text = $content->text->where('language_id', $default_language->id);
                                $counter++;
                                ?>
                                <tr>
                                    <td><?php echo count($text)>0 ? $text->first()->text : '' ?></td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti-settings"></i>
                                            </button>
                                            <div class="dropdown-menu">
{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{url('/admin/content/'.$content->id.'/edit')}}"><i--}}
{{--                                                        class="ti-pencil"></i> Düzəliş et</a>--}}
{{--                                                <div class="dropdown-divider"></div>--}}
                                                @foreach ($languages as $language)
                                                    <a style="margin: 0 15px;"
                                                       href="{{url('admin/content/'.$content->id.'/edit/'.$language->id)}}"><input
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
