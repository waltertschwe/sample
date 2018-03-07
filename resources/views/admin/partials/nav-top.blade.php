@php
	// TODO: move this somewhere global 
    switch ($website->short_code) {
    	case "ttt":
    		$siteHeader = "nav-top-techtrader";
    		break;
    	case "mpt":
    		$siteHeader = "nav-top-mptrader";
    		break;
    	case "sto":
    		$siteHeader = "nav-top-swingtrader";
    		break;
    	case "ewt":
    		$siteHeader = "nav-top-elliottwave";
    		break;
    	case "at":
    		$siteHeader = "nav-top-advicetrade";
    		break;
    	case "atq":
    		$siteHeader = "nav-top-atquant";
    		break;
    }

@endphp
<nav class="navbar navbar-default navbar-fixed-top">
    <div id="@php echo $siteHeader; @endphp" class="container-fluid">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Branding Image -->
            <img src="{{ URL::asset('img/admin/chum-48x48.png') }}" alt="">
             @if (Auth::guest())
            @else
            	<a class="navbar-brand-name">{{ $website->name }}</a>
            @endif
            <!--
            <a class="navbar-brand-name" href="{{ url('/') }}">
                {{ config('app.name', 'Chum Admin 2.0') }}
            </a> 
            -->
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
               
            </ul>
			
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
            	
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                @else
                    <li class="dropdown">
                        <a href="#" id="username" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->firstname }}  {{ Auth::user()->lastname }}<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
