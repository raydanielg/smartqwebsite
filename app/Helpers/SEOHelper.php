<?php

namespace App\Helpers;

class SEOHelper
{
    protected static $meta = [];

    public static function setTitle($title, $suffix = true)
    {
        if ($suffix) {
            $title = $title . ' | ' . config('seo.site_name');
        }
        self::$meta['title'] = $title;
        return new static;
    }

    public static function setDescription($description)
    {
        self::$meta['description'] = $description;
        return new static;
    }

    public static function setKeywords($keywords)
    {
        self::$meta['keywords'] = $keywords;
        return new static;
    }

    public static function setImage($image)
    {
        self::$meta['image'] = $image;
        return new static;
    }

    public static function setUrl($url)
    {
        self::$meta['url'] = $url;
        return new static;
    }

    public static function setCanonical($url)
    {
        self::$meta['canonical'] = $url;
        return new static;
    }

    public static function setPage($page)
    {
        $pages = config('seo.pages');
        if (isset($pages[$page])) {
            self::setTitle($pages[$page]['title'], false);
            self::setDescription($pages[$page]['description']);
            self::setKeywords($pages[$page]['keywords']);
        }
        return new static;
    }

    public static function forProduct($product)
    {
        $title = $product->name . ' - Buy Online at Best Price | SmartQ';
        $description = strip_tags($product->short_description ?? $product->description);
        $description = substr($description, 0, 155) . (strlen($description) > 155 ? '...' : '');
        
        self::setTitle($title, false);
        self::setDescription($description);
        self::setKeywords($product->category?->name . ', ' . $product->name . ', buy online, Tanzania');
        self::setImage($product->image ?? config('seo.site_image'));
        
        return new static;
    }

    public static function forCategory($category)
    {
        $title = $category->name . ' - Shop Online | SmartQ Store';
        $description = 'Shop the best ' . $category->name . ' at SmartQ. Quality products from China to Tanzania with fast delivery.';
        
        self::setTitle($title, false);
        self::setDescription($description);
        self::setKeywords($category->name . ', shop online, Tanzania, wholesale, China imports');
        
        return new static;
    }

    public static function render()
    {
        $title = self::$meta['title'] ?? config('seo.pages.home.title');
        $description = self::$meta['description'] ?? config('seo.pages.home.description');
        $keywords = self::$meta['keywords'] ?? config('seo.site_keywords');
        $image = self::$meta['image'] ?? config('seo.site_image');
        $url = self::$meta['url'] ?? url()->current();
        $canonical = self::$meta['canonical'] ?? url()->current();
        
        $siteName = config('seo.site_name');
        $locale = config('seo.locale');
        $twitterHandle = config('seo.twitter_handle');
        $logo = config('seo.site_logo');
        
        $imageUrl = str_starts_with($image, 'http') ? $image : asset($image);
        $logoUrl = asset($logo);
        
        return view('partials.seo-meta', compact(
            'title', 'description', 'keywords', 'imageUrl', 'url', 'canonical',
            'siteName', 'locale', 'twitterHandle', 'logoUrl'
        ))->render();
    }

    public static function getMeta()
    {
        return self::$meta;
    }
}
