<header class="top-navigation">
    <div class="top-navigation-logo">
        <a href="{{ action('ForumController@getListThreads') }}">
            <img class="logo" src="/images/laravel-io-logo.png">
        </a>
    </div>
    <nav>
        <ul>
            <li>
                <a class="{{ Request::is('articles*') ? 'active' : null }}" href="{{ action('ArticlesController@getIndex') }}">Articles</a>
            </li>
            <li>
                <a class="{{ Request::is('forum*') ? 'active' : null }}" href="{{ action('ForumController@getListThreads') }}">Forum</a>
            </li>
            <li>
                <a class="{{ Request::is('chat*') ? 'active' : null }}" href="{{ action('ChatController@getIndex') }}">Live Chat</a>
            </li>
            <li>
                <a href="{{ action('BinController@getCreate') }}">Pastebin</a>
            </li>
            @if($currentUser && $currentUser->isUserAdmin())
                <li>
                    <a href="{{ action('AdminUsersController@getIndex') }}">Admin</a>
                </li>
            @endif
            <li>
                <a href="http://www.buzzsprout.com/11908">Podcast</a>
            </li>
            <li>
                <a target="_blank" href="http://forumsarchive.laravel.io/">Old Forum Archive</a>
            </li>
        </ul>
    </nav>
    <ul class="user-navigation">
        @if(Auth::check())
            {{-- <li><a href="{{ action('DashboardController@getIndex') }}">{{ $currentUser->name }}<span class="dashboard-word">'s Dashboard</span></a></li> --}}
            <li><a class="button" href="{{ action('AuthController@getLogout') }}">Logout</a></li>
        @else
            <li><a class="button" href="{{ action('AuthController@getLogin') }}">Login with GitHub</a></li>
        @endif
    </ul>
</header>
