<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('log in as regular user');
$I->amOnPage('/index.php?r=site%2Flogin');
$I->fillField('Username','admin');
$I->fillField('Password','admin');
$I->click('login-button');
$I->see('Logout');
?>
