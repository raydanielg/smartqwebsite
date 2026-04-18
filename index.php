<?php
/**
 * SmartQ E-Commerce Platform - Entry Point
 * 
 * This file serves as the main entry point for the SmartQ application.
 * It automatically redirects to the public directory for security.
 * 
 * @author SmartQ Team
 * @version 1.0.0
 * @license MIT
 */

// Security: Prevent direct access to sensitive files
if (!file_exists(__DIR__ . '/public/index.php')) {
    http_response_code(503);
    die('<h1>Service Unavailable</h1><p>The application is not properly configured. Please contact the administrator.</p>');
}

// Detect if we're running a built-in PHP server
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve files directly if they exist in public directory
if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
}

// Redirect to public directory
require_once __DIR__ . '/public/index.php';
