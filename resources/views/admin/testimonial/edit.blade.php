@extends('admin.layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div style="float: left;" class="col-5 align-self-center">
                <h4 class="page-title">Müştəri Rəyləri</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{url('/admin/testimonial')}}">Müştəri Rəyləri</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Redaktə et</li>
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
                        <form class="form needs-validation" novalidate="" action="{{url('admin/testimonial/'.$testimonial->id.'/update/')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row align-items-center">
                                <label class="control-label col-form-label col-2">Status</label>
                                <div class="col-8 border-left pb-2 pt-2">
                                    <select required class="form-control" name="status_id">
                                        <option value="">Seçin...</option>
                                        @foreach($statuses as $status)
                                            <option
                                                value="{{$status->id}}" {{$testimonial->status_id == $status->id ? 'selected':''}}>{{$status->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Doldurulmalıdır
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="control-label col-form-label col-2">Şəkil</label>
                                <img src="{{url('assets/uploads/'.$testimonial->image)}}" alt="image" width="150" height="150">
                                <div class="col-8 border-left pb-2 pt-2">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="form-actions text-center mt-3">
                                <button type="submit" class="btn btn-success"><i
                                        class="fa fa-check"></i> Yadda Saxla
                                </button>
                                <a class="btn btn-outline-dark" role="button"
                                   href="{{url('admin/testimonial')}}">Geriyə</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
