@extends('admin.layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div style="float: left;" class="col-5 align-self-center">
                <h4 class="page-title">Dil məlumatları</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item">
                                <a href="{{url('/admin/language')}}">Dil məlumatları</a></li>
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
                        <?php
                        if ($operation == 'create')
                            $action = url('admin/language/store');
                        elseif ($operation == 'edit')
                            $action = url('admin/language/update/'.$language->id);
                        ?>
                        <form class="form needs-validation" novalidate="" action="{{url($action)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($operation == 'edit')
                                @method('PUT')
                            @endif
                            <div class="card-body">
                                <div class="collapse show" id="collapseExample_2">
                                    <div class="form-group row align-items-center mb-0">
                                        <label for="status_id"
                                               class="col-2 control-label col-form-label">Status</label>
                                        <div class="col-10 border-left pb-2 pt-2">
                                            <select name="status_id" id="status_id" class="form-control" required>
                                                <option value="">Status seçin...</option>
                                                @foreach($statuses as $status)
                                                    <option value="{{$status->id}}" {{old('status_id', $operation == 'create' ? '':$language->status_id) == $status->id ? 'selected':''}}>{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Doldurulmalıdır
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center mb-0">
                                        <label for="name"
                                               class="col-2 control-label col-form-label">Dil</label>
                                        <div class="col-10 border-left pb-2 pt-2">
                                            <input required type="text" class="form-control" id="name"
                                                   name="name" placeholder="Dil" value="{{old('name', $operation == 'create' ? '':$language->name)}}">
                                            <div class="invalid-feedback">
                                                Doldurulmalıdır
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center mb-0">
                                        <label for="shortname"
                                               class="col-2 control-label col-form-label">Qısa ad</label>
                                        <div class="col-10 border-left pb-2 pt-2">
                                            <input type="text" class="form-control" id="shortname"
                                                   name="shortname" placeholder="Qısa ad" value="{{old('shortname', $operation == 'create' ? '':$language->shortname)}}">
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center mb-0">
                                        <label for="image"
                                               class="col-2 control-label col-form-label">Şəkil: </label>
                                        <div class="col-10 border-left pb-2 pt-2">
                                            @if($operation == "edit")
                                            <img src="{{url('assets/uploads/'.$language->image)}}" width="200px" alt="logo">
                                            @endif
                                            <input name="image" type="file" class="upload">
                                            <div class="invalid-feedback">
                                                Doldurulmalıdır
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions text-center">
                                <button type="submit" class="btn btn-success"><i
                                        class="fa fa-check"></i> Yadda saxla</button>
                                <a class="btn btn-outline-dark" role="button"
                                   href="{{url('admin/language')}}">Ləğv et</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
