<?php
require_once('database.php');

$USERS = "CREATE TABLE IF NOT EXISTS USERS_ADMIN(
    ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
    EMAIL VARCHAR(100),
    PASSWORD VARCHAR(20),	
    USERNAME VARCHAR(100),	
    IMAGE_ID BIGINT DEFAULT 1,
    FIRST_NAME TEXT,
    LAST_NAME TEXT,	
    ADDRESS TEXT,	
    ABOUT TEXT,	
    PHONE VARCHAR(13),	
    ACCESS VARCHAR(20))";

$IMAGES = "CREATE TABLE IF NOT EXISTS IMAGES(
    ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
    IMAGE_LINK TEXT, 
    IMG_CAPTION TEXT, 
    IMG_DESCRIPTIONS TEXT, 
    CATEGORY_ID BIGINT, 
    POST_BY TEXT, 
    POST_ON BIGINT,
    PUBLISH INTEGER DEFAULT 0)";

$TEACHER = "CREATE TABLE IF NOT EXISTS STAFF(
    ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
    USER_ID BIGINT, 
    QUALIFICATION TEXT, 
    SUBJECT TEXT, 
    DESIGNATION TEXT, 
    SERIAL_NO BIGINT,
    CATEGORY_ID BIGINT)";

$SETTINGS = "CREATE TABLE IF NOT EXISTS SETTINGS(
    ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
    PHONE_NO TEXT, 
    ADDRESS TEXT, 
    EMAIL TEXT, 
    SITE_NAME TEXT, 
    FB TEXT, 
    TWITTER TEXT, 
    LINKEDIN TEXT,
    GOOGLEPLUS TEXT,
    INSTAGRAM TEXT,
    SHORT_NOTE TEXT,
    STAFF INTEGER DEFAULT 0,
    USER INTEGER DEFAULT 0,
    EVENT INTEGER DEFAULT 0,
    GALLERY INTEGER DEFAULT 0,
    CO INTEGER DEFAULT 0)";

$Insert_Settings = "INSERT INTO `SETTINGS`(`PHONE_NO`, `ADDRESS`, `EMAIL`, `SITE_NAME`,"
        . " `FB`, `TWITTER`, `LINKEDIN`,"
        . " `GOOGLEPLUS`, `INSTAGRAM`, `SHORT_NOTE`)"
        . " VALUES ('xxx xxx xxx','Address','your email','sitename','','','','','','short note')";

$FILE = "CREATE TABLE IF NOT EXISTS FILE(
    ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
    NAME TEXT, 
    CAPTION TEXT, 
    FILE_LINK TEXT, 
    TYPE VARCHAR(10), 
    POST_ID BIGINT)";

$MENU = "CREATE TABLE IF NOT EXISTS MENU(
    ID BIGINT PRIMARY KEY AUTO_INCREMENT, 
    NAME TEXT, 
    CONTENT LONGTEXT, 
    IMAGE_ID BIGINT, 
    IS_PAGE INTEGER, 
    IN_NAVBAR INTEGER, 
    SERIAL_NO INTEGER, 
    SUBMENU INTEGER DEFAULT 0, 
    PERANT_ID BIGINT DEFAULT 0, 
    POST_BY TEXT, 
    UPDATE_BY TEXT, 
    POST_ON BIGINT,
    UPDATE_ON BIGINT,
    TOTAL_VISIT BIGINT,
    COMMENT_STATUS INTEGER DEFAULT 0,
    REMOVE INTEGER DEFAULT 0,
    PUBLISH INTEGER DEFAULT 0)";

// Insert
$MAIN_MENU = "CREATE OR REPLACE VIEW MAIN_MENU AS SELECT `ID`, `SERIAL_NO`, `NAME`, `IS_PAGE`, `SUBMENU` FROM MENU WHERE `PERANT_ID` = 0 AND `IN_NAVBAR` = 1 AND IS_PAGE < 2";
$SUB_MENU = "CREATE OR REPLACE VIEW SUB_MENU AS SELECT `ID`, `SERIAL_NO`, `NAME`, `IS_PAGE`, `SUBMENU` FROM MENU WHERE `PERANT_ID` != 0 AND `IN_NAVBAR` = 1";
$STaff_VIEW = "CREATE OR REPLACE VIEW STAFF_VIEW AS
SELECT
u.ID,
  u.FIRST_NAME,
  u.LAST_NAME,
  u.PHONE,
  u.IMAGE_ID,
  u.ABOUT,
  u.ADDRESS,
  u.EMAIL,
  s.QUALIFICATION,
  s.SUBJECT,
  s.DESIGNATION,
  s.CATEGORY_ID,
  s.SERIAL_NO,
  i.IMAGE_LINK
FROM
  STAFF s
INNER JOIN
  USERS_ADMIN u
ON
  u.ID = s.USER_ID
INNER JOIN
  IMAGES i
ON
  u.IMAGE_ID = i.ID";
$Post_VIEW = "CREATE OR REPLACE VIEW POST_VIEW AS
SELECT
m.ID,
  m.CONTENT,
  m.PERANT_ID,
  m.NAME,
  m.REMOVE,
  m.IMAGE_ID,
  m.POST_ON,
  m.PUBLISH,
  i.IMAGE_LINK
FROM
  MENU m
INNER JOIN
  IMAGES i
ON
  m.IMAGE_ID = i.ID";

mysqli_select_db($conn, $data);
$user = mysqli_query($conn, $USERS) or die(mysqli_error($conn));
$IMG = mysqli_query($conn, $IMAGES) or die(mysqli_error($conn));
$TT = mysqli_query($conn, $TEACHER) or dsie(mysqli_error($conn));
$S = mysqli_query($conn, $SETTINGS) or die(mysqli_error($conn));
$F = mysqli_query($conn, $FILE) or die(mysqli_error($conn));
$M = mysqli_query($conn, $MENU) or die(mysqli_error($conn));
$MAIN = mysqli_query($conn, $MAIN_MENU) or die(mysqli_error($conn));
$SUB = mysqli_query($conn, $SUB_MENU) or die(mysqli_error($conn));
$STAFF = mysqli_query($conn, $STaff_VIEW) or die(mysqli_error($conn));
$POst = mysqli_query($conn, $Post_VIEW) or die(mysqli_error($conn));
$sett = mysqli_query($conn, $Insert_Settings) or die(mysqli_error($conn));

?>
