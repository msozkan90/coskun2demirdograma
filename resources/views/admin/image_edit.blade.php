@extends('layouts.admin')

@section('style')

@endsection
@section('body')


    <div class="page-header">
        <h3 class="page-title">Resimler</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Admin Panel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Resimler</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{route('image')}}" class="btn btn-primary btn-block">Yeni Resim
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
                            @foreach ($images as $image)
                                <tr id="">
                                    <td></td>
                                    <td><a href="{{ route('image_edit', ['id' => $image->id]) }}"
                                           class="btn btn-warning editEducation">Düzenle <i class="fa fa-edit"></i></a>
                                    </td>
                                    <td><a data-id="" href="{{ route('image_delete', ['id' => $image->id]) }}"
                                           class="btn btn-danger showButton" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sil <i class="fa fa-trash"></i></a>
                                    </td>
                                    <td>{{\App\Models\Project::find($image['project_id'])['title']}}</td>
                                    <td>{{Str::limit($image['image'] , 50, $end='...')}}</td>
                                    <td>
                                        @if ($image->status == 1)
                                            <a data-id="{{$image['id']}}" href="javascript:void(0)"
                                               class="btn btn-success changeStatus" id="changeStatus">Aktif
                                            </a>
                                        @else
                                            <a data-id="{{$image['id']}}" href="javascript:void(0)"
                                               class="btn btn-danger changeStatus" id="changeStatus">Pasif</a>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($image->created_at)->format("d-m-Y H:i:s") }}</td>
                                    <td>{{ \Carbon\Carbon::parse($image->updated_at)->format("d-m-Y H:i:s") }}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
               <div class="m-3">
                   {{$images->links()}}
               </div>
            </div>
        </div>
    </div>



    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Resim Düzenle</h4>

                <form class="forms-sample" enctype="multipart/form-data" action="{{route('image_update',['id' => $image['id']])}}" method="POST">
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
                            <option value="{{$image['project_id']}}">{{$project_title}}</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Projenin resmi</label>
                        <input type="file" class="form-control" value="{{$image['image']}}"  name="image" id="image" placeholder="Projenin resmi ">
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
            let imageID = $(this).attr('data-id');
            let self = $(this);
            $.ajax({
                url: "{{route('image_changeStatus')}}",
                // method: "POST"
                type: "POST",
                async: false,
                data: {
                    'imageID': imageID
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
