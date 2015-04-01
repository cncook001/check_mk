group = "checkparams"
subgroup_applications = _("Applications, Processes &amp; Services")

register_check_parameters(
    subgroup_applications,
    "redis_queue",
    _("REDIS or Sidekiq Queue lengths"),
    Dictionary(
        elements = [
            ("size",
            Tuple(
               title = _("Levels for the queue length"),
               elements = [
                  Integer(
                      title = _("Warning if above"), default_value = 10),
                  Integer(
                      title = _("Critical if above"), default_value = 30),
               ]
            )),
        ]
    ),
    TextAscii( title=_("REDIS Queue Name"),
    help=_("The name of the REDIS queue")),
    'first'
)
