<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Reports;

interface ReportType
{
    public function export(ReportData $reportData): string;
}
