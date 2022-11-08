<?php

    require("./src/partials/head.php");
    require("./src/Helper/ApiConsumer.php");
    require("./src/Helper/Render.php");
    $consumer = new ApiConsumer;
    $render = new Render;
    $res = $consumer->get("https://rickandmortyapi.com/api/episode/1");
?>
<div class="container">
        <div class="position-relative mb-5">
            <img class="position-absolute top-50 start-50 translate-middle-x" src="./src/public/img/text_logo.png" alt="texto rick and morty" width="300px" style="filter:grayscale(100%) saturate(50%) contrast(175%);">
            <h1 class="text-center title">Blog</h1>
        </div>
        <div class="row">
            <?php
                $render->RenderChapter($res,$res->characters);
            ?>
            <div class="col-3 ms-4">
                <aside class="pb-5 mt-5 d-flex flex-column flex-wrap align-items-center shadow rounded bg-secondary bg-opacity-10">
                    <h2 class="mb-3 mt-5">Personajes</h2>
                    <?php
                        for($i = 0;$i<3;$i++){
                            $random = rand(1,826);
                            $data = $consumer->Get("https://rickandmortyapi.com/api/character/{$random}");
                            $render->RenderCharacter($data);
                        }
                    ?>
                </aside>
            </div>
        </div>
</div>
<?php
    require("./src/partials/footer.php");
?>