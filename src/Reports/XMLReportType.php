<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Reports;

use SimpleXMLElement;

class XMLReportType implements ReportType
{
    private string $xmlElementName;

    public function __construct(string $xmlElementName)
    {
        $this->xmlElementName = $xmlElementName;
    }

    public function export(ReportData $reportData): string
    {
        $xmlElement = new SimpleXMLElement("<{$this->xmlElementName} />");
        $filePath = tempnam(sys_get_temp_dir(), 'xml');

        foreach ($reportData->data() as $item => $value) {
            $xmlElement->addChild($item, (string) $value);
        }

        $xmlElement->asXML($filePath);

        return $filePath;
    }
}
