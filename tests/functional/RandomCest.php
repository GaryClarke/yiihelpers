<?php

use app\models\Country;

class RandomCest {

    public function submitEmptyForm(\FunctionalTester $I)
    {
        $I->wantToTest('that this bollocks works');

        $I->sendAjaxPostRequest('/country/create', ['code' => 'AU']);

//        $I->seeRecord(Country::class, [
//            'code' => 'FR'
//        ]);
    }
}