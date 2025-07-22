<div class="modal fade" id="kt_modal_1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Novo Template</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body">
                <form id="form-template" method="POST" action="{{ route('templates.store') }}">
                    @csrf
                    <div class="mb-5">
                        <label class="form-label">Nome do Template</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Conta WhatsApp</label>
                        <select name="conta_whatsapp_id" class="form-select" required>
                            <option value="">Selecione</option>
                            @foreach($contas as $conta)
                                <option value="{{ $conta->id }}">{{ $conta->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" class="form-select" id="tipo-template" required>
                            <option value="">Selecione</option>
                            <option value="meta">Meta</option>
                            <option value="evolution">Evolution</option>
                        </select>
                    </div>
                    <div class="tipo-campos d-none" data-tipo="meta">
                        <div class="mb-3">
                            <label>Template Meta</label>
                            <input type="text" class="form-control" name="template_meta">
                        </div>
                    </div>
                    <div class="tipo-campos d-none" data-tipo="evolution">
                        <div class="mb-3">
                            <label>Mensagem Livre</label>
                            <textarea class="form-control" name="mensagem_livre"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" form="form-template" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>