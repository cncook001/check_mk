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
        ],
        optional_keys = [ "warn_size", "crit_size" ],
    ),
    TextAscii( title=_("REDIS Queue Name"),
    help=_("The name of the REDIS queue")),
    'first'
)
