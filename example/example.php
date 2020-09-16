<?php
# Load the Class
include('../Whitelist.php');

# Setup a New WhiteList
$whitelist = new Whitelist('whitelist');
$whitelist->Add('duckduckgo.com'); # Add a Custom entry address.

$site = 'duckduckgo.com'; # Example string to test against

# Verify against WhiteList
if( $whitelist->Verify($site) )
{
    echo $site.' is whitelisted.';
}
else
{
    echo $site.' is NOT whitelisted.';
}
