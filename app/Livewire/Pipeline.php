<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;

class Pipeline extends Component
{
    /**
     * @param array $stages Associative array where keys are
     *                      stages and values are client ids.
     */
    public function reorder($stages)
    {
        foreach ($stages as $stage => $clientIds) {
            
            foreach ($clientIds as $clientId) {
                $stageId = Client::getStageID($stage);

                Client::where('id', $clientId)->update([
                    'stage_id' => $stageId
                ]);
            }
        }
    }

    public function render()
    {
        $stages = Client::STAGES;
        $clients = auth()->user()->clients;

        $this->dispatch('contentChanged');

        return view('livewire.pipeline', [
            'stages' => $stages,
            'clients' => $clients,
        ])
            ->layout('pipeline.layout');
    }
}
