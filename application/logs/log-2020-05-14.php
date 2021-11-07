<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-05-14 00:10:00 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:10:12 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:10:14 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:10:14 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:10:23 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:10:40 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:10:51 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:12:25 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:12:40 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:12:42 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:12:57 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:12:59 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:13:14 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:13:22 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:13:23 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:14:22 --> Severity: Notice --> Undefined index: usename /home/qx59rn1k06vg/public_html/application/views/mod/deposit/view_edit.php 34
ERROR - 2020-05-14 00:14:22 --> Severity: Notice --> Undefined index: bank_name /home/qx59rn1k06vg/public_html/application/views/mod/deposit/view_edit.php 38
ERROR - 2020-05-14 00:14:22 --> Severity: Notice --> Undefined index: bank_name /home/qx59rn1k06vg/public_html/application/views/mod/deposit/view_edit.php 41
ERROR - 2020-05-14 00:20:57 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:20:57 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:21:03 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:21:03 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:21:12 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:21:12 --> Query error: Unknown column 'user_id' in 'where clause' - Invalid query: SELECT `id`
FROM `t_user`
WHERE `user_id` = '10'
AND `id` = '2'
ERROR - 2020-05-14 00:21:40 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:21:42 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:21:45 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:22:36 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:22:39 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:23:04 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:25:49 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:27:11 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:27:11 --> Severity: Notice --> Undefined variable: error_content /home/qx59rn1k06vg/public_html/application/controllers/l-member/Deposit.php 88
ERROR - 2020-05-14 00:27:11 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:27:11 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:27:19 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:27:25 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:27:25 --> Severity: Notice --> Undefined variable: error_content /home/qx59rn1k06vg/public_html/application/controllers/l-member/Deposit.php 88
ERROR - 2020-05-14 00:27:25 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:28:17 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:28:22 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:28:22 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:28:33 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:28:34 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 00:48:24 --> Severity: error --> Exception: syntax error, unexpected ''.bank_id'' (T_CONSTANT_ENCAPSED_STRING), expecting ')' /home/qx59rn1k06vg/public_html/application/models/mod/Deposit_model.php 122
ERROR - 2020-05-14 00:48:46 --> Query error: Unknown column 'amount_rate' in 'field list' - Invalid query: SELECT `t_deposit`.`id`, `bank_name`, `acc_number`, `owner_name`, `amount`, `amount_usd`, `amount_rate`, `username`, `destination`, `photo`, `status`
FROM `t_deposit`
JOIN `t_bank` ON `t_bank`.`id`=`t_deposit`.`bank_id`
WHERE `id` = 4
ERROR - 2020-05-14 00:49:12 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `t_deposit`.`id`, `bank_name`, `acc_number`, `owner_name`, `amount`, `amount_usd`, `rate_amount`, `username`, `destination`, `photo`, `status`
FROM `t_deposit`
JOIN `t_bank` ON `t_bank`.`id`=`t_deposit`.`bank_id`
WHERE `id` = 4
ERROR - 2020-05-14 00:49:46 --> Query error: Unknown column 't_depositid' in 'field list' - Invalid query: SELECT `t_depositid`, `bank_name`, `acc_number`, `owner_name`, `amount`, `amount_usd`, `rate_amount`, `username`, `destination`, `photo`, `status`
FROM `t_deposit`
JOIN `t_bank` ON `t_bank`.`id`=`t_deposit`.`bank_id`
WHERE `t_depositid` = 4
ERROR - 2020-05-14 00:49:48 --> Query error: Unknown column 't_depositid' in 'field list' - Invalid query: SELECT `t_depositid`, `bank_name`, `acc_number`, `owner_name`, `amount`, `amount_usd`, `rate_amount`, `username`, `destination`, `photo`, `status`
FROM `t_deposit`
JOIN `t_bank` ON `t_bank`.`id`=`t_deposit`.`bank_id`
WHERE `t_depositid` = 4
ERROR - 2020-05-14 01:25:49 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:28:12 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:28:46 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:28:59 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:29:49 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:31:02 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:31:19 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:31:21 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:31:21 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:31:21 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:31:21 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:31:21 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:33:42 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:33:57 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:40:30 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:40:35 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:46:50 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:46:54 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:47:06 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:47:38 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 01:48:17 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 01:48:18 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 01:48:36 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 01:48:36 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 01:48:38 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 01:50:45 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 01:50:57 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 01:50:57 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 01:50:57 --> Severity: Notice --> Undefined property: History_report::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/History_report.php 29
ERROR - 2020-05-14 01:50:57 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/History_report.php 29
ERROR - 2020-05-14 01:51:12 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 02:02:18 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 02:02:18 --> Severity: Notice --> Undefined variable: bank /home/qx59rn1k06vg/public_html/application/views/member/withdrawal.php 18
ERROR - 2020-05-14 02:02:18 --> Severity: Warning --> Invalid argument supplied for foreach() /home/qx59rn1k06vg/public_html/application/views/member/withdrawal.php 18
ERROR - 2020-05-14 02:02:18 --> Severity: Notice --> Undefined variable: rate /home/qx59rn1k06vg/public_html/application/views/member/withdrawal.php 53
ERROR - 2020-05-14 02:02:18 --> Severity: Notice --> Undefined variable: rate /home/qx59rn1k06vg/public_html/application/views/member/withdrawal.php 54
ERROR - 2020-05-14 02:03:00 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 02:03:21 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 04:12:27 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 04:34:37 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 04:34:47 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:01:37 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:02:46 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:03:07 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:03:40 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:03:58 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:04:42 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:04:48 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:04:49 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:05:03 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:05:28 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:05:33 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:05:34 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:05:46 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:05:47 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:00 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:00 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:00 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:00 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:00 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:01 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:01 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:01 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:01 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:14 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:19 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:30 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:32 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:33 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:37 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:06:56 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:07:59 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:08:00 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:08:08 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:08:10 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:08:30 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:08:54 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:10:16 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:10:33 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:11:04 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:12:12 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:12:34 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:12:35 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:12:39 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:12:40 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:18:49 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:19:46 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:20:02 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:20:52 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:21:15 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:21:42 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 05:22:45 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 10:52:00 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:20:01 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:20:02 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:20:02 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 11:20:02 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 11:22:17 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:22:18 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:22:18 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 11:22:18 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 11:22:21 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:22:38 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:22:38 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:22:38 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 11:22:38 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 11:36:45 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:37:01 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:37:01 --> Query error: Table 'mydbbrokers.t_withdrawal' doesn't exist - Invalid query: INSERT INTO `t_withdrawal` (`user_id`, `bank_id`, `username`, `source`, `amount`, `rate_amount`, `amount_usd`, `status`) VALUES ('10', '2', 'itngetestoi', 'Wallet', 160000, '16000.00', '10', 'Pending')
ERROR - 2020-05-14 11:40:23 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:40:23 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:46:28 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:46:29 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:46:29 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 11:46:29 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 11:50:40 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:50:41 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:50:41 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 11:50:41 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 11:50:44 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:50:47 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 11:50:47 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 11:50:47 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 05:01:52 --> Severity: error --> Exception: syntax error, unexpected ')' /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 26
ERROR - 2020-05-14 05:01:56 --> Severity: error --> Exception: syntax error, unexpected ')' /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 26
ERROR - 2020-05-14 05:03:00 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 59
ERROR - 2020-05-14 05:03:02 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 59
ERROR - 2020-05-14 05:03:03 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 59
ERROR - 2020-05-14 05:03:08 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 59
ERROR - 2020-05-14 12:03:19 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:03:21 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:03:21 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:03:21 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:04:08 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:05:50 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:05:51 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:05:51 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:05:51 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:05:55 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:05:56 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:05:56 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:05:56 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:05:58 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:05:59 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:05:59 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:05:59 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:06:49 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:06:50 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:06:50 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:06:50 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:07:18 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:07:19 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:07:19 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:07:19 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:07:33 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:07:36 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:07:37 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:07:37 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:07:37 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:07:46 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:07:48 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:07:48 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:07:48 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:07:49 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:07:54 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:07:54 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:07:54 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:07:54 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:08:08 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:08:08 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:08:08 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:08:08 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:08:23 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:08:28 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:08:28 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:08:28 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:09:27 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:09:29 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:09:29 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:09:29 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:09:39 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:09:40 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:09:40 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:09:40 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:09:44 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:09:45 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:09:45 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:09:45 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:11:35 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:11:38 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:11:38 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:11:38 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:21 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:26 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:26 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:26 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:36 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:38 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:38 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:38 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:47 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:48 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:48 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:48 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:49 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:50 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:50 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:50 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:51 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:52 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:52 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:52 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:53 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:54 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:54 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:54 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:55 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:56 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:12:56 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:56 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:12:57 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:13:01 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:13:01 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:13:01 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:13:06 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:13:07 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:13:07 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:13:07 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:13:56 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:13:57 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:13:57 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:13:57 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:14:28 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:14:29 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:14:29 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:14:29 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:18:04 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:18:10 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:18:10 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:18:10 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:18:42 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:18:43 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:18:43 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:18:43 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:23:17 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:23:19 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:23:19 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:23:19 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:23:42 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:23:45 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:23:45 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:23:45 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:24:10 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:24:11 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:24:11 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:24:11 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:24:30 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:25:17 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:25:31 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:25:32 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:25:32 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:25:32 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:26:05 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:26:11 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:26:13 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:26:13 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:26:13 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:27:56 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:27:56 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:27:56 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:27:56 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:28:20 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:28:22 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:28:22 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:28:22 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:29:38 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:29:44 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:29:44 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:29:44 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:36:07 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:36:11 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:36:11 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:36:11 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 12:59:23 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:59:24 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:59:53 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:59:56 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 12:59:56 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 13:00:13 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 13:00:13 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 13:02:18 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 13:02:18 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 14:37:47 --> Severity: Notice --> Undefined index: photo /home/qx59rn1k06vg/public_html/application/views/mod/withdrawal/view_edit.php 63
ERROR - 2020-05-14 14:52:39 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 14:52:53 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 14:52:53 --> Severity: Notice --> Undefined variable: response /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Withdrawal.php 206
ERROR - 2020-05-14 14:52:56 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 14:53:07 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 14:57:01 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 14:57:09 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 14:57:09 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 14:57:19 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 14:57:19 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 14:57:37 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 14:57:38 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 14:58:08 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 14:58:37 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 14:59:00 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 15:06:57 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:06:58 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:06:58 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 15:06:58 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 15:07:20 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:07:21 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:07:21 --> Severity: Notice --> Undefined property: History_report::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/History_report.php 29
ERROR - 2020-05-14 15:07:21 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/History_report.php 29
ERROR - 2020-05-14 15:07:23 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:07:24 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:07:24 --> Severity: Notice --> Undefined property: Account_trading::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 15:07:24 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/Account_trading.php 29
ERROR - 2020-05-14 15:24:53 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:25:05 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:25:06 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:25:08 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:32:57 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:33:11 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:39:45 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:39:45 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 112
ERROR - 2020-05-14 15:39:45 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 123
ERROR - 2020-05-14 15:39:45 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 129
ERROR - 2020-05-14 15:39:52 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:39:53 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:39:54 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:40:00 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:40:00 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:40:00 --> Severity: Notice --> Undefined property: History_report::$referral_model /home/qx59rn1k06vg/public_html/application/controllers/l-member/History_report.php 29
ERROR - 2020-05-14 15:40:00 --> Severity: error --> Exception: Call to a member function get_datatables() on null /home/qx59rn1k06vg/public_html/application/controllers/l-member/History_report.php 29
ERROR - 2020-05-14 15:40:03 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:40:03 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 112
ERROR - 2020-05-14 15:40:03 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 123
ERROR - 2020-05-14 15:40:03 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 129
ERROR - 2020-05-14 15:47:27 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:47:27 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 111
ERROR - 2020-05-14 15:47:27 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 122
ERROR - 2020-05-14 15:47:27 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 128
ERROR - 2020-05-14 15:53:49 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:53:49 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 111
ERROR - 2020-05-14 15:53:49 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 122
ERROR - 2020-05-14 15:53:49 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 128
ERROR - 2020-05-14 15:57:02 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 15:57:02 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 116
ERROR - 2020-05-14 15:57:02 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 127
ERROR - 2020-05-14 15:57:02 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 133
ERROR - 2020-05-14 16:01:34 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:01:34 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 116
ERROR - 2020-05-14 16:01:34 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 127
ERROR - 2020-05-14 16:01:34 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 133
ERROR - 2020-05-14 16:02:19 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:02:19 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 116
ERROR - 2020-05-14 16:02:19 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 127
ERROR - 2020-05-14 16:02:19 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 133
ERROR - 2020-05-14 16:02:30 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:02:30 --> Query error: Unknown column 'status' in 'field list' - Invalid query: INSERT INTO `t_account_trading` (`user_id`, `type_account`, `leverage`, `status`) VALUES ('10', 'Super Account', '1:100', 'Pending')
ERROR - 2020-05-14 16:02:58 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:02:58 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 116
ERROR - 2020-05-14 16:02:58 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 127
ERROR - 2020-05-14 16:02:58 --> Severity: Notice --> Undefined variable: res /home/qx59rn1k06vg/public_html/application/views/member/account_trading.php 133
ERROR - 2020-05-14 16:03:01 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:03:02 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:04:38 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:05:53 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:05:55 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:06:09 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:06:32 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:06:34 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:06:54 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:07:13 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:07:37 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:08:50 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:09:30 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 16:10:01 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 19:57:27 --> Severity: error --> Exception: Unable to locate the model you have specified: Account_model /home/qx59rn1k06vg/public_html/system/core/Loader.php 348
ERROR - 2020-05-14 19:57:46 --> Severity: error --> Exception: Unable to locate the model you have specified: Account_model /home/qx59rn1k06vg/public_html/system/core/Loader.php 348
ERROR - 2020-05-14 12:57:47 --> Severity: error --> Exception: syntax error, unexpected end of file /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 49
ERROR - 2020-05-14 19:58:53 --> Severity: Notice --> Undefined index: amount_usd /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 36
ERROR - 2020-05-14 19:58:53 --> Severity: Notice --> Undefined index: status /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 38
ERROR - 2020-05-14 20:36:34 --> Severity: Notice --> Undefined index: t_account_trading.id /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 47
ERROR - 2020-05-14 20:44:44 --> Query error: Unknown column 't_account_tradinguser_id' in 'on clause' - Invalid query: SELECT *, `t_account_trading`.`id` as `id`
FROM `t_account_trading`
JOIN `t_user` ON `t_user`.`id`=`t_account_tradinguser_id`
WHERE `t_account_trading`.`id` = 1
ERROR - 2020-05-14 20:45:01 --> Query error: Unknown column 't_account_tradinguser_id' in 'on clause' - Invalid query: SELECT *, `t_account_trading`.`id` as `id`
FROM `t_account_trading`
JOIN `t_user` ON `t_user`.`id`=`t_account_tradinguser_id`
WHERE `t_account_trading`.`id` = 1
ERROR - 2020-05-14 22:45:38 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 22:45:44 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 22:50:54 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 22:51:17 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:51:19 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:04 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 22:52:09 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 22:52:25 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:27 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:28 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:28 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:28 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:28 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:28 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:28 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:46 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:51 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:52 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:56 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:56 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:57 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:57 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:52:58 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:53:08 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:53:09 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:53:09 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:53:45 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:53:46 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:54:05 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 22:54:10 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 22:54:15 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:54:15 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:54:29 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:54:30 --> Severity: Notice --> Undefined variable: rules /home/qx59rn1k06vg/public_html/application/controllers/l-admin/Account_trading.php 148
ERROR - 2020-05-14 22:54:47 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 22:54:51 --> Could not find the language line "form_label_title"
ERROR - 2020-05-14 22:57:14 --> Could not find the language line "referral_title"
ERROR - 2020-05-14 22:57:29 --> Could not find the language line "referral_title"
