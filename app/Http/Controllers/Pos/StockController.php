<?php

namespace App\Http\Controllers\Pos;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    public function StockReport()
    {
        $allData = Product::orderBy('supplier_id', 'asc')->orderBy('category_id', 'asc')->get();
        return view('backend.stock.stock_report', compact('allData'));
    }

    public function StockReportPdf()
    {

        $allData = Product::orderBy('supplier_id', 'asc')->orderBy('category_id', 'asc')->get();
        return view('backend.pdf.stock_report_pdf', compact('allData'));
    } 
}
