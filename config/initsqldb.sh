#!/bin/zsh

mysql -u root < donkeyEvent.sql
mysql -u root < insertcity.sql
mysql -u root < eventCategory.sql
mysql -u root < addEvent.sql
mysql -u root < eventOptions.sql