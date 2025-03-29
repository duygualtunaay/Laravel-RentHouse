<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo" style="padding-bottom: 30px;">
        <a href="{{route('admin_home')}}" class="simple-text logo-mini">
            @if(Auth::user()->profile_photo_path)
                <img src="{{Storage::url(Auth::user()->profile_photo_path)}}" height="40" style="border-radius: 10px">
            @endif
        </a>
        <a href="{{route('admin_home')}}" class="simple-text logo-normal">
            {{Auth::user()->name}}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="{{route('admin_home')}}">
                    <i class="now-ui-icons design_app"></i>
                    <p>Ana Sayfa</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_category')}}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>Kategoriler</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_houses')}}">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>Kiralık Evler</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_message')}}">
                    <i class="now-ui-icons ui-1_send"></i>
                    <p>İletişim Mesajları</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_faq')}}">
                    <i class="now-ui-icons ui-1_email-85"></i>
                    <p>FAQ</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_users')}}">
                    <i class="now-ui-icons users_circle-08"></i>
                    <p>Kullanıcılar</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_setting')}}">
                    <i class="now-ui-icons loader_gear"></i>
                    <p>Ayarlar</p>
                </a>
            </li>

        </ul>
    </div>
</div>
