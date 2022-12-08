@extends('admin.layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div style="float: left;" class="col-5 align-self-center">
                <h4 class="page-title">Əlaqə məlumatları</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{url('/admin/contact')}}">Əlaqə məlumatları</a></li>
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
                        <form class="form needs-validation" novalidate="" action="{{url('admin/contact/'.$contact->id.'/update/'.$language_id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row align-items-center mb-0">
                                <label for="address"
                                       class="col-sm-3 col-md-2 control-label col-form-label">Ünvan</label>
                                <div class="col-9 border-left pb-2 pt-2">
                                    <input required type="text" class="form-control" id="address" name="address"
                                           placeholder="Ünvan" value="{{($contact_text ? $contact_text->address : '')}}">
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
                                   href="{{url('admin/contact')}}">Geriyə</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
