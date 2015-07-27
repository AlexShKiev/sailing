<?php
$I = new AcceptanceTester($scenario);
$I->wantToTest('front page of my site');
$I->amOnPage('index.php?r=site%2Fread&id=0');
$I->see('AlexTest');
?>

