<?php


namespace App\DemoData;


trait DemoDataTrait
{
    public function loadAndDecodeJsonDataFile(string $file): array
    {
        $fileContent = file_get_contents(__DIR__."/../../public/demo_data/$file.json");
        return json_decode($fileContent, true);
    }
}