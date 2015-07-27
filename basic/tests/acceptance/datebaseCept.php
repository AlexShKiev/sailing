<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('check users info in datebase');
$I->seeInDatabase('user', array('mail' => 'test@test'));