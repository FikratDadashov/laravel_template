@extends('admin.layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div style="float: left;" class="col-5 align-self-center">
                <h4 class="page-title">Haqqımızda</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{url('/admin/about')}}">Haqqımızda</a></li>
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
                        <div class="form-actions text-right">
                            <a href="{{url('/admin/about')}}" class="btn btn-warning">Geriyə</a>
                        </div>
                        <form action="{{url('admin/about/'.$about->id.'/update/'.$language_id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row align-items-center">
                                <label class="col-2 control-label col-form-label">Mətn</label>
                                <div class="col-8 border-left pb-2 pt-2">
                                    <textarea name="text"
                                              id="summernote"> {{$operation == 'create' ? '':$about_text->text}}</textarea>
                                </div>
                            </div>

                            <div class="form-actions text-center mt-3">
                                <button type="submit" class="btn btn-success"><i
                                        class="fa fa-check"></i> Yadda Saxla
                                </button>
                                <a class="btn btn-outline-dark" role="button"
                                   href="{{url('admin/about')}}">Geriyə</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 250
            });
        });
    </script>
@endsection
