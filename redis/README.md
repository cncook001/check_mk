REDIS
=====
Check_mk redis monitoring scripts

Requires: redis-cli

Usage:

On Client:
 
        cp plugins/mk_redis_queue /usr/lib/check_mk_agent/plugins
 
        chmod 700 /usr/lib/check_mk_agent/plugins/mk_redis_queue

On Monitoring Server:
 
        cp checks/redis_queue /usr/share/check_mk/checks/redis_queue
        cp checkman/redis_queue /usr/share/check_mk/checkman/redis_queue
        cp pnp-templates/check_mk-redis_queue.php /usr/share/check_mk/pnp-templates/check_mk-redis_queue.php

If using OMD:

        cp wato/plugins/check_parameters_redis_queue.py /omd/sites/<your site name>/local/share/check_mk/web/plugins/wato/check_parameters_redis_queue.py
