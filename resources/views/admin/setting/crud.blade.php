@extends('admin.layouts.template')
@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                <h4 class="page-title">Tənzimləmələr</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page">Tənzimləmələr</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @if($operation == 'edit_text')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form needs-validation" novalidate="" action="{{url('admin/setting/'.$setting->id.'/update/'.$setting_text->language_id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <h4 class="card-title"></h4>

                                <div class="form-group row align-items-center mb-0">
                                    <label for="address"
                                           class="col-sm-3 col-md-2 control-label col-form-label">Ünvan</label>
                                    <div class="col-9 border-left pb-2 pt-2">
                                        <input required type="text" class="form-control" id="address" name="address"
                                               placeholder="Ünvan" value="{{$setting_text->address}}">
                                        <div class="invalid-feedback">
                                            Doldurulmalıdır
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions text-center">
                                <button type="submit" class="btn btn-success">Yadda saxla</button>
                                <a class="btn btn-outline-dark" role="button"
                                   href="{{url('admin/setting')}}">Geriyə</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($operation == 'edit')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form needs-validation" novalidate="" action="{{url('admin/setting/'.$setting->id.'/update/')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <h4 class="card-title"></h4>

                                    <div class="form-group row align-items-center mb-0">
                                        <label for="phone"
                                               class="col-sm-3 col-md-2 control-label col-form-label">Telefon nömrəsi</label>
                                        <div class="col-9 border-left pb-2 pt-2">
                                            <textarea required type="text" class="form-control" id="phone" name="phone"
                                                      placeholder="Mobil nömrə">
                                                {{$setting->phone}}
                                            </textarea>
                                            <div class="invalid-feedback">
                                                Doldurulmalıdır
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center mb-0">
                                        <label for="telephone"
                                               class="col-sm-3 col-md-2 control-label col-form-label">Şəhər nömrəsi</label>
                                        <div class="col-9 border-left pb-2 pt-2">
                                            <input required type="text" class="form-control" id="telephone" name="telephone"
                                                   placeholder="Şəhər nömrəsi" value="{{$setting->telephone}}">
                                            <div class="invalid-feedback">
                                                Doldurulmalıdır
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center mb-0">
                                        <label for="instagram"
                                               class="col-sm-3 col-md-2 control-label col-form-label">İnstagram addresi</label>
                                        <div class="col-9 border-left pb-2 pt-2">
                                            <input required type="text" class="form-control" id="instagram" name="instagram"
                                                   placeholder="İnstagram" value="{{$setting->instagram}}">
                                            <div class="invalid-feedback">
                                                Doldurulmalıdır
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center mb-0">
                                        <label for="facebook"
                                               class="col-sm-3 col-md-2 control-label col-form-label">Facebook addresi</label>
                                        <div class="col-9 border-left pb-2 pt-2">
                                            <input required type="text" class="form-control" id="facebook" name="facebook"
                                                   placeholder="Facebook" value="{{$setting->facebook}}">
                                            <div class="invalid-feedback">
                                                Doldurulmalıdır
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center mb-0">
                                        <label for="whatsapp"
                                               class="col-sm-3 col-md-2 control-label col-form-label">Whatsapp</label>
                                        <div class="col-9 border-left pb-2 pt-2">
                                            <input required type="text" class="form-control" id="whatsapp" name="whatsapp"
                                                   placeholder="Whatsapp" value="{{$setting->whatsapp}}">
                                            <div class="invalid-feedback">
                                                Doldurulmalıdır
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center mb-0">
                                        <label for="email"
                                               class="col-sm-3 col-md-2 control-label col-form-label">Email addresi</label>
                                        <div class="col-9 border-left pb-2 pt-2">
                                            <input required type="email" class="form-control" id="email" name="email"
                                                   placeholder="Email" value="{{$setting->email}}">
                                            <div class="invalid-feedback">
                                                Doldurulmalıdır
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center mb-0">
                                        <label for="image"
                                               class="col-sm-3 col-md-2 control-label col-form-label">Loqonu dəyiş</label>
                                        <div class="col-9 border-left pb-2 pt-2">
                                            <img src="{{url('assets/uploads/'.$setting->logo)}}" alt="logo">
                                                <input name="image" type="file" class="upload">
{{--                                            <div class="invalid-feedback">--}}
{{--                                                Doldurulmalıdır--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions text-center">
                                    <button type="submit" class="btn btn-success">Yadda saxla</button>
                                    <a class="btn btn-outline-dark" role="button"
                                       href="{{url('admin/setting')}}">Geriyə</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
