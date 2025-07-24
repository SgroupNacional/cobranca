@extends('template.app')

@section('corpo')
    <div class="card card-flush">
        <div class="card-header">
            <h3 class="card-title">Nova Conta de WhatsApp</h3>
        </div>
        <div class="card-body py-5">
            <form id="form-whatsapp" method="POST" action="{{ route('whatsapp.store') }}">
                @csrf
                <div class="mb-5">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="mb-5">
                    <label class="form-label">Tipo de API</label>
                    <select name="tipo_api" id="tipo_api" class="form-select" required>
                        <option value="">Selecione</option>
                        <option value="meta">Meta</option>
                        <option value="evolution">Evolution</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label class="form-label">Número</label>
                    <input type="text" name="numero" class="form-control">
                </div>
                <div class="tipo-campos d-none" data-tipo="meta">
                    <div class="mb-5">
                        <label class="form-label">Business Account ID</label>
                        <input type="text" name="business_account_id" class="form-control">
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Phone Number ID</label>
                        <input type="text" name="phone_number_id" class="form-control">
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Token</label>
                        <input type="text" name="token" class="form-control">
                    </div>
                </div>
                <div class="tipo-campos d-none" data-tipo="evolution">
                    <div class="mb-5">
                        <label class="form-label">Instance ID</label>
                        <input type="text" name="instance_id" class="form-control">
                    </div>
                    <div class="mb-5">
                        <label class="form-label">API Key</label>
                        <input type="text" name="apikey" class="form-control">
                    </div>
                </div>
                <div class="text-end">
                    <a href="{{ route('whatsapp.index') }}" class="btn btn-light">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('tipo_api').addEventListener('change', function () {
            const tipo = this.value;
            document.querySelectorAll('.tipo-campos').forEach(function (el) {
                el.classList.toggle('d-none', el.getAttribute('data-tipo') !== tipo);
            });
        });
    </script>
@endsection