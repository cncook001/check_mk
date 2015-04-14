group = "checkparams"
subgroup_applications = _("Applications, Processes &amp; Services")
register_check_parameters(
    subgroup_applications,
    "redis_queue",
    _("REDIS or Sidekiq Queue lengths"),
    Dictionary(
        elements = [
            ("warn_size",
                  Integer(
                      title = _("Warning level at"),
                      default_value = None,
                  ),
            ),
            ("crit_size",
                  Integer(
                      title = _("Critical Level at"),
                      default_value = None,
                  ),
            ),
            ("queue_average",
                  Integer(
                      title = _("Queue Averaging"),
                      help = _("By activating averaging, Check_MK will compute the average of "
                               "the queue size over a given interval. If you have defined "
                               "alerting levels then these will automatically be applied on the "
                               "averaged value. This helps to mask out short peaks. "),
                      unit = _("minutes"),
                      minvalue = 1,
                      default_value = 15,
                  ),
            ),
        ],
        optional_keys = [ "warn_size", "crit_size", "queue_average" ],
    ),
    TextAscii( title=_("REDIS Queue Name"),
    help=_("The name of the REDIS queue")),
    'first'
)
