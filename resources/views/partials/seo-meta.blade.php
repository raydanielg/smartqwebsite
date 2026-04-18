{{-- SmartQ SEO Meta Tags - Optimized for Social Sharing --}}

{{-- Basic Meta Tags --}}
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

{{-- Primary SEO Meta Tags --}}
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="{{ $siteName }}">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="googlebot" content="index, follow">
<meta name="bingbot" content="index, follow">

{{-- Canonical URL --}}
<link rel="canonical" href="{{ $canonical }}">

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $url }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $imageUrl }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $siteName }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:locale" content="{{ $locale }}">
<meta property="og:updated_time" content="{{ now()->toIso8601String() }}">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ $twitterHandle }}">
<meta name="twitter:creator" content="{{ $twitterHandle }}">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $imageUrl }}">
<meta name="twitter:image:alt" content="{{ $siteName }}">

{{-- WhatsApp Meta Tags --}}
<meta property="og:image:secure_url" content="{{ $imageUrl }}">
<meta property="og:image:type" content="image/jpeg">

{{-- LinkedIn Meta Tags --}}
<meta name="linkedin:card" content="summary_large_image">

{{-- Pinterest Meta Tags --}}
<meta name="pinterest:description" content="{{ $description }}">

{{-- Instagram Meta Tags (via Open Graph) --}}
<meta property="al:web:url" content="{{ $url }}">

{{-- Telegram Meta Tags --}}
<meta name="telegram:description" content="{{ $description }}">

{{-- Additional SEO Tags --}}
<meta name="theme-color" content="#FF6A00">
<meta name="msapplication-TileColor" content="#FF6A00">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="{{ $siteName }}">
<meta name="application-name" content="{{ $siteName }}">
<meta name="msapplication-TileImage" content="{{ $logoUrl }}">

{{-- Structured Data / JSON-LD --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "{{ $siteName }}",
    "url": "{{ config('seo.site_url') }}",
    "description": "{{ $description }}",
    "publisher": {
        "@type": "Organization",
        "name": "{{ $siteName }}",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ $logoUrl }}"
        }
    },
    "potentialAction": {
        "@type": "SearchAction",
        "target": "{{ config('seo.site_url') }}/shop?search={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{ $siteName }}",
    "url": "{{ config('seo.site_url') }}",
    "logo": "{{ $logoUrl }}",
    "description": "{{ $description }}",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Dar es Salaam",
        "addressCountry": "TZ"
    },
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+255-XXX-XXXXXX",
        "contactType": "customer service",
        "availableLanguage": ["English", "Swahili"]
    },
    "sameAs": [
        "https://facebook.com/smartqstore",
        "https://instagram.com/smartqstore",
        "https://twitter.com/smartqstore"
    ]
}
</script>

{{-- Favicon --}}
<link rel="icon" type="image/x-icon" href="/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

{{-- Alternate Languages (for future multi-language support) --}}
<link rel="alternate" href="{{ $canonical }}" hreflang="en" />
<link rel="alternate" href="{{ $canonical }}" hreflang="x-default" />
