<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Selo dos Ninjas | Identificador de Jutsu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0a0b10;
            --bg-card: rgba(255, 255, 255, 0.03);
            --fire: #ff4d00;
            --fire-glow: rgba(255, 77, 0, 0.3);
            --electric: #00d2ff;
            --electric-glow: rgba(0, 210, 255, 0.3);
            --text-main: #f0f0f5;
            --text-dim: #94a3b8;
            --border: rgba(255, 255, 255, 0.1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-main);
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .background-blobs {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.15;
            animation: float 20s infinite alternate;
        }

        .blob-1 { width: 500px; height: 500px; background: var(--fire); top: -100px; right: -100px; }
        .blob-2 { width: 600px; height: 600px; background: var(--electric); bottom: -200px; left: -200px; animation-delay: -5s; }

        @keyframes float {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(50px, 100px) scale(1.1); }
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px 20px 60px 20px;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(to right, #fff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 12px;
            letter-spacing: -1px;
        }

        .subtitle {
            color: var(--text-dim);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .grid-layout {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 30px;
        }

        @media (max-width: 900px) {
            .grid-layout { grid-template-columns: 1fr; }
        }

        .card {
            background: var(--bg-card);
            backdrop-filter: blur(12px);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
        }

        .label {
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-dim);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .seal-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 12px;
            margin-bottom: 30px;
        }

        .seal-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 16px;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: var(--text-main);
        }

        .seal-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-4px);
            border-color: var(--fire);
            box-shadow: 0 10px 20px -5px var(--fire-glow);
        }

        .seal-btn:active { transform: scale(0.95); }

        .seal-icon { font-size: 1.8rem; }
        .seal-name { font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px; }

        .sequence-display {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            padding: 20px;
            min-height: 120px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-content: flex-start;
            border: 1px dashed var(--border);
            margin-bottom: 20px;
        }

        .sequence-item {
            background: var(--fire);
            color: white;
            padding: 8px 16px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
            animation: popIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes popIn {
            from { transform: scale(0.5); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .remove-seal {
            cursor: pointer;
            background: rgba(0, 0, 0, 0.2);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: background 0.2s;
        }

        .remove-seal:hover { background: rgba(0, 0, 0, 0.4); }

        .controls { display: flex; gap: 12px; }

        .btn-clear {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text-dim);
            padding: 12px 24px;
            border-radius: 14px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-clear:hover { background: rgba(255, 255, 255, 0.05); color: #fff; }

        .result-panel { display: flex; flex-direction: column; gap: 20px; }

        .jutsu-card {
            background: linear-gradient(135deg, var(--fire), #ff8c00);
            border-radius: 20px;
            padding: 24px;
            text-align: center;
            box-shadow: 0 15px 30px -10px var(--fire-glow);
            animation: slideUp 0.4s ease-out;
            margin-bottom: 12px;
        }

        .jutsu-card.electric {
            background: linear-gradient(135deg, var(--electric), #00a2ff);
            box-shadow: 0 15px 30px -10px var(--electric-glow);
        }

        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .jutsu-title { font-size: 1.5rem; font-weight: 800; color: white; margin-bottom: 4px; }
        .jutsu-type { font-size: 0.8rem; text-transform: uppercase; font-weight: 700; color: rgba(255, 255, 255, 0.8); letter-spacing: 2px; }

        .btn-launch {
            background: white;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 800;
            text-transform: uppercase;
            cursor: pointer;
            margin-top: 16px;
            width: 100%;
            transition: transform 0.2s;
        }

        .btn-launch:hover { transform: scale(1.05); }

        /* Effects */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1000;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.5s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay.fire { background: radial-gradient(circle, var(--fire-glow) 0%, transparent 70%); }
        .overlay.electric { background: radial-gradient(circle, var(--electric-glow) 0%, transparent 70%); }
        .overlay.active { opacity: 1; animation: flash 1s forwards; }

        @keyframes flash {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }

        #jutsu-name-overlay {
            color: white;
            font-size: 5rem;
            font-weight: 900;
            text-shadow: 0 0 20px black;
            transform: scale(0.5);
            opacity: 0;
        }

        .overlay.active #jutsu-name-overlay {
            animation: zoomOut 1s forwards;
        }

        @keyframes zoomOut {
            0% { transform: scale(0.5); opacity: 0; }
            100% { transform: scale(1.5); opacity: 1; }
        }

        .automaton-debug { margin-top: 30px; }
        table { width: 100%; border-collapse: collapse; font-size: 0.85rem; color: var(--text-dim); }
        th { text-align: left; padding: 12px; border-bottom: 1px solid var(--border); color: var(--text-main); font-weight: 700; }
        td { padding: 12px; border-bottom: 1px solid rgba(255, 255, 255, 0.03); }
        .state-badge { background: rgba(255, 255, 255, 0.1); color: var(--text-main); padding: 2px 8px; border-radius: 6px; font-family: 'JetBrains Mono', monospace; font-size: 0.75rem; margin-right: 4px; }
        .empty-state { text-align: center; padding: 40px; color: var(--text-dim); font-style: italic; }
        #tabela-container { display: none; }
        .toggle-tabela { display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.9rem; color: var(--text-dim); margin-top: 10px; }
        .toggle-tabela input { display: none; }
        .toggle-slider { width: 44px; height: 24px; background: var(--border); border-radius: 12px; position: relative; transition: 0.3s; }
        .toggle-slider::before { content: ''; position: absolute; width: 18px; height: 18px; background: white; border-radius: 50%; top: 3px; left: 3px; transition: 0.3s; }
        input:checked + .toggle-slider { background: var(--electric); }
        input:checked + .toggle-slider::before { transform: translateX(20px); }

        .loading-shimmer { height: 4px; width: 100%; background: linear-gradient(to right, transparent, var(--fire), transparent); background-size: 200% 100%; animation: shimmer 1.5s infinite linear; position: absolute; top: 0; left: 0; border-radius: 24px 24px 0 0; display: none; }
        @keyframes shimmer { 0% { background-position: -200% 0; } 100% { background-position: 200% 0; } }
    </style>
</head>
<body>
    <div id="visual-effects" class="overlay">
        <div id="jutsu-name-overlay">JUTSU</div>
    </div>

    <div class="background-blobs">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
    </div>

    <div class="container">
        <header>
            <h1>Selo dos Ninjas</h1>
            <p class="subtitle">Faça os selos na ordem correta para despertar seu jutsu.</p>
        </header>

        <div class="grid-layout">
            <div class="interaction-zone">
                <div class="card" style="position: relative; min-height: 300px;">
                    <div id="loader" class="loading-shimmer"></div>
                    <div class="label">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 2a2 2 0 0 0-2 2v5H4a2 2 0 0 0-2 2v2c0 1.1.9 2 2 2h5v5c0 1.1.9 2 2 2h2a2 2 0 0 0 2-2v-5h5a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-5V4a2 2 0 0 0-2-2h-2z"/></svg>
                        Selecione os Selos
                    </div>
                    
                    <div class="seal-grid">
                        @php
                            $emojis = [
                                'TIGRE' => '🐅', 'BOI' => '🐂', 'COELHO' => '🐇', 'MACACO' => '🐒', 
                                'DRAGAO' => '🐉', 'PÁSSARO' => '🦅', 'COBRA' => '🐍', 'CAVALO' => '🐎',
                                'CARNEIRO' => '🐑', 'RATO' => '🐀', 'JAVALI' => '🐗', 'CÃO' => '🐕'
                            ];
                        @endphp
                        @foreach ($selosDisponiveis as $selo)
                            <button class="seal-btn" onclick="addSelo('{{ $selo }}')">
                                <span class="seal-icon">{{ $emojis[$selo] ?? '✋' }}</span>
                                <span class="seal-name">{{ $selo }}</span>
                            </button>
                        @endforeach
                    </div>

                    <div class="label">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Sequência Atual
                    </div>
                    <div class="sequence-display" id="sequence-display">
                        <div class="empty-state">Nenhum selo selecionado...</div>
                    </div>

                    <div class="controls">
                        <button class="btn-clear" onclick="clearSequence()">Limpar Tudo</button>
                    </div>
                </div>

                <div class="automaton-debug card">
                    <div class="label" style="justify-content: space-between; margin-bottom: 10px;">
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
                            Análise do Autômato (AFND)
                        </div>
                        <label class="toggle-tabela">
                            <span>Ver Tabela</span>
                            <input type="checkbox" id="show-tabela-toggle" onchange="toggleTabelaView()">
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    
                    <div id="tabela-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Passo</th>
                                    <th>Selo</th>
                                    <th>Estados Alcançados</th>
                                </tr>
                            </thead>
                            <tbody id="tabela-corpo"></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="result-sidebar">
                <div class="label">Status do Jutsu</div>
                <div class="result-panel">
                    <div id="no-jutsu" class="card" style="text-align: center; padding: 40px; border-style: dashed;">
                        <div style="font-size: 3rem; margin-bottom: 10px; opacity: 0.3;">㊙️</div>
                        <div style="color: var(--text-dim);">Aguardando sequência correta...</div>
                    </div>
                    <div id="jutsu-result-container"></div>
                </div>

                <div class="card" style="margin-top: 20px; background: rgba(255, 255, 255, 0.01);">
                    <div class="label">Dica de Treino</div>
                    <div style="font-size: 0.85rem; color: var(--text-dim);">
                        <strong>Chidori:</strong> BOI ➔ COELHO ➔ MACACO<br>
                        <strong>Katon:</strong> TIGRE ➔ DRAGAO ➔ COELHO ➔ TIGRE
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let sequence = [];
        const displayEl = document.getElementById('sequence-display');
        const jutsuContainer = document.getElementById('jutsu-result-container');
        const noJutsuEl = document.getElementById('no-jutsu');
        const tabelaContainer = document.getElementById('tabela-container');
        const tabelaToggle = document.getElementById('show-tabela-toggle');
        const tabelaCorpo = document.getElementById('tabela-corpo');
        const loader = document.getElementById('loader');
        const overlay = document.getElementById('visual-effects');
        const nameOverlay = document.getElementById('jutsu-name-overlay');

        async function addSelo(selo) {
            sequence.push(selo);
            renderSequence();
            await processSequence();
        }

        function removeSelo(index) {
            sequence.splice(index, 1);
            renderSequence();
            processSequence();
        }

        function clearSequence() {
            sequence = [];
            renderSequence();
            processSequence();
        }

        function renderSequence() {
            if (sequence.length === 0) {
                displayEl.innerHTML = '<div class="empty-state">Nenhum selo selecionado...</div>';
                return;
            }
            displayEl.innerHTML = sequence.map((s, i) => `
                <div class="sequence-item">
                    ${s}
                    <span class="remove-seal" onclick="removeSelo(${i})">✕</span>
                </div>
            `).join('');
        }

        function toggleTabelaView() {
            tabelaContainer.style.display = tabelaToggle.checked ? 'block' : 'none';
        }

        async function processSequence() {
            if (sequence.length === 0) {
                jutsuContainer.innerHTML = '';
                noJutsuEl.style.display = 'block';
                tabelaCorpo.innerHTML = '';
                return;
            }
            loader.style.display = 'block';
            try {
                const resp = await fetch('/api/jutsu?tabela=1', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                    body: JSON.stringify({ selos: sequence }),
                });
                const data = await resp.json();
                renderResults(data);
            } catch (err) {
                console.error(err);
            } finally {
                loader.style.display = 'none';
            }
        }

        function launchJutsu(name) {
            const isElectric = name.toLowerCase().includes('chidori');
            overlay.className = `overlay active ${isElectric ? 'electric' : 'fire'}`;
            nameOverlay.textContent = name;
            
            setTimeout(() => {
                overlay.className = 'overlay';
                clearSequence();
            }, 1000);
        }

        function renderResults(data) {
            const validJutsus = (data.jutsus || []).filter(j => j !== 'Nenhum jutsu identificado');
            if (validJutsus.length > 0) {
                noJutsuEl.style.display = 'none';
                jutsuContainer.innerHTML = validJutsus.map(j => `
                    <div class="jutsu-card ${j.toLowerCase().includes('chidori') ? 'electric' : ''}">
                        <div class="jutsu-type">Jutsu Identificado</div>
                        <div class="jutsu-title">${j}</div>
                        <button class="btn-launch" onclick="launchJutsu('${j}')">LANÇAR!</button>
                    </div>
                `).join('');
            } else {
                jutsuContainer.innerHTML = '';
                noJutsuEl.style.display = 'block';
            }

            if (data.tabela) {
                tabelaCorpo.innerHTML = data.tabela.map(p => `
                    <tr>
                        <td><strong>#${p.passo}</strong></td>
                        <td>${p.selo ? `<span class="sequence-item" style="padding: 4px 10px; font-size: 0.7rem; border-radius: 8px;">${p.selo}</span>` : '<span style="opacity: 0.4">Início</span>'}</td>
                        <td>
                            ${p.estados.length > 0 
                                ? p.estados.map(e => `<span class="state-badge">${e}</span>`).join('')
                                : '<span style="color: #ff4d00; font-size: 0.7rem;">∅ Interrompido</span>'}
                        </td>
                    </tr>
                `).join('');
            }
        }
    </script>
</body>
</html>
