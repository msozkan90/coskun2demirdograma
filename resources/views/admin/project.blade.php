@extends('layouts.admin')

@section('style')

@endsection
@section('body')


    <div class="page-header">
        <h3 class="page-title">Projeler</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Admin Panel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Projeler</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{route('project')}}" class="btn btn-primary btn-block">Yeni Proje
                                Ekle</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Kapak</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                                <th>Projenin Adı</th>
                                <th>Başlangıç Tarihi</th>
                                <th>Bitiş Tarihi</th>
                                <th>Projenin Yeri</th>
                                <th>Proje Hakkında</th>
                                <th>Durum</th>
                                <th>Oluşturluş Tarihi</th>
                                <th>Güncellenme Tarihi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                                <tr id="">
                                    <td>{{ $project['id'] }}</td>

                                    <td>
                                        <a href="#"> <img src=" {{asset($project['image']) }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop_pic" class="showPicture" id="showPicture" data-image="{{asset($project['image']) }}"  alt="Coskun-2-demir-dograma"> </a>
                                    </td>
                                    <td><a href="{{ route('project_edit', ['id' => $project->id]) }}"
                                           class="btn btn-warning editEducation">Düzenle <i class="fa fa-edit"></i></a>
                                    </td>
                                    <td><a data-id="" href="{{ route('project_delete', ['id' => $project->id]) }}"
                                           class="btn btn-danger showButton" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sil <i class="fa fa-trash"></i></a>
                                    </td>
                                    <td>{{ $project['title'] }}</td>

                                    <td>{{ $project['started-date'] }}</td>
                                    <td>{{ $project['finished-date'] }}</td>
                                    <td>{{ $project['location'] }}</td>
                                    <td>{{Str::limit($project->description, 30, $end='...')}}</td>

                                    <td>
                                        @if ($project->status == 1)
                                            <a data-id="{{$project['id']}}" href="javascript:void(0)"
                                               class="btn btn-success changeStatus" id="changeStatus">Aktif
                                            </a>
                                        @else
                                            <a data-id="{{$project['id']}}" href="javascript:void(0)"
                                               class="btn btn-danger changeStatus" id="changeStatus">Pasif</a>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($project->created_at)->format("d-m-Y H:i:s") }}</td>
                                    <td>{{ \Carbon\Carbon::parse($project->updated_at)->format("d-m-Y H:i:s") }}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="m-3">
                    {{$projects->links()}}
                </div>
            </div>
        </div>
    </div>






    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Proje Ekle</h4>

                <form class="forms-sample" enctype="multipart/form-data" action="{{route('project_add')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="started-year">Başlangıç Tarihi</label>
                        <input type="month" value="{{old('started-date')}}"   class="form-control" name="started-date" id="started-date" placeholder="Started Date">
                    </div>
                    <div class="form-group">
                        <label for="finished-date">Bitiş Tarihi</label>
                        <input type="month" value="{{old('finished-date')}}"  class="form-control" name="finished-date" id="finished-date" placeholder="Finish Date">
                    </div>

                    <div class="form-group">
                        <label for="title">Proje Adı</label>
                        <input type="text" class="form-control" value="{{old('title')}}"   name="title" id="title" placeholder="Proje Adı">
                    </div>
                    <div class="form-group">
                        <label for="location">Projenin Yeri</label>
                        <input type="text" class="form-control" value="{{old('location')}}" name="location" id="location" placeholder="Projenin Yeri">
                    </div>
                    <div class="form-group">
                        <label for="image">Proje Kapak Fotoğrafı</label>
                        <input type="file" class="form-control" value="{{old('image')}}"  name="image" id="image" placeholder="Proje Kapak Fotoğrafı">
                    </div>

                    <div class="form-group">
                        <label for="description">Proje Hakkında</label>
                        <textarea class="form-control ckeditor123 " name="description" id="ckeditor123" cols="30"
                                  rows="10"
                                  placeholder="Description"> {{old('description')}}</textarea>

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Ekle</button>
                    <button class="btn btn-danger">Temizle</button>
                </form>

            </div>

        </div>
    </div>






@endsection
@section('js')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
            }
        });

        $('.changeStatus').click(function (){
            let projectID = $(this).attr('data-id');
            let self = $(this);
            $.ajax({
                url: "{{route('project_changeStatus')}}",
                // method: "POST"
                type: "POST",
                async: false,
                data: {
                    'projectID': projectID
                },
                success: function (response)
                {

                    if (response.status == 1)
                    {
                        self[0].innerHTML = "Aktif";
                        self.removeClass("btn-danger");
                        self.addClass("btn-success");

                    }
                    else if (response.status == 0)
                    {
                        self[0].innerHTML = "Pasif";
                        self.removeClass("btn-success");
                        self.addClass("btn-danger");

                    }

                },
                error: function ()
                {

                }
            });
            location.reload();

        })



    </script>
@endsection
