MySQL
=====
Check_mk mysql monitoring scripts

Usage:

On Client:
 
	cp agent/plugins/mk_mysql /usr/lib/check_mk_agent/plugins
	cp agent/etc/mysql.cg /etc/check_mk
 
	chmod 700 /usr/lib/check_mk_agent/plugins/mk_mysql

        Edit /etc/check_mk/mysql.cfg with your mysql user details

On Monitoring Server:
 
        Copy the Checks
        ---------------
        cp checks/mysql /usr/share/check_mk/checks/mysql
        cp checks/mysql_capacity /usr/share/check_mk/checks/mysql_capacity

        Copy the pnp-templates
        ----------------------
        cp pnp-templates/* /usr/share/check_mk/pnp-templates

        Copy the man page
        -----------------
        cp checkman/* /usr/share/check_mk/checkman
