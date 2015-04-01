REDIS
=====
Check_mk redis monitoring scripts

Requires: redis-cli

Usage:

On Client:
 
	cp plugins/mk_redis_queues /usr/lib/check_mk_agent/plugins
 
	chmod 700 /usr/lib/check_mk_agent/plugins

On Monitoring Server:
 
	cp checks/redis_queues /usr/share/check_mk/checks/redis_queues

If using OMD:

        cp wato/plugins/check_parameters_redis_queue.py /omd/sites/<your site name>/local/share/check_mk/web/plugins/wato/check_parameters_redis_queue.py
