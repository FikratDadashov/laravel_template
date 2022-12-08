@extends('admin.layouts.template')
@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                <h4 class="page-title">Mesajlar</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/home">Ana səhifə</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page">Mesajlar
                            </li>
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
                                    <th><b>Ad</b></th>
                                    <th><b>Başlıq</b></th>
                                    <th><b>Email</b></th>
                                    <th><b>Telefon nömrəsi</b></th>
                                    <th><b>Mesaj</b></th>
                                    <th><b>Status</b></th>
                                    <th><b>Əməliyyatlar</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{$message->name}}</td>
                                        <td>{{$message->title}}</td>
                                        <td>{{$message->email}}</td>
                                        <td>{{$message->phone}}</td>
                                        <td>{{$message->message}}</td>
                                        <td class="text-center">
                                            @if($message->ready == 1)
                                                <label class="label label-success"> Baxıldı</label>
                                            @else
                                                <label class="label label-warning"> Gözləmədə</label>
                                            @endif
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="ti-settings"></i>
                                                </button>

                                                <div class="dropdown-menu">
                                                    <a href="" data-toggle="modal" data-target="{{".message-detail".$message->id}}"
                                                       class="dropdown-item"> <i class="fa fa-eye"></i>Ətraflı baxış</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item"
                                                       href="{{url('/admin/message/'.$message->id.'/delete')}}"><i
                                                            class="fa fa-trash"></i> Sil</a>

                                                    @if($message->ready == 0)
                                                        <form class="form" action="{{url('admin/message/'.$message->id)}}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <input hidden name="ready" value="1">
                                                            <button type="submit"
                                                                    onclick="return confirm('Statusu dəyişməyə əminsiniz?')"
                                                                    class="dropdown-item"><i
                                                                    class="fa fa-check text-warning"></i> Gözləmədə
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form class="form" action="{{url('/admin/message/'.$message->id)}}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <input hidden name="ready" value="0">
                                                            <button type="submit"
                                                                    onclick="return confirm('Statusu dəyişməyə əminsiniz?')"
                                                                    class="dropdown-item"><i
                                                                    class="fa fa-check text-success"></i> Baxıldı
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <div id="verticalcenter" class="{{"modal message-detail".$message->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="vcenter" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex align-items-center">
                                                    <h4 class="modal-title" id="vcenter">Mesaj</h4>
                                                    <button type="button" class="close ml-auto" data-dismiss="modal"
                                                            aria-hidden="true">×
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p> <b>Ad</b>  : {{$message->name}}</p>
                                                    <p> <b>Başlıq</b>  : {{$message->title}}</p>
                                                    <p> <b>Email</b>  : {{$message->email}}</p>
                                                    <p> <b>Telefon nömrəsi</b>  : {{$message->phone}}</p>
                                                    <p> <b>Mesaj</b> : {{$message->message}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-info waves-effect"
                                                            data-dismiss="modal">Bağla
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
