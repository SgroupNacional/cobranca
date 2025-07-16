@extends('template.app')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('corpo')
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card-header pt-10">
            <div class="d-flex flex-wrap w-100 justify-content-between align-items-center">
                <div class="d-flex align-items-center mb-2">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" id="pesquisa" class="form-control form-control-solid w-250px ps-13" placeholder="Pesquisar" />
                </div>
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                    <i class="ki-outline ki-plus fs-2"></i> Novo Canal
                </button>
            </div>
        </div>

        <div class="card-body pt-0">
            <table id="canal" class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-start d-flex align-items-center gap-1">Id</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    {{-- Populado via DataTable --}}
                </tbody>
            </table>
        </div>

        @yield('modais')
    </div>
@endsection

@section('modais')
    @include('canais.modal_criar')
    @include('canais.modal_editar')
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });

            var tabela = $('#canal').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('canais.data') }}',
                    type: 'POST'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nome', name: 'nome' },
                    { data: 'tipo', name: 'tipo' },
                    { data: 'status', name: 'status' },
                    { data: 'acoes', name: 'acoes', orderable: false, searchable: false }
                ],
                language: {
                    url: '{{ asset('assets/plugins/custom/datatables/i18n/pt-BR.json') }}'
                }
            });

            $('#pesquisa').on('keyup', function () {
                tabela.search(this.value).draw();
            });

            const tipoSelect = document.getElementById("tipo-canal");
            const campos = document.querySelectorAll("#form-canal .tipo-campos");

            tipoSelect.addEventListener("change", function () {
                const tipoSelecionado = this.value;
                campos.forEach((div) => {
                    div.classList.toggle("d-none", div.getAttribute("data-tipo") !== tipoSelecionado);
                });
            });

            $('#kt_modal_1').on('hidden.bs.modal', function () {
                document.getElementById('tipo-canal').value = '';
                document.querySelector('#form-canal').reset();
                campos.forEach((div) => div.classList.add('d-none'));
            });

            const tipoSelectEditar = document.getElementById("tipo-canal-editar");
            const camposEditar = document.querySelectorAll("#form-canal-editar .tipo-campos");

            tipoSelectEditar.addEventListener("change", function () {
                const tipoSelecionado = this.value;
                camposEditar.forEach((div) => {
                    div.classList.toggle("d-none", div.getAttribute("data-tipo") !== tipoSelecionado);
                });
            });

            $('#kt_modal_editar').on('hidden.bs.modal', function () {
                document.getElementById('tipo-canal-editar').value = '';
                document.getElementById('form-canal-editar').reset();
                camposEditar.forEach((div) => div.classList.add('d-none'));
            });

            $(document).on('click', '.btn-editar', function () {
                const canalId = $(this).data('id');
                const form = $('#form-canal-editar');

                $.get(`/canais/${canalId}/edit`, function (canal) {
                    form.find('input[name="id"]').val(canal.id);
                    form.find('input[name="nome"]').val(canal.nome);
                    form.find('select[name="tipo"]').val(canal.tipo).trigger('change');
                
                    // Preenche os campos dinâmicos conforme o tipo
            switch (canal.tipo) {
                case 'api_oficial':
                    form.find('input[name="cliente_id"]').val(canal.cliente_id);
                    form.find('input[name="token"]').val(canal.token);
                    form.find('input[name="url"]').val(canal.url);
                    form.find('input[name="cliente_secret"]').val(canal.cliente_secret);
                    break;
                case 'api_noficial':
                    form.find('input[name="instancia"]').val(canal.instancia);
                    form.find('input[name="token"]').val(canal.token);
                    form.find('input[name="webhook_url"]').val(canal.webhook_url);
                    form.find('input[name="chave_secreta"]').val(canal.chave_secreta);
                    break;
                case 'sms':
                    form.find('input[name="remetente"]').val(canal.remetente);
                    form.find('input[name="api_key"]').val(canal.api_key);
                    form.find('input[name="url_sms"]').val(canal.url);
                    break;
                case 'email':
                    form.find('input[name="smtp_host"]').val(canal.smtp_host);
                    form.find('input[name="smtp_user"]').val(canal.smtp_user);
                    form.find('input[name="smtp_password"]').val(canal.smtp_password);
                    break;
            }
                    camposEditar.forEach((div) => {
                        div.classList.toggle('d-none', div.getAttribute('data-tipo') !== canal.tipo);
                    });

                    $('#kt_modal_editar').modal('show');
                });
            });
            $(document).on('click', '.btn-excluir', function () {
            const canalId = $(this).data('id');

                Swal.fire({
                    title: 'Tem certeza?',
                    text: "Essa ação não poderá ser desfeita!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sim, excluir',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/canais/${canalId}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (res) {
                                Swal.fire('Excluído!', res.message, 'success');
                                $('#canal').DataTable().ajax.reload();
                            },
                            error: function () {
                                Swal.fire('Erro', 'Não foi possível excluir o canal.', 'error');
                            }
                        });
                    }
                });
            });
    });
    </script>
@endsection
