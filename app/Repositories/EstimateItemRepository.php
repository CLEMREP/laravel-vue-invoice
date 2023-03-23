<?php

namespace App\Repositories;

use App\Models\Estimate;
use App\Models\EstimateItem;
use Illuminate\Database\Eloquent\Collection;

class EstimateItemRepository
{
    public function __construct(private EstimateItem $model)
    {
    }

    /**
     * @param Estimate $estimate
     * @return Collection<int, EstimateItem>
     */
    public function getItemsOfEstimate(Estimate $estimate) : Collection
    {
        return $this->model->newQuery()->where('estimate_id', '=', $estimate->getKey())->get();
    }

    public function createEstimateItem(mixed $item, Estimate $estimate) : EstimateItem
    {
        return $this->model::create(
            [
                'name' => $item['name'],
                'qte' => $item['quantity'],
                'price' => $item['price'],
                'description' => $item['description'] ?? '',
                'estimate_id' => $estimate->getKey(),
            ]
        );
    }
}
