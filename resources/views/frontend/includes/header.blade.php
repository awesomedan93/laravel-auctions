<div class="wrapper row0">
    <div id="topbar" class="hoc clear">

        <div class="fl_left">
            <ul>
                <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
                <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
            </ul>
        </div>
        <div class="fl_right">
            <ul>
                <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
                <li><a href="/login">Login</a></li>
            </ul>
        </div>

    </div>
</div>



<div class="wrapper row1">
    <header id="header" class="hoc clear">
        <div id="logo">

            <h1><a href="/">Atlanta</a></h1>
            <p>Free Auctioneer & Auction Listings</p>

        </div>
        <nav id="mainav" class="clear">

            <ul class="clear">
                <li class="{{ ((Request::is('/')) ? 'active' : ' ') }}"><a href="/">Home</a></li>
                <li class="{{ ((Request::segment(1) == 'auctioneers') ? 'active' : ' ') }}"><a href="/auctioneers">Auctioneers</a></li>
                <li class="{{ ((Request::segment(1) == 'auctioneers-houses') ? 'active' : ' ') }}"><a href="/auctioneers-houses">Auctioners Houses</a></li>
                <li class="{{ ((Request::is('contact')) ? 'active' : ' ') }}"><a href="/contact">Contact US</a></li>
            </ul>

        </nav>
    </header>
</div>