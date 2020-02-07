<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php';?>
<!-- Entradas -->
<div id="principal">
    <h1>Últimas entradas</h1>
    <?php if (isset($_SESSION['usuario'])):
            $entradas = mostrarEntradas($conexion, $_SESSION['usuario']['id'], true);
            if ($entradas):
                while ($ent = mysqli_fetch_assoc($entradas)){?>
                    <a href="entrada.php?id=<?=$ent['id']?>">
                    <article class="entradas">
                     <h2><?=ltrim($ent['titulo'])?></h2>
                     <span class = "subtitulo"><?=$ent['nombre_cat'].' | '.$ent['fecha']?>
                     <p><?=substr($ent['descripcion'],0,400)."..."?></p>
                    </article>
                    </a>
                <?php 
                }
            else:
                echo "<p> Usted aún no posee entradas, cree su primer entrada haciendo click <a href = 'crearentrada.php'>aquí</a></p>";
            endif;   
          else:?>
    <article class="entradas">
        <h2>Éste es un título de prueba</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </article>
    <article class="entradas">
        <h2>Segundo título de prueba un poco más largo para ver cómo se adapta a la página probando probando probando</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </article>
    <article class="entradas">
        <h2>Título de mi entrada</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </article>
    <article class="entradas">
        <h2>Título de mi entrada</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </article>
            <?php endif;?>
    <div id="ver-todas"><a href="ver-todas.php">Ver todas las entradas</a></div>
</div>
<?php require_once 'includes/footer.php'; ?>
