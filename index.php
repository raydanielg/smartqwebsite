<?php
/**
 * =============================================================================
 * SmartQ E-Commerce Platform - Main Entry Point
 * =============================================================================
 * 
 * @package   SmartQ
 * @author    SmartQ Development Team
 * @version   1.0.0
 * @license   MIT
 * @copyright 2024 SmartQ Technologies
 * 
 * DESCRIPTION:
 * This file serves as the main entry point for the SmartQ application.
 * It automatically handles routing to the public directory for security.
 * 
 * SECURITY FEATURES:
 * - Prevents direct access to sensitive application files
 * - Serves static assets directly when using PHP built-in server
 * - Auto-detects proper configuration and provides helpful error messages
 * 
 * USAGE:
 * - Production: Point web server document root to /public folder
 * - Development: Run `php -S localhost:8000 index.php` from project root
 * 
 * =============================================================================
 */

// ============================================================================
// CONFIGURATION CHECK
// ============================================================================

// Check if application is properly configured
if (!file_exists(__DIR__ . '/public/index.php')) {
    http_response_code(503);
    header('Content-Type: text/html; charset=utf-8');
    
    $errorMessage = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartQ - Configuration Error</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .error-container {
            background: white;
            border-radius: 16px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            text-align: center;
        }
        .logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #FF6A00, #FF8C00);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 40px;
            color: white;
        }
        h1 {
            color: #1a1a2e;
            font-size: 24px;
            margin-bottom: 12px;
        }
        p {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 24px;
        }
        .steps {
            background: #f3f4f6;
            border-radius: 12px;
            padding: 20px;
            text-align: left;
            margin-bottom: 24px;
        }
        .steps h3 {
            font-size: 14px;
            color: #374151;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .steps ol {
            margin-left: 20px;
            color: #6b7280;
            font-size: 14px;
        }
        .steps li {
            margin-bottom: 8px;
        }
        code {
            background: #e5e7eb;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Monaco', 'Menlo', monospace;
            font-size: 12px;
        }
        .footer {
            font-size: 12px;
            color: #9ca3af;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="logo">Q</div>
        <h1>Configuration Error</h1>
        <p>The SmartQ application is not properly configured. The public directory could not be found.</p>
        
        <div class="steps">
            <h3>Quick Fix Steps:</h3>
            <ol>
                <li>Ensure you're in the project root directory</li>
                <li>Run <code>composer install</code> to install dependencies</li>
                <li>Run <code>php artisan key:generate</code></li>
                <li>Configure your <code>.env</code> file</li>
                <li>For production, point web server to <code>/public</code> folder</li>
            </ol>
        </div>
        
        <div class="footer">
            <strong>SmartQ E-Commerce Platform</strong> • Version 1.0.0
        </div>
    </div>
</body>
</html>
HTML;
    
    die($errorMessage);
}

// ============================================================================
// ROUTING & REDIRECTION
// ============================================================================

// Get the requested URI
$requestUri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Clean up the URI (remove query strings, etc.)
$requestUri = preg_replace('/\?.*/', '', $requestUri);

// Serve static files directly if they exist (for PHP built-in server)
if ($requestUri !== '/' && file_exists(__DIR__ . '/public' . $requestUri)) {
    return false;
}

// Forward to the public index.php
require_once __DIR__ . '/public/index.php';
