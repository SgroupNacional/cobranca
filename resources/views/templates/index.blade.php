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
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @foreach($templates as $template)
                        <tr>
                            <td>{{ $template->id }}</td>
                            <td>{{ $template->nome }}</td>
                            <td>
                                <span class="badge badge-light-{{ $template->tipo == 'meta' ? 'primary' : 'success' }}">
                                    {{ ucfirst($template->tipo) }}
                                </span>
                            </td>
                            <td>{{ $template->contaWhatsapp->nome ?? '-' }}</td>
                            <td class="text-end">
                                <a href="{{ route('templates.edit', $template->id) }}"
                                    class="btn btn-sm btn-warning me-1">Editar</a>

                                <form action="{{ route('templates.destroy', $template->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este template?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
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
            const tabela = $('#tabela-templates').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
                }
            });

            $('#pesquisa').on('keyup', function () {
                tabela.search(this.value).draw();
            });

            $('#kt_modal_1').on('hidden.bs.modal', function () {
                document.getElementById('tipo-canal').value = '';
                document.querySelector('#form-canal').reset();
                campos.forEach((div) => div.classList.add('d-none'));
            });
        });
    </script>
@endsection