<?php
// Cargamos el archivo XML
$xml = simplexml_load_file("menu.xml");

// Si hay error al cargar el XML
if ($xml === false) {
    die("Error al cargar el XML");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Carta Restaurante</title>

<!-- CSS -->
<link rel="stylesheet" href="css/estilos.css">

<!-- Iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>

<!-- 🔴 MARCO -->
<div class="marco">

    <!-- TÍTULO -->
    <h1>Nuestra Carta</h1>

    <!-- CONTENEDOR COLUMNAS -->
    <div class="menu-container">

        <!-- ================= ENTRANTES ================= -->
        <div class="columna">
            <h2>Entrantes</h2>

            <?php foreach($xml->plato as $plato): ?>
                <?php if($plato['tipo'] == 'entrante'): ?>

                    <div class="card">
                        <h3><?php echo htmlspecialchars($plato->nombre); ?></h3>
                        <p class="tipo"><?php echo htmlspecialchars($plato['tipo']); ?></p>
                        <p><?php echo htmlspecialchars($plato->descripcion); ?></p>
                        <p class="precio"><?php echo $plato->precio; ?> €</p>
                        <p><?php echo $plato->calorias; ?> kcal</p>

                        <div class="iconos">
                            <?php foreach($plato->caracteristicas->item as $item): ?>
                                <?php
                                switch(trim((string)$item)){
                                    case "vegano": echo "<i class='fa-solid fa-leaf'></i>"; break;
                                    case "vegetariano": echo "<i class='fa-solid fa-seedling'></i>"; break;
                                    case "sin gluten": echo "<i class='fa-solid fa-wheat-awn-circle-exclamation'></i>"; break;
                                    case "carne": echo "<i class='fa-solid fa-drumstick-bite'></i>"; break;
                                    case "lacteo": echo "<i class='fa-solid fa-cheese'></i>"; break;
                                    case "destacado": echo "<i class='fa-solid fa-star'></i>"; break;
                                    case "marisco": echo "<i class='fa-solid fa-shrimp'></i>"; break;
                                    case "pescado": echo "<i class='fa-solid fa-fish'></i>"; break;
                                }
                                ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- ================= PRINCIPALES ================= -->
        <div class="columna">
            <h2>Principales</h2>

            <?php foreach($xml->plato as $plato): ?>
                <?php if($plato['tipo'] == 'principal'): ?>

                    <div class="card">
                        <h3><?php echo htmlspecialchars($plato->nombre); ?></h3>
                        <p class="tipo"><?php echo htmlspecialchars($plato['tipo']); ?></p>
                        <p><?php echo htmlspecialchars($plato->descripcion); ?></p>
                        <p class="precio"><?php echo $plato->precio; ?> €</p>
                        <p><?php echo $plato->calorias; ?> kcal</p>

                        <div class="iconos">
                            <?php foreach($plato->caracteristicas->item as $item): ?>
                                <?php
                                switch(trim((string)$item)){
                                    case "vegano": echo "<i class='fa-solid fa-leaf'></i>"; break;
                                    case "vegetariano": echo "<i class='fa-solid fa-seedling'></i>"; break;
                                    case "sin gluten": echo "<i class='fa-solid fa-wheat-awn-circle-exclamation'></i>"; break;
                                    case "carne": echo "<i class='fa-solid fa-drumstick-bite'></i>"; break;
                                    case "lacteo": echo "<i class='fa-solid fa-cheese'></i>"; break;
                                    case "destacado": echo "<i class='fa-solid fa-star'></i>"; break;
                                    case "marisco": echo "<i class='fa-solid fa-shrimp'></i>"; break;
                                    case "pescado": echo "<i class='fa-solid fa-fish'></i>"; break;
                                }
                                ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- ================= POSTRES ================= -->
        <div class="columna">
            <h2>Postres</h2>

            <?php foreach($xml->plato as $plato): ?>
                <?php if($plato['tipo'] == 'postre'): ?>

                    <div class="card">
                        <h3><?php echo htmlspecialchars($plato->nombre); ?></h3>
                        <p class="tipo"><?php echo htmlspecialchars($plato['tipo']); ?></p>
                        <p><?php echo htmlspecialchars($plato->descripcion); ?></p>
                        <p class="precio"><?php echo $plato->precio; ?> €</p>
                        <p><?php echo $plato->calorias; ?> kcal</p>

                        <div class="iconos">
                            <?php foreach($plato->caracteristicas->item as $item): ?>
                                <?php
                                switch(trim((string)$item)){
                                    case "vegano": echo "<i class='fa-solid fa-leaf'></i>"; break;
                                    case "vegetariano": echo "<i class='fa-solid fa-seedling'></i>"; break;
                                    case "sin gluten": echo "<i class='fa-solid fa-wheat-awn-circle-exclamation'></i>"; break;
                                    case "carne": echo "<i class='fa-solid fa-drumstick-bite'></i>"; break;
                                    case "lacteo": echo "<i class='fa-solid fa-cheese'></i>"; break;
                                    case "destacado": echo "<i class='fa-solid fa-star'></i>"; break;
                                    case "marisco": echo "<i class='fa-solid fa-shrimp'></i>"; break;
                                    case "pescado": echo "<i class='fa-solid fa-fish'></i>"; break;
                                }
                                ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    </div> <!-- cierre menu-container -->

</div> <!-- cierre marco -->

</body>
</html>