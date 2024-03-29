<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Money Market International</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style type="text/css">
        a[x-apple-data-detectors] {
            color: inherit !important;
        }
    </style>
</head>

<body style="margin: 0; padding: 0;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 20px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border-radius: 5px; border: 1px solid #ddd;  ">
                    <tr>
                        <td align="center" bgcolor="#fff" style="padding: 40px 0 30px 0;">
                            <img src="https://moneymarketint.com/content/uploads/mm-logo-green.jpg" width="240" style="display: block;" />
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="1" cellspacing="1" width="100%" style="border-collapse: collapse;">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif;">
                                        <h1 style="font-size: 24px; margin: 0;">Hai <?= $data['name'] ?></h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 24px; padding: 20px 0 30px 0;">
                                        <p style="margin: 0;">Congratulation registration is success
                                            <?= $data['website'] ?>, Please click verify to verification email!
                                            <br>
                                            <center>
                                                <a href="<?= base_url() . 'l-member/activation?email=' . $this->input->post('email') . '&token=' . urlencode($data['token']) ?>">Verify</a>
                                            </center>
                                            <br>
                                        </p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="color: #0a0a0a; font-family: Arial, sans-serif; font-size: 14px; line-height: 24px; padding: 20px 0 30px 0;">
                                        <p style="margin: 0;">Warm Regard</p>
                                        <p style="margin: 0;"><?= $data['website'] ?> </p>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#000" style="padding: 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 12px;">
                                        <!-- <p style="margin: 0;"><?= $data['website'] ?><br /> -->
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>