<?php
$xml = simplexml_load_file("menu.xml");
if (!$xml) die("Error al cargar el XML");

$secciones = ['entrante' => 'Entrantes', 'principal' => 'Principales', 'postre' => 'Postres'];

$iconos = [
    'vegano'      => 'fa-leaf',
    'vegetariano' => 'fa-seedling',
    'sin gluten'  => 'fa-wheat-awn-circle-exclamation',
    'carne'       => 'fa-drumstick-bite',
    'lacteo'      => 'fa-cheese',
    'destacado'   => 'fa-star',
    'marisco'     => 'fa-shrimp',
    'pescado'     => 'fa-fish',
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carta Restaurante</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<h1>Nuestra Carta</h1>

<div class="menu-container">
    <?php foreach ($secciones as $tipo => $titulo): ?>
    <div class="columna">
        <h2><?php echo $titulo; ?></h2>

        <?php foreach ($xml->plato as $plato): ?>
        <?php if ((string)$plato['tipo'] !== $tipo) continue; ?>

        <div class="card">
            <h3><?php echo htmlspecialchars($plato->nombre); ?></h3>
            <p class="tipo"><?php echo htmlspecialchars($plato['tipo']); ?></p>
            <p><?php echo htmlspecialchars($plato->descripcion); ?></p>
            <p class="precio"><?php echo $plato->precio; ?> €</p>
            <p><?php echo $plato->calorias; ?> kcal</p>

            <div class="iconos">
                <?php foreach ($plato->caracteristicas->item as $item): ?>
                <?php
                    $clave = trim((string)$item);
                    if (isset($iconos[$clave])):
                ?>
                <i class="fa-solid <?php echo $iconos[$clave]; ?>" title="<?php echo $clave; ?>"></i>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
</div>

</body>
</html>