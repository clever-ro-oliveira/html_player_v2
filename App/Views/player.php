<?php
include __DIR__ . '/layout/header.php'; ?>

<div class="container">
    <div class="child">
        <div class="player">
            <a onclick="proximo('<?= $count - 1; ?>')">
                <img class="controls backward" src="/assets/imagens/backward.png" title="Anterior">
            </a>
            <?php
            $arquivo = htmlspecialchars($arquivo);
            $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);

            if ($extensao === "mp3") {
                echo "<audio controls autoplay onended=\"proximo('" . ($count + 1) . "')\">
                            <source src=\"/assets/midias/$arquivo\" type=\"audio/mp3\">
                          </audio>";
            } elseif ($extensao === "mp4") {
                echo "<video controls autoplay onended=\"proximo('" . ($count + 1) . "')\">
                            <source src=\"/assets/midias/$arquivo\" type=\"video/mp4\">
                          </video>";
            }
            ?>
            <a onclick="proximo('<?= $count + 1; ?>')">
                <img class="controls forward" src="/assets/imagens/forward-button.png" title="Próxima">
            </a>
        </div>
        <div class="playing"><?= urldecode($arquivo); ?></div>
        <div>
            <button class="back-button" onclick="window.location.href='/'">Menu Principal</button>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/layout/footer.php'; ?>