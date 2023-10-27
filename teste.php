<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
</head>
<body>
    <h1>Get Set Attributte</h1>
    <?php
        $link_globo_esporte = 'https://ge.globo.com/';        

        echo <<< ANCORA
            
            <a id="lnk" href="$link_globo_esporte" target="_blank">Link</a>\n                             
            
        ANCORA;
    ?>
    <script>
        elem_a = document.getElementById("lnk");
        console.log(elem_a.href);
        elem_a.style.background = 'red';
        elem_a.href = 'https://www.youtube.com/';
        //elem_a.setAttribute = ("href", 'https://www.youtube.com/');
        console.log(elem_a.href);  
    </script>
</body>
</html>