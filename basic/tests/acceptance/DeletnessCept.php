<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('chek how delete function is working');
$I->amOnPage('/');
$I->click('delete');
