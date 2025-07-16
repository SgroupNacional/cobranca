<!-- Botão Editar -->
<button type="button"
    class="btn btn-sm btn-primary btn-editar"
    data-id="{{ $canal->id }}"
    data-nome="{{ $canal->nome }}"
    data-tipo="{{ $canal->tipo }}"
    data-token="{{ $canal->token }}"
    data-url="{{ $canal->url }}"
    data-status="{{ $canal->status }}"
    data-bs-toggle="modal"
    data-bs-target="#kt_modal_editar">
    Editar
</button>

<!-- Modal Editar -->
<div class="modal fade" id="kt_modal_editar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h3 class="modal-title">Editar Canal</h3>
        <button type="button" class="btn btn-sm btn-icon btn-active-light-primary" data-bs-dismiss="modal">
          <i class="ki-outline ki-cross fs-1"></i>
        </button>
      </div>

      <form id="form-canal-editar" method="POST" action="{{ route('canais.update') }}">
        @csrf
        <input type="hidden" name="id">

        <div class="modal-body">
          <!-- Nome -->
          <div class="mb-5">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
          </div>

          <!-- Tipo -->
          <div class="mb-5">
            <label class="form-label">Tipo</label>
            <select name="tipo" class="form-select" id="tipo-canal-editar" required>
              <option value="">Selecione</option>
              <option value="api_oficial">API Oficial</option>
              <option value="api_noficial">API Não Oficial</option>
              <option value="sms">SMS</option>
              <option value="email">E-mail</option>
              <option value="voz">Canal de Voz</option>
            </select>
          </div>

      <!-- Campos dinâmicos -->
        <div class="tipo-campos d-none" data-tipo="api_oficial">
            <input name="token" type="text" class="form-control mb-3" placeholder="Token">
            <input name="url" type="url" class="form-control mb-3" placeholder="URL">
            <input name="cliente_id" type="text" class="form-control mb-3" placeholder="Cliente ID">
            <input name="cliente_secret" type="text" class="form-control mb-3" placeholder="Cliente Secret">
        </div>

        <div class="tipo-campos d-none" data-tipo="api_noficial">
            <input name="instancia" type="text" class="form-control mb-3" placeholder="Instância">
            <input name="token" type="text" class="form-control mb-3" placeholder="Token">
            <input name="webhook_url" type="url" class="form-control mb-3" placeholder="Webhook URL">
            <input name="chave_secreta" type="text" class="form-control mb-3" placeholder="Chave Secreta">
        </div>

        <div class="tipo-campos d-none" data-tipo="sms">
            <input name="remetente" type="text" class="form-control mb-3" placeholder="Remetente">
            <input name="api_key" type="text" class="form-control mb-3" placeholder="API Key">
            <input name="url" type="url" class="form-control mb-3" placeholder="URL">
        </div>

        <div class="tipo-campos d-none" data-tipo="email">
            <input name="smtp_host" type="text" class="form-control mb-3" placeholder="SMTP Host">
            <input name="usuario" type="text" class="form-control mb-3" placeholder="Usuário">
            <input name="senha" type="password" class="form-control mb-3" placeholder="Senha">
        </div>

        <div class="tipo-campos d-none" data-tipo="voz">
            <input name="numero_acesso" type="text" class="form-control mb-3" placeholder="Número de Acesso">
            <input name="chave_autenticacao" type="text" class="form-control mb-3" placeholder="Chave de Autenticação">
        </div>
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
  </form>
</div>


<form action="{{ route('canais.destroy', $canal->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
</form>
