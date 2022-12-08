@extends('admin.layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div style="float: left;" class="col-5 align-self-center">
                <h4 class="page-title">Slaydlar</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{url('/admin/slide')}}">Slaydlar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dəyişiklik et</li>
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
                        <form class="form needs-validation" novalidate="" action="{{url('admin/slide/'.$slide->id.'/update/'.$language_id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row align-items-center">
                                <label class="control-label col-form-label col-2">Başlıq</label>
                                <div class="col-8 border-left pb-2 pt-2">
                                    <input required type="text" class="form-control" id="title" name="title" required
                                           placeholder="Başlıq"
                                           value="{{ $slide_text ? $slide_text->title : '' }}">
                                    <div class="invalid-feedback">
                                        Doldurulmalıdır
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label class="control-label col-form-label col-2">Mətn</label>
                                <div class="col-8 border-left pb-2 pt-2">
                                    <textarea required name="text"
                                            id="elm1"> {{$slide_text ? $slide_text->text : ''}}</textarea>
                                    <div class="invalid-feedback">
                                        Doldurulmalıdır
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions text-center mt-3">
                                <button type="submit" class="btn btn-success"><i
                                        class="fa fa-check"></i> Yadda Saxla
                                </button>
                                <a class="btn btn-outline-dark" role="button"
                                   href="{{url('admin/slide')}}">Geriyə</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
