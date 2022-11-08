<?php
    require("./src/partials/head.php");
    require("./src/Helper/ApiConsumer.php");
    require("./src/Helper/Render.php");
    $consumer = new ApiConsumer;
    $render = new Render;
    echo "<h1 class='text-center title'>Capitulos</h1>";
    echo "<div class='container d-grid gap-3 bg-light mt-5 p-2 rounded'>";
        $data = $consumer->Get("https://rickandmortyapi.com/api/episode");
        foreach($data->results as $episode){
            $render->RenderChapter($episode,$episode->characters);
        }
    echo "</div>";
          
   
    require("./src/partials/footer.php");