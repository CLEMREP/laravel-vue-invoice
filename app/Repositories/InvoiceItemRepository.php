<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Database\Eloquent\Collection;

class InvoiceItemRepository
{
    public function __construct(private InvoiceItem $model)
    {
    }

    public function getItemsOfInvoice(Invoice $invoice) : Collection
    {
        return $this->model->newQuery()->where('invoice_id', '=', $invoice->getKey())->get();
    }

    public function createInvoiceItem(mixed $item, Invoice $invoice) : InvoiceItem
    {
        return $this->model::create(
            [
                'name' => $item['name'],
                'qte' => $item['quantity'],
                'price' => $item['price'],
                'invoice_id' => $invoice->getKey(),
            ]
        );
    }
}
