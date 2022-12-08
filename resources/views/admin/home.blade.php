@extends('admin.layouts.template')
@section('content')
{{--    <?php--}}
{{--    $fullname = \Illuminate\Support\Facades\Auth::user()->fullname;--}}
{{--    $blog = \App\Models\Blog::all()->count();--}}
{{--    $car = \App\Models\Car::all()->count();--}}
{{--    $special_offers = \App\Models\SpecialOffers::all()->count();--}}
{{--    $category = \App\Models\Category::all()->count();--}}
{{--    $language = \App\Models\Language::all()->count();--}}
{{--    $service = \App\Models\Service::all()->count();--}}
{{--    $slide = \App\Models\Slide::all()->count();--}}
{{--    $user = \App\Models\User::all()->count();--}}
{{--    $customers_replay = \App\Models\CustomerReplay::all()->count();--}}
{{--    $email = \Illuminate\Support\Facades\Auth::user()->email;--}}
{{--    ?>--}}
{{--    <div class="page-breadcrumb">--}}
{{--        <div class="row">--}}
{{--            <div style="float: left;" class="col-5 align-self-center">--}}
{{--                <h4 class="page-title">Ana Səhifə</h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="container-fluid">--}}
{{--        <!-- ============================================================== -->--}}
{{--        <!-- Start Page Content -->--}}
{{--        <!-- ============================================================== -->--}}
{{--        <!-- Row -->--}}
{{--        <div class="row">--}}
{{--            <!-- Column -->--}}
{{--            <div class="col-lg-12 col-xlg-3 col-md-5">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <center class="mt-4"><img src="{{URL::asset('assets/images/users/1.jpg')}}"--}}
{{--                                                  class="rounded-circle" width="150">--}}
{{--                            <h4 class="card-title mt-2">{{$fullname}}</h4>--}}
{{--                            <h6 class="card-subtitle">{{session()->get('role')}}</h6>--}}
{{--                        </center>--}}
{{--                        <small class="text-muted">E-mail : </small>--}}
{{--                        <h6>{{$email}}</h6>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-3 col-md-6">--}}
{{--                <div class="card border-bottom border-info card-hover">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex no-block align-items-center">--}}
{{--                            <div>--}}
{{--                                <h3>İstifadəçilər</h3>--}}
{{--                                <h4 class="text-info">{{$user}}</h4>--}}
{{--                            </div>--}}
{{--                            <div class="ml-auto">--}}
{{--                                <span class="text-info display-6"><i class="fas fa-users"></i></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6">--}}
{{--                <div class="card border-bottom border-success card-hover">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex no-block align-items-center">--}}
{{--                            <div>--}}
{{--                                <h3>Maşınlar</h3>--}}
{{--                                <h4 class="text-success">{{$car}}</h4>--}}
{{--                            </div>--}}
{{--                            <div class="ml-auto">--}}
{{--                                <span class="text-success display-6"><i class="fa fa-car"></i></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6">--}}
{{--                <div class="card border-bottom border-warning card-hover">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex no-block align-items-center">--}}
{{--                            <div>--}}
{{--                                <h3>Bloqlar</h3>--}}
{{--                                <h4 class="text-warning">{{$blog}}</h4>--}}
{{--                            </div>--}}
{{--                            <div class="ml-auto">--}}
{{--                                <span class="text-warning display-6"><i class="fas fa-newspaper"></i></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6">--}}
{{--                <div class="card border-bottom border-primary card-hover">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex no-block align-items-center">--}}
{{--                            <div>--}}
{{--                                <h3>Kateqoriyalar</h3>--}}
{{--                                <h4 class="text-primary">{{$category}}</h4>--}}
{{--                            </div>--}}
{{--                            <div class="ml-auto">--}}
{{--                                <span class="text-primary display-6"><i class="fas fa-id-badge"></i></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6">--}}
{{--                <div class="card border-bottom border-success card-hover">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex no-block align-items-center">--}}
{{--                            <div>--}}
{{--                                <h3>Servislər</h3>--}}
{{--                                <h4 class="text-success">{{$service}}</h4>--}}
{{--                            </div>--}}
{{--                            <div class="ml-auto">--}}
{{--                                <span class="text-success display-6"><i class="fas fa-map-signs"></i></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6">--}}
{{--                <div class="card border-bottom border-warning card-hover">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex no-block align-items-center">--}}
{{--                            <div>--}}
{{--                                <h3>Slaydlar</h3>--}}
{{--                                <h4 class="text-warning">{{$slide}}</h4>--}}
{{--                            </div>--}}
{{--                            <div class="ml-auto">--}}
{{--                                <span class="text-warning display-6"><i class="fas fa-ticket-alt"></i></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-3 col-md-6">--}}
{{--                <div class="card border-bottom border-danger card-hover">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex no-block align-items-center">--}}
{{--                            <div>--}}
{{--                                <h3>Bonuslar</h3>--}}
{{--                                <h4 class="text-danger">{{$special_offers}}</h4>--}}
{{--                            </div>--}}
{{--                            <div class="ml-auto">--}}
{{--                                <span class="text-danger display-6"><i class="fas fa-gift"></i></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-3 col-md-6">--}}
{{--                <div class="card border-bottom border-info card-hover">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex no-block align-items-center">--}}
{{--                            <div>--}}
{{--                                <h3>Müştəri Mənunniyəti</h3>--}}
{{--                                <h4 class="text-info">{{$customers_replay}}</h4>--}}
{{--                            </div>--}}
{{--                            <div class="ml-auto">--}}
{{--                                <span class="text-info display-6"><i class="fas fa-reply"></i></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </div>--}}
{{--    </div>--}}
{{--    </div>--}}

{{--    </div>--}}
{{--    <!-- Row -->--}}
{{--    <!-- ============================================================== -->--}}
{{--    <!-- End PAge Content -->--}}
{{--    <!-- ============================================================== -->--}}
{{--    <!-- ============================================================== -->--}}
{{--    <!-- Right sidebar -->--}}
{{--    <!-- ============================================================== -->--}}
{{--    <!-- .right-sidebar -->--}}
{{--    <!-- ============================================================== -->--}}
{{--    <!-- End Right sidebar -->--}}
{{--    <!-- ============================================================== -->--}}

@endsection
