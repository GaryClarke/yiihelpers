<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('ensure the frontpage works');

$I->amOnPage('/');
$I->see('Our CRT');
