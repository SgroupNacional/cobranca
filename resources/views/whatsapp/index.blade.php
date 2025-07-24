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

                <!-- Botão à direita -->
                <a href="{{ route('whatsapp.create') }}" class="btn btn-primary mb-2">
                    <i class="ki-outline ki-plus fs-2"></i> Nova Conta
                </a>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="tabela-whatsapp">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th>#</th>
                        <th>Nome</th>
                        <th>Tipo de API</th>
                        <th>Número</th>
                        <th>ID da Conta (Meta)</th>
                        <th>ID do Número (Meta)</th>
                        <th>Instance ID (Evolution)</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    {{-- Populado via DataTable --}}
                </tbody>
            </table>
        </div>
    </div>
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

            const tabela = $('#tabela-whatsapp').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('whatsapp.listar') }}',
                    type: 'POST'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nome', name: 'nome' },
                    {
                        data: 'tipo_api',
                        name: 'tipo_api',
                        render: function (data) {
                            const badge = data === 'meta' ? 'primary' : 'success';
                            return `<span class="badge badge-light-${badge}">${data.charAt(0).toUpperCase() + data.slice(1)}</span>`;
                        }
                    },
                    { data: 'numero', name: 'numero' },
                    { data: 'business_account_id', name: 'business_account_id' },
                    { data: 'phone_number_id', name: 'phone_number_id' },
                    { data: 'instance_id', name: 'instance_id' },
                    { data: 'acoes', name: 'acoes', orderable: false, searchable: false, className: 'text-end' }
                ],
                language: {
                    url: '/assets/js/json/pt-BR.json'
                }
            });

            $("#pesquisa").on('keyup', function () {
                tabela.search(this.value).draw();
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
                            url: `/whatsapp/${id}`,
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