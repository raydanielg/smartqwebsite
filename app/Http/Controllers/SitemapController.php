<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        // Static Pages
        $staticPages = [
            ['url' => '/', 'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => '/shop', 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => '/about', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/contact', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/manufacturers', 'priority' => '0.7', 'changefreq' => 'weekly'],
        ];

        foreach ($staticPages as $page) {
            $sitemap .= $this->buildUrl(
                url($page['url']),
                now()->toIso8601String(),
                $page['changefreq'],
                $page['priority']
            );
        }

        // Categories
        $categories = Category::where('is_active', true)->get();
        foreach ($categories as $category) {
            $sitemap .= $this->buildUrl(
                route('shop.category', $category->slug),
                $category->updated_at->toIso8601String(),
                'weekly',
                '0.8'
            );
        }

        // Products
        $products = Product::where('is_active', true)->get();
        foreach ($products as $product) {
            $sitemap .= $this->buildUrl(
                route('shop.product', $product->slug),
                $product->updated_at->toIso8601String(),
                'weekly',
                '0.9'
            );
        }

        $sitemap .= '</urlset>';

        return response($sitemap)->header('Content-Type', 'application/xml');
    }

    protected function buildUrl($url, $lastmod, $changefreq, $priority)
    {
        return <<<URL
    <url>
        <loc>{$url}</loc>
        <lastmod>{$lastmod}</lastmod>
        <changefreq>{$changefreq}</changefreq>
        <priority>{$priority}</priority>
    </url>

URL;
    }
}
