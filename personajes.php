<?php
 require("./src/partials/head.php");
 require("./src/Helper/ApiConsumer.php");
 require("./src/Helper/Render.php");
 $consumer = new ApiConsumer;
 $render = new Render;
        echo "<h1 class='text-center title'>Personajes</h1>";
        echo "<div class='container d-flex flex-wrap mt-5 p-2 rounded'>";
        $data = $consumer->Get("https://rickandmortyapi.com/api/character");
        foreach($data->results as $character){
            $render->RenderCharacter($character);
        }
        echo "</div>";
        echo "
        ";

 require("./src/partials/footer.php");