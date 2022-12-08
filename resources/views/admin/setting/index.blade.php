@extends('admin.layouts.template')
@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                <h4 class="page-title">Tənzimləmələr</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page">Tənzimləmələr</li>
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
                            <table id="table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><b>Loqo</b></th>
                                        <th><b>Telefon</b></th>
                                        <th><b>Email</b></th>
                                        <th><b>Instagram</b></th>
                                        <th><b>Facebook</b></th>
                                        <th><b>Whatsapp</b></th>
                                        <th><b>Ünvan</b></th>
                                        <th><b>Əməliyyatlar</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
{{--                                        <td><img width="100" src="{{url('assets/uploads/'.$setting->logo)}}" alt="logo"></td>--}}
                                        <td>{{$setting->phone}}</td>
                                        <td>{{$setting->email}}</td>
                                        <td>{{$setting->instagram}}</td>
                                        <td>{{$setting->facebook}}</td>
                                        <td>{{$setting->whatsapp}}</td>
{{--                                        <td>{{$setting->text->where('language_id', 1)[0]->address}}</td>--}}
                                        <td style="text-align: center; vertical-align: middle;">
                                            {{--<a href="#"><input class="fa fa-trash-o"  type="image" src="{{url('assets/images/delete.png')}}" alt="Submit" width="20" height="20"></a>--}}
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti-settings"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{url('/admin/setting/'.$setting->id.'/edit')}}"><i
                                                            class="ti-pencil"></i> Düzəliş et</a>
                                                    <div class="dropdown-divider"></div>
                                                    @foreach ($languages as $language)
                                                        <a style="margin: 0 15px;"
                                                           href="{{url('admin/setting/'.$setting->id.'/edit/'.$language->id)}}"><input
                                                                type="image"
                                                                src="{{url('assets/uploads/'.$language->image)}}"
                                                                alt="Submit" width="20" height="20"></a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
