@extends('layouts.account')
@section('title')
    Login
@endsection
@section('style')
    <style>

    </style>
@endsection
@section('content')

    <div class="d-flex align-items-center auth px-0 muh-mt-10">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-dark text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo">
                        <h3>Giriş Yap</h3>
                        <hr>
                    </div>
                    <h4>Merhaba</h4>
                    <h6 class="font-weight-light">Devam etmek için giriş yap</h6>
                    <form action="{{ route('login') }}" method="POST" class="pt-3 loginform">
                        @csrf
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger mt-2">{{ $error }}  </div>
                        @endforeach
                        <div class="form-group ">
                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                   value="{{old('email')}}" placeholder="Email">
                        </div>
                        <div class="form-group ">
                            <input type="password" class="form-control form-control-lg" name="password" id="password"
                                   placeholder="Şifre">
                        </div>
                        <div class="mt-3">
                            <button type="submit"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Giriş Yap
                            </button>
                        </div>
                        <div class="my-2 d-flex justify-content-between align-items-center">
                            <a href="#" class="auth-link text-muted">Şifreni mi unuttun? </a>
                        </div>
                        {{--                        <div class="mb-2">--}}
                        {{--                            <button type="button" class="btn btn-block btn-facebook auth-form-btn">--}}
                        {{--                                <i class="mdi mdi-facebook mr-2"></i>Connect using facebook--}}
                        {{--                            </button>--}}
                        {{--                        </div>--}}
                        <div class="text-center mt-4 font-weight-light">
                            Hesap oluşturmadın mı? <a href="{{route('register')}}" class="text-primary">Kayıt Ol</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection

@section('js')


@endsection
