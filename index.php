<?php
/**
 * Shared-hosting entry point.
 *
 * If the hosting control panel cannot point the document root directly to
 * /public, this file lets requests to the project root boot the same front
 * controller without exposing app/config/database files as the default route.
 */
require __DIR__ . '/public/index.php';
