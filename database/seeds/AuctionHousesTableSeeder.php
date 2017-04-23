<?php

use Illuminate\Database\Seeder;

class AuctionHousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = \App\Models\User::first()->id;
        $auctionHouses = [
            ['slug'=>'auction-depot','name'=>'Auction Depot','city'=>'Atlanta','address'=>'575 Wharton Drive Atlanta, GA 30336','phone'=>'404-808-5458','email'=>'mbsurplus@aol.com','website'=>'www.marcusbarelaauctions.com','user_id'=>$userId],
            ['slug'=>'cherry-hill-auctions','name'=>'Cherry Hill Auctions','city'=>'Snellville','address'=>'2135 Main Street East, Ste. 100B Snellville, GA 30078','phone'=>'678-490-1259','email'=>'richard@cherryhillauctions.com','website'=>'www.cherryhillauctions.com','user_id'=>$userId],
            ['slug'=>'depew-auction','name'=>'Depew Auction','city'=>'Atlanta','address'=>'715 Miami Circle, Suite 210 Atlanta, GA 30324','phone'=>'404-869-2478','email'=>'depewauction@aol.com','website'=>'www.depewauction.com','user_id'=>$userId],
            ['slug'=>'four-seasons-auction-gallery','name'=>'Four Seasons Auction Gallery','city'=>'Alpharetta','address'=>'4010 Nine McFarland Drive Alpharetta, GA 30004','phone'=>'404-876-1048','email'=>'info@fsagallery.com','website'=>'www.fsagallery.com','user_id'=>$userId],
            ['slug'=>'gallery-63','name'=>'Gallery 63','city'=>'Atlanta','address'=>'4577 Roswell Road Atlanta, GA 30068','phone'=>'404-252-2555','email'=>'info@gallery63.net','website'=>'www.gallery63.net','user_id'=>$userId],
            ['slug'=>'j-woodward-auctions','name'=>'J Woodward Auctions','city'=>'Dallas','address'=>'785 Seaboard Drive Unit #205 Dallas, GA 30132','phone'=>'770-866-5874','email'=>'johnathan@jwoodwardauctions.com','website'=>'www.jwoodwardauctions.com','user_id'=>$userId],
            ['slug'=>'king-galleries','name'=>'King Galleries','city'=>'Roswell','address'=>'854 Atlanta Street Roswell, GA 30075','phone'=>'770-998-1618','email'=>'kinggalleries@bellsouth.net','website'=>'www.kinggalleriesauction.com','user_id'=>$userId],
            ['slug'=>'my-hart-auctions','name'=>'My Hart Auctions','city'=>'Cumming','address'=>'2566 Bethelview Road Cumming, GA 30040','phone'=>'770-888-9006','email'=>'myhart@basicisp.net','user_id'=>$userId],
            ['slug'=>'olde-time-auction-and-appraisal','name'=>'Olde Time Auction & Appraisal','city'=>'Conyers','address'=>'2143 Gees Mill Road Road SE Conyers, GA 30012','phone'=>'770-483-7224','email'=>'frank.scott@itex.net','user_id'=>$userId],
            ['slug'=>'peachtree-and-bennett-antiques-estates-auctions','name'=>'Peachtree & Bennett Antiques Estates Auctions','city'=>'Atlanta','address'=>'200 Bennett Street NW Atlanta, GA 30309','phone'=>'678-705-9798','email'=>'auctions@peachtreebennett.com','website'=>'www.peachtreebennett.com','user_id'=>$userId],
            ['slug'=>'phoenix-store-fixtures-and-auctions','name'=>'Phoenix Store Fixtures & Auctions','city'=>'Conyers','address'=>'572 Smyrna Road Conyers, GA 30012','phone'=>'678-413-2202','email'=>'marketing@phoenixstorefixtures.com','website'=>'www.phoenixstorefixtures.com','user_id'=>$userId],
        ];

        foreach ($auctionHouses as $key => $value){
            \App\Models\AuctionHouse::create($value);
        }
    }
}
