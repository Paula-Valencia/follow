<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AprendizExport implements FromArray, WithStyles, WithTitle
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        // Encabezado de las columnas
        $exportData = [
            [
                'Nombre Aprendiz',
                'Identificación Aprendiz',
                'Departamento Aprendiz',
                'Municipio Aprendiz',
                'Ficha Aprendiz',        
                'Programa Aprendiz', 
                'Modalidad',         
                'Identificación Trainer',
                'Nombre Trainer',
                'Departamento Trainer',
                'Municipio Trainer'
            ]
        ];

        foreach ($this->data as $aprendiz) {
            $exportData[] = [
                'Nombre Aprendiz' => $aprendiz['name'] . ' ' . $aprendiz['last_name'] ?? 'N/A',
                'Identificación Aprendiz' => $aprendiz['identification'] ?? 'N/A',
                'Departamento Aprendiz' => $aprendiz['department'] ?? 'N/A',
                'Municipio Aprendiz' => $aprendiz['municipality'] ?? 'N/A',
                'Ficha Aprendiz' => $aprendiz['apprentice']['ficha'] ?? 'N/A', 
                'Programa Aprendiz' => $aprendiz['apprentice']['programa'] ?? 'N/A',
                'Modalidad' => $aprendiz['apprentice']['modalidad'] ?? 'N/A',
                'Identificación Trainer' => $aprendiz['apprentice']['trainer']['user']['identification'] ?? 'N/A',
                'Nombre Trainer' => ($aprendiz['apprentice']['trainer']['user']['name'] ?? 'N/A') . ' ' . ($aprendiz['apprentice']['trainer']['user']['last_name'] ?? 'N/A'),
                'Departamento Trainer' => $aprendiz['apprentice']['trainer']['user']['department'] ?? 'N/A',
                'Municipio Trainer' => $aprendiz['apprentice']['trainer']['user']['municipality'] ?? 'N/A',
            ];
        }

        return $exportData;
    }

    // Establece el título de la hoja
    public function title(): string
    {
        return 'Aprendices';
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:J1')->getFont()->setBold(true);
        $sheet->getStyle('A1:J1')->getAlignment()->setHorizontal('center');

        foreach (range('A', 'J') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
        
        $sheet->getRowDimension(1)->setRowHeight(20);

        return [
        ];
    }
}
