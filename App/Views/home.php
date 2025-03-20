<?php
include __DIR__ . '/layout/header.php'; ?>

<div class="container-home">
    <div class="child">
        <div class="media-grid">
            <?php foreach ($medias as $index => $reg): ?>
                <div class="media-item" onclick="tocar('<?= htmlspecialchars($reg['arquivo']); ?>', '<?= $index + 1; ?>')">
                    <img class="play-button" title="Play" alt="Play" src="/assets/imagens/play-button.png">
                    <span><?= htmlspecialchars($reg['arquivo']); ?></span>
                    <img class="play-button extensao" title="Play" alt="Play" src="/assets/imagens/<?= htmlspecialchars($reg['extensao']); ?>.png">
                </div>
            <?php endforeach; ?>
        </div>
        <div class="update-button">
            <button class="back-button" onclick="window.location.href='/sync-files'">Atualizar Músicas</button>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/layout/footer.php'; ?>