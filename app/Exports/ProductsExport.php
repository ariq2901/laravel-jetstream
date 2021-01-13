<?php

namespace App\Exports;

use App\Models\Product;
use Faker\Provider\ar_SA\Color;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;

class ProductsExport implements FromCollection, WithHeadings, ShouldAutoSize,/*WithColumnWidths, WithStyles,*/ WithProperties, WithCustomCsvSettings/*FromView*/, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('products')->select('category_id', 'product_title', 'product_slug', 'product_price', 'product_image')->get();
    }

    
    public function headings(): array
    {
        return [
            'C id',
            'product title',
            'product slug',
            'product price',
            'product image name',
        ];
    }

    // public function columnWidths(): array
    // {
    //     return [
    //         'A' => 15,
    //         'B' => 30,
    //         'C' => 35,
    //         'D' => 25,
    //         'E' => 35,
    //     ];
    // }

    // public function styles(Worksheet $sheet)
    // {
    //     return [
    //         1 => ['font' => ['bold' => true]],
            
    //     ];
    // }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // $event->sheet->styleCells(
                //     'A2:W1000',
                //     [
                //         'alignment' => [
                //             'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 
                //         ],
                //     ]
                // ); OLD VERSION of maatwebsite package

                $styleBorder = [
                    'borders'   => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => 'B8B8B8']
                        ]
                    ]
                ];

                $styleBorder2 = [
                    'borders'   => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'B8B8B8']
                        ]
                    ]
                ];
                
                $allCell = 'A1:E30';
                $cellHeading = 'A1:E1';
                $cellMain = 'A2:E30';
                $event->sheet->getDelegate()->getStyle($cellHeading)->getFont()->setSize(13)->setBold(true);
                $event->sheet->getDelegate()->getStyle($allCell)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle($cellHeading)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('B8DAFF');
                $event->sheet->getDelegate()->getStyle($cellHeading)->applyFromArray($styleBorder);
                $event->sheet->getDelegate()->getStyle($cellMain)->applyFromArray($styleBorder2);
                $event->sheet->getDelegate()->getStyle($cellMain)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('C3E6CB');
            }
        ];
    }

    public function properties(): array
    {
        return [
            'creator' =>'Ariq Jusuf',
            'lastModifiedBy' =>'Ariq Jusuf',
            'title' =>'Laptop\'s Invoices',
            'desccription' =>'11 January Invoice report',
            'category' =>'Invoice report',
            'company' =>'lorem ipsum Inc.',
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    // public function view(): View
    // {
    //     return view('exports.laptop', [
    //         'laptops' => DB::table('products')->select('category_id', 'product_title', 'product_slug', 'product_price', 'product_image')->get()
    //     ]);
    // }
}
