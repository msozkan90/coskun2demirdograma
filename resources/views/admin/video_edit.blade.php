@extends('layouts.admin')

@section('style')

@endsection
@section('body')


    <div class="page-header">
        <h3 class="page-title">Videolar</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Admin Panel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Videolar</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{route('video')}}" class="btn btn-primary btn-block">Yeni Video
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
                                <th>Projenin Adı</th>
                                <th>Resim</th>
                                <th>Durum</th>
                                <th>Oluşturluş Tarihi</th>
                                <th>Güncellenme Tarihi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($videos as $video)
                                <tr id="">

                                    <td>
                                        <iframe width="110%"  height="auto" src="{{asset($video['video'])}}" title="YouTube video player" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen sandbox></iframe>
                                    </td>
                                    <td><a href="{{ route('video_edit', ['id' => $video->id]) }}"
                                           class="btn btn-warning editEducation">Düzenle <i class="fa fa-edit"></i></a>
                                    </td>
                                    <td><a data-id="" href="{{ route('video_delete', ['id' => $video->id]) }}"
                                           class="btn btn-danger showButton" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sil <i class="fa fa-trash"></i></a>
                                    </td>
                                    <td>{{\App\Models\Project::find($video['project_id'])['title']}}</td>
                                    <td>{{Str::limit($video['video'] , 55, $end='...')}}</td>

                                    <td>
                                        @if ($video->status == 1)
                                            <a data-id="{{$video['id']}}" href="javascript:void(0)"
                                               class="btn btn-success changeStatus" id="changeStatus">Aktif
                                            </a>
                                        @else
                                            <a data-id="{{$video['id']}}" href="javascript:void(0)"
                                               class="btn btn-danger changeStatus" id="changeStatus">Pasif</a>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($video->created_at)->format("d-m-Y H:i:s") }}</td>
                                    <td>{{ \Carbon\Carbon::parse($video->updated_at)->format("d-m-Y H:i:s") }}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="m-3">
                    {{$videos->links()}}
                </div>
            </div>
        </div>
    </div>



    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Video Düzenle</h4>

                <form class="forms-sample" enctype="multipart/form-data" action="{{route('video_update',['id' =>   $video_data[0]['id']])}}" method="POST">
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
                        <label for="project_id">Proje Adı</label>
                        <select id="project_id" class="form-control" name="project_id" >
                            <option value="{{\App\Models\Project::find($video_data[0]->project_id)['id']}}">{{\App\Models\Project::find($video_data[0]->project_id)['title']}} </option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="video">Projenin resmi</label>
                        <input type="file" class="form-control" value="{{$video_data[0]['video']}}"  name="video" id="video" placeholder="Projenin resmi ">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Düzenle</button>
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
            let videoID = $(this).attr('data-id');
            let self = $(this);
            $.ajax({
                url: "{{route('video_changeStatus')}}",
                // method: "POST"
                type: "POST",
                async: false,
                data: {
                    'videoID': videoID
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
