@extends('template.app')

@section('css')
    <link href="{{ asset('/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('corpo')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" class="form-control form-control-solid w-250px ps-13" id="pesquisa" placeholder="Pesquisar Cliente" />
                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="tabelaClientes">
                        <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-150px">Cliente</th>
                            <th class="min-w-125px">Telefone</th>
                            <th class="min-w-125px">E-mail</th>
                            <th class="min-w-125px">Grupo</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var tabela = $('#tabelaClientes').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("cliente.listar") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    }
                },
                columns: [
                    { data: 'cliente', name: 'cliente' },
                    { data: 'telefone', name: 'telefone' },
                    { data: 'email', name: 'email'},
                    { data: 'grupo', name: 'grupo' },
                ],

                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
                }
            });

            $("#pesquisa").on('keyup', function () {
                tabela.search(this.value).draw();
            });
        });
    </script>
@endsection
