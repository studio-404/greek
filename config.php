<?php
defined('DIR') OR exit;

$c['cmsversion'] = '1.0.1';
$c['websitevertion'] = '1.0.2';
$c['website.mode'] = 'WorkingMode'; // UnderDeveloper or WorkingMode
$c['developer.message'] = 'Website is under developer !'; // Developer message when under developer
$c['allowes.ips'] = array('94.240.219.35'); // allowed ips when website is under developer
// SITE CONFIGURATION
$c['site.url'] = 'http://greekepigraphy.ge'; 
$c['site.language.slash.position'] = 1; 
$c["welcome.page.class"] = 'homepage';
$c["welcome.page.slug"] = 'welcome';
$c['site.name'] = 'Developer CMS'; 
$c['languages.array'] = array("ge","en"); 
$c['languages.num.array'] = array(1,2); 

$c['admin.slug'] = 'gadmin';
$c['folders.upload'] = DIR . 'files/';
$c['folders.backup'] = 'backup/'; 
$c['folders.plugins'] = '_plugins/';

$c['database.hostname'] = '127.0.0.1';
$c['database.charset'] = 'UTF8';
$c['database.username'] = 'greekepi_graphy';
$c['database.password'] = 'nSqsPOz04f';
$c['database.name'] = 'greekepi_graphy';

// SITE CONFIGURATION
$c['date.timezone'] = 'Asia/Tbilisi';
$c['date.format'] = 'Y-m-d H:i:s';

$c['output.charset'] = 'UTF-8';
$c['main.language'] = 'ge';
$c['time.limit'] = 300;
$c['execution.time'] = 300;
$c['post.max.size'] = "64M";
$c['upload.max.filesize'] = "64M";
$c['session.expire.time'] = 1200; // 20 minute
//image sizes
$c['admin.photo.dementions'] = "200-130";
$c["product.view.pre.slug"] = "view"; // product page inside
$c["gallery.view.pre.slug"] = "gallery"; // gallery page inside
$c["website.directory"] = "template";
$c["invoice.due.date"] = 259200; // 3 day
$c["max.send.email.per.day"] = 500; 
$c["max.user.connections"] = 200; 
$c["max.connections"] = 200; 

return $c;