#!/bin/sh
#
#waiting...
sleep 30
#fix ssh
restorecon -r -vv /root/.ssh
#fix php root
chcon -R -t httpd_sys_rw_content_t /var/www/html/
chmod -R a+w /var/www/html/
#update and clear old kernels
yum -y clean all
yum -y update
package-cleanup --oldkernels --count=2 -y
#remove old log
rm /var/log/messages-*
rm /var/log/secure-*
rm /var/log/maillog-*
rm /var/log/dmesg.*
rm /var/log/cron-*
rm /var/log/btmp-*
rm /var/log/spooler-*
rm /var/log/ajenti/ajenti.log.*
rm /var/log/anaconda/ks-script-*
rm /var/log/anaconda/anaconda*
rm /var/log/audit/audit.log.*
rm /var/log/httpd/access_log-*
rm /var/log/httpd/error_log-*
rm /var/log/httpd/modsec_audit.log-*
rm /var/log/httpd/ssl_access_log-*
rm /var/log/httpd/ssl_error_log-*
rm /var/log/httpd/ssl_request_log-*
rm /var/log/tuned/tuned.log.*
#clean log
> /var/spool/mail/root
> /var/log/secure
> /var/log/boot.log
> /var/log/btmp
> /var/log/cron
> /var/log/dmesg
> /var/log/fail2ban.log
> /var/log/firewalld
> /var/log/grubby
> /var/log/lastlog
> /var/log/maillog
> /var/log/messages
> /var/log/secure
> /var/log/spooler
> /var/log/tallylog
> /var/log/wtmp
> /var/log/yum.log
> /var/log/anaconda/syslog
> /var/log/audit/audit.log
> /var/log/httpd/access_log
> /var/log/httpd/error_log
> /var/log/httpd/modsec_audit.log
> /var/log/httpd/modsec_debug.log
> /var/log/httpd/ssl_access_log
> /var/log/httpd/ssl_error_log
> /var/log/httpd/ssl_request_log
> /var/log/mariadb/mariadb.log
> /var/log/squid/access.log
> /var/log/squid/cache.log
> /var/log/tuned/tuned.log
> /var/log/nodemon.admin
> /var/log/nodemon.book

#
nodemon --watch /var/www/html/javascript/dx.server /var/www/html/javascript/dx.server/app.js>/var/log/nodemon.admin &

