<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leitura Diária</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white">
    <header class="flex justify-center bg-gray-200">
        <h2 class="text-black p-10"><?php echo $dados['book']['name'] . " " . $dados['chapter']['number'];?></h2>
        <p></p>
    </header>
    <article class="flex justify-center">
        <?php if ($indiceAtual > 0) : ?>
            <div class="flex justify-between bg-gray-200 text-gray-700">
                <a href="<?=$linkAnterior?>">ANT</a>
            </div>
        <?php endif; ?>
        <div class="w-96 p-3 text-justify">
            <?php foreach ($dados['verses'] as $verso): ?>
                <span class="inline text-white">
                    <sup>
                        <?=$verso['number']?>
                    </sup>
                </span>
                <span class="text-white">
                    <?=$verso['text']?>
                </span>
            <?php endforeach; ?>
        </div>
        <?php if ($indiceAtual < ($indicesArray - 1)) : ?>
            <div class="flex justify-between bg-gray-200 text-gray-700">
                <a href="<?=$linkProximo?>">PROX</a>
            </div>
        <?php endif; ?>
    </article>
</body>
</html>