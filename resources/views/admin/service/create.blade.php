@extends('admin.layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div style="float: left;" class="col-5 align-self-center">
                <h4 class="page-title">Xidmətlər</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{url('/admin/service')}}">Xidmətlər</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Yeni xidmət yarat</li>
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
                        <form class="form needs-validation" novalidate="" action="{{url('admin/service')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row align-items-center">
                                <label class="control-label col-form-label col-2">Status</label>
                                <div class="col-8 border-left pb-2 pt-2">
                                    <select required class="form-control" name="status_id">
                                        <option value="">Seçin...</option>
                                        @foreach($statuses as $status)
                                            <option value="{{$status->id}}">{{$status->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Doldurulmalıdır
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label class="col-2 control-label col-form-label">Şəkil</label>
                                <div class="col-8 border-left pb-2 pt-2">
                                    <input required type="file" name="image" class="form-control">
                                    <div class="invalid-feedback">
                                        Doldurulmalıdır
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="title" class="col-2 control-label col-form-label">Başlıq</label>
                                <div class="col-8 border-left pb-2 pt-2">
                                    <input type="text" class="form-control" id="title" name="title" required
                                           placeholder="Başlıq"
                                           value="{{old('title', $operation == 'create' ? '':$service->title)}}">
                                </div>
                            </div>

                            <div class="form-group row align-items-center mb-0">
                                <label for="summernote"
                                       class="col-2 control-label col-form-label">Mətn</label>
                                <div class="col-8 border-left pb-2 pt-2">
                                    <textarea required name="text" class="form-control" id="elm1">{{old('text', $operation == 'create' ? '':$service->text)}}</textarea>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions text-center mt-3">
                                <button type="submit" class="btn btn-success"><i
                                        class="fa fa-check"></i> Yadda Saxla
                                </button>
                                <a class="btn btn-outline-dark" role="button"
                                   href="{{url('admin/service')}}">Geriyə</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
