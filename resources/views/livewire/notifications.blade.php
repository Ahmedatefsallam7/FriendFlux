@section('title','Notifications')
<div>
    <a href="#" class="btn-round-lg theme-dark-bg me-auto menu-icon" id="dropdownMenu3" data-bs-toggle="dropdown">
        @if ($notifications->count() and $isFriend)
        <span style="border-radius: 100%;width: 20px;height: 20px" class="text-white font-xsss dot-count bg-danger">
            <p style="margin-top: 2px;margin-right: -2px">
                {{ $notifications->count() > 9 ? '+9' : $notifications->count() }}</p>
        </span>
        @endif
        <span style="margin-top:-7px ;margin-left:2px"><?php echo $icons->getIcon('bell'); ?></span>
    </a>

    <div style="height:fit-content;overflow-y: scroll;max-height: 250px" class="dropdown-menu dropdown-menu-end p-4 rounded-3 border-0 shadow-lg" aria-labelledby="dropdownMenu3">
        @if ($notifications->count())
        <a wire:click.prevent="markAllRead" title="read all notifications" style="cursor: pointer;color: white;padding: 5px;border-radius: 15px;font-size: 10px;margin-left: 120px;background-color: #0d66ff;border: none;font-weight: 700">mark
            all read</a>
        @endif
        <span style="color:blue"> <?php echo $icons->getIcon('bell'); ?></span>
        <h4 class="d-inline-block fw-700 font-xss mb-4">Notifications</h4>

        @if ($isFriend)
        @forelse($notifications as $notifcation)
        <a href="#">
            <div style="height: fit-content" class="card bg-transparent-card border-0 pe-5 mb-3">
                <img style="margin-top: -15px;border-radius: 100%;width: 50px;height: 50px" src="{{ asset('storage\\') . $notifcation->user->profile }}" alt="user" class="position-absolute right-0">
                <h5 style="margin-right: 10px" class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block text-left">
                    {{ $notifcation->user->first_name . ' ' . $notifcation->user->last_name }}
                </h5>
                <a wire:click.prevent="markAsRead({{ $notifcation->id }})" title="read this notification" style="cursor: pointer;font-size: 10px;margin-top: -22px;color:#0d66ff">mark as read</a>
                <h6 class="text-grey-700 fw-500 font-xssss lh-4">{{ $notifcation->message }}</h6>
                <span class="text-blue-900 font-xsssss fw-600 float-right mt--1">
                    {{ $notifcation->created_at->diffForHumans() }}</span>
            </div>
        </a>

        @empty
        <div style="height:20px" class="text-red">...There's no notifications</div>
        @endforelse
        @else
        <div style="height:20px" class="text-red">...There's no notifications</div>
        @endif
    </div>

</div>
