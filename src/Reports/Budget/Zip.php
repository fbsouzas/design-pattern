<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Reports\Budget;

use Fbsouzas\DesignPattern\Budgets\Budget;
use ZipArchive;

class Zip
{
    public function export(Budget $budget): void
    {
        $filePath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'budget.zip';
        $zip = new ZipArchive();

        $zip->open($filePath, ZipArchive::CREATE);
        $zip->addFromString('budget.serial', serialize($budget));
        $zip->close();
    }
}
