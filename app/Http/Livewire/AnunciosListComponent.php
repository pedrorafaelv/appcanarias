<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Anuncio;

class AnunciosListComponent extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'desc';
    public $perPage = 10;
    
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
        'sortField' => ['except' => 'id'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        
        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $anuncios = Anuncio::query()
            ->with(['user', 'clase', 'categoria', 'plane', 'municipio', 'provincia'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('nombre', 'like', '%'.$this->search.'%')
                      ->orWhere('titulo', 'like', '%'.$this->search.'%')
                      ->orWhere('id', 'like', '%'.$this->search.'%')
                      ->orWhere('estado', 'like', '%'.$this->search.'%')
                      ->orWhereHas('user', fn($q) => $q->where('name', 'like', '%'.$this->search.'%'))
                      ->orWhereHas('municipio', fn($q) => $q->where('nombre', 'like', '%'.$this->search.'%'))
                      ->orWhereHas('provincia', fn($q) => $q->where('nombre', 'like', '%'.$this->search.'%'));
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.anuncios-list-component', [
            'anuncios' => $anuncios
        ]);
    }
}