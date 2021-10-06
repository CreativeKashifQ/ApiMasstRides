<div>
    <div class="btn-group dropleft">
        <button type="button" class="btn btn-success btn-sm rounded-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Completed
          <div class="spinner-border spinner-border-sm" wire:loading role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </button>
        <div class="dropdown-menu dropdown-menu-sm bg-warning">
          <a class="dropdown-item" style="cursor:pointer;" wire:click='pending'>Pending</a>
        </div>
      </div>
    </div>
