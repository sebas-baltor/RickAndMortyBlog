<?php
    class Render {
        function RenderCharacter($character){
            echo "
                <div class='p-3 rounded m-2 d-flex align-items-center m-0 shadow-sm bg-glassmorphism'>
                    <div class='flex-shrink-0 d-flex flex-column'>
                        <img class='rounded-bottom rounded-5' src={$character->image} style='width:7rem;height:7rem'>
                        <button class='btn btn-dark w-100 rounded-top rounded-5' data-bs-toggle='collapse' data-bs-target='#collapse{$character->id}' aria-expanded='false' aria-controls='collapse{$character->id}'>detalles</button>
                    </div>
                    <div class='flex-grow-1 ms-2 collapse' id='collapse{$character->id}' >
                        <div clas='row'> <b>Nombre: </b>{$character->name}</div>
                        <div clas='row'><b>Especie: </b>{$character->species}</div>
                        <div clas='row'><b>Genero: </b>{$character->gender}</div>
                        <div clas='row'><b>Origen: </b>{$character->origin->name}</div>
                        <div clas='row'><b>Tipo: </b>{$character->type}</div>
                    </div>
                </div>";
        }
        function RenderChapter($episode,$characters){
            $consumer = new ApiConsumer;
            echo '<article class="col rounded p-5 mt-5 shadow bg-secondary bg-opacity-10">';
            echo "<h2>Capitulo #{$episode->id}</h2>";
                    echo "<h2 class='text-center mb-2'>\"{$episode->name}\"</h2>";
                    echo "<p class ='text-end'><b>{$episode->episode}</b> {$episode->air_date}</p>";
                    echo "<div class='container d-flex flex-wrap justify-content-between p-0 mx-0'>";
                    foreach($characters as $character){
                        $res = $consumer->Get($character);
                        $this->RenderCharacter($res);
                    }
                    echo "</div>";
            echo '</article>';
        }
    }