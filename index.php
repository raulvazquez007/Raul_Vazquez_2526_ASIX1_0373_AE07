<?php
$xml = simplexml_load_file("menu.xml");
if (!$xml) die("Error al cargar el XML");

// Detectamos los tipos directamente del XML, en el orden en que aparecen
$secciones = [];
foreach ($xml->plato as $plato) {
    $tipo = (string)$plato['tipo'];
    if (!isset($secciones[$tipo])) {
        $titulo = isset($plato['titulo']) ? (string)$plato['titulo'] : ucfirst($tipo) . 's';
        $subtag = isset($plato['subtag']) ? (string)$plato['subtag'] : '';
        $secciones[$tipo] = ['titulo' => $titulo, 'subtag' => $subtag];
    }
}

$iconos = [
    'vegano'      => ['icono' => 'fa-leaf',                         'label' => 'Vegano'],
    'vegetariano' => ['icono' => 'fa-seedling',                     'label' => 'Vegetariano'],
    'sin gluten'  => ['icono' => 'fa-wheat-awn-circle-exclamation', 'label' => 'Sin gluten'],
    'carne'       => ['icono' => 'fa-drumstick-bite',               'label' => 'Carne'],
    'lacteo'      => ['icono' => 'fa-cheese',                       'label' => 'Lácteo'],
    'destacado'   => ['icono' => 'fa-star',                         'label' => 'Destacado'],
    'marisco'     => ['icono' => 'fa-shrimp',                       'label' => 'Marisco'],
    'pescado'     => ['icono' => 'fa-fish',                         'label' => 'Pescado'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carta Restaurante</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<header class="cabecera">
    <h1>Nuestra Carta</h1>
    <p class="subtitulo">Cocina de temporada &mdash; Producto fresco</p>
</header>

<div class="menu-container">
    <?php foreach ($secciones as $tipo => $sec): ?>
    <div class="columna">
        <div class="seccion-titulo">
            <h2><?php echo $sec['titulo']; ?></h2>
            <span class="subtag"><?php echo $sec['subtag']; ?></span>
        </div>
        <hr class="divider">

        <?php foreach ($xml->plato as $plato): ?>
        <?php if ((string)$plato['tipo'] !== $tipo) continue; ?>

        <div class="card">
            <div class="card-left">
                <h3><?php echo htmlspecialchars($plato->nombre); ?></h3>
                <p class="desc"><?php echo htmlspecialchars($plato->descripcion); ?></p>
                <p class="kcal"><?php echo $plato->calorias; ?> kcal</p>
            </div>
            <div class="card-right">
                <span class="precio"><?php echo number_format((float)$plato->precio, 2, ',', ''); ?>&thinsp;€</span>
                <?php
                $items_iconos = [];
                foreach ($plato->caracteristicas->item as $item) {
                    $clave = trim((string)$item);
                    if (isset($iconos[$clave])) $items_iconos[] = $iconos[$clave];
                }
                if ($items_iconos):
                ?>
                <div class="iconos">
                    <?php foreach ($items_iconos as $ic): ?>
                    <i class="fa-solid <?php echo $ic['icono']; ?>" title="<?php echo $ic['label']; ?>"></i>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
</div>

<footer class="leyenda">
    <div class="iconos-leyenda">
        <?php foreach ($iconos as $clave => $ic): ?>
        <span><i class="fa-solid <?php echo $ic['icono']; ?>"></i> <?php echo $ic['label']; ?></span>
        <?php endforeach; ?>
    </div>
    <p>Información disponible sobre alérgenos e intolerancias &mdash; Consulte a nuestro personal</p>
</footer>

</body>
</html>