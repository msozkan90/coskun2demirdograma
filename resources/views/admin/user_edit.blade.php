@extends('layouts.admin')

@section('style')

@endsection
@section('body')


    <div class="page-header">
        <h3 class="page-title">Kullanıcılar</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Admin Panel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kullanıcılar</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{route('user')}}" class="btn btn-primary btn-block">Yeni Kullanıcı
                                Ekle</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                                <th>İsim</th>
                                <th>Email</th>
                                <th>Durum</th>
                                <th>Oluşturluş Tarihi</th>
                                <th>Güncellenme Tarihi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr id="">
                                    <td></td>
                                    <td><a href="{{ route('user_edit', ['id' => $user->id]) }}"
                                           class="btn btn-warning editEducation">Düzenle <i class="fa fa-edit"></i></a>
                                    </td>
                                    <td><a data-id="" href="{{ route('user_delete', ['id' => $user->id]) }}"
                                           class="btn btn-danger showButton" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sil <i class="fa fa-trash"></i></a>
                                    </td>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['email'] }}</td>

                                    <td>
                                        @if ($user->status == 1)
                                            <a data-id="{{$user['id']}}" href="javascript:void(0)"
                                               class="btn btn-success changeStatus" id="changeStatus">Aktif
                                            </a>
                                        @else
                                            <a data-id="{{$user['id']}}" href="javascript:void(0)"
                                               class="btn btn-danger changeStatus" id="changeStatus">Pasif</a>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format("d-m-Y H:i:s") }}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->updated_at)->format("d-m-Y H:i:s") }}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="m-3">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>






    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kullanıcı Düzenle</h4>

                <form class="forms-sample" enctype="multipart/form-data" action="{{route('user_update',['id' => $user_data[0]['id']])}}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="title">Kullanıcı Adı</label>
                        <input type="text" class="form-control" value="{{$user_data[0]['name']}}"   name="name" id="name" placeholder="Kullanıcı Adı">
                    </div>
                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="email" class="form-control" value="{{$user_data[0]['email']}}" style="background-color: #2A3038"   name="email" id="email" placeholder="Email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="title">Şifre</label>
                        <input type="password" class="form-control" value=""   name="password" id="password" placeholder="Şifre">
                    </div>
                    <div class="form-group">
                        <label for="title">Şifre Tekrar</label>
                        <input type="password" name="password_confirmation" value="" class="form-control" id="password_confirmation" placeholder="Şifre Tekrar ">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2 addButton">Düzenle</button>
                    <button class="btn btn-danger">Temizle</button>
                </form>

            </div>

        </div>
    </div>






@endsection
@section('js')
    {{--    <script>--}}
    {{--        let password = $('.password');--}}
    {{--        let password2 = $('.password_confirmation');--}}
    {{--        console.log(password.innerText);--}}
    {{--        console.log(password2);--}}
    {{--        $('.addButton').click(function (){--}}
    {{--            --}}
    {{--        });--}}
    {{--    </script>--}}
    {{--    <script>--}}
    {{--        $.ajaxSetup({--}}
    {{--            headers: {--}}
    {{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")--}}
    {{--            }--}}
    {{--        });--}}

    {{--        $('.changeStatus').click(function (){--}}
    {{--            let videoID = $(this).attr('data-id');--}}
    {{--            let self = $(this);--}}
    {{--            $.ajax({--}}
    {{--                url: "{{route('video_changeStatus')}}",--}}
    {{--                // method: "POST"--}}
    {{--                type: "POST",--}}
    {{--                async: false,--}}
    {{--                data: {--}}
    {{--                    'videoID': videoID--}}
    {{--                },--}}
    {{--                success: function (response)--}}
    {{--                {--}}

    {{--                    if (response.status == 1)--}}
    {{--                    {--}}
    {{--                        self[0].innerHTML = "Aktif";--}}
    {{--                        self.removeClass("btn-danger");--}}
    {{--                        self.addClass("btn-success");--}}

    {{--                    }--}}
    {{--                    else if (response.status == 0)--}}
    {{--                    {--}}
    {{--                        self[0].innerHTML = "Pasif";--}}
    {{--                        self.removeClass("btn-success");--}}
    {{--                        self.addClass("btn-danger");--}}

    {{--                    }--}}

    {{--                },--}}
    {{--                error: function ()--}}
    {{--                {--}}

    {{--                }--}}
    {{--            });--}}
    {{--            location.reload();--}}

    {{--        })--}}



    {{--    </script>--}}
@endsection
