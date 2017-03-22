<?php

use Illuminate\Database\Seeder;
use \App\Models\User;

class AuctioneersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = User::first()->id;
        $auctioneers = [
            ['name'=>'Accelerated Auction Solutions','address'=>'2381 John Glenn Drive #108 Chamblee, GA 30341','phone'=>'404-368-0683','email'=>'info@atlbid.com','website'=>'www.atlbid.com','user_id'=>$userId],
            ['name'=>'American Auction Associates','address'=>'3869 Redbud Court Smyrna, GA 30082','phone'=>'770-265-2807','email'=>'amerauction@charter.net','user_id'=>$userId],
            ['name'=>'Amp Liquidity Consultants','address'=>'5365 Orchard Place Lake City, GA 30260','phone'=>'678-608-8440','email'=>'hollywoodchant@yahoo.com','user_id'=>$userId],
            ['name'=>'Atlanta Auction Company','address'=>'133 South Clayton Street Lawrenceville, GA 30046','phone'=>'770-330-4863','email'=>'info@atlantaauctionco.com','website'=>'www.atlantaauctionco.com','user_id'=>$userId],
            ['name'=>'Atlanta Liquidation','address'=>'5080 North Royal Atlanta Drive, Suite 1 Tucker, GA 30084','phone'=>'404-428-1977','email'=>'atlantaliquidation@yahoo.com','website'=>'www.atlantaliquidation.com','user_id'=>$userId],
            ['name'=>'Atlanta Surplus & Auction','address'=>'6385 Atlantic Boulevard, Suite B Norcross, GA 30071','phone'=>'770-242-5705','email'=>'auctions@atlantasurplus.com','website'=>'www.atlantasurplus.com','user_id'=>$userId],
            ['name'=>'Auction Management Corporation','address'=>'1827 Powers Ferry Road, Building 5 Atlanta, GA 30339','phone'=>'770-980-9565','email'=>'jeb.howell@gmail.com','website'=>'www.auctionebid.com','user_id'=>$userId],
            ['name'=>'Bell Auctioneers','address'=>'2111 Flat Shoals Road SE, Suite 102 Conyers, GA 30013','phone'=>'678-253-0880','email'=>'info@bellauctioneers.com','website'=>'www.bellauctioneers.com','user_id'=>$userId],
            ['name'=>'Bennett’s Auction and Estate Services','phone'=>'770-487-5400','email'=>'antiques8545@bellsouth.net','website'=>'www.bennettsantiques.com','user_id'=>$userId],
            ['name'=>'Big Jim\'s Auction','address'=>'9465 Main Street, Suite 100 Woodstock, GA 30188','phone'=>'404-579-8183','email'=>'bigjimsauction@bellsouth.net','website'=>'www.bigjimsauction.com','user_id'=>$userId],
            ['name'=>'Big Sky Auctions & Estate Sales','phone'=>'770-680-6017','email'=>'steven.cash@bigskyauctionsandestatesales.com','website'=>'www.bigskyauctionsandestatesales.com','user_id'=>$userId],
            ['name'=>'Braxton\'s Auctioneering','address'=>'303 Main Street Loganville, GA 30052','phone'=>'770-466-0748','email'=>'info@auction78.com','website'=>'www.auction78.com','user_id'=>$userId],
            ['name'=>'Bullseye Auction Group','address'=>'500 Pike Park Drive, Suite F Lawrenceville, GA 30045','phone'=>'770-544-7479','email'=>'rick@BullseyeAuctions.com','website'=>'www.bullseyeauctions.com','user_id'=>$userId],
            ['name'=>'Cherry Hill Auctions','address'=>'2135 Main Street East, Ste. 100B Snellville, GA 30078','phone'=>'678-490-1259','email'=>'richard@cherryhillauctions.com','website'=>'www.cherryhillauctions.com','user_id'=>$userId],
            ['name'=>'Clark Auction Company','address'=>'3132 Holly Springs Parkway Canton, GA 30115','phone'=>'404-824-7068','email'=>'clarkauction@comcast.net','user_id'=>$userId],
            ['name'=>'Doan & Associates Auction Company','address'=>'1720 North Roberts Road Kennesaw, GA 30144','phone'=>'404-457-4444','email'=>'jerrydoan@comcast.net','website'=>'www.doanauctions.net','user_id'=>$userId],
            ['name'=>'Elrod Auction Company','address'=>'5340 Slater Mill Circle Douglasville, GA 30135','phone'=>'770-949-9046','email'=>'elrodauction@aol.com','website'=>'www.elrodauction.net','user_id'=>$userId],
            ['name'=>'Harris Auction Service','address'=>'99 Bay Street Fairburn, GA 30213','phone'=>'770-969-1315','email'=>'info@harrisauctionatlanta.com','website'=>'www.harrisauctionatlanta.com','user_id'=>$userId],
            ['name'=>'Janice L. Nicholas Auctioneer','address'=>'3440-A Lang Avenue Hapeville, GA 30354','phone'=>'678-637-1969','email'=>'myauctionlady@gmail.com','website'=>'www.myauctionlady.com','user_id'=>$userId],
            ['name'=>'John Dixon & Associates','address'=>'200 Cobb Parkway North, Suite 120 Marietta, GA 30060','phone'=>'770-425-1141','email'=>'mail@johndixon.com','website'=>' www.johndixon.com','user_id'=>$userId],
            ['name'=>'Lee Bissell Auctions','address'=>'373 Creek Manor Way Suwanee, GA 30024','phone'=>'770-617-8489','email'=>'lee@auctioneeratlanta.com','website'=>'www.auctioneeratlanta.com','user_id'=>$userId],
            ['name'=>'Michael Robuck\'s Auctions','address'=>'556 Tift Street Atlanta, GA 30310','phone'=>'404-798-6039','email'=>'mike@robuckandcompany.com','user_id'=>$userId],
            ['name'=>'My Benefit Auctioneer','phone'=>'404-403-9090','email'=>'dean@mybenefitauctioneer.com','website'=>'mybenefitauctioneer.com','user_id'=>$userId],
            ['name'=>'Realty Addicts','address'=>'2600 Spencers Trace NE Marietta, GA 30062','phone'=>'678-768-7094','website'=>'www.realtyaddicts.com','user_id'=>$userId],
            ['name'=>'The Dobbins Company','address'=>'1108 Old Chattahoochee Avenue Atlanta, GA 30318','phone'=>'404-352-2638','email'=>'info@dobbinscompany.com','website'=>'www.dobbinscompany.com','user_id'=>$userId],
            ['name'=>'Trader J\'s Auction','address'=>'131 Eaton Street Lawrenceville, GA 30046','phone'=>'678-481-0459','email'=>'traderj@bellsouth.net','user_id'=>$userId],
        ];
        foreach ($auctioneers as $key=>$value){

            App\Models\Auctioneer::create($value);

        }
    }
}
