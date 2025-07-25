@extends('template.app')

@section('corpo')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <h3 class="card-title">Novo Template de Mensagem</h3>
                </div>

                <div class="card-body pt-0 pb-6">
                    <form method="POST" action="{{ route('templates.store') }}">
                        @csrf

                        <div class="mb-5">
                            <label class="form-label required">Nome Interno</label>
                            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
                        </div>

                        <div class="mb-5">
                            <label class="form-label required">Conta WhatsApp</label>
                            <select name="conta_whatsapp_id" id="conta_whatsapp_id" class="form-select" required>
                                <option value="">Selecione...</option>
                                @foreach ($contas as $conta)
                                    <option value="{{ $conta->id }}" data-api="{{ $conta->tipo_api }}" {{ old('conta_whatsapp_id') == $conta->id ? 'selected' : '' }}>
                                        [{{ strtoupper($conta->tipo_api) }}] {{ $conta->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Campos Meta --}}
                        <div class="mb-5 d-none" id="meta_fields">
                            <label class="form-label required">Template da Meta</label>
                            <select name="template_meta" id="template_meta" class="form-select" required>
                                <option value="">Selecione...</option>
                            </select>
                        </div>

                        <div class="row d-none" id="meta_preview_container">
                            <div class="col-md-6">
                                <label class="form-label">Campos Disponíveis</label>
                                <div id="available_fields" class="mb-4"></div>

                                <label class="form-label">Mapeamento de Variáveis</label>
                                <div id="variaveis_container"></div>

                                {{-- Campo de Origem do Documento --}}
                                <div class="mb-5 d-none" id="header_field">
                                    <label class="form-label required">Campo de Origem do Documento</label>
                                    <input type="text" name="variaveis_header[campo_origem]" id="link_documento"
                                        class="form-control" placeholder="Ex: boletos.link_documento"
                                        value="{{ old('variaveis_header.campo_origem') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Pré-visualização da Mensagem</label>
                                <div id="preview_card">
                                    <div id="app-header">
                                        <img src="{{ asset('svg/topo-app.svg') }}" alt="Topo do App" class="w-100" />
                                    </div>
                                    <div id="app-content">
                                        <div id="preview_header" class="preview-header"></div>
                                        <div id="preview_text" class="preview-text"></div>
                                    </div>
                                    <div id="app-bottom">
                                        <img src="{{ asset('svg/bottom-app.svg') }}" alt="Bottom do App" class="w-100" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Campos Evolution --}}
                        <div class="mb-5 d-none" id="evolution_fields">
                            @verbatim
                                <label class="form-label required">Mensagem Livre (use {{variaveis}})</label>
                            @endverbatim
                            <textarea name="mensagem_livre" class="form-control"
                                rows="4">{{ old('mensagem_livre') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('templates.index') }}" class="btn btn-light me-3">Cancelar</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="ki-outline ki-check fs-2"></i> Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
<style>
    /* Bolha WhatsApp */
    #preview_card {
        width: 400px;
        border-radius: 8px;
        font-family: 'Segoe UI', Arial, sans-serif;
        position: relative;
    }


    .preview-text {
        width: 65%;
        background: #c3ffc3ff;
        position: absolute;
        right: 20px;
        margin-top: 10px;
        margin-right: 10px;
        padding: 10px 10px 20px 10px;
        border-radius: 10px;
    }

    .preview-text::after {
        content: '';
        position: absolute;
        bottom: 7px;
        right: 7px;
        background-image: url('/svg/confirmacao-envio.svg');
        width: 53px;
        height: 11px;
        background-size: contain;
        background-repeat: no-repeat;
    }

    #app-content {
        background-image: url('/svg/content-app.svg');
        background-repeat: repeat-y;
        background-size: 100% auto;
        background-position: center top;
        height: 500px;
    }

    /* Drag & Drop */
    .draggable-item {
        cursor: grab;
        padding: 6px 8px;
        background: #f1f1f1;
        border-radius: 4px;
        margin-bottom: 4px;
    }

    .tag-input {
        min-height: 38px;
        cursor: text;
        padding: .375rem .75rem;
    }

    .tag-input .badge {
        margin-right: 4px;
        cursor: default;
    }
</style>
@section('css')

@section('script')
    @verbatim
        <script>
            const contaSelect = document.getElementById('conta_whatsapp_id');
            const templateMeta = document.getElementById('template_meta');
            const metaFields = document.getElementById('meta_fields');
            const evolutionFields = document.getElementById('evolution_fields');
            const previewContainer = document.getElementById('meta_preview_container');
            const previewHeader = document.getElementById('preview_header');
            const previewText = document.getElementById('preview_text');
            const variaveisContainer = document.getElementById('variaveis_container');
            const headerField = document.getElementById('header_field');
            const availableFields = ['associados.nome', 'boletos.valor', 'boletos.link_boleto'];

            // Init draggable items
            function initDraggable() {
                const container = document.getElementById('available_fields');
                container.innerHTML = '';
                availableFields.forEach(f => {
                    const div = document.createElement('div');
                    div.className = 'draggable-item badge bg-primary m-1 text-white';
                    div.draggable = true;
                    div.textContent = f;
                    div.addEventListener('dragstart', e => {
                        e.dataTransfer.setData('text/plain', f);
                    });
                    container.appendChild(div);
                });
            }

            function extrairVariaveis(texto) {
                const regex = /\{\{(\d+)\}\}/g;
                const indices = new Set();
                let match;
                while ((match = regex.exec(texto)) !== null) {
                    indices.add(parseInt(match[1], 10));
                }
                return Array.from(indices).sort((a, b) => a - b);
            }

            function formatWhatsApp(text) {
                let html = text
                    .replace(/```([\s\S]*?)```/g, '<code style="background:#fff;padding:2px 4px;border-radius:4px;">$1</code>')
                    .replace(/\*(.*?)\*/g, '<strong>$1</strong>')
                    .replace(/_(.*?)_/g, '<em>$1</em>')
                    .replace(/~(.*?)~/g, '<del>$1</del>')
                    .replace(/__(.*?)__/g, '<u>$1</u>');
                return html.replace(/\n/g, '<br>');
            }

            function gerarCamposVariaveis(indices) {
                variaveisContainer.innerHTML = '';
                indices.forEach(i => {
                    const row = document.createElement('div');
                    row.classList.add('mb-4');

                    // LABEL
                    const label = document.createElement('label');
                    label.innerHTML = `Variável @{{ ${i} }}`;

                    // DIV contenteditable para tags
                    const tagInput = document.createElement('div');
                    tagInput.className = 'form-control mb-2 tag-input';
                    tagInput.contentEditable = true;
                    tagInput.dataset.index = i;
                    tagInput.setAttribute('placeholder', 'Arraste um campo aqui');

                    // INPUT hidden para submissão
                    const hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.name = `variaveis[${i}][campo_origem]`;
                    hidden.id = `hidden-variavel-${i}`;

                    // listeners de D&D
                    tagInput.addEventListener('dragover', e => e.preventDefault());
                    tagInput.addEventListener('drop', e => {
                        e.preventDefault();
                        const field = e.dataTransfer.getData('text/plain');

                        // limpa conteúdo anterior
                        tagInput.innerHTML = '';

                        // cria badge
                        const badge = document.createElement('span');
                        badge.className = 'badge bg-primary text-white';
                        badge.textContent = field;
                        tagInput.appendChild(badge);

                        // atualiza hidden
                        hidden.value = field;
                    });

                    row.appendChild(label);
                    row.appendChild(tagInput);
                    row.appendChild(hidden);
                    variaveisContainer.appendChild(row);
                });
            }

            contaSelect.addEventListener('change', function () {
                const tipo = this.selectedOptions[0].dataset.api;
                metaFields.classList.add('d-none');
                evolutionFields.classList.add('d-none');
                previewContainer.classList.add('d-none');
                headerField.classList.add('d-none');

                // sempre remove required e desabilita
                templateMeta.required = false;
                templateMeta.disabled = true;

                if (tipo === 'meta') {
                    metaFields.classList.remove('d-none');
                    templateMeta.disabled = false;
                    templateMeta.required = true;

                    initDraggable();
                    templateMeta.innerHTML = '<option>Carregando...</option>';
                    fetch(`/templates/meta/listar-templates/${this.value}`)
                        .then(r => r.json())
                        .then(data => {
                            templateMeta.innerHTML = '<option value="">Selecione...</option>';
                            data.forEach(item => {
                                const opt = document.createElement('option');
                                opt.value = item.name;
                                opt.text = item.name;
                                opt.dataset.components = JSON.stringify(item.components);
                                templateMeta.appendChild(opt);
                            });
                        });
                }
                else if (tipo === 'evolution') evolutionFields.classList.remove('d-none');
            });

            templateMeta.addEventListener('change', function () {
                const sel = this.selectedOptions[0];
                if (!sel) return;
                const components = JSON.parse(sel.dataset.components || '[]');
                const body = components.find(c => c.type === 'BODY')?.text || '';
                const header = components.find(c => c.type === 'HEADER');

                previewText.innerHTML = formatWhatsApp(body);
                previewHeader.innerHTML = '';
                if (header?.format === 'DOCUMENT') previewHeader.innerHTML = '📎 Documento anexado';
                else if (header?.format === 'IMAGE') previewHeader.innerHTML = '🖼️ Imagem anexada';
                previewContainer.classList.remove('d-none');

                const vars = extrairVariaveis(body);
                if (vars.length) gerarCamposVariaveis(vars);
                else variaveisContainer.innerHTML = '<div class="text-muted">Nenhuma variável encontrada.</div>';

                if (header?.format === 'DOCUMENT') headerField.classList.remove('d-none');
            });

            // inicializa se já tiver seleção
            if (contaSelect.value) contaSelect.dispatchEvent(new Event('change'));
        </script>
    @endverbatim
@endsection