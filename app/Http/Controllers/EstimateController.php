<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstimateRequest;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Estimate;
use App\Models\User;
use App\Repositories\ClientRepository;
use App\Repositories\EsitmateRepository;
use App\Repositories\EstimateItemRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Inertia\Inertia;
use Inertia\Response;

class EstimateController extends Controller
{
    public function __construct(
        private ClientRepository $clientRepository,
        private EsitmateRepository $estimateRepository,
        private EstimateItemRepository $estimateItemRepository,
    ) {
    }

    public function index() : Response
    {
        /** @var User $connectedUser */
        $connectedUser = Auth::user();

        $estimates = $this->estimateRepository->listOfEstimates($connectedUser);

        foreach($estimates as $estimate) {
            $estimate['client'] = $estimate->client;
        }

        return Inertia::render(
            'Dashboard/Pages/Devis/Index',
            [
                'estimates' => $estimates,
            ]
        );
    }

    public function create() : Response
    {
        /** @var User $connectedUser */
        $connectedUser = Auth::user();

        $users = $this->clientRepository->getAllUsers($connectedUser);
        $countEstimate = $this->estimateRepository->countEstimates($connectedUser);
        return Inertia::render(
            'Dashboard/Pages/Devis/Create',
            [
                'users' => $users,
                'countEstimate' => $countEstimate+1,
            ]
        );
    }

    public function store(StoreEstimateRequest $request) : RedirectResponse|Redirector
    {
        $estimate = $this->estimateRepository->createEstimate($request);

        foreach ($request['items'] as $item) {
            $this->estimateItemRepository->createEstimateItem($item, $estimate);
        }

        return redirect(route('devis.index'));
    }


    public function destroy(Estimate $estimate) : RedirectResponse|Redirector
    {
        $this->estimateRepository->deleteEstimate($estimate);
        return redirect(route('devis.index'));
    }

    public function preview(Estimate $estimate) : View
    {
        $items = $this->estimateItemRepository->getItemsOfEstimate($estimate);
        $client = $estimate->client;
        $editor = $estimate->editor;
        return view('invoice.devis', [
            'estimate' => $estimate,
            'items' => $items,
            'client' => $client,
            'editor' => $editor,
        ]);
    }

    public function download(Estimate $estimate)
    {
        $items = $this->estimateItemRepository->getItemsOfEstimate($estimate);
        $client = $estimate->client;
        $editor = $estimate->editor;

        $pdf = \PDF::loadView('invoice.devis', [
            'estimate' => $estimate,
            'items' => $items,
            'client' => $client,
            'editor' => $editor,
        ]);

        return $pdf->download($estimate->estimateId . ' - ' . $client->firstname . ' ' . $client->lastname . '.pdf');
    }
}
