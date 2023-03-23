<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class InvoiceItemRepository
{
    public function __construct(private InvoiceItem $model)
    {
    }

    /**
     * @param Invoice $invoice
     * @return Collection<int, InvoiceItem>
     */
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
                'description' => $item['description'] ?? '',
                'invoice_id' => $invoice->getKey(),
            ]
        );
    }

    public function updateInvoiceItem(array $item) : bool|null
    {
        return $this->model->newQuery()->where('id', '=', $item['id'])->update(
            [
                'name' => $item['name'],
                'qte' => $item['qte'],
                'price' => $item['price'],
            ]
        );
    }


    public function deleteInvoiceItem(InvoiceItem $invoiceItem) : bool|null
    {
        return $invoiceItem->delete();
    }
}
