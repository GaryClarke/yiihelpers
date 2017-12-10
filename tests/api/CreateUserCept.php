<?php 
$I = new ApiTester($scenario);
$I->wantTo('create a user via API');

$I->sendGET('/');


