<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class PDFController extends Controller
{
    public function generateInvoice(string $id)
    {
        $order = Order::findOrFail($id);
        $order->load('cake');

        $data = [
            'title' => 'Invoice',
            'order' => $order
        ];

        $pdf = PDF::loadView('pdf.invoice', $data);

        return $pdf->download('order-' . time() . '.pdf');
    }
}
