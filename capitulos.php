<?php
    require("./src/partials/head.php");
    require("./src/Helper/ApiConsumer.php");
    require("./src/Helper/Render.php");
    $consumer = new ApiConsumer;
    $render = new Render;
    $chapterId; //ayudara a que pidamos un capitulo u otro
    if(isset($_GET['nextChapter'])){ //vamos por un capitulo despues
        $chapterId = $_GET['nextChapter']+=1;
    }else{
        $chapterId = 1;
    } 
    if(isset($_GET['chapterBack'])){// vamos por un capitulo anterior
        $chapterId = $_GET['chapterBack']-=1;
    }

    echo "<h1 class='text-center title'>Capitulos</h1>";
    echo "<div class='container d-grid gap-3 bg-light mt-5 p-2 rounded'>";
    $data = $consumer->Get("https://rickandmortyapi.com/api/episode/{$chapterId}");
    echo "<div class='row'>
            <div class='col'>";
            if($chapterId != 1){
                echo "
                    <form  class='d-flex justify-conteent-between' action='capitulos.php' method='GET'>
                        <button class='btn btn-dark' name='chapterBack' value={$chapterId} type='submit'>capitulo anterior</button>
                    </form>";
            }
        echo"</div>
            <div class='col d-flex flex-row-reverse'>";
            if($chapterId !=51){
                echo"
                    <form  class='d-flex justify-conteent-between' action='capitulos.php' method='GET'>
                        <button class='btn btn-dark' name='nextChapter' value={$chapterId} type='submit'>capitulo siguiente</button>
                    </form>";
            }
        echo "</div>
        </div>";

    $render->RenderChapter($data,$data->characters);

    echo "</div>";
          
   
    require("./src/partials/footer.php");