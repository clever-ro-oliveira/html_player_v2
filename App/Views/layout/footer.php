</body>
<script>
    function tocar(arquivo, count) {
        window.location.href = "player/" + encodeURIComponent(arquivo) + "/" + count;
    }

    function proximo(count) {
        fetch('/retorna/' + count)
            .then(response => response.json())
            .then(data => {
                window.location.href = '/player/' + data.file + '/' + data.next;
            })
            .catch(() => alert('Erro ao carregar a próxima música.'));
    }
</script>

</html>