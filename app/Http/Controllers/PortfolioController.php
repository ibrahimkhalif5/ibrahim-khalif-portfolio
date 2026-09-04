<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('portfolio');
    }

    public function sitemap()
    {
        $baseUrl = rtrim(config('portfolio.seo.canonical', url('/')), '/');
        $today = date('Y-m-d');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml .= "<url><loc>{$baseUrl}</loc><lastmod>{$today}</lastmod><changefreq>monthly</changefreq><priority>1.0</priority></url>";
        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
