<?php

return [
    'custom_storage' => env('APP_STORAGE_PATH', storage_path()),
    'custom_storage_without_slash' => env('APP_STORAGE_PATH_WITHOUT_SLASH', storage_path()),
    // otras rutas personalizadas que necesites
];