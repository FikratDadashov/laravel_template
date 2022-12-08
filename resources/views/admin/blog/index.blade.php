@extends('admin.layouts.template')
@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                <h4 class="page-title">Bloglar</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page">Bloglar
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-3">
                <div class="d-flex no-block justify-content-end">
                    <a class="btn btn-primary" href="{{url('admin/blog/create')}}"> <i
                            class="fa fa-plus-circle"></i><b>
                            Yeni blog əlavə et </b> </a>
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
                            <table id="zero_config" class="table table-striped table-bordered" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th><b>İdentifikasiya<br>nömrəsi</b></th>
                                    <th><b>Şəkil</b></th>
                                    <th><b>Başlıq</b></th>
                                    <th><b>Status</b></th>
                                    <th><b>Əməliyyatlar</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($blogs)) {
                                $counter = 0;
                                foreach ($blogs as $blog) {
                                $blog_text = $blog->text->where('language_id', $setting->default_language_id);
                                $counter++;
                                ?>
                                <tr>
                                    <td>{{$counter}}</td>
                                    <td>{{$blog->id}}</td>
                                    <td><img width="50" src="{{url('assets/uploads/'.$blog->image)}}"
                                             alt="image">
                                        <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{url('assets/uploads/'.$blog->image)}}"><i class="icon-magnifier"></i></a>
                                    </td>
                                    <td>{{(count($blog_text)>0 ? $blog_text->first()->title : '')}}</td>
                                    <td>{{$blog->status->name}}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti-settings"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                   href="{{url('/admin/blog/'.$blog->id.'/edit')}}"><i
                                                        class="fa fa-pencil-alt"></i> Düzəliş et</a>
                                                <div class="dropdown-divider"></div>
                                                @foreach ($languages as $language)
                                                    <a class="dropdown-item"
                                                       href="{{url('/admin/blog/'.$blog->id.'/edit/'.$language->id)}}"><i
                                                            class="fa fa-flag"></i> {{$language->name}} </a>
                                                @endforeach
                                                <div class="dropdown-divider"></div>
                                                <form class="form" action="{{url('admin/blog/'.$blog->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                            onclick="return confirm('Blogu silməyə əminsiniz?')"
                                                            class="dropdown-item"><i
                                                            class="fa fa-trash"></i>Sil
                                                    </button>
                                                </form>
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
                                        <th><b>Başlıq</b></th>
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
