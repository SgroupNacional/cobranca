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
                            <th class="min-w-125px">Cliente</th>
                            <th class="min-w-125px">Telefone</th>
                            <th class="min-w-125px">E-mail</th>
                            <th class="min-w-125px">Grupo</th>
                            <th class="text-end min-w-100px">Ações</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        <tr>
                            <td class="d-flex align-items-center">
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                    <a href="apps/user-management/users/view.html">
                                        <div class="symbol-label fs-3 bg-light-danger text-danger">AJ</div>
                                    </a>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">André Jálisson Gonzaga de Sousa</a>
                                    <span>044.670.953-06</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    (85)9 85965372
                                </div>
                                <div class="d-flex flex-column">
                                    -
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    andrejalisson@gmail.com
                                </div>
                                <div class="d-flex flex-column">
                                    andrejalisson@icloud.com
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-light-success fw-bold">Adimplente Premium</div>
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Ações
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a href="apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
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
                    url: '{{ url("/associados/listar") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    }
                },
                columns: [
                    { data: 'codigo', name: 'codigo' },
                    { data: 'nome', name: 'nome' },
                    { data: 'sistemas', name: 'sistemas'},
                    { data: 'regional', name: 'regional' },
                    { data: 'situacao', name: 'situacao'},
                    { data: 'acoes', name: 'acoes'},
                ],

                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
                }
            });

            $("#pesquisa").on('keyup', function () {
                tabela.search(this.value).draw();
            });
        });
    </script>
@endsection
