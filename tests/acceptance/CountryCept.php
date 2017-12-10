<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('see if this shit works!');

$I->amOnPage('/country');

$I->seeCurrentUrlEquals('/country');
