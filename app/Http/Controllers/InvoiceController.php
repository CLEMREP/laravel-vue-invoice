<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Repositories\ClientRepository;
use App\Repositories\InvoiceItemRepository;
use App\Repositories\InvoiceRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Inertia\Inertia;
use Inertia\Response;

class InvoiceController extends Controller
{
    public function __construct(
        private ClientRepository $clientRepository,
        private InvoiceRepository $invoiceRepository,
        private InvoiceItemRepository $invoiceItemRepository,
    ) {
    }

    public function index() : Response
    {
        $invoices = $this->invoiceRepository->listOfInvoices();

        foreach($invoices as $invoice) {
            $invoice['client'] = $invoice->client;
        }
        return Inertia::render(
            'Dashboard/Pages/Factures/Index',
            [
                'invoices' => $invoices,
            ]
        );
    }

    public function create() : Response
    {
        $users = $this->clientRepository->getAllUsers();
        $countInvoice = $this->invoiceRepository->countInvoices();
        return Inertia::render(
            'Dashboard/Pages/Factures/Create',
            [
                'users' => $users,
                'countInvoice' => $countInvoice+1,
            ]
        );
    }

    public function store(StoreInvoiceRequest $request) : RedirectResponse|Redirector
    {
        $invoice = $this->invoiceRepository->createInvoice($request);

        foreach ($request['items'] as $item) {
            $this->invoiceItemRepository->createInvoiceItem($item, $invoice);
        }

        return redirect(route('facture.index'));
    }

    public function edit(Invoice $invoice) : Response
    {
        $users = $this->clientRepository->getAllUsers();
        $invoiceItems = $this->invoiceItemRepository->getItemsOfInvoice($invoice);

        return Inertia::render(
            'Dashboard/Pages/Factures/Edit',
            [
                'users' => $users,
                'invoice' => $invoice,
                'invoiceItems' => $invoiceItems,
            ]
        );
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice) : RedirectResponse|Redirector
    {
        $invoiceItems = $this->invoiceItemRepository->getItemsOfInvoice($invoice);
        $invoiceItemsID = [];
        foreach ($invoiceItems as $item) {
            $invoiceItemsID[$item->id] = $item;
        }
        $this->invoiceRepository->updateInvoice($request, $invoice);

        foreach ($request['items'] as $item) {
            unset($invoiceItemsID[$item['id']]);
            $this->invoiceItemRepository->updateInvoiceItem($item);
        }

        foreach ($invoiceItemsID as $item) {
            $this->invoiceItemRepository->deleteInvoiceItem($item);
        }



        return redirect(route('facture.index'));
    }

    public function destroy(Invoice $invoice) : RedirectResponse|Redirector
    {
        $this->invoiceRepository->deleteInvoice($invoice);
        return redirect(route('facture.index'));
    }

    public function preview(Invoice $invoice) : View
    {
        $items = $this->invoiceItemRepository->getItemsOfInvoice($invoice);
        $client = $invoice->client;
        $editor = $invoice->editor;
        return view('invoice.facture', [
            'invoice' => $invoice,
            'items' => $items,
            'client' => $client,
            'editor' => $editor,
        ]);
    }

    public function download(Invoice $invoice)
    {
        $items = $this->invoiceItemRepository->getItemsOfInvoice($invoice);
        $client = $invoice->client;
        $editor = $invoice->editor;

        $pdf = \PDF::loadView('invoice.facture', [
            'invoice' => $invoice,
            'items' => $items,
            'client' => $client,
            'editor' => $editor,
        ]);

        return $pdf->download($invoice->invoiceId . ' - ' . $client->firstname . ' ' . $client->lastname . '.pdf');
    }
}
