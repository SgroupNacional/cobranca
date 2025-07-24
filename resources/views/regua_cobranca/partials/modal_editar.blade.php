<div class="modal fade" id="modalEditarPosicao{{ $posicao->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('regua-cobranca.update', $posicao->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h2 class="fw-bold">Editar Posição #{{ $posicao->id }}</h2>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>

                <div class="modal-body py-5 px-10">
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <label class="form-label">Dias (negativo = antes, positivo = após)</label>
                            <input type="number" name="dias" class="form-control" value="{{ $posicao->dias }}" required>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label d-block">Registro do Boleto</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" name="registro" class="form-check-input tipo-evento-switch"
                                    {{ $posicao->registro ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label d-block">Pagamento</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" name="pagamento" class="form-check-input tipo-evento-switch"
                                    {{ $posicao->pagamento ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label d-block">Dia do Vencimento</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" name="vencimento" class="form-check-input tipo-evento-switch"
                                    {{ $posicao->vencimento ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="col-md-4 mt-5">
                            <label class="form-label">Template</label>
                            <select name="template_id" class="form-select form-select-solid">
                                <option value="">Nenhum template disponível</option>
                                {{-- @foreach($templates as $template)
                                    <option value="{{ $template->id }}" {{ $posicao->template_id == $template->id ? 'selected' : '' }}>
                                        {{ $template->nome }}
                                    </option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="row">
                            @foreach($acoesDisponiveis as $acao)
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" name="acoes[]" value="{{ $acao->id }}"
                                            class="form-check-input"
                                            id="editar_acao_{{ $posicao->id }}_{{ $acao->id }}"
                                            {{ $posicao->acoes->contains('descricao', $acao->descricao) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editar_acao_{{ $posicao->id }}_{{ $acao->id }}">
                                            <i class="{{ $acao->icone }}"></i> {{ $acao->descricao }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <form method="POST" action="{{ route('regua-cobranca.destroy', $posicao->id) }}">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta posição?')">
                            Excluir posição
                        </button>
                    </form>
                    <div>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar alterações</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
