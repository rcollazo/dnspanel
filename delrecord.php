<?php
require_once 'header.inc.php';

$token=trim(escapeshellarg($_REQUEST["txtToken"])," '");
$acctnum=trim(escapeshellarg($_REQUEST["txtAcct"])," '");
$domainid=trim(escapeshellarg($_REQUEST["txtDomain"])," '");
$recid=trim(escapeshellarg($_REQUEST["txtRecID"])," '");

$resp=shell_exec('curl -X DELETE -i -k -H "X-Auth-Token: '.$token.'" -H "Content-Type: application/json" https://dns.api.rackspacecloud.com/v1.0/'.$acctnum.'/domains/'.$domainid.'/records/'.$recid.' 2>&1');
?>
<p>Delete record request submitted</p>
<button name="btnBack" type="reset" onClick="history.go(-1);">Back</button>
<?php
//debugging output
echo "<hr/>Raw response:<br/>";

echo "<div style=\"border: 1px solid #000; height: 9em; overflow: auto; margin: 0.5em;\">";
echo nl2br($resp);
echo "</div>";

require_once 'footer.inc.php';
