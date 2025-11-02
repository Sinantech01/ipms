

<div class="modal fade" id="assignWork{{ $complaint->id }}" tabindex="-1" aria-labelledby="assignWorkLabel{{ $complaint->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignWorkLabel{{ $complaint->id }}">Assign Work</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('owner.assign-work') }}" enctype="multipart/form-data"> 
                @csrf
                <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
                <div class="modal-body">
                    <div class="mb-3 text-start">
                        <label class="worker">Select Worker</label>
                        <select class="form-select" id="worker" name="worker_id" required>
                            @foreach($workers as $worker)
                                <option value="{{$worker->id}}">{{$worker->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Done</button>
                </div>
            </form>
        </div>
    </div>
</div>