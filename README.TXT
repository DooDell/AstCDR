# cd /etc/php5/apache2
# cp -a php.ini php.ini.old

[~] # vim php.ini
short_open_tag = On (linha 202)
max_execution_time = 120 (linha 372)
memory_limit = 512M (linha 393)
error_reporting = E_COMPILE_ERROR (linha 449)
upload_max_filesize = 12M (linha 810)

# cd /var/www/html/astcdr/
# ln -s /var/spool/asterisk/monitor monitor

