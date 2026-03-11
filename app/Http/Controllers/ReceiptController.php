<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage; 
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
class ReceiptController extends Controller
{
    public function print()
    {
        try {
            $connector = new WindowsPrintConnector("POS-58");
            $printer = new Printer($connector);
           
            $printer->setJustification(Printer::JUSTIFY_CENTER);

            // Load gambar logo
            $logo = EscposImage::load('images/pertamina.png', false);
            $printer->bitImage($logo);

            
            $printer->text("BABY SHOP\n");
            $printer->text("Jalan Cipete Raya No 123, Jakarta Selatan\n");
            $printer->text("081234567890\n");
            $printer->feed();
            
            
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("Faktur Penerimaan / Pajak\n");
            $printer->text("Struk #: 12345\n");
            $printer->text("2017-01-24 16:45:26\n");
            $printer->text("Oleh: folio Kasir\n");
            $printer->text("--------------------------------\n");

            
            $printer->text("Barang            Harga  Jml  Total\n");
            $printer->text("--------------------------------\n");
            $printer->text("T-shirt (Demo) M 66000  1 66000\n");
            $printer->text("Disc. 50% (33000)                \n");
            $printer->text("T-shirt (Demo) S 60000  1 60000\n");
            $printer->text("--------------------------------\n");

            // Subtotal
            $printer->text(sprintf("Subtotal         : %10s\n", number_format(126000, 0, ',', '.')));
            $printer->text(sprintf("Diskon           : %10s\n", number_format(50000, 0, ',', '.')));
            $printer->text(sprintf("Total Diskon     : %10s\n", number_format(79500, 0, ',', '.')));
            $printer->text(sprintf("Pajak            : %10s\n", number_format(4650, 0, ',', '.')));
            $printer->text(sprintf("Total            : %10s\n", number_format(51150, 0, ',', '.')));
            $printer->text(sprintf("Tunai            : %10s\n", number_format(60000, 0, ',', '.')));
            $printer->text(sprintf("Kembalian        : %10s\n", number_format(8850, 0, ',', '.')));

            $printer->feed();
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("--------------------------------\n");
            $printer->text("Terima Kasih atas kunjungannya\n");
            $printer->cut();
            $printer->close();

            return response()->json(['message' => 'Struk berhasil dicetak']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mencetak struk: ' . $e->getMessage()], 500);
        }
    }
}
