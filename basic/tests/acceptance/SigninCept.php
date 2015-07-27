<?php 
$I = new AcceptanceTester($scenario);
$I->wantToTest('front page of my site');
$I->amOnPage('/');
$I->see('AlexTest');
?>