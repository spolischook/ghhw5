<?php
require __DIR__ . '/../config/autoload.php';

$smsObj = new \Src\TurboSMS();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $smsObj->sendSMS(380 . $_POST['phone_num'], $_POST['message']);
    header("Location: /");
}

?>

<form action="index.php" method="post">
    <p><b>Phone number:</b></p>

    <p><b>+380</b> <input type="number" maxlength="7" name="phone_num"/></p>

    <p><b>Message:</b></p>

    <p><textarea rows="10" cols="45" name="message"></textarea></p>

    <p><input type="submit" value="Send SMS"/></p>
</form>


<table cellspacing="2" border="1" cellpadding="5" width="auto">
    <tr>
        <td>Id</td>
        <td>Phone number</td>
        <td>Message</td>
        <td>Cost</td>
        <td>Balance</td>
        <td>Status</td>
    </tr>
    <?php
    $statusSMS = $smsObj->getStatusSMS();
    foreach ($statusSMS as $key) {
        ?>
                <td><?= $key['id']; ?></td>
                <td><?= '+' . substr($key['number'], 0, 8) . 'XXXX'; ?></td>
                <td><?= $key['message']; ?></td>
                <td><?= $key['cost']; ?></td>
                <td><?= $key['balance']; ?></td>
                <td><?= $key['status']; ?></td>
            </tr>
        <?php }; ?>
</table>

