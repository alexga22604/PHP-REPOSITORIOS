<?php

// ---------- Configuración ----------
const MAX_BYTES     = 30 * 1024;              // 30 KB
const DIR_UPLOADS   = __DIR__ . '/uploads/';  // directorio en disco (debe existir y ser escribible)
const URL_UPLOADS   = 'uploads/';             // ruta que se usa en el <img>
const IMG_CALAVERA  = 'uploads/calavera.png'; // imagen por defecto (ya existe en uploads)
const ARMAS_VALIDAS = ['Maza', 'Antorcha', 'Martillo', 'Látigo'];

// ---------- Funciones ----------

/**
 * Lee un campo de texto del POST y evita la inyección de código:
 * quita espacios sobrantes y convierte < > & " ' en entidades HTML.
 */
function limpiar(string $campo): string
{
    $valor = $_POST[$campo] ?? '';
    if (!is_string($valor)) {
        return '';
    }
    return htmlspecialchars(trim($valor), ENT_QUOTES, 'UTF-8');
}

/**
 * Valida y sube la imagen (opcional).
 * Devuelve ['ruta' => ruta de la imagen o null, 'error' => texto del error o null].
 */
function subirImagen(): array
{
    $archivo = $_FILES['imagen'] ?? null;

    // No se ha indicado ninguna imagen (es opcional): sin imagen y sin error
    if ($archivo === null || $archivo['error'] === UPLOAD_ERR_NO_FILE) {
        return ['ruta' => null, 'error' => null];
    }

    // Errores de PHP por tamaño (upload_max_filesize o MAX_FILE_SIZE del formulario)
    if ($archivo['error'] === UPLOAD_ERR_INI_SIZE || $archivo['error'] === UPLOAD_ERR_FORM_SIZE) {
        return ['ruta' => null, 'error' => 'la imagen supera los 10 KB permitidos.'];
    }

    // Cualquier otro error de subida
    if ($archivo['error'] !== UPLOAD_ERR_OK) {
        return ['ruta' => null, 'error' => 'no se pudo completar la subida.'];
    }

    // Tamaño máximo
    if ($archivo['size'] > MAX_BYTES) {
        return ['ruta' => null, 'error' => 'la imagen supera los 10 KB permitidos.'];
    }

    // Solo se permite la extensión .png
    $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
    if ($extension !== 'png') {
        return ['ruta' => null, 'error' => 'solo se permiten archivos PNG.'];
    }

    // Tipo real del archivo (no nos fiamos de la extensión ni del tipo que manda el navegador)
    $info = @getimagesize($archivo['tmp_name']);
    if ($info === false || $info['mime'] !== 'image/png') {
        return ['ruta' => null, 'error' => 'el archivo no es una imagen PNG válida.'];
    }

    // El directorio uploads debe existir y tener permisos de escritura
    if (!is_dir(DIR_UPLOADS) || !is_writable(DIR_UPLOADS)) {
        return ['ruta' => null, 'error' => 'el directorio uploads no existe o no tiene permisos.'];
    }

    // Nombre único generado por nosotros (nunca usamos el nombre que manda el usuario)
    $nombreFinal = uniqid('jugador_', true) . '.png';

    if (!move_uploaded_file($archivo['tmp_name'], DIR_UPLOADS . $nombreFinal)) {
        return ['ruta' => null, 'error' => 'no se pudo guardar el archivo.'];
    }

    return ['ruta' => URL_UPLOADS . $nombreFinal, 'error' => null];
}

// ---------- GET: mostrar el formulario ----------
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    readfile(__DIR__ . '/captura.html');
    exit;
}

// ---------- POST: procesar los datos ----------
$nombre = limpiar('nombre');
$alias  = limpiar('alias');

$edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 0, 'max_range' => 120],
]);
if ($edad === false || $edad === null) {
    $edad = 'No válida';
}

// Armas: solo se aceptan las de la lista (aunque manipulen el formulario)
$enviadas = $_POST['armas'] ?? [];
$armas = array_filter(
    ARMAS_VALIDAS,
    fn($arma) => is_array($enviadas) && in_array($arma, $enviadas, true)
);
$armasTexto = $armas ? implode(', ', $armas) : 'Ninguna';

// Artes mágicas: solo "Sí" o "No"
$magia = $_POST['magia'] ?? '';
if (!in_array($magia, ['Sí', 'No'], true)) {
    $magia = 'No indicado';
}

// Imagen
$imagen    = subirImagen();
$hayImagen = $imagen['ruta'] !== null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Jugador</title>
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f4fb;
            margin: 0;
            padding: 40px 20px;
        }

        .tarjeta {
            background: #ffff44;
            max-width: 520px;
            margin: 0 auto;
            padding: 20px 20px 30px;
            border-radius: 12px;
        }

        h1 { text-align: center; font-size: 1.4rem; margin-bottom: 30px; }

        .contenido {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            align-items: center;
        }

        img {
            display: block;
            width: 100%;
            max-width: 190px;
            height: auto;
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <main class="tarjeta">
        <h1>Datos del Jugador</h1>

        <div class="contenido">
            <section class="datos">
                <p><strong>Nombre:</strong> <?= $nombre ?></p>
                <p><strong>Alias:</strong> <?= $alias ?></p>
                <p><strong>Edad:</strong> <?= $edad ?></p>
                <p><strong>Armas seleccionadas:</strong> <?= $armasTexto ?></p>
                <p><strong>¿Practica artes mágicas?:</strong> <?= $magia ?></p>
            </section>

            <section class="imagen">
                <?php if ($hayImagen): ?>
                    <p><strong>Imagen subida:</strong></p>
                    <img src="<?= $imagen['ruta'] ?>" alt="Imagen del jugador">
                <?php else: ?>
                    <p><strong>No se subió ninguna imagen.</strong></p>
                    <img src="<?= IMG_CALAVERA ?>" alt="Calavera">
                    <p>Error al subir la imagen<?php if ($imagen['error'] !== null): ?>: <?= $imagen['error'] ?><?php endif; ?></p>
                <?php endif; ?>
            </section>
        </div>
    </main>
</body>
</html>
