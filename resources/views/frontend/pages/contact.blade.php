@extends('frontend.layouts.default')
@section('content')
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->

            <div class="content">

                @include('frontend.partials.adsbygoogle')

                <h3>Contact Us</h3>
                <p>
                    If you are an auctioneer or have an auction house in the Atlanta area and would like your information added to our site, please send us an email with all of your business information. <a href="mailto:info@auctionsinatlanta.com">info@auctionsinatlanta.com</a>
                </p>
                <div id="comments">
                    <a id="message"></a>
                    <h2>Send an email</h2>
                    <div class="flash-message">

                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                                <div class="alert alert-{{ $msg }} fade in alert-dismissable" style="margin-top:18px;">
                                    <strong>{{ Session::get('alert-' . $msg) }}!</strong>
                                </div>
                            @endif
                        @endforeach

                    </div> <!-- end .flash-message -->
                    <form action="{{ route('contact_us') }}" method="post">
                            {{ csrf_field() }}
                        <div class="one_third first">
                            <label for="name">Name <span>*</span></label>
                            <input type="text" name="name" id="name" value="" size="22" required>
                        </div>
                        <div class="one_third">
                            <label for="email">Mail <span>*</span></label>
                            <input type="email" name="email" id="email" value="" size="22" required>
                        </div>
                        <div class="one_third">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" id="phone" value="" size="22">
                        </div>
                        <div class="block clear">
                            <label for="comment">Your Message</label>
                            <textarea name="comment" id="comment" cols="25" rows="10"></textarea>
                        </div>
                        <div>
                            <input type="submit" name="submit" value="Submit Form">
                            &nbsp;
                            <input type="reset" name="reset" value="Reset Form">
                        </div>
                    </form>
                </div>

            </div>

        <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>


@endsection