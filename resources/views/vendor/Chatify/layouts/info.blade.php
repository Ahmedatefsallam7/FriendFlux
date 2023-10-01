{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex">
    <img src="{{ asset('storage/users-avatar/'.$user->avatar) }}" alt="">
</div>
<p class="info-name">{{ $user->first_name." ".$user->last_name }}</p>
<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Delete Conversation</a>
    <small style="display: block;align-items: center;font-size: 10px">{{ "with  $user->first_name $user->last_name" }}</small>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title"><span>Shared Photos</span></p>
    <div class="shared-photos-list"></div>
</div>
