<?php

namespace App\Helpers;

class InmuebleHelper
{
    public static function generarTitulo($detalle, $ciudad = null)
    {
        $inmueble = self::determinarTipoInmueble($detalle, true); // true para incluir "Adosado"

        // Determinar tipo de operación
        if ($detalle->is_sale == '1') {
            $tipo = " en venta ";
        } else {
            $tipo = " en alquiler ";
        }

        // Capturar municipio
        if (!empty($detalle->municipio) && $detalle->municipio !== null && $detalle->municipio !== 'Madrid') {
            $municipio = $detalle->municipio;
        } else {
            $municipio = null;
        }

        // Determinar ciudad
        if ($ciudad) {
            $city = $ciudad;
        } else {
            $city = "Madrid";
        }

        // Generar dirección
        $direccion = "";
        if ($detalle->road) {
            if ($municipio) {
                $direccion = "en " . $detalle->road . ", " . $municipio . ", " . $city;
            } else {
                $direccion = "en " . $detalle->road . ", " . $city;
            }
        }

        return $inmueble . $tipo . $direccion;
    }

    public static function generarDescripcion($detalle)
    {
        $inmueble = self::determinarTipoInmueble($detalle, false); // false para no incluir "Adosado"

        $texto1 = " de ";
        $metros = $detalle->square_meters;
        $texto2 = " m², ";

        // Determinar dormitorios/estancias
        if ($detalle->tipo_inmueble == 'Local/Oficina') {
            if ($detalle->bedrooms == 1) {
                $dormitorio = "1 estancia y ";
            } elseif ($detalle->bedrooms == 0) {
                $dormitorio = "";
            } elseif ($detalle->bedrooms > 1) {
                $dormitorio = $detalle->bedrooms . " estancias y ";
            } else {
                $dormitorio = "";
            }
        } else {
            if ($detalle->bedrooms == 1) {
                $dormitorio = "1 dormitorio y ";
            } elseif ($detalle->bedrooms == 0) {
                $dormitorio = "";
            } elseif ($detalle->bedrooms > 1) {
                $dormitorio = $detalle->bedrooms . " dormitorios y ";
            } else {
                $dormitorio = "";
            }
        }

        // Determinar baños/aseos
        if ($detalle->tipo_inmueble == 'Local/Oficina') {
            $bano = "2 aseos.";
        } else {
            if ($detalle->bathrooms == 1) {
                $bano = "1 baño.";
            } elseif ($detalle->bathrooms == 0) {
                $bano = "";
            } elseif ($detalle->bathrooms > 1) {
                $bano = $detalle->bathrooms . " baños.";
            } else {
                $bano = "";
            }
        }

        return $inmueble . $texto1 . $metros . $texto2 . $dormitorio . $bano;
    }

    public static function generarUrlImagen($detalle)
    {
        $url = "https://iamoving.com/storage/";
        
        if (str_contains($detalle->path_image_primary, '.jpeg')) {
            $path = str_replace(".jpeg", "_444x250.jpg", $detalle->path_image_primary);
        } else {
            $path = str_replace(".jpg", "_444x250.jpg", $detalle->path_image_primary);
        }
        
        return $url . $path;
    }

    private static function determinarTipoInmueble($detalle, $incluirAdosado = false)
    {
        if ($detalle->tipo_inmueble == 'Local/Oficina') {
            if ($detalle->oficina == '1') {
                return "Oficina";
            } else {
                return "Local";
            }
        } else {
            if ($detalle->estudio) {
                return "Estudio";
            } elseif ($detalle->loft) {
                return "Loft";
            } elseif ($detalle->apartamento) {
                return "Apartamento";
            } elseif ($detalle->piso) {
                return "Piso";
            } elseif ($detalle->chalet) {
                if ($incluirAdosado && $detalle->adosado_chalet == 1) {
                    return "Chalet Adosado";
                } elseif ($incluirAdosado && $detalle->adosado_chalet == 2) {
                    return "Chalet Independiente";
                } elseif ($incluirAdosado && $detalle->adosado_chalet == 3) {
                    return "Chalet Pareado";
                } else {
                    return "Chalet";
                }
            } elseif ($detalle->bajo) {
                return "Bajo";
            } elseif ($detalle->atico) {
                return "Ático";
            } elseif ($detalle->casa) {
                return "Casa";
            } else {
                return "Piso";
            }
        }
    }
}