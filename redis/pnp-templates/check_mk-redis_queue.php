<?php
# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2013             mk@mathias-kettner.de |
# +------------------------------------------------------------------+
#
# This file is part of Check_MK.
# The official homepage is at http://mathias-kettner.de/check_mk.
#
# check_mk is free software;  you can redistribute it and/or modify it
# under the  terms of the  GNU General Public License  as published by
# the Free Software Foundation in version 2.  check_mk is  distributed
# in the hope that it will be useful, but WITHOUT ANY WARRANTY;  with-
# out even the implied warranty of  MERCHANTABILITY  or  FITNESS FOR A
# PARTICULAR PURPOSE. See the  GNU General Public License for more de-
# ails.  You should have  received  a copy of the  GNU  General Public
# License along with GNU Make; see the file  COPYING.  If  not,  write
# to the Free Software Foundation, Inc., 51 Franklin St,  Fifth Floor,
# Boston, MA 02110-1301 USA.

# Check written by Craig Cook  1 April 2015
# - version 1
# - version 1.2  14 April 2015  Craig Cook
#                   Added support for Average Queue Size over time


# HTML COLORS
$RED        = "FF0000";
$YELLOW     = "FFFF00";
$CYAN       = "00FFFF";
$BLUE       = "0000FF";
$DARK_BLUE  = "0000A0";
$LIGHT_BLUE = "ADD8E6";
$PURPLE     = "800080";
$PINK       = "FFC0CB";
$MAGENTA    = "FF00FF";
$SILVER     = "C0C0C0";
$GREY       = "808080";
$ORANGE     = "FFA500";
$BROWN      = "A52A2A";
$MAROON     = "800000";
$GREEN      = "00cf00";
$OLIVE      = "808000";

$WARN_COLOR = "$YELLOW";
$CRIT_COLOR = "$RED";

$var1             = "redis_queue";
$var1_description = "Jobs";
$var1_color       = "$CYAN";
$var2             = "redis_queue_avg";
$var2_description = "REDIS Queue Average";
$var2_color       = "$DARK_BLUE";

# The number of data source various due to different
# settings (such as averaging). We rather work with names
# than with numbers.
$RRD = array();
foreach ($NAME as $i => $n) {
    $RRD[$n]  = "$RRDFILE[$i]:$DS[$i]:MAX";
    $WARN[$n] =  $WARN[$i];
    $CRIT[$n] =  $CRIT[$i];
    $MIN[$n]  =  $MIN[$i];
    $MAX[$n]  =  $MAX[$i];
}

$servicedesc = str_replace("_", " ", $servicedesc);

$opt[1] = "--vertical-label 'Jobs' -l0  --title \"$servicedesc\" ";

$def[1] =  ""
         . "DEF:$var1=$RRD[$var1] "
         . "AREA:$var1#$var1_color:\"$var1_description               \" "
         . "GPRINT:$var1:LAST:\"%6.2lf last\" "
         . "GPRINT:$var1:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var1:MAX:\"%6.2lf max\\n\" "

         . "";

# This puts the Yellow line on the graph if WARN is set
if ($WARN[1]) {
    $def[1] .= ""
         . "HRULE:$WARN[1]#$WARN_COLOR "
         . "";
}

# This puts the Red line on the graph if WARN is set
if ($CRIT[1]) {
    $def[1] .= ""
         . "HRULE:$CRIT[1]#$CRIT_COLOR "
         . "";
}

# This puts a Dark Blue line on the graph if Queue Average is used
if (isset($RRD["redis_queue_avg"])) {
    $def[1] .= ""
         . "DEF:$var2=$RRD[$var2] "
         . "LINE:$var2#$var2_color:\"$var2_description\" "
         . "";
}

?>
