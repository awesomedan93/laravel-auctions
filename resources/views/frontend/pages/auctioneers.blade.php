@extends('frontend.layouts.default')
@section('content')
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->

            <div class="content">

                <h1>Auctioneers & Auction Companies in Atlanta, GA</h1>
                <ul>
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="responsive-column">Address</th>
                            <th class="responsive-column">Phone</th>
                            <th class="responsive-column">Email</th>
                            <th class="responsive-column">More Info</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($auctioneers as $auctioneer)

                            <tr>
                                <td><a href="{{ url("/auctioneers/$auctioneer->id") }}">{{ $auctioneer->name }}</a></td>
                                <td class="responsive-column">{{ $auctioneer->address }}</td>
                                <td class="responsive-column">{{ $auctioneer->phone }}</td>
                                <td class="responsive-column">{{ $auctioneer->email }}</td>
                                <td class="responsive-column"><a href="{{ url("/auctioneers/$auctioneer->id") }}">More Info</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </ul>

            </div>

        <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>


@endsection