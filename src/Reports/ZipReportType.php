<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Reports;

use ZipArchive;

class ZipReportType implements ReportType
{
    private string $reportFileName;

    public function __construct(string $reportFileName)
    {
        $this->reportFileName = $reportFileName;
    }

    public function export(ReportData $reportData): string
    {
        $zipFile = new ZipArchive();
        $filePath = tempnam(sys_get_temp_dir(), 'zip');

        $zipFile->open($filePath);
        $zipFile->addFromString($this->reportFileName, serialize($reportData->data()));
        $zipFile->close();

        return $filePath;
    }
}
