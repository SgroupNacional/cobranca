@extends('template.app')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('corpo')
    <div class="card card-flush">
        <div class="card-header pt-10">
            <div class="d-flex flex-wrap w-100 justify-content-between align-items-center">
                <!-- Campo de pesquisa à esquerda -->
                <div class="d-flex align-items-center mb-2">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" id="pesquisa" class="form-control form-control-solid w-250px ps-13"
                        placeholder="Pesquisar" />
                </div>

                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                    <i class="ki-outline ki-plus fs-2"></i> Novo Template
                </button>
            </div>
        </div>

        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="tabela-templates">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th>#</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Conta WhatsApp</th>
                        <th>Template Name</th>
                        <th>Mensagem Livre</th>
                        <th>Componentes</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">

                </tbody>
            </table>
        </div>

        @yield('modais')
    </div>
@endsection

@section('modais')
    @include('templates.modal_criar')
    @include('templates.modal_editar')
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

            const tabela = $('#tabela-templates').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('templates.data') }}',
                    type: 'POST'
                },
                columns: [
                    { data: 'id', name: 'templates.id' },
                    { data: 'nome', name: 'templates.nome' },
                    {
                        data: 'tipo',
                        name: 'templates.tipo',
                        render: function (data) {
                            const badge = data === 'meta' ? 'primary' : 'success';
                            return `<span class="badge badge-light-${badge}">${data.charAt(0).toUpperCase() + data.slice(1)}</span>`;
                        }
                    },
                    { data: 'conta', name: 'conta_whatsapp_id' },
                    { data: 'template_name', name: 'templates.template_name' },
                    { data: 'mensagem_livre', name: 'templates.mensagem_livre' },
                    { data: 'componentes', name: 'templates.componentes' },
                    {
                        data: 'acoes',
                        name: 'acoes',
                        orderable: false,
                        searchable: false,
                        className: 'text-end'
                    }
                ],
                language: {
                    url: 'assets/js/json/pt-BR.json'
                }
            });

            $('#pesquisa').on('keyup', function () {
                tabela.search(this.value).draw();
            });

            const tipoSelect = document.getElementById("tipo-template");
            const campos = document.querySelectorAll("#form-template .tipo-campos");

            tipoSelect.addEventListener("change", function () {
                const tipoSelecionado = this.value;
                campos.forEach((div) => {
                    div.classList.toggle("d-none", div.getAttribute("data-tipo") !== tipoSelecionado);
                });
            });

            $('#kt_modal_1').on('hidden.bs.modal', function () {
                document.getElementById('tipo-template').value = '';
                document.getElementById('form-template').reset();
                campos.forEach((div) => div.classList.add('d-none'));
            });

            const tipoSelectEditar = document.getElementById("tipo-template-editar");
            const camposEditar = document.querySelectorAll("#form-template-editar .tipo-campos");

            tipoSelectEditar.addEventListener("change", function () {
                const tipoSelecionado = this.value;
                camposEditar.forEach((div) => {
                    div.classList.toggle("d-none", div.getAttribute("data-tipo") !== tipoSelecionado);
                });
            });

            $('#kt_modal_editar').on('hidden.bs.modal', function () {
                document.getElementById('tipo-template-editar').value = '';
                document.getElementById('form-template-editar').reset();
                camposEditar.forEach((div) => div.classList.add('d-none'));
            });

            $(document).on('click', '.btn-editar', function () {
                const btn = $(this);
                const form = $('#form-template-editar');

                form.attr('action', `/templates/${btn.data('id')}`);
                form.find('input[name="id"]').val(btn.data('id'));
                form.find('input[name="nome"]').val(btn.data('nome'));
                form.find('select[name="conta_whatsapp_id"]').val(btn.data('conta'));
                form.find('select[name="tipo"]').val(btn.data('tipo')).trigger('change');
                form.find('input[name="template_name"]').val(btn.data('template_name'));
                form.find('textarea[name="mensagem_livre"]').val(btn.data('mensagem_livre'));

                camposEditar.forEach((div) => {
                    div.classList.toggle('d-none', div.getAttribute('data-tipo') !== btn.data('tipo'));
                });

                $('#kt_modal_editar').modal('show');
            });

            $(document).on('click', '.btn-excluir', function () {
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Tem certeza?',
                    text: 'Essa ação não poderá ser desfeita!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sim, excluir',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/templates/${id}`,
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function () {
                                tabela.ajax.reload();
                            },
                            error: function () {
                                Swal.fire('Erro', 'Não foi possível excluir o template.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection