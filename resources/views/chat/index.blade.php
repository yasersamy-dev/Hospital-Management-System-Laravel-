@extends('layouts.chat')

@section('chat-content')

@push('style')
<link rel="stylesheet" href="{{ asset('css/chat.css') }}">
@endpush

<div class="chat-wrapper">

    {{-- ================= Sidebar ================= --}}
    <div class="chat-sidebar">

        <div class="sidebar-header">
            المحادثات
        </div>

        <div class="search-box">
            <input
                type="text"
                class="form-control"
                placeholder="ابحث..."
            >
        </div>

        <div class="users">

            @forelse($chatUsers as $user)

           <a href="{{ route('chat.index',['user'=>$user->id]) }}"
              class="text-decoration-none">
           

          <div class="user-item {{ optional($selectedUser)->id == $user->id ? 'active' : '' }}">
  
            
        <div class="avatar">

          {{ strtoupper(substr($user->name,0,1)) }}

       </div>

    <div class="user-info">

        <h6>{{ $user->name }}</h6>

        <small class="last-message">

        {{ Str::limit($user->lastMessage?->message ?? 'ابدأ المحادثة',25) }}
        
        </small>
       


    </div>
   
</div>

</a>

@empty

<div class="text-center p-5">

لا توجد محادثات

</div>

@endforelse

        </div>

    </div>

    {{-- ================= Chat ================= --}}
    <div class="chat-content">

        {{-- Header --}}
        <div class="chat-header">

            @if($selectedUser)

                <div class="chat-person">

                    <div class="avatar">

                        {{ strtoupper(substr($selectedUser->name,0,1)) }}

                        {{-- <span class="online"></span> --}}

                    </div>

                    <div>

                        <h5 class="mb-0">
                            {{ $selectedUser->name }}
                        </h5>

                        

                    </div>

                </div>

            @else

                <div class="chat-person">

                    <div>

                        <h5 class="mb-0">
                            اختر محادثة
                        </h5>

                        <small class="text-muted">
                            لا يوجد مستخدم محدد
                        </small>

                    </div>

                </div>

            @endif

        </div>

        {{-- Messages --}}
        <div class="messages" id="messages">

    @if($selectedUser)

        @if($messages->count())

            @foreach($messages as $message)

                <div class="message {{ $message->sender_id == auth()->id() ? 'message-out' : 'message-in' }}">

                    <div class="message-box">
                
                        <div class="message-body">
                
                            {{ $message->message }}
                
                        </div>
                
                        <small class="message-time">
                
                            {{ $message->created_at->format('h:i A') }}
                
                        </small>
                
                    </div>
                
                </div>

            @endforeach

        @else

            <div class="empty-chat">

                <i class="fa-regular fa-comments fa-3x mb-3"></i>

                <h5>

                    ابدأ المحادثة مع

                    <strong>{{ $selectedUser->name }}</strong>

                </h5>

                <p>

                    أرسل أول رسالة لبدء المحادثة.

                </p>

            </div>

        @endif

    @else

        <div class="d-flex justify-content-center align-items-center h-100">

            <div class="text-center text-muted">

                <i class="fa-solid fa-comment-slash fa-4x mb-3"></i>

                <h4>اختر محادثة</h4>

                <p>اختر مستخدمًا من القائمة لعرض الرسائل.</p>

            </div>

        </div>

    @endif

</div>

        {{-- Input --}}
        <div class="chat-input">

            <form action="{{ route('chat.send', ['user' => $selectedUser->id ?? 0]) }}" method="POST" class="d-flex">
                @csrf
                <input type="text" class="form-control" name="message" placeholder="اكتب رسالتك...">

                <button class="btn btn-primary" type="submit">

                   <i class="fa-solid fa-paper-plane">ارسال</i>
                </button>

            </form>

        </div>

    </div>

</div>

<script type="module">

if (window.Echo) {

    window.Echo.private('chat.{{ auth()->id() }}')
        .listen('.message.sent', (e) => {

            console.log('Message received:', e);

            const messages = document.getElementById('messages');

            if (!messages) return;

            const html = `
                <div class="message message-in">
                    <div class="message-box">
                        <div class="message-body">
                            ${e.message}
                        </div>

                        <small class="message-time">
                            ${e.created_at}
                        </small>
                    </div>
                </div>
            `;

            messages.insertAdjacentHTML('beforeend', html);
            messages.scrollTop = messages.scrollHeight;
        });

} else {
    console.error('Echo is not loaded');
}

</script>

@endsection