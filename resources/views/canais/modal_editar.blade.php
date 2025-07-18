<!-- Modal Editar Canal -->
<div class="modal fade" id="kt_modal_editar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Editar Canal</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body">
                <form id="form-canal-editar">
                    <input type="hidden" name="id">
                    <div class="mb-5">
                        <label class="form-label">Nome do Canal</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" class="form-select" id="tipo-canal-editar" required>
                            <option value="">Selecione</option>
                            <option value="api_oficial">API Oficial</option>
                            <option value="api_noficial">API Não Oficial</option>
                            <option value="sms">SMS</option>
                            <option value="voz">Voz</option>
                            <option value="email">Email</option>
                        </select>
                    </div>
                    <!-- Campos dinâmicos -->
                    <div class="tipo-campos d-none" data-tipo="api_oficial">
                        <div class="mb-3"><label>Business_Id</label><input type="text" class="form-control" name="Business_Id"></div>
                        <div class="mb-3"><label>Number_Id</label><input type="url" class="form-control" name="Number_Id"></div>
                        <div class="mb-3"><label>Token</label><input type="text" class="form-control" name="token"></div>
                    </div>
                    <div class="tipo-campos d-none" data-tipo="api_noficial">
                        <div class="mb-3"><label>Instância</label><input type="text" class="form-control" name="instancia"></div>
                        <div class="mb-3"><label>Token</label><input type="text" class="form-control" name="token"></div>
                        <div class="mb-3"><label>Webhook URL</label><input type="url" class="form-control" name="webhook_url"></div>
                        <div class="mb-3"><label>Chave Secreta</label><input type="text" class="form-control" name="chave_secreta"></div>
                    </div>
                    <div class="tipo-campos d-none" data-tipo="sms">
                        <div class="mb-3"><label>Remetente</label><input type="text" class="form-control" name="remetente"></div>
                        <div class="mb-3"><label>API Key</label><input type="text" class="form-control" name="api_key"></div>
                        <div class="mb-3"><label>URL</label><input type="url" class="form-control" name="url_sms"></div>
                    </div>
                    <div class="tipo-campos d-none" data-tipo="email">
                        <div class="mb-3"><label>SMTP Host</label><input type="text" class="form-control" name="smtp_host"></div>
                        <div class="mb-3"><label>Usuário</label><input type="text" class="form-control" name="smtp_user"></div>
                        <div class="mb-3"><label>Senha</label><input type="password" class="form-control" name="smtp_password"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>
