<div class="modal fade" id="modalNovaPosicao" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('regua-cobranca.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h2 class="fw-bold">Nova Posição</h2>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>

                <div class="modal-body py-5 px-10">
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <label class="form-label">Dias (negativo = antes, positivo = após)</label>
                            <input type="number" name="dias" class="form-control" required>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label d-block">Registro do Boleto</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" name="registro" class="form-check-input tipo-evento-switch">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label d-block">Pagamento</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" name="pagamento" class="form-check-input tipo-evento-switch">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label d-block">Dia do Vencimento</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" name="vencimento" class="form-check-input tipo-evento-switch">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            @foreach($acoesDisponiveis as $acao)
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" name="acoes[]" value="{{ $acao->id }}" class="form-check-input" id="acao_{{ $acao->id }}">
                                        <label class="form-check-label" for="acao_{{ $acao->id }}">
                                            <i class="{{ $acao->icone }}"></i> {{ $acao->descricao }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
