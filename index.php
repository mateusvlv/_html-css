 <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="cursoemvideo02.ico" type="image/x-icon">
    <title>Módulos HTML-CSS</title>
    <?php        
        $base_url = 'https://www.youtube.com/embed';
        $cap[0] = ['/videoseries?list=PLHz_AreHm4dkZ9-atkcmcBaMZdmLHft8n'];
        $cap[1] = ['/Ejkb_YpuHWs','/jgQjeqGRdgA','/VfIXgGJWLvA','/57wyfS560Uk','/0zLjVhHdOm8','/F74GKCLXUWM'];
        $cap[2] = ['/nlO5hySqJFA','/RFHSt1PCy0k'];
        $cap[3] = ['/B4FU3NFRTDw','/iSqf2iPqJNM'];
        $cap[4] = ['/UForX7ehChM','/E6CdIawPTh0'];
        $cap[5] = ['/f6NTJdtEFOc','/nhMdFe3WwYc'];
        $cap[6] = ['/bDULqeGEvAw','/xg-vHgLF0mI','/8rkuukKA8a4','/CwOmEetWMnU','/1ZeettFfxys'];
        $cap[7] = ['/aiOEBhozEOg'];
        $cap[8] = ['/HaSgt1hK2Fs','/T-d_hsO3hUI','/8TgKFYkcO5Y','/4ynvsrkamt8'];
        $cap[9] = ['/JlE0pzESf5g','/Ez1kgIyoGuE'];
        $cap[10] = ['/LeOVXQDsAIY','/LeLnlT-ZKw8','/Jszz7M676y8','/suL56Mdx22Y'];
        $cap[11] = ['/E01LDVj0Rpg','/cAgkwPWE4hU','/4OZYsFl-J9s','/DjOSM72cYac','/TCeyIwFGkYo','/3hng-hmSv2Y','/gqrySQQzvvQ'];
        $cap[12] = ['/byqhpuVpvEI','/fzyab4P2pn8','/-i1JVMspDJQ','/xYLizixflv4'];
        $mod2 = '/vPNIAJ9B4hg';
        $cap[13] = ['/A8UNBs7nxw4','/uKjKnztS3cY','/E2gaDa4ZaTc','/KC8dm9OvIOU','/Swh0Yt2s5Zs','/_P-guJX-TtU','/reFQrqxOzsg'];
        $cap[14] = ['/m54omTveWa8','/YZfzstEquas','/dMp1UFD8_lE','/NGfPXJGiNH8','/oHj5ez1bSkc','/FLuQonci9wU','/3YIXnxA1kqg','/XTtfM0L7Co0','/i_c5Fzk807M','/tJTtp4qyqdE'];
        $cap[15] = ['/TZuVpJmSNSE','/zXfTjPrMC_0','/WPtRX4n0UJs','/vMlrcOVr7po'];
        $cap[16] = ['/3ZFYXkzXhqE','/rXF1okX0v9E','/-CPoDvZLQ6k','/JPMm-jyKOaM','/JACiDRNWjjQ','/PGIrTzQqpqo','/n0rjAs_Im4w','/xS2D9x8odoE'];
        $cap[17] = ['/cKEA0-MOhOs','/YB9c1Zg_Ln4','/Zju-c3YWgSg','/D7jnoo7UHKE','/I_vi2q6sC1k','/3S5ts5bzvzM','/WcGPSeuJDJ0','/rAdHLNBTCgs','/TrfhQwSYCEk','/_KglicHxv3g','/pdomr7thueI','/u9NE0jInb_c','/V502R5sbIh4'];     

                
        $host = "localhost";
        $usuario = "root";
        $senha_usuario = "";
        $banco = 'cursos_cev';

        $link = mysqli_connect($host,$usuario,$senha_usuario,$banco);
        if(!$link){
            die("Conexão falhou! ".mysqli_connect_error());
        }
        $resultado = "";
        if(isset($_GET['episodio'])){
            $epis = $_GET['episodio'];
            $query_insercao = "UPDATE ultimoassistido SET html_css_modulo_1_2='$epis' WHERE id='1'";
            $rs = mysqli_query($link, $query_insercao);
            if($rs){
               echo "Valor Atualizado para $epis\n<br>"; 
            }           
        }
        $query = "SELECT html_css_modulo_1_2 from ultimoassistido limit 1";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $result);
        $lin = 0;
        $col = 0;
        while(mysqli_stmt_fetch($stmt)){
            $resultado = $result;
        }       
        mysqli_close($link);
        $k = 1;
        for($i = 0 ; $i < count($cap) ; $i++){
            if($i == 13){
                $k = 1;
            }
            for($j = 0 ; $j < count($cap[$i]) ; $j++){
                if($cap[$i][$j] == $resultado){
                    $lin = $i;//capítulo
                    $col = $j;//$col+1 = aula
                    $ep = $k;                    
                }                
                if($i != 0){
                    $k++;
                }
            }
        }

        //ANTERIOR
        $lin_do_ant = -2;
        $col_do_ant = -2;        
        if($lin == 1 && $col == 0){
            //1ª aula do 1º capitulo
            $lin_do_ant = - 1;
            $col_do_ant = -1;
        }
        else if($lin > 1 && $col == 0){
            //1ª aula de qq outro capítulo
            $lin_do_ant = $lin - 1;
            $col_do_ant = count($cap[$lin_do_ant]) - 1;
        }
        else{
            $lin_do_ant = $lin;
            $col_do_ant = $col - 1;            
        }

        //POSTERIOR
        $lin_do_post = -2;
        $col_do_post = -2;        
        if($lin == (count($cap) - 1) && $col == (count($cap[$lin]) - 1)){
            //última aula do último capítulo
            $lin_do_post = -1;
            $col_do_post = -1;            
        }
        else if($lin < (count($cap) - 1) && $col == (count($cap[$lin]) - 1)){
            //última aula de qq outro capítulo
            $lin_do_post = $lin + 1;
            $col_do_post = 0;
        }
        else {
            $lin_do_post = $lin;
            $col_do_post = $col + 1;           
        }

        //echo "ANTERIOR:[$lin_do_ant][$col_do_ant]   POSTERIOR[$lin_do_post][$col_do_post]\n";

        if($lin_do_ant < 0 || $col_do_ant < 0){            
            $resultado_ant = $resultado;
        }
        else{
            $resultado_ant = $cap[$lin_do_ant][$col_do_ant];
           
        }
        if($lin_do_post < 0 || $col_do_post < 0){
            $resultado_post = $resultado;
        }
        else{        
            $resultado_post = $cap[$lin_do_post][$col_do_post];           
        }
        echo <<< EPS
        <script>
                var ep_anterior = "$resultado_ant";
                var ep_parou = "$resultado";
                var ep_posterior = "$resultado_post";                 
        \t</script>\n
        EPS;
        $episodio_onde_parou = $base_url.$cap[$lin][$col];
        $episodio_anterior = $resultado_ant == -3 ? $episodio_onde_parou : $base_url.$resultado_ant;        
        $episodio_posterior = $resultado_post == -3 ? $episodio_onde_parou : $base_url.$resultado_post;

        $episodio_em_reproducao = $episodio_onde_parou; 
    ?>
    <script>
        js_cap = Array(18)
        base_url = 'https://www.youtube.com/embed';
        js_cap[0] = ['/videoseries?list=PLHz_AreHm4dkZ9-atkcmcBaMZdmLHft8n'];
        js_cap[1] = ['/Ejkb_YpuHWs','/jgQjeqGRdgA','/VfIXgGJWLvA','/57wyfS560Uk','/0zLjVhHdOm8','/F74GKCLXUWM'];
        js_cap[2] = ['/nlO5hySqJFA','/RFHSt1PCy0k'];
        js_cap[3] = ['/B4FU3NFRTDw','/iSqf2iPqJNM'];
        js_cap[4] = ['/UForX7ehChM','/E6CdIawPTh0'];
        js_cap[5] = ['/f6NTJdtEFOc','/nhMdFe3WwYc'];
        js_cap[6] = ['/bDULqeGEvAw','/xg-vHgLF0mI','/8rkuukKA8a4','/CwOmEetWMnU','/1ZeettFfxys'];
        js_cap[7] = ['/aiOEBhozEOg'];
        js_cap[8] = ['/HaSgt1hK2Fs','/T-d_hsO3hUI','/8TgKFYkcO5Y','/4ynvsrkamt8'];
        js_cap[9] = ['/JlE0pzESf5g','/Ez1kgIyoGuE'];
        js_cap[10] = ['/LeOVXQDsAIY','/LeLnlT-ZKw8','/Jszz7M676y8','/suL56Mdx22Y'];
        js_cap[11] = ['/E01LDVj0Rpg','/cAgkwPWE4hU','/4OZYsFl-J9s','/DjOSM72cYac','/TCeyIwFGkYo','/3hng-hmSv2Y','/gqrySQQzvvQ'];
        js_cap[12] = ['/byqhpuVpvEI','/fzyab4P2pn8','/-i1JVMspDJQ','/xYLizixflv4'];
        js_mod2 = '/vPNIAJ9B4hg';
        js_cap[13] = ['/A8UNBs7nxw4','/uKjKnztS3cY','/E2gaDa4ZaTc','/KC8dm9OvIOU','/Swh0Yt2s5Zs','/_P-guJX-TtU','/reFQrqxOzsg'];
        js_cap[14] = ['/m54omTveWa8','/YZfzstEquas','/dMp1UFD8_lE','/NGfPXJGiNH8','/oHj5ez1bSkc','/FLuQonci9wU','/3YIXnxA1kqg','/XTtfM0L7Co0','/i_c5Fzk807M','/tJTtp4qyqdE'];
        js_cap[15] = ['/TZuVpJmSNSE','/zXfTjPrMC_0','/WPtRX4n0UJs','/vMlrcOVr7po'];
        js_cap[16] = ['/3ZFYXkzXhqE','/rXF1okX0v9E','/-CPoDvZLQ6k','/JPMm-jyKOaM','/JACiDRNWjjQ','/PGIrTzQqpqo','/n0rjAs_Im4w','/xS2D9x8odoE'];
        js_cap[17] = ['/cKEA0-MOhOs','/YB9c1Zg_Ln4','/Zju-c3YWgSg','/D7jnoo7UHKE','/I_vi2q6sC1k','/3S5ts5bzvzM','/WcGPSeuJDJ0','/rAdHLNBTCgs','/TrfhQwSYCEk','/_KglicHxv3g','/pdomr7thueI','/u9NE0jInb_c','/V502R5sbIh4'];        
    </script>
</head>
<body>
    <header>
        <h1>AULAS DE HTML5 E CSS3</h1>
    </header>
    <nav>        
        <ul type="none">
            <span>Módulo 1</span>
            <?php
                $k = 1; 
                for($i = 1 ; $i <= 12 ; $i++){
                    if($i > 1){
                        echo "\t\t\t";
                    }                   
                    echo "<ul type='none'>\n";
                    echo "\t\t\t\t<span class='nome-cap'>$i"."º Cap.</span>\n";
                    for($j = 0 ; $j < count($cap[$i]) ; $j++){
                        $id_video = $cap[$i][$j];
                        $link = $base_url.$id_video;
                        echo "\t\t\t\t<a href='$link' onclick=pegaLink('$id_video') target='framevideo'><li>Ep. $k</li></a>\n";
                        $k++;                        
                    }
                    echo "\t\t\t</ul>";
                    if($i < 12){
                        echo "\n";
                    }                    
                }
            ?>            
        </ul>            
        <ul type="none">
            <span>Módulo 2</span>
            <?php
                $k=1; 
                for($i = 13 ; $i <= 17 ; $i++){
                    if($i > 13){
                        echo "\t\t\t";
                    }                    
                    echo "<ul type='none'>\n";
                    echo "\t\t\t\t<span class='nome-cap'>$i"."º Cap.</span>\n";
                    for($j = 0 ; $j < count($cap[$i]) ; $j++){
                        $id_video = $cap[$i][$j];
                        $link = $base_url.$id_video;
                        echo "\t\t\t\t<a href='$link' onclick=pegaLink('$id_video') target='framevideo'><li>Ep. $k</li></a>\n";
                        $k++;                        
                    }
                    echo "\t\t\t</ul>";
                    if($i < 17){
                        echo "\n";
                    }                    
                }                
            ?>            
        </ul>           
    </nav>
    <main>        
        <h2>Último Assistido! Capítulo <span id="span-capitulo"><?=$lin?></span>, Aula <span id="span-aula"><?=($col+1)?></span> (Episódio <span id='span-ep'><?=$ep?></span>)</h2>
        
        <div id='video'>
            <iframe name="framevideo" src="<?=$episodio_onde_parou?>" title="Episódio 01" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> 
        </div>
        <div id='setas'>
            <a id="seta-esq" href="<?=$episodio_anterior?>" target="framevideo" onclick="pegaLink('<?=$resultado_ant?>')"><strong><<  </strong>Vídeo Anterior</a>
            <span></span>
            <a id="seta-dir" href="<?=$episodio_posterior?>" target="framevideo" onclick="pegaLink('<?=$resultado_post?>')">Próximo Vídeo<strong>  >></strong></a>
        </div>
        <script>
            document.getElementById("seta-esq").addEventListener("click", function leSeta(){
                pegaLink(onde)
            })
        </script>
        
        <!--

        echo "\t\t\t\t<a href='$link' onclick=pegaLink('$id_video') target='framevideo'><li>Ep. $k</li></a>\n";

        -->
        <div id='atualizacao'>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
                Marcar como o epsiodio (<span id="span-link"></span>) que episódio onde parou?               
                <input type="hidden" id="input-hidden" name="episodio" value="">
                <input type="submit" value="SIM"></input>  
            </form>
        </div>        
    </main>
    <footer>        
        <p>v L v - HTML5/CSS3</p>
    </footer>
    <script>
        //PARTE DE CÓDIGO QUE SÓ DESCOBRE O EPISÓDIO DE ACORDO COM O NÚMERO DA AULA E DO CAPÍTULO        

       /*capitulo = Number(document.getElementById("span-capitulo").innerText);
        aula = Number(document.getElementById("span-aula").innerText);
        console.log(`Capítulo: ${capitulo} e Aula: ${aula}`);
        elem_episodio = document.getElementById("span-ep");
        k = 1
        if(capitulo >= 1 && capitulo <= 12){
            //modulo 1
            for(i = 1 ; i <= capitulo ; i++){
                console.log(`Cap. ${i} tem ${js_cap[i].length} aulas`)
                for(j = 1 ; j < js_cap[i].length ; j++){                
                    if(i == capitulo && j == aula){
                        break;
                    }
                    k++;
                }
            } 
        }        
        elem_episodio.innerText = k;*/

        var elem_base = document.getElementById('span-link');
        elem_base.innerText = ep_parou;                
        
        var elem_hidden_value = document.getElementById('input-hidden');
        elem_hidden_value.value = ep_parou;       
        
        function pegaLink(link){         
            console.log(link);      
            elem_base = document.getElementById('span-link');
            elem_base.innerText = link;
            var elem_hidden_value = document.getElementById('input-hidden');
            elem_hidden_value.value = link; 
            
            elem_span_ep = document.getElementById("span-ep");
            elem_span_capitulo = document.getElementById("span-capitulo");
            elem_span_aula = document.getElementById("span-aula");

            array_links_ep = Array(2);
            array_links_ep = descobreLinksAntPost(link);
            console.log(`Ant: ${array_links_ep[0]} e Post: ${array_links_ep[1]}`);
            elem_a_ant = document.getElementById("seta-esq");
            elem_a_post = document.getElementById("seta-dir");
            link_ant = base_url+array_links_ep[0];
            link_post = base_url+array_links_ep[1];

            elem_a_ant.href = link_ant;
            elem_a_post.href = link_post;

            console.log(elem_a_ant.href);
            console.log(elem_a_post.href);

            array_cap_aula_ep = Array(3);
            array_cap_aula_ep = descobreCapAulaEpis(link);         
            
            elem_span_capitulo.innerText = String(array_cap_aula_ep[0]);
            elem_span_aula.innerText = String(array_cap_aula_ep[1]); 
            elem_span_ep.innerText = String(array_cap_aula_ep[2]);                         
        }

        function descobreLinksAntPost(lnk){
            linha = -2;
            coluna = -2;           
            for(i = 1 ; i < js_cap.length ; i++){
                for(j = 0 ; j < js_cap[i].length ; j++){
                    if(js_cap[i][j] == lnk){
                        linha = i;
                        coluna = j;              
                    }
                }
            }
            console.log(`lin: ${linha} col: ${coluna}`);

            //ANTERIOR
            linha_do_anter = -2;
            coluna_do_anter = -2;        
            if(linha == 1 && coluna == 0){
                //1ª aula do 1º capitulo
                linha_do_anter = - 1;
                coluna_do_anter = -1;
            }
            else if(linha > 1 && coluna == 0){
                //1ª aula de qq outro capítulo
                linha_do_anter = linha - 1;
                coluna_do_anter = js_cap[linha_do_anter].length - 1;
            }
            else{
                linha_do_anter = linha;
                coluna_do_anter = coluna - 1;            
            }

            //POSTERIOR
            linha_do_poster = -2;
            coluna_do_poster = -2;        
            if(linha == (js_cap.length - 1) && coluna == (js_cap[linha].length - 1)){
                //última aula do último capítulo
                linha_do_poster = -1;
                coluna_do_poster = -1;            
            }
            else if(linha < (js_cap.length - 1) && coluna == (js_cap[linha].length - 1)){
                //última aula de qq outro capítulo
                linha_do_poster = linha + 1;
                coluna_do_poster = 0;
            }
            else {
                linha_do_poster = linha;
                coluna_do_poster = coluna + 1;           
            }

            console.log(`ANTERIOR:[${linha_do_anter}][${coluna_do_anter}]   POSTERIOR[${linha_do_poster}][${coluna_do_poster}]\n`);

            if(linha_do_anter < 0 || coluna_do_anter < 0){            
                link_anter = lnk;
            }
            else{
                link_anter = js_cap[linha_do_anter][coluna_do_anter];           
            }
            if(linha_do_poster < 0 || coluna_do_poster < 0){
                link_poster = lnk;
            }
            else{        
                link_poster = js_cap[linha_do_poster][coluna_do_poster];           
            }
            return [link_anter, link_poster];
        }

        function descobreCapAulaEpis(lnk){ 
            k=1;          
            for(i=1;i<js_cap.length;i++){
                if(i==13){
                    k=1;
                }                
                for(j=0;j<js_cap[i].length;j++){
                    if(js_cap[i][j] == lnk){
                        return [i,j+1,k];                       
                    }
                    k++;
                }
            }
        }
        </script>        
</body>
</html>