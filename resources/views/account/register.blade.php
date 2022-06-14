@extends('layouts.account')
@section('title')
    Register
@endsection
@section('style')
    <style>



    </style>
@endsection
@section('content')

    <div class="d-flex align-items-center auth px-0 muh-mt-10 ">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-dark text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo">
                        <h3>Kayıt Ol</h3>
                        <hr>
                    </div>
                    <h6 class="font-weight-light">Birkaç adımda kolayca üye ol</h6>
                    <form action="{{route('register')}}" method="POST" id="registerform" class="pt-3 registerform">
                        @csrf
                        @foreach ($errors->all() as $error)
                            <div  class="alert alert-danger mt-2" >{{ $error }}  </div>
                        @endforeach
                        <div class="form-group">
                            <input type="text" name="name" class="name form-control form-control-lg" id="name" placeholder="İsim" required>
                            <div id="name_error" class="name_error alert alert-danger mt-2"  style="display:none">  </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="email form-control form-control-lg" id="email" placeholder="Email" required>
                            <div id="email_error" class="email_error alert alert-danger mt-2"  style="display:none">  </div>

                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="password form-control form-control-lg" id="password" placeholder="Şifre" required>
                            <div id="password_error" class="password_error alert alert-danger mt-2"  style="display:none">  </div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="password_confirmation form-control form-control-lg" id="password_confirmation" placeholder="Şifre Tekrar " required>
                        </div>

                        <div class="mt-3">
                            <button type="submit" id="register-button"  class="register-button btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"> KAYIT OL</button>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            Hesabın var mı? <a href="{{route('login')}}" class="text-primary">Giriş Yap</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')


@endsection
