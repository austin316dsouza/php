# php
https://blog.teamtreehouse.com/deploy-static-site-heroku
ec2-user@ip
sudo su
yum update -y
yum install httpd -y
chkconfig httpd on
cd/var/www/html
aws s3 sync s3://bucketname /cd/var/www/html
service httpd start
