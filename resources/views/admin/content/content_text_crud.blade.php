@extends('admin.layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div style="float: left;" class="col-5 align-self-center">
                <h4 class="page-title">Kontent</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{url('/admin/content')}}">Kontent</a></li>
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
                        <form action="{{url('admin/content/'.$content->id.'/update/'.$language_id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row align-items-center">
                                <label class="control-label col-form-label col-2">Mətn</label>
                                <div class="col-8 border-left pb-2 pt-2">
                                    <input required type="text" name="text"
                                            value="{{$operation == 'create' ? '':$content_text->text}}">
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
                                   href="{{url('admin/content')}}">Geriyə</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
