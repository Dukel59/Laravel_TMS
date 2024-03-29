<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProductService
{
    public function getProducts(array $params)
    {
        $products = Product::query();

        $products = match ($params['sort'] ?? null) {
            'price-asc' => $products->orderBy('price'),
            'price-desc' => $products->orderByDesc('price'),
            default => $products->orderByDesc('created_at')
        };

        if (isset($params['price-min'])) {
            $products->where('price', '>', $params['price-min']);
        }

        if (isset($params['price-max'])) {
            $products->where('price', '<', $params['price-max']);
        }

        return $products->where('is_active', 1)->get();
    }

    public function exportExcel(Collection $products)
    {
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $this->prepareExcelData($activeWorksheet, $products);
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=products.xlsx');
        $writer->save('php://output');
        exit;
    }

    public function importExcel()
    {
        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load('products.xlsx');
        $workSheet = $spreadsheet->getActiveSheet();
        $lastColumn = $workSheet->getHighestColumn();
        foreach ($workSheet->getRowIterator() as $rowIndex => $row) {
            if ($rowIndex != 1) {
                $array = $workSheet->rangeToArray('A' . $rowIndex . ':' . $lastColumn . $rowIndex);
                $this->processingProductFromExcel($array[0]);
            }
        }
    }

    private function processingProductFromExcel(array $productData)
    {
        $product = Product::query()->find($productData[0]);

        if (!$product) {
            $category = Category::query()->where('title', $productData[5])->first();
            if (!$category && $productData[5]) {
                $category = Category::query()->create([
                    'title' => $productData[5]
                ]);
            }

            return Product::query()->create([
                'title' => $productData[1],
                'description' => $productData[2],
                'price' => $productData[3],
                'sale_price' => $productData[4],
                'category_id' => $category?->id,
            ]);
        }
        return $product;
    }

    private function prepareExcelData(Worksheet $activeWorksheet, Collection $products)
    {
        $columns = ['ID', 'Title', 'Short description', 'Price', 'Sale price', 'Description', 'Category name', 'Status', 'Created at'];
        for ($i = 0; $i < count($columns); $i++) {
            $activeWorksheet->setCellValue(chr(65 + $i) . '1', $columns[$i]);
        }

        foreach ($products as $key => $product) {
            $index = $key + 2;
            $activeWorksheet->setCellValue('A' .  $index, $product->id);
            $activeWorksheet->setCellValue('B' .  $index, $product->title);
            $activeWorksheet->setCellValue('C' .  $index, $product->description);
            $activeWorksheet->setCellValue('D' .  $index, $product->price);
            $activeWorksheet->setCellValue('E' .  $index, $product->sale_price);
            $activeWorksheet->setCellValue('F' .  $index, $product->category?->name);
            $activeWorksheet->setCellValue('H' .  $index, $product->is_active ? 'Активен' : 'Не активен');
            $activeWorksheet->setCellValue('I' .  $index, $product->created_at);
        }
    }
    public function exportCSV(Collection $products){
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=products.csv');

        $f = fopen('php://output', 'w');
        fputcsv($f, ['ID', 'Title', 'Descriptions', 'Price', 'Sale price', 'Category name', 'Status', 'Created at'], ';');

        foreach ($products as $product) {
            $data = [
                $product->id,
                $product->title,
                $product->description,
                $product->price,
                $product->sale_price,
                $product->category?->name,
                $product->is_active == 1 ? 'Активен' : 'Не активен',
                $product->created_at
            ];
            fputcsv($f, $data, ';');
        }
        exit;
    }
}
