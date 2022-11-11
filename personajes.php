<?php
 require("./src/partials/head.php");
 require("./src/Helper/ApiConsumer.php");
 require("./src/Helper/Render.php");
 $consumer = new ApiConsumer;
 $render = new Render;
 $pageId = 1; //ayudara a que pidamos una pagina u otra
    if(isset($_GET['nextPage'])){ //vamos por una pagina despues
        $pageId = $_GET['nextPage']+=1;
    }
    if(isset($_GET['pageBack'])){// vamos por una pagina anterior
        $pageId = $_GET['pageBack']-=1;
    }
    $data = $consumer->Get("https://rickandmortyapi.com/api/character/?page={$pageId}");
?>
<h1 class='text-center title'>Personajes</h1>
<div class='container mt-5'>
    <div class='row'>
        <div class='col'>
        <?php
            if($pageId != 1){
                echo "
                    <form  class='d-flex justify-conteent-between' action='personajes.php' method='GET'>
                        <button class='btn btn-dark' name='pageBack' value={$pageId} type='submit'>pagina anterior</button>
                    </form>";
            }
        ?>
        </div>
        <div class='col d-flex flex-row-reverse'>
        <?php
            if($pageId !=42){
                echo"
                    <form  class='d-flex justify-conteent-between' action='personajes.php' method='GET'>
                        <button class='btn btn-dark' name='nextPage' value={$pageId} type='submit'>pagina siguiente</button>
                    </form>";
            }
        ?>
        </div>
    </div>
        <?php
            echo "<h2 class='mb-3 mt-5 text-center'>\"Pagina {$pageId}\"</h2>"; 
        ?>
</div>
<div class='container d-flex flex-wrap justify-content-center mt-5 p-2 rounded'>
    <?php 
        foreach($data->results as $character){
            $render->RenderCharacter($character);
        }
    ?>
</div>
<?php
 require("./src/partials/footer.php");
 ?>