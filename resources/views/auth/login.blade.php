@extends('template.auth')

@section('css')

@endsection

@section('corpo')
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
        <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
            <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                    <form class="form w-100" novalidate id="kt_sign_in_form" data-kt-redirect-url="{{ route('login') }}" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-center mb-11">
                            <h1 class="text-gray-900 fw-bolder mb-3">Entrar</h1>
                            <div class="text-gray-500 fw-semibold fs-6">Suas Campanhas Sociais</div>
                        </div>
                        <div class="fv-row mb-8">
                            <input type="text" placeholder="E-mail" name="email" required autofocus autocomplete="username" class="form-control bg-transparent" />
                        </div>
                        <div class="fv-row mb-3">
                            <input type="password" placeholder="Senha" name="password" required autocomplete="current-password" class="form-control bg-transparent" />
                        </div>
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>
                            <a href="{{ route('password.request') }}" class="link-primary">Esqueceu a senha?</a>
                        </div>
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                <span class="indicator-label">Entrar</span>
                                <span class="indicator-progress">Por favor, aguarde...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection

@section('script')

@endsection
