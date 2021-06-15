<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Reports\Order;

use Fbsouzas\DesignPattern\Orders\Order;
use Fbsouzas\DesignPattern\Reports\ReportData;

class OrderReportData implements ReportData
{
    private Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function data(): array
    {
        return [
            'client_name' => $this->order->clientName,
            'finish_date' => $this->order->finishDate->format('Y-m-d H:i:s'),
        ];
    }
}
