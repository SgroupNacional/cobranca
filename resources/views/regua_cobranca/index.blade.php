@extends('template.app')

@section('css')
<style>
    .timeline-wrapper {
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
    }

    .timeline-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #f9f9f9;
        border-radius: 8px;
        padding: 16px 24px;
        margin-bottom: 16px;
    }

    .timeline-info {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .timeline-bullet {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        border: 4px solid;
        background-color: transparent;
    }

    .timeline-yellow { border-color: #ffc107; }
    .timeline-blue { border-color: #0d6efd; }
    .timeline-green { border-color: #198754; }
    .timeline-red { border-color: #dc3545; }

    .timeline-nome {
        font-weight: bold;
        color: #2e2e2e;
        font-size: 16px;
    }

    .timeline-templates {
        color: #7d7d7d;
        font-size: 14px;
    }

    .timeline-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-sm.btn-light-primary {
        background-color: #EEF6FF;
        color: #009EF7;
        border: 1px solid #009EF7;
        font-weight: 600;
        padding: 6px 14px;
        box-shadow: 0 2px 4px rgba(0, 158, 247, 0.2);
        transition: all 0.2s ease-in-out;
    }

    .btn-sm.btn-light-primary:hover {
        background-color: #d6ecff;
        color: #007ad6;
        border-color: #007ad6;
        box-shadow: 0 4px 8px rgba(0, 158, 247, 0.3);
    }

    .btn-sm.btn-light-danger {
        background-color: #FFF5F0;
        color: #F1416C;
        border: 1px solid #F1416C;
        font-weight: 600;
        padding: 6px 14px;
        box-shadow: 0 2px 4px rgba(241, 65, 108, 0.2);
        transition: all 0.2s ease-in-out;
    }

    .btn-sm.btn-light-danger:hover {
        background-color: #ffe1e1;
        color: #bd003d;
        border-color: #bd003d;
        box-shadow: 0 4px 8px rgba(241, 65, 108, 0.3);
    }
</style>
@endsection

@section('corpo')
<div id="kt_app_content_container" class="app-container container-fluid">
    <div class="card card-flush">

        <div class="card-body px-10 py-10">
            <div class="d-flex justify-content-between align-items-center mb-10">
                <h3 class="card-title fw-bold text-dark mb-0">Régua de Cobrança</h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovaPosicao">
                    <i class="ki-outline ki-plus fs-2 me-1"></i> Nova Posição
                </button>
            </div>

            <div class="timeline-wrapper">
                @foreach($posicoes as $posicao)
                    @php
                        $cor = match(true) {
                            $posicao->pagamento => 'green',
                            $posicao->dias < 0 => 'yellow',
                            $posicao->dias == 0 => 'blue',
                            default => 'red'
                        };

                        $templateList = $posicao->acoes->pluck('descricao')->implode(', ');
                    @endphp

                    <div class="timeline-item">
                        <div class="timeline-info">
                            <span class="timeline-nome">{{ $posicao->nome ?? 'Posição #' . $loop->iteration }}</span>
                            <span class="timeline-bullet timeline-{{ $cor }}"></span>
                            <span class="timeline-templates">
                                {{ $templateList ?: 'Template definido pelo usuário' }}
                            </span>
                        </div>

                        <div class="timeline-actions">
                            <!-- Botão Templates -->
                            <button class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#modalEditarPosicao{{ $posicao->id }}">
                                <i class="ki-outline ki-pencil fs-6 me-1"></i> Templates
                            </button>

                            <!-- Botão Excluir -->
                            <form action="{{ route('regua-cobranca.destroy', $posicao->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta posição?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-light-danger">
                                    <i class="ki-outline ki-trash fs-6 me-1"></i> Excluir
                                </button>
                            </form>
                        </div>
                    </div>

                    @include('regua_cobranca.partials.modal_editar', ['posicao' => $posicao])
                @endforeach
            </div>
        </div>
    </div>

    @yield('modais')
</div>
@endsection

@section('modais')
    @include('regua_cobranca.partials.modal_nova')
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.modal').forEach(function (modal) {
            modal.addEventListener('change', function (e) {
                if (e.target.classList.contains('tipo-evento-switch')) {
                    const checkboxes = modal.querySelectorAll('.tipo-evento-switch');
                    checkboxes.forEach(cb => {
                        if (cb !== e.target) cb.checked = false;
                    });
                }
            });
        });
    });
</script>
@endsection
