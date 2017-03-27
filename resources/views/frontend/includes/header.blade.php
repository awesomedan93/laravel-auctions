<div class="wrapper row0">
    <div id="topbar" class="hoc clear">

        <div class="fl_left">
            <ul>
                <li><i class="fa fa-envelope-o"></i><a href="mailto:info@auctionsinatlanta.com"> info@auctionsinatlanta.com</a></li>
            </ul>
        </div>
        <div class="fl_right">
            <ul>
                <li><a href="{{ asset('/') }}"><i class="fa fa-lg fa-home"></i></a></li>
                <li><a href="{{ asset('login') }}">Login</a></li>
            </ul>
        </div>

    </div>
</div>



<div class="wrapper row1">
    <header id="header" class="hoc clear">
        <div id="logo">

            <h1><a href="{{ asset('/') }}">Atlanta</a></h1>
            <h2>www.AuctionsInAtlanta.com</h2>
            <p>Free Auctioneer & Auction Listings</p>

        </div>
        <nav id="mainav" class="clear">

            <ul class="clear">
                <li class="{{ ((Request::is('/')) ? 'active' : ' ') }}"><a href="{{ asset('/') }}">Home</a></li>
                <li class="{{ ((Request::segment(1) == 'auctioneers') ? 'active' : ' ') }}"><a href="{{ asset('auctioneers') }}">Auctioneers</a></li>
                <li class="{{ ((Request::segment(1) == 'auction-houses') ? 'active' : ' ') }}"><a href="{{ asset('auction-houses') }}">Auction Houses</a></li>
                <li class="{{ ((Request::is('contact')) ? 'active' : ' ') }}"><a href="{{ asset('contact') }}">Contact US</a></li>
            </ul>

        </nav>
    </header>
</div>