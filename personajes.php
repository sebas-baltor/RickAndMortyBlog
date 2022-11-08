<?php
 require("./src/partials/head.php");
 require("./src/Helper/ApiConsumer.php");
 require("./src/Helper/Render.php");
 $consumer = new ApiConsumer;
 $render = new Render;
 $pageId; //ayudara a que pidamos una pagina u otra
    if(isset($_GET['nextPage'])){ //vamos por una pagina despues
        $pageId = $_GET['nextPage']+=1;
    }else{
        $pageId = 1;
    } 
    if(isset($_GET['pageBack'])){// vamos por una pagina anterior
        $pageId = $_GET['pageBack']-=1;
    }
        echo "<h1 class='text-center title'>Personajes</h1>";
        $data = $consumer->Get("https://rickandmortyapi.com/api/character/?page={$pageId}");
        
        echo "<div class='container'>
                <div class='row'>
                <div class='col'>";
                if($pageId != 1){
                    echo "
                    <form  class='d-flex justify-conteent-between' action='personajes.php' method='GET'>
                    <button class='btn btn-dark' name='pageBack' value={$pageId} type='submit'>pagina anterior</button>
                    </form>";
                }
                echo"</div>
                <div class='col d-flex flex-row-reverse'>";
                if($pageId !=42){
                    echo"
                    <form  class='d-flex justify-conteent-between' action='personajes.php' method='GET'>
                    <button class='btn btn-dark' name='nextPage' value={$pageId} type='submit'>pagina siguiente</button>
                    </form>";
                }
                echo "</div>
                </div>
            ";
        echo "<h2 class='mb-3 text-center'>Pagina {$pageId}</h2> 
        </div>";
        
        echo "<div class='container d-flex flex-wrap mt-5 p-2 rounded'>";
        foreach($data->results as $character){
            $render->RenderCharacter($character);
        }
        echo "</div>";
        echo "
        ";

 require("./src/partials/footer.php");