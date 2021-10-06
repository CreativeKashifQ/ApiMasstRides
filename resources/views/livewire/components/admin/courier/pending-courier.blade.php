<div>
    <div class="btn-group dropleft">
        <button type="button" class="btn btn-warning btn-sm rounded-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pending.....
          <div class="spinner-border spinner-border-sm" wire:loading role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </button>
        <div class="dropdown-menu dropdown-menu-sm bg-success">
          <a class="dropdown-item" style="cursor:pointer;" wire:click='complete'>Complete</a>
        </div>
      </div>
    </div>

