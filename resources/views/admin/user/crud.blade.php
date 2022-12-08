@extends('admin.layouts.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div style="float: left;" class="col-5 align-self-center">
                <h4 class="page-title">İstifadəçilər</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{url('/admin/user')}}">İstifadəçilər</a></li>
                            <?php
                            if ($operation == 'create')
                                $title = 'Yeni istifadəçi yarat';
                            elseif ($operation == 'edit')
                                $title = 'Dəyişiklik et';
                            ?>
                            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
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
                            $action = url('/admin/user');
                        elseif ($operation == 'edit')
                            $action = url('/admin/user/' . $user->id);
                        ?>
                        <form class="form needs-validation" novalidate="" action="{{url($action)}}" method="POST">
                            @if($operation == 'edit')
                                <input type="hidden" name="_method" value="PUT">
                            @endif
                            @csrf
                            <div class="card-body">
                                <div class="collapse show" id="collapseExample_2">
                                    <div class="form-group row align-items-center mb-0">
                                        <label for="name"
                                               class="col-2 control-label col-form-label">Ad Soyad</label>
                                        <div class="col-9 border-left pb-2 pt-2">
                                            <input id="name" class="form-control" type="text" name="name" required autofocus placeholder="Ad Soyad"
                                                   @if($operation=="edit") value="{{$user->name}}"
                                                   @elseif($operation=="create") value="" @else value="{{$user->name}}"
                                                   disabled @endif >
                                            <div class="invalid-feedback">
                                                Doldurulmalıdır
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center mb-0">
                                        <label for="email"
                                               class="col-2 control-label col-form-label">Email</label>
                                        <div class="col-9 border-left pb-2 pt-2">
                                            <input id="email" class="form-control" type="email" name="email" required placeholder="Email"
                                                   @if($operation=="edit") value="{{$user->email}}"
                                                   @elseif($operation=="create") value=""
                                                   @else value="{{$user->email}}" disabled @endif >
                                            <div class="invalid-feedback">
                                                Doldurulmalıdır
                                            </div>
                                        </div>
                                    </div>

                                    @if($operation=="create")
                                    <div class="form-group row align-items-center mb-0">
                                        <label for="password"
                                               class="col-2 control-label col-form-label">Şifrə</label>
                                        <div class="col-9 border-left pb-2 pt-2">
                                            <input id="password" class="form-control"
                                                     type="password"
                                                     name="password"
                                                     required autocomplete="new-password" placeholder="Şifrə" minlength="8">
                                            <div class="invalid-feedback">
                                                Doldurulmalıdır
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center mb-0">
                                        <label for="password_confirmation"
                                               class="col-2 control-label col-form-label">Yeni şifrə (Təkrar)</label>
                                        <div class="col-9 border-left pb-2 pt-2">
                                            <input id="password_confirmation" class="form-control"
                                                   type="password"
                                                   name="password_confirmation"
                                                   required autocomplete="new-password" placeholder="Yeni şifrə (Təkrar)" minlength="8">
                                            <div class="invalid-feedback">
                                                Doldurulmalıdır
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($operation=="edit")
                                        <a style="color:#fff" id="show_update" class="btn btn-danger"><i
                                                class="fa fa-plus"></i> Şifrəni yenilə
                                        </a>

                                        <a style="color:#fff" id="remove_update" hidden  class="btn btn-danger"><i
                                                class="fa fa-minus"></i> Deaktiv et
                                        </a>
                                        <div id="password_section" hidden>
                                            <div class="form-group row align-items-center mb-0">
                                                <label for="password"
                                                       class="col-2 control-label col-form-label">Şifrə</label>
                                                <div class="col-9 border-left pb-2 pt-2">
                                                    <input type="password" id="password" class="form-control"
                                                           name="password"
                                                           placeholder="Şifrə" value="" minlength="8">
                                                    <div class="invalid-feedback">
                                                        Doldurulmalıdır
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center mb-0">
                                                <label for="password_confirmation"
                                                       class="col-2 control-label col-form-label">Yeni şifrə (Təkrar)</label>
                                                <div class="col-9 border-left pb-2 pt-2">
                                                    <input id="password_confirmation" class="form-control"
                                                           type="password"
                                                           name="password_confirmation"
                                                           autocomplete="new-password" placeholder="Yeni şifrə (Təkrar)" minlength="8">
                                                    <div class="invalid-feedback">
                                                        Doldurulmalıdır
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input id="statement" type="hidden" value="0">
                                    @endif
                                </div>
                            </div>
                            @if($operation == "edit" or $operation == "create")
                                <div class="form-actions text-center">
                                    <button id="form_submit" type="submit" class="btn btn-success"><i
                                            class="fa fa-check"></i> Yadda saxla
                                    </button>
                                    <a class="btn btn-outline-dark" role="button"
                                       href="{{url('/admin/user')}}">Ləğv et</a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
