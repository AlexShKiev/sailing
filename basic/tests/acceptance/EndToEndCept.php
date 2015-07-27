<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('make end-to-end testing');
$I->amOnPage('/');
$I->click('Create New User');
$I->fillField('Email','test@test');
$I->fillField('Password','12345');
$I->fillField('Login','TestHello');
$I->fillField('Date of birth','010221');
$I->click('Submit');
?>
