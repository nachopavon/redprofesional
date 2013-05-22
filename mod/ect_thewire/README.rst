Fork of The Wire for ECT
========================

This is a fork that substitutes the core plugin ``The Wire``. The only
difference with upstream is that there are 2 buttons when posting from
``The Wire``, one for posting only to Elgg and another one to post too
elgg and *also* to Twitter.

This plugin assumes that the ``twitter_api`` plugin is already
configured, both as administrator and as a user. If ``twitter_api`` is
not configured only the button for posting to Elgg will show up.

We'll try to get this plugin merged into upstream once we make it
Twitter independent.


Installation
------------

  #. Make sure Twitter API is properly configured by following both
     `as administrator`_ and `as user`_. Check `Troubleshooting`_ if
     you find problems.

    .. note::

       Make sure you try this with a dummy Twitter account instead of
       a real one.

  #. Put the root directory of this plugin in ``<elgg_root>/mod``.

  #. Make sure the permissions are set to the user that is running
     Apache running as.

  #. As *administrator*, through the web interface, go to
     ``Administration->Plugins``.

  #. Deactivate ``The Wire`` and activate ``The Wire for ECT``.


Troubleshooting
---------------

  - When creating an application in Twitter it's expected that the
    application that requires authorization (Elgg in this case) is
    available in a public domain name. However this is not necessary
    as long as the application is available locally and if it looks
    like a public domain name. For example, Twitter doesn't allow
    ``localhost`` as domain name but allows something looking like
    ``example.com``.

    If you can't access the elgg application with a domain name that
    looks like a normal one you can still use ``127.0.0.1``. Twitter
    allows IPs. When doing so you have to change also the default site
    URL for Elgg in ``Administration->Settings->Advanced Settings``
    and replace whatever domain you had with ``127.0.0.1``.

    If you still have problems with ``127.0.0.1`` try clearing browser
    cache or try to revert to the original domain after the Elgg
    application has been authorized.

    You can alternatively edit the ``/etc/hosts``, but I haven't
    tried so.


.. _`as administrator`: http://docs.elgg.org/wiki/ConfiguringTwitterServices_(Admin)
.. _`as user`: http://docs.elgg.org/wiki/ConfiguringTwitterService_(User)
