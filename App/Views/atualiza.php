<?php
include __DIR__ . '/layout/header.php'; ?>

<div class="container">
    <div class="child">
        <div class="atualiza-title">Player Atualizado</div>
        <div class="resultado">
            <div class="resultado-title">Verificados</div>
            <div class="resultado-valor"><?= $result['atualizados'] ?></div>
        </div>
        <div class="resultado">
            <div class="resultado-title">Adicionados</div>
            <div class="resultado-valor"><?= $result['adicionados'] ?></div>
        </div>
        <div class="resultado">
            <div class="resultado-title">Removidos</div>
            <div class="resultado-valor"><?= $result['removidos'] ?></div>
        </div>
        <div>
            <button class="back-button" onclick="window.location.href='/'">Menu Principal</button>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/layout/footer.php'; ?>