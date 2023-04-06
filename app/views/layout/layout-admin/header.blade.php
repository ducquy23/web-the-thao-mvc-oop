<div class="header">
    <div class="header-notification">
        @foreach (get_notification() as $notification)
            @foreach($notification['message'] as $msg)
                <div class="alert alert-{{$notification['type']}} text-center">
                    <h6>{{$msg}}</h6>
                </div>
            @endforeach
        @endforeach
    </div>
    <div class="header-info">
        <img src="{{BASE_URL}}public/images/logo-notification.png" alt="">
        <p class="header-info__text">
            <span class="header-info__text-hello">Xin Chào, </span>
            <span class="header-info__text-name">Đức Quý</span>
        </p>
        <img src="{{BASE_URL}}public/images/avartar-01.jpg" alt="">
    </div>
</div>