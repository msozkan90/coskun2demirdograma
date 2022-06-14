@extends('layouts.admin')

@section('style')

@endsection
@section('body')

    <div class="main-panel">
        <div class="row">
            <div class="col-sm-3 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Projeler</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{$projects_count}}</h2>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">+{{($projects_last_month*100)/$projects_count}}%</p>
                                </div>
                                <h6 class="text-muted font-weight-normal">Son ayda {{$projects_last_month}} yeni proje eklendi</h6>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-wallet-travel text-primary ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Kullanıcılar</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{$users_count}}</h2>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">+{{($users_last_month*100)/$users_count}}%</p>
                                </div>
                                <h6 class="text-muted font-weight-normal"> Son ayda {{$users_last_month}} yeni kullanıcı kayıt oldu</h6>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-human-male-boy text-danger ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Resimler</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{$images_count}}</h2>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">+{{($images_last_month*100)/$images_count}}% </p>
                                </div>
                                <h6 class="text-muted font-weight-normal">Son ayda {{$images_last_month}} yeni resim eklendi</h6>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-image text-success ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Videolar</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{$videos_count}}</h2>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">+{{($videos_last_month*100)/$videos_count}}% </p>
                                </div>
                                <h6 class="text-muted font-weight-normal">Son ayda {{$videos_last_month}} yeni video eklendi</h6>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-video-image text-warning ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Son Yapılan İşlemler</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>

                                    <th> Kategoriler </th>
                                    <th> ID Numarası </th>
                                    <th> İsim </th>
                                    <th> Oluşturulma Tarihi</th>
                                    <th> Güncellenme Tarihi </th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <td>

                                        <img src="{{asset('video.png')}}" alt="image" />
                                        <div class="badge badge-outline-success">Video</div>

                                    </td>
                                    <td> {{$videos_last['id']}}</td>
                                    <td> {{$videos_last['video']}}</td>
                                    <td> {{ \Carbon\Carbon::parse($videos_last->created_at)->format("d-m-Y H:i:s") }}</td>
                                    <td> {{ \Carbon\Carbon::parse($videos_last->updated_at)->format("d-m-Y H:i:s") }}</td>

                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{asset('images.png')}}" alt="image" />
                                        <div class="badge badge-outline-warning">Resim</div>
                                    </td>
                                    <td> {{$images_last['id']}} </td>
                                    <td>{{$images_last['image']}}</td>
                                    <td> {{ \Carbon\Carbon::parse($images_last->created_at)->format("d-m-Y H:i:s") }}</td>
                                    <td> {{ \Carbon\Carbon::parse($images_last->updated_at)->format("d-m-Y H:i:s") }}</td>

                                </tr>
                                <tr>

                                    <td>

                                        <img src="{{asset('project.png')}}" alt="image"  />
                                        <div class="badge badge-outline-danger">Proje</div>
                                    </td>
                                    <td> {{$projects_last['id']}}</td>
                                    <td> {{$projects_last['title']}}</td>
                                    <td> {{ \Carbon\Carbon::parse($projects_last->created_at)->format("d-m-Y H:i:s") }}</td>
                                    <td> {{ \Carbon\Carbon::parse($projects_last->updated_at)->format("d-m-Y H:i:s") }}</td>

                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{asset('user.jpg')}}" alt="image" />
                                        <div class="badge badge-outline-success">Kullanıcı</div>
                                    </td>
                                    <td> {{$users_last['id']}} </td>
                                    <td> {{$users_last['name']}} </td>
                                    <td> {{ \Carbon\Carbon::parse($users_last->created_at)->format("d-m-Y H:i:s") }}</td>
                                    <td> {{ \Carbon\Carbon::parse($users_last->updated_at)->format("d-m-Y H:i:s") }}</td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
@section('js')



@endsection
